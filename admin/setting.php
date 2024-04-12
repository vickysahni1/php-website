<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Setting</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>   
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Setting</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3"> 
                        <?php
                        $setting_data = "SELECT * FROM setting ";
                        $setting_data_run = mysqli_query($con, $setting_data);

                        if(mysqli_num_rows($setting_data_run) > 0 )
                        {
                            foreach($setting_data_run as $data)
                            {
                                ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Title</label>
                                            <div class="form-group">
                                                <input type="text" value="<?=$data['title'];?>"  class="form-control p-4" name="web_title" placeholder="Name" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Description</label>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control p-4" name="web_des" placeholder="Description" required="required"><?=$data['des'];?> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Key Words</label>
                                            <div class="form-group">
                                                <input type="text" value="<?=$data['keyword'];?>"   class="form-control p-4" name="web_key" placeholder="Meta Keyword" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Favicon</label>
                                        <input type="hidden" name="fav-icon-old" value="<?= $data['image'] ?>">
                                        <input type="file" name="fav-icon" >
                                    </div>
                                    <div class="form-group">
                                       <img src="uploads/fav-icon/<?=$data['image'];?>" alt="">
                                    </div>
                                    <div>
                                        <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="set_btn_up" >Save Setting</button>
                                    </div>
                                </form>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Title</label>
                                            <div class="form-group">
                                                <input type="text"  class="form-control p-4" name="web_title" placeholder="Name" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Description</label>
                                            <div class="form-group">
                                                <textarea type="text"  class="form-control p-4" name="web_des" placeholder="Description" required="required"> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Key Words</label>
                                            <div class="form-group">
                                                <input type="text"  class="form-control p-4" name="web_key" placeholder="Meta Keyword" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Favicon</label>
                                        <input type="file" name="fav-icon" >
                                    </div>
                                    <div>
                                        <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="set_btn" >Add Post</button>
                                    </div>
                                </form>
                            <?php
                        }
                        ?>
                                        
                    </div>
                </div>
            </div>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>