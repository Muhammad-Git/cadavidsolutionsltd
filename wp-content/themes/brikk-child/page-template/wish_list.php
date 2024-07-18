<?php

/* Template Name: Wish List Template */
get_header();
?>




<section class="home-sec-04 img-over-lay-style wish-list-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Wish List</h2>
                </div>
            </div>
        </div>
        <div class="row">
<!--            <div class="col-lg-4 col-md-4">-->
<!--                <a href="javascript:void(0)">-->
<!--                    <div class="img-box">-->
<!--                        <div class="create-a-new-list">-->
<!--                            <span><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<path d="M4.4375 5.56246H0.125V4.4375H4.4375V0.125H5.56246V4.4375H9.87496V5.56246H5.56246V9.87496H4.4375V5.56246Z" fill="#4CAF50"/>-->
<!--</svg>-->
<!--</span>-->
<!--<h4>Create a new List</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
            <div class="col-lg-4 col-md-4">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-03.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>My Favorites</h6>
                                <!-- <p>5 Listing</p> -->
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-04.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>Swimming pools in<br> Los Angeles</h6>
                                <!-- <p>5 Listing</p> -->
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</section>



<?php
get_footer();
?>
