<?php
$options = lebuild_WSH()->option(); 
$allowed_html = wp_kses_allowed_html( 'post' );

//Logo Settings
$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );

$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$image_logo3 = $options->get( 'image_normal_logo3' );
$logo_dimension3 = $options->get( 'normal_logo_dimension3' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<header class="main-header header-style-two">
    <div class="header-bottom_style2">
        <div class="container-box">
            <div class="outer-box clearfix">

                <div class="header-bottom_style2_left pull-left">
                    <div class="logo">
                        <?php echo lebuild_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?>
                    </div> 
                </div>
                
                <div class="header-bottom_style2_right pull-right">
                    <div class="nav-outer style1 clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style2 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbarSupportedContent',
									'container_class'=>'collapse navbar-collapse sub-menu-bar',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'add_li_class'  => 'nav-item',
									'items_wrap' => '%3$s', 
									'container'=>false,
									'depth'=>'3',
									'walker'=> new Bootstrap_walker()  
									) ); ?>
                                </ul>
                            </div>
                        </nav>                        
                        <!-- Main Menu End-->
                    </div> 
					<?php if( $options->get( 'header_social_show_v2' ) ):?>
                    <div class="header-social-link-2">
						<?php
							$icons = $options->get( 'header_social_v2' );
							if ( ! empty( $icons ) ) :
						?>
                        <ul class="clearfix">
							<?php
							foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( lebuild_set( $h_icon, 'data' ) ) );
							if ( lebuild_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', lebuild_set( $header_social_icons, 'icon' ) );
							?>
                            <li><a href="<?php echo esc_url(lebuild_set( $header_social_icons, 'url' )); ?>"><i class="fab <?php echo esc_attr( lebuild_set( $header_social_icons, 'icon' ) ); ?>" aria-hidden="true"></i></a></li>
							<?php endforeach; ?>
                        </ul>
						<?php endif; ?>
                    </div> 
					<?php endif; ?>
					<?php if( $options->get( 'quote_show_v2' ) ):?>
						<?php if( $options->get( 'quote_v2')):?>
						<div class="header-bottom_style2_right__btn">
							<a href="<?php echo wp_kses( $options->get( 'quote_link_v2'), $allowed_html ); ?>"><span class="flaticon-comments left"></span><?php echo wp_kses( $options->get( 'quote_v2'), $allowed_html ); ?><span class="flaticon-right-arrow-1 right"></span></a>
						</div>  
						<?php endif; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>    
    </div> 
    <!--End header-->


    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container">
            <div class="clearfix">
                <!--Logo-->
                <div class="logo float-left">
                    <div class="img-responsive">
						<?php echo lebuild_logo( $logo_type, $image_logo2, $logo_dimension2, $logo_text, $logo_typography ); ?>
					</div>
                </div>
                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>   
                </div>
            </div>
        </div>
    </div>
    <!--End Sticky Header-->
    
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>

        <nav class="menu-box">
            <div class="nav-logo">
				<?php echo lebuild_logo( $logo_type, $image_logo3, $logo_dimension3, $logo_text, $logo_typography ); ?>
			</div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            
			<?php if( $options->get( 'header_social_show_v2' ) ):?>
            <div class="social-links">
                <?php
					$icons = $options->get( 'header_social_v2' );
					if ( ! empty( $icons ) ) :
				?>
                <ul class="clearfix">
					<?php
					foreach ( $icons as $h_icon ) :
					$header_social_icons = json_decode( urldecode( lebuild_set( $h_icon, 'data' ) ) );
					if ( lebuild_set( $header_social_icons, 'enable' ) == '' ) {
						continue;
					}
					$icon_class = explode( '-', lebuild_set( $header_social_icons, 'icon' ) );
					?>
                    <li><a href="<?php echo esc_url(lebuild_set( $header_social_icons, 'url' )); ?>"><span class="fab <?php echo esc_attr( lebuild_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
					<?php endforeach; ?>
                </ul>
				<?php endif; ?>
            </div>
			<?php endif; ?>
        </nav>
    </div>
    <!-- End Mobile Menu --> 

</header>