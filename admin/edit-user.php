<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit User</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>   
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Edit</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">   
                        <h6 class="text-uppercase font-weight-bold mb-3">Edit User</h6>

                        

                        <?php 
                        if(isset($_GET['id']))
                        {
                            $user_id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id='$user_id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                                    ?>
                                    
                                        <form action="code.php" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">First Name</label>
                                                        <input type="text"  class="form-control p-4" value="<?=$user['fname'];?>" name="fn" placeholder="First Name" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Last Name</label>
                                                        <input type="text"  class="form-control p-4" value="<?=$user['lname'];?>" name="ln" placeholder="Last Name" required="required"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Email</label>
                                                <input type="email"  class="form-control p-4" value="<?=$user['email'];?>" name="em" placeholder="Email" required="required"/>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Password</label>
                                                <input type="text"  class="form-control" value="<?=$user['password'];?>"  name="pas" rows="4" placeholder="Password" required="required"></input>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden"  class="form-control p-4" value="<?=$user['id'];?>" name="uid" placeholder="User Id" />
                                            </div>
                                            <div class="form-group">
                                            <label for="">Role AS</label>
                                                <select name="rol"  class="form-control " >
                                                    <option value="">--Select Role--</option>
                                                    <option value="1" <?= $user['role_as'] == '1' ? 'selected':'' ?> >Admin</option>
                                                    <option value="0" <?= $user['role_as'] == '0' ? 'selected':'' ?>>User</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="upbtn" >Update</button>
                                            </div>
                                        </form>

                                    <?php
                                }
                                
                            }
                            else
                            {
                               ?> 
                               <h4>No found</h4>
                               <?php
                            }

                        }
                            
                        ?>
                    </div>
                </div>
            </div>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>