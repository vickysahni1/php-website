<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Post</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item">view Post</li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol>   
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Edit Post</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        
                    <?php 
                        if(isset($_GET['id']))
                        {
                            $post_id = $_GET['id'];
                            $data = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1 ";
                            $sql = mysqli_query($con, $data);

                            if(mysqli_num_rows($sql) > 0)
                            {
                                foreach($sql as $data)
                                {
                                    ?>

                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="">Name</label>
                                                    <div class="form-group">
                                                        <input type="text" value = "<?=$data['name'];?>"  class="form-control p-4" name="name" placeholder="Name" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Slug</label>
                                                    <div class="form-group">
                                                        <input type="text" value = "<?=$data['slug'];?>"  class="form-control p-4" name="slug" placeholder="sluge" required="required"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="des" id="summernote"  class="form-control p-4" placeholder="Description" required rows="4"><?=$data['des'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Meta Title</label>
                                                <input type="text" value = "<?=$data['m_title'];?>"  class="form-control" name="m_title" rows="4" placeholder="meta title" required="required"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Meta Description</label>
                                                <textarea name="m_des"  class="form-control" placeholder="meta Description" rows="3" required="required"><?=$data['m_des'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Meta Keyword</label>
                                                <input type="text" value = "<?=$data['m_key'];?>"  class="form-control" name="m_key" rows="4" placeholder="meta Keyword" required="required"></input>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status" <?= $data['status'] == '1' ? 'checked':'0' ?> width="70px" height="70px"/>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden"  class="form-control p-4" value="<?=$data['id'];?>" name="id" placeholder="Categories Name" required="required"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Feature Post</label>
                                                <select name="f_post"  class="form-control" >
                                                    <option value="">--Tag Status--</option>
                                                    <option value="1" <?= $data['f_p'] == '1' ? 'selected':'' ?> >Active</option>
                                                    <option value="0" <?= $data['f_p'] == '0' ? 'selected':'' ?>>No Active</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="">Main Slider</label>
                                                <select name="m_p"  class="form-control" >
                                                    <option value="">--Main Slider--</option>
                                                    <option value="1" <?= $data['m_p'] == '1' ? 'selected':'' ?> >Active</option>
                                                    <option value="0" <?= $data['m_p'] == '0' ? 'selected':'' ?>>No Active</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">categories</label>
                                                <?php 
                                                    $category = "SELECT * FROM categories ";
                                                    $category_run = mysqli_query($con, $category);
                                                    if(mysqli_num_rows($category_run) >0)
                                                    {
                                                        ?>
                                                            <select name="category_id" class="form-control">
                                                                <option value="">--Select Category--</option>
                                                                <?php
                                                                    foreach($category_run as $categoryitem)
                                                                    {
                                                                        ?>
                                                                            <option value="<?= $categoryitem['id'] ?>" <?= $categoryitem['id'] == $data['cat_id'] ? 'selected':'' ?> >
                                                                                <?= $categoryitem['name'] ?>
                                                                            </option>
                                                                         <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <h5>No category Available</h5>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Image </label>
                                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                                <input type="file" name="image" >
                                            </div>
                                            <div>
                                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="post_update" >Update Post</button>
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