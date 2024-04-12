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
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Post</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM comment ORDER BY id DESC ; ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['mess']; ?></td>
                                            <td>
                                                <?php
                                                $pid = $row['post_id'];
                                                $data = "SELECT name, slug FROM posts WHERE id=$pid ";
                                                $data_run = mysqli_query($con, $data);
                                                if(mysqli_num_rows($data_run) > 0 )
                                                {
                                                    foreach($data_run as $d)
                                                    {
                                                        ?>
                                                        <a href="../post.php?title=<?=$d['slug'];?>"><?=$d['name']; ?></a>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    no found
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><small><?= date('d-M-Y', strtotime($row['created_at'])); ?></small></td>

                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="com_d" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
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

