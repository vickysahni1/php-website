<?php
include('authentication.php');
include('includes/header.php');
?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Admin panel</h1>
    <?php include('message.php'); ?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Category
                    <?php
                        $dash_categories = "SELECT * from categories ";
                        $dash_categories_run = mysqli_query($con, $dash_categories);

                        if($categories_total = mysqli_num_rows($dash_categories_run))
                        {
                            echo '<h4 class="mb-0"> ' . $categories_total . ' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">0</h4>';
                        }
                    ?>
                </div>                
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total Posts
                        <?php
                            $dash_post_query = "SELECT * from posts";
                            $dash_post_query_run = mysqli_query($con, $dash_post_query);

                            if($post_total = mysqli_num_rows($dash_post_query_run))
                            {
                                echo '<h4 class="mb-0"> ' . $post_total . ' </h4>';
                            }
                            else
                            {
                                echo '<h4 class="mb-0">0</h4>';
                            }
                        ?>
                    </div>                
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Users
                        <?php
                            $dash_users_query = "SELECT * from users WHERE status='0' ";
                            $dash_users_query_run = mysqli_query($con, $dash_users_query);

                            if($users_total = mysqli_num_rows($dash_users_query_run))
                            {
                                echo '<h4 class="mb-0"> ' . $users_total . ' </h4>';
                            }
                            else
                            {
                                echo '<h4 class="mb-0">0</h4>';
                            }
                        ?>
                    </div>                
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Comments
                    <?php
                        $dash_users_query = "SELECT * from comment ";
                        $dash_users_query_run = mysqli_query($con, $dash_users_query);

                        if($users_total = mysqli_num_rows($dash_users_query_run))
                        {
                            echo '<h4 class="mb-0"> ' . $users_total . ' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">0</h4>';
                        }
                    ?>
                </div>                
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>

