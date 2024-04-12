<?php
session_start();
include('admin/config/dbcom.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php if (isset($page_title)) { echo "$page_title"; } else { echo "Developer Vicky"; } ?></title>

    <meta name="description" content="<?php if (isset($meta_description)) { echo "$meta_description"; } ?>"/>
    <meta name="keywords" content="<?php if (isset($meta_keywords)) { echo "$meta_keywords"; } ?>"/>
    <meta name="author" content="Developer Vicky"/>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Monday, January 1, 2045</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="about.php">About</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="contact.php">Contact</a>
                        </li>
                        <?php if(isset($_SESSION['auth_user'])) : ?>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Welcome <?= $_SESSION['auth_user']['user_name']; ?></a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <form class="nav-link text-body small" action="allcode.php" method="POST">
                                <button  type="submit" name="logout_btn">Logout</button>
                            </form>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="./login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="./singup.php">Sing Up</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.facebook.com/developervicky0"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body"  href="https://www.instagram.com/its_vickyy09"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.youtube.com/@developervicky"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <img src="img/dev-vicky.png" alt="Developer Vicky">
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <img src="img/dev-vicky.png" alt="Developer Vicky">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu rounded-0 m-0">
                        <?php
                        include('admin/config/dbcom.php');
                        ?>

                        <?php 
                            $data = "SELECT * FROM categories  WHERE navbar_status = '1'; ";
                            $query_run = mysqli_query($con, $data);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                        <a href="category.php?title=<?= $row['slug']; ?>" class="dropdown-item"><?= $row['name']; ?></a>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <a href="#" class="dropdown-item">NO Categories Found</a>
                                <?php
                            }
                        ?>

                        </div>
                    </div>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                    <?php if(isset($_SESSION['auth_user'])) : ?>

                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Welcome <?= $_SESSION['auth_user']['user_name']; ?></a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <form class="dropdown-item" action="allcode.php" method="POST">
                                <button type="submit" name="logout_btn">Logout</button>
                            </form>
                        </div>
                    </div>
                    <?php else : ?>
                    <a href="./login.php" class="nav-item nav-link ">Login</a>
                    <a href="./singup.php" class="nav-item nav-link ">Sing Up</a>
                    <?php endif; ?>



                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->