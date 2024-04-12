<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit User</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Categories</li>
                </ol>   
                <div class="col-lg-15">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Edit</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">   
                        <h6 class="text-uppercase font-weight-bold mb-3">Edit Categories</h6>

                        

                        <?php 
                        if(isset($_GET['id']))
                        {
                            $categories_id = $_GET['id'];
                            $data = "SELECT * FROM categories WHERE id='$categories_id' ";
                            $users_run = mysqli_query($con, $data);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $data)
                                {
                                    ?>
                                    
                                        <form action="code.php" method="POST">
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text"  class="form-control p-4" value="<?=$data['name'];?>" name="name" placeholder="Categories Name" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Slug</label>
                                                        <input type="text"  class="form-control p-4" value="<?=$data['slug'];?>" name="slug" placeholder="slug" required="required"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Des</label>
                                                <input type="text"  class="form-control p-4" value="<?=$data['des'];?>" name="des" placeholder="Description" required="required"/>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Meta title</label>
                                                <input type="text"  class="form-control" value="<?=$data['meta_title'];?>"  name="m_t" rows="4" placeholder="Meta Title" required="required"></input>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Meta Des</label>
                                                <input type="text"  class="form-control p-4" value="<?=$data['meta_des'];?>" name="m_d" placeholder="Meta Description" />
                                            </div>
                                            <div class="form-group">
                                            <label for="">Meta Key</label>
                                                <input type="text"  class="form-control p-4" value="<?=$data['meta_key'];?>" name="m_k" placeholder="Meta Keyword" />
                                            </div>
                                            <div class="form-group">
                                            <label for="">Navbar Status</label>
                                                <select name="n_s"  class="form-control" >
                                                    <option value="">--Navbar Status--</option>
                                                    <option value="1" <?= $data['navbar_status'] == '1' ? 'selected':'' ?> >Active</option>
                                                    <option value="0" <?= $data['status'] == '0' ? 'selected':'' ?>>No Active</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Foot Status</label>
                                                <select name="fot"  class="form-control" >
                                                    <option value="">--Foot Status--</option>
                                                    <option value="1" <?= $data['fot'] == '1' ? 'selected':'' ?> >Active</option>
                                                    <option value="0" <?= $data['fot'] == '0' ? 'selected':'' ?>>No Active</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Tag Status</label>
                                                <select name="tag"  class="form-control" >
                                                    <option value="">--Tag Status--</option>
                                                    <option value="1" <?= $data['tag'] == '1' ? 'selected':'' ?> >Active</option>
                                                    <option value="0" <?= $data['tag'] == '0' ? 'selected':'' ?>>No Active</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="up_cate" >Update</button>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden"  class="form-control p-4" value="<?=$data['id'];?>" name="id" placeholder="Categories Name" required="required"/>
                                                </div>
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