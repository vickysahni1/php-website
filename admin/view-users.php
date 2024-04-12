<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Tables</h1>
                <?php include('message.php'); ?>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboad</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Users
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td>
                                                <?php
                                                    if($row['role_as'] == '1'){
                                                        echo 'Admin';
                                                    }elseif($row['role_as'] == '0'){
                                                        echo 'user';
                                                    }
                                                ?>
                                            </td>
                                            <td><?= date('d-M-Y', strtotime($row['created_at'])); ?></td>
                                            <td><a class="btn btn-primary font-weight-semi-bold px-4" href="edit-user.php?id=<?=$row['id'];?>">Edit</a></td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="user_delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
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

