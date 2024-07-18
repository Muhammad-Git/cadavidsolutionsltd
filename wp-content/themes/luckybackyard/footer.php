<!-- <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');

/* Variables */
:root {
  --width: 15px;
  --height: 15px;
  --bounce-height: 30px;
  --color: #fbae17;
}

/* Body Styles */
body {
  position: relative;
  width: 100%;
  height: 100vh;
  font-family: Montserrat;
  overflow: hidden; /* Initially hide scroll */
}

/* Loader Styles */
 .wrap {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    background-color: black;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999999999999;
}

.wrap .text {
  color: var(--color);
  display: inline-block;
  margin-left: 5px;
}

.wrap .bounceball {
  position: relative;
  display: inline-block;
  height: 37px;
  width: var(--width);
}

.wrap .bounceball:before {
  position: absolute;
  content: '';
  display: block;
  top: 0;
  width: var(--width);
  height: var(--height);
  border-radius: 50%;
  background-color: var(--color);
  transform-origin: 50%;
  animation: bounce 500ms alternate infinite ease;
}

@keyframes bounce {
  0% {
    top: var(--bounce-height);
    height: 5px;
    border-radius: 60px 60px 20px 20px;
    transform: scaleX(2);
  }
  35% {
    height: var(--height);
    border-radius: 50%;
    transform: scaleX(1);
  }
  100% {
    top: 0;
  }
}
#content {
  background-color: #fff;
  overflow: auto;
}

</style> -->


<!-- <div class="wrap" id="loader">
  <div class="loading">
    <div class="bounceball"></div>
    <div class="text">NOW LOADING</div>
  </div>
</div>
<div id="content">
</div> -->


<?php $main_footer = get_field('footer', 'option');?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-logo">
                    <a href="<?php echo get_site_url(); ?>"> 
                   <img src="<?php echo $main_footer['footer_logo']?>" loading="lazy" width="212" height="46" alt="brand logo">
                    </a>
                </div>
                <div class="text">
                    <?php echo $main_footer['footer_title']?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php
                $menu_name = wp_get_nav_menu_name('footer-menu');
                ?>
                
                    <?php
                    echo $menu_name ? '<div class="text"><h5>'.$menu_name.'</h5></div>' : '';
                    ?>
                
                
                <?php 
					$args=array(
					'theme_location' => 'footer-menu',
					'depth' => '0',
 					'container' => false,
					'menu_class' => '',
					'add_a_class'     => '',
					);	 
					 wp_nav_menu($args);
					 

				?>
                <!--<ul>-->
                <!--    <li> <a href="javascript:void(0)">Map View</a> </li>-->
                <!--    <li> <a href="javascript:void(0)">About Us</a> </li>-->
                <!--    <li> <a href="javascript:void(0)">Blog</a> </li>-->
                <!--    <li> <a href="javascript:void(0)">Help Center</a> </li>-->
                <!--</ul>-->
            </div>
            
            <?php 
                    
                $contact = $main_footer['contact_us'];
            
            ?>
            <div class="col-lg-4">
                <div class="text">
                    <h5><?php echo $contact['contact_us_title']?></h5>
                </div>
                <ul class="about-icon-list">
                    <li> <a href="mailto:<?php echo $contact['email']?>">
                        <img src="<?php echo $contact['email_icon']?>" loading="lazy" width="20" height="20" alt="emailIcon">
                            <?php echo $contact['email']?></a> </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?php echo $contact['address_icon']?>" loading="lazy" width="20" height="20" alt="emailIcon">
                            <?php echo $contact['address']?></a> 
                            </li>

                </ul>
            </div>
        </div>
        <div class="row">
            <?php $help = $main_footer['help_center']; ?>
            <div class="col-lg-8">
                <div class="contact-box">
                    <div class="text">
                        <h4><?php echo $help['help_center_title']?></h4>
                        <?php echo $help['help_center_paragraph']?>
                    </div>
                    <div class="button-box">
                        <a href="<?php echo $help['help_center_button']['url'];?>"><?php echo $help['help_center_button']['title'];?></a>
                    </div>
                </div>
            </div>
            
            <?php 
            $social = $main_footer['social_links']; 
            $social_links = $social['social_media_icons']; 
            ?>
            <div class="col-lg-4">
                <div class="text">
                    <h5> <?php echo $social['social_links_title']?></h5>
                </div>
                <ul class="social-icons">
                    <li> <a href=" <?php echo $social_links['facebook']?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
                    <li> <a href=" <?php echo $social_links['instagram']?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
                    <li> <a href=" <?php echo $social_links['linked']?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
                    <li> <a href=" <?php echo $social_links['twitter']?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                            </svg></a> </li>
                    <li> <a href=" <?php echo $social_links['youtube']?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<section class="footer-copy-right-sec">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="text sign-area">
                    <?php 
					$args=array(
					'theme_location' => 'footer-bottom-menu',
					'depth' => '0',
 					'container' => false,
					'menu_class' => '',
					'add_a_class'     => '',
					);	 
					 wp_nav_menu($args);
					 

				?>
                    <div class="icon-box">
                        <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop12">
                            <a href="javascript:void(0)"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 21.5C10.6974 21.5 9.46825 21.2503 8.3125 20.7509C7.15673 20.2516 6.14872 19.5718 5.28845 18.7115C4.4282 17.8512 3.7484 16.8432 3.24905 15.6875C2.74968 14.5317 2.5 13.3025 2.5 12C2.5 10.6872 2.74968 9.45543 3.24905 8.3048C3.7484 7.15417 4.4282 6.14872 5.28845 5.28845C6.14872 4.4282 7.15673 3.7484 8.3125 3.24905C9.46825 2.74968 10.6974 2.5 12 2.5C13.3128 2.5 14.5445 2.74968 15.6952 3.24905C16.8458 3.7484 17.8512 4.4282 18.7115 5.28845C19.5718 6.14872 20.2516 7.15417 20.7509 8.3048C21.2503 9.45543 21.5 10.6872 21.5 12C21.5 13.3025 21.2503 14.5317 20.7509 15.6875C20.2516 16.8432 19.5718 17.8512 18.7115 18.7115C17.8512 19.5718 16.8458 20.2516 15.6952 20.7509C14.5445 21.2503 13.3128 21.5 12 21.5ZM12 19.9788C12.5102 19.3019 12.9397 18.6192 13.2885 17.9307C13.6372 17.2423 13.9211 16.4897 14.1404 15.673H9.85958C10.0916 16.5153 10.3788 17.2807 10.7211 17.9692C11.0634 18.6577 11.4897 19.3275 12 19.9788ZM10.0635 19.7038C9.68014 19.1538 9.33591 18.5285 9.03078 17.8279C8.72564 17.1272 8.48846 16.4089 8.31923 15.673H4.92688C5.45509 16.7115 6.16343 17.584 7.0519 18.2904C7.94038 18.9968 8.94424 19.4679 10.0635 19.7038ZM13.9365 19.7038C15.0557 19.4679 16.0596 18.9968 16.9481 18.2904C17.8365 17.584 18.5449 16.7115 19.0731 15.673H15.6807C15.4794 16.4153 15.2262 17.1368 14.9211 17.8375C14.616 18.5381 14.2878 19.1602 13.9365 19.7038ZM4.29805 14.1731H8.01538C7.95256 13.8013 7.90705 13.4369 7.87885 13.0798C7.85065 12.7227 7.83655 12.3628 7.83655 12C7.83655 11.6372 7.85065 11.2772 7.87885 10.9202C7.90705 10.5631 7.95256 10.1987 8.01538 9.82688H4.29805C4.2019 10.1666 4.12818 10.5198 4.0769 10.8865C4.02562 11.2532 3.99998 11.6243 3.99998 12C3.99998 12.3756 4.02562 12.7468 4.0769 13.1135C4.12818 13.4801 4.2019 13.8333 4.29805 14.1731ZM9.51535 14.1731H14.4846C14.5474 13.8013 14.5929 13.4401 14.6212 13.0894C14.6494 12.7388 14.6635 12.3756 14.6635 12C14.6635 11.6243 14.6494 11.2612 14.6212 10.9106C14.5929 10.5599 14.5474 10.1987 14.4846 9.82688H9.51535C9.45253 10.1987 9.40702 10.5599 9.3788 10.9106C9.3506 11.2612 9.3365 11.6243 9.3365 12C9.3365 12.3756 9.3506 12.7388 9.3788 13.0894C9.40702 13.4401 9.45253 13.8013 9.51535 14.1731ZM15.9846 14.1731H19.7019C19.7981 13.8333 19.8718 13.4801 19.9231 13.1135C19.9743 12.7468 20 12.3756 20 12C20 11.6243 19.9743 11.2532 19.9231 10.8865C19.8718 10.5198 19.7981 10.1666 19.7019 9.82688H15.9846C16.0474 10.1987 16.0929 10.5631 16.1211 10.9202C16.1493 11.2772 16.1634 11.6372 16.1634 12C16.1634 12.3628 16.1493 12.7227 16.1211 13.0798C16.0929 13.4369 16.0474 13.8013 15.9846 14.1731ZM15.6807 8.32693H19.0731C18.5384 7.27563 17.8349 6.40318 16.9625 5.70958C16.09 5.01599 15.0814 4.54163 13.9365 4.2865C14.3198 4.86855 14.6608 5.50509 14.9596 6.19613C15.2583 6.88716 15.4987 7.59743 15.6807 8.32693ZM9.85958 8.32693H14.1404C13.9083 7.49103 13.6163 6.72083 13.2644 6.01633C12.9125 5.31184 12.491 4.64678 12 4.02113C11.5089 4.64678 11.0875 5.31184 10.7356 6.01633C10.3836 6.72083 10.0916 7.49103 9.85958 8.32693ZM4.92688 8.32693H8.31923C8.50128 7.59743 8.74167 6.88716 9.0404 6.19613C9.33912 5.50509 9.68014 4.86855 10.0635 4.2865C8.91219 4.54163 7.90193 5.0176 7.03268 5.7144C6.16344 6.4112 5.46151 7.28204 4.92688 8.32693Z" fill="#484848" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)"> Usd </a>
                        </button>

                    </div>
                    
                     <?php
                        echo $main_footer['copyright_text'] ? '<p>'.$main_footer['copyright_text'].'</p>' : '';
                     ?>

                    
                    
                    <!--<ul>-->
                    <!--    <li> <a href="javascript:void(0)">Support</a> </li>-->
                    <!--    <li> <a href="javascript:void(0)">Terms & Conditions</a> </li>-->
                    <!--    <li> <a href="javascript:void(0)">Privacy Policy</a> </li>-->
                    <!--</ul>-->
                </div>
            </div>
        </div>
    </div>

</section>

<?php
require_once(get_stylesheet_directory() . '/inc/footer_modal.php');
?>

<!-- <div class="ui calendar" id="rangestart">
            <input type="text" placeholder="Start">
          </div>
        <div class="ui calendar" id="rangeend">
            <input type="text" placeholder="End">
          </div> -->



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>-->
<!--<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/wow-animate.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>-->
<!--<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>-->
<!--<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/custom.js"></script>-->
<?php
wp_footer();
?>




</body>

</html>