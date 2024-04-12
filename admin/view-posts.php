<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Posts</h1>
                <?php include('message.php'); ?>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Posts Table
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>slug</th>
                                    <th>Categories</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM posts WHERE d_p = '0' order by id desc ; ";
                                $query_run = mysqli_query($con, $query);
                            


                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        
                                        <tr>
                                            <?php $cat_i = $row['cat_id']; ?>
                                            <td><?= $row['id']; ?></td>
                                            <td><img src="../uploads/posts/<?= $row['image']; ?>" height="90px" alt="<?= $row['name']; ?>"></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><a href="../post.php?title=<?= $row['slug']; ?>" ><?= $row['slug']; ?></a></td>
                                            <td>
                                                <?php
                                                $cat_data = "SELECT name FROM categories WHERE id='$cat_i'; ";
                                                $cat_data_run  = mysqli_query($con, $cat_data);

                                                if(mysqli_num_rows($cat_data_run) > 0)
                                                {
                                                    foreach($cat_data_run as $data)
                                                    {
                                                        ?>
                                                        <?= $data['name']; ?>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?= date('d-M-Y', strtotime($row['created_at'])); ?></td>
                                            <td><a class="btn btn-primary font-weight-semi-bold px-4" href="edit-post.php?id=<?=$row['id'];?>">Edit</a></td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="post_delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
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

