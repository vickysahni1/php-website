<?php
include('authentication.php');
include('includes/header.php');
?>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Add new Categories</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item">view Categories</li>
                    <li class="breadcrumb-item active">Add Categories</li>
                </ol>   
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">New Categories</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">   

                        <form action="code.php" method="POST">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Name</label>
                                        <input type="text"  class="form-control p-4" name="name" placeholder="Name" required="required"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Slug</label>
                                        <input type="text"  class="form-control p-4" name="slug" placeholder="sluge" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="">Description</label>
                                <input type="text"  class="form-control p-4" name="des" placeholder="description" required="required"/>
                            </div>
                            <div class="form-group">
                            <label for="">Meta Title</label>
                                <input type="text"  class="form-control" name="m_title" rows="4" placeholder="meta title" required="required"></input>
                            </div>
                            <div class="form-group">
                            <label for="">Meta Description</label>
                                <input type="text"  class="form-control" name="m_des" rows="4" placeholder="meta description" required="required"></input>
                            </div>
                            <div class="form-group">
                            <label for="">Meta Keyword</label>
                                <input type="text"  class="form-control" name="m_key" rows="4" placeholder="meta Keyword" required="required"></input>
                            </div>
                            <div class="form-group">
                            <label for="">Navbar Status</label>
                                <select require name="nav_s"  class="form-control " >
                                    <option value="">--Navbar Status--</option>
                                    <option value="1">Active</option>
                                    <option value="0">NO Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">Foot Status</label>
                                <select require name="footer"  class="form-control " >
                                    <option value="">--Foot Status--</option>
                                    <option value="1">Active</option>
                                    <option value="0">NO Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">Tag Status</label>
                                <select require name="tag"  class="form-control " >
                                    <option value="">--Tag Status--</option>
                                    <option value="1">Active</option>
                                    <option value="0">NO Active</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" name="add_categories" >Add categories</button>
                            </div>
                        </form>

                                   
                    </div>
                </div>
            </div>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>