<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Add new User</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item">view User</li>
                    <li class="breadcrumb-item active">Add User</li>
                </ol>   
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">New User</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">   
                        <h6 class="text-uppercase font-weight-bold mb-3">Add New User</h6>

                        <form action="code.php" method="POST">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">First Name</label>
                                        <input type="text"  class="form-control p-4" name="fn" placeholder="First Name" required="required"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Last Name</label>
                                        <input type="text"  class="form-control p-4"  name="ln" placeholder="Last Name" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="">Email</label>
                                <input type="email"  class="form-control p-4" name="em" placeholder="Email" required="required"/>
                            </div>
                            <div class="form-group">
                            <label for="">Password</label>
                                <input type="text"  class="form-control"   name="pas" rows="4" placeholder="Password" required="required"></input>
                            </div>
                            <div class="form-group">
                            <label for="">Role AS</label>
                                <select require name="rol"  class="form-control " >
                                    <option value="">--Select Role--</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="add_user" >Add user</button>
                            </div>
                        </form>

                                   
                    </div>
                </div>
            </div>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>