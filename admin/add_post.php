<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Add new Post</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item">view Post</li>
                    <li class="breadcrumb-item active">Add Post</li>
                </ol>   
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">New Post</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">   
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <div class="form-group">
                                        <input type="text"  class="form-control p-4" name="name" placeholder="Name" required="required"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <div class="form-group">
                                        <input type="text"  class="form-control p-4" name="slug" placeholder="sluge" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="des" id="summernote" class="form-control p-4" placeholder="Description" required rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Meta Title</label>
                                <input type="text"  class="form-control" name="m_title" rows="4" placeholder="meta title" required="required"></input>
                            </div>
                            <div class="form-group">
                                <label for="">Meta Description</label>
                                <textarea name="m_des" class="form-control" placeholder="meta Description" rows="3" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Meta Keyword</label>
                                <input type="text"  class="form-control" name="m_key" rows="4" placeholder="meta Keyword" required="required"></input>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Status</label>
                                <select required name="status"  class="form-control " >
                                    <option value="">--Status--</option>
                                    <option value="1">yes</option>
                                    <option value="0">no</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Features Post</label>
                                <select required  name="f_post"  class="form-control " >
                                    <option value="">--Features Post--</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Main Slider</label>
                                <select required name="m_p"  class="form-control " >
                                    <option value="">--Main Slider--</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">categories</label>
                                    <?php 
                                        $category = "SELECT * FROM categories ";
                                        $category_run = mysqli_query($con,$category);
                                        if(mysqli_num_rows($category_run) >0)
                                        {
                                            ?>
                                                <select name="category_id" required class="form-control">
                                                    <option value="">--Select Category--</option>
                                                    <?php
                                                        foreach($category_run as $categoryitem)
                                                        {
                                                        ?>
                                                        <option value="<?= $categoryitem['id'] ?>"><?= $categoryitem['name'] ?></option>
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
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Image </label>
                                <input type="file" name="image" >
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="add_post" >Add Post</button>
                            </div>
                        </form>                
                    </div>
                </div>
            </div>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>