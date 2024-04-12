<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Categories</h1>
                <?php include('message.php'); ?>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Categories Table
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Nav status</th>
                                    <th>Date</th>
                                    <th>Restore</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM categories  WHERE status = '2'; ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><a href="../<?= $row['slug']; ?>" ><?= $row['slug']; ?></a></td>
                                            <td>
                                                <?php
                                                    if($row['navbar_status'] == '1'){
                                                        echo 'Active';
                                                    }elseif($row['navbar_status'] == '0'){
                                                        echo 'not active';
                                                    }
                                                ?>
                                            </td>
                                            <td>--</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="re_cat" value="<?= $row['id']; ?>" class="btn btn-danger">Restore</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?> 
                                        <tr>
                                            <td colspan="6">No Record found</td>
                                        </tr>
                                    <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>

