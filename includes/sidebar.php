<div class="col-lg-4">
    <!-- Social Follow Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Fans</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Connects</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Subscribers</span>
            </a>
            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
        </div>
    </div>
    <!-- Social Follow End -->

    <!-- Ads Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
        </div>
    </div>
    <!-- Ads End -->

    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <?php
            $tranding_post = "SELECT * FROM posts WHERE d_p='0' ORDER BY id desc LIMIT 5";
            $tranding_post_run = mysqli_query($con, $tranding_post);

            if(mysqli_num_rows($tranding_post_run) > 0 )
            {
                foreach($tranding_post_run as $trandingpost)
                {
                    ?>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                    <a class="text-body" href=""><small><?= date('d-M-Y', strtotime($trandingpost['created_at'])); ?></small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""><?=$trandingpost['name'];?></a>
                            </div>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                        <img class="img-fluid" src="img/news-110x110-1.jpg" alt="">
                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                            </div>
                            <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                        </div>
                    </div>
                <?php
            }

            ?>
            
        </div>
    </div>
    <!-- Popular News End -->

    <!-- Newsletter Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
            <div class="input-group mb-2" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                <div class="input-group-append">
                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                </div>
            </div>
            <small>Lorem ipsum dolor sit amet elit</small>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Tags Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
            <?php

                include('admin/config/dbcom.php');
                ?>
                <?php 
                $data = "SELECT * FROM categories  WHERE tag='1';";
                $query_run = mysqli_query($con, $data);
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>
                            <a href="category.php?title=<?=$row['slug'];?>" class="btn btn-sm btn-outline-secondary m-1"><?= $row['name']; ?></a>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <a href="#" class="btn btn-sm btn-secondary m-1">NO Categories Found</a>
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
    <!-- Tags End -->
</div>