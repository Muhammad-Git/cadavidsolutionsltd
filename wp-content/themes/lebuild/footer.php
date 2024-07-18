<?php
$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
/**
 * Footer Main File.
 *
 * @package LEBUILD
 * @author  template_path
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
$options = lebuild_WSH()->option();
?>


<?php if(!$options->get( 'to_top' ) ):?>
<button class="scroll-top scroll-to-target bgclr1" data-target="html">
	<span class="fa fa-angle-up"></span>
</button>
<?php endif; ?>

<!-- End Hidden Bar 
<section class="footer-box">
    	<div class="product-sidebar">
    		<div class="xs-sidebar-group info-group info-sidebar">
    			<ul class="social-links clearfix">
		             <li><a href="https://themeforest.net/item/rin-build-construction-company-wordpress-theme/26157906" target="_blank"><i class="icon fa fa-shopping-basket"></i><span>Buy Now</span></a></li>
		            <li><a href="http://old3.commonsupport.com/doc/rindoc/" target="_blank"><i class="icon fa fa-desktop"></i><span>Documentation</span></a></li>
		            <li><a href="https://templatepath.ticksy.com/" target="_blank"><i class="icon fa fa-life-ring"></i><span>Support Center</span></a></li>
					<li class="navSidebar-button" ><i class="icon fa fa-external-link"></i><span>Similar Products</span></li>
		          
		        </ul>
		        <div class="xs-overlay xs-bg-black">x</div>
		        <div class="xs-sidebar-widget">
		            <div class="sidebar-widget-container">
		                <div class="sidebar-content">
		                	<div class="btn-box"><a href="https://themeforest.net/item/rin-build-construction-company-wordpress-theme/26157906" target="_blank">Buy Now</a></div>
		                	<div class="single-box">
		                		<div class="title-box">
		                			<h5>Our WrodPress Theme</h5>
		                			<span class="line"></span>
		                		</div>
								
								
		                		<div class="single-item">
		                			<figure class="image"><a href="https://themeforest.net/item/lebulid-printing-company-wordpress-theme/23847525" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/temp/lebulid.jpg');?>" alt=""></a></figure>
		                			<div class="item-name clearfix">
		                				<h6><a href="https://themeforest.net/item/lebulid-printing-company-wordpress-theme/23847525" target="_blank">Printify - Printing Company WordPress Theme</a></h6>
		                				
		                			</div>
		                		</div>
								
								
		                		<div class="single-item">
		                			<figure class="image"><a href="https://themeforest.net/item/callix-creative-agency-wordpress-theme/29783916" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/temp/callix.jpg');?>" alt=""></a></figure>
		                			<div class="item-name clearfix">
		                				<h6><a href="https://themeforest.net/item/callix-creative-agency-wordpress-theme/29783916">Callix - Creative Agency WordPress Theme</a></h6>
		                			
		                			</div>
		                		</div>
								
								
		                		<div class="single-item">
		                			<figure class="image"><a href="https://themeforest.net/item/bratis-digital-marketing-wordpress-theme/22637589?s_rank=99" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/temp/bratis.jpg');?>" alt="" ></a></figure>
		                			<div class="item-name clearfix">
		                				<h6><a href="https://themeforest.net/item/bratis-digital-marketing-wordpress-theme/22637589?s_rank=99">Bratis - Digital Marketing WordPress Theme</a></h6>
		                				
		                			</div>
		                		</div>
								
								
								
		                	</div>
		                </div>
		            </div>
		        </div>
		    </div>
    	</div>
    </section>

<div class="switcher">
	<div class="platte"> <i class="fa fa-cog"></i></div>
     
	<div class="layout-outer">
		<div class="layout-option"><a href="#" id="full"> <?php esc_html_e('Full', 'lebulid');?></a></div>
		<div class="layout-option"><a href="#" id="boxed"><?php esc_html_e('Boxed', 'lebulid');?></a></div>
		<i class="clearfix"></i>   
	</div>
	
	<div class="layout2 layout-outer ">
		<div class="layout-option"><a href="#" id="normal"><?php esc_html_e('LTR', 'lebulid');?></a></div>
		<div class="layout-option"><a href="#" id="rtl"><?php esc_html_e('RTL', 'lebulid');?></a></div>
		<i class="clearfix"></i>   
	</div>
	

	<div class="heading-panel"> <?php esc_html_e('Primary Color', 'lebulid');?></div>
	<div class="colors-outer primary-color">   
	
		<div class="box" title="default" id="default">
		<?php esc_html_e('default', 'lebulid');?>
		</div>
		<div class="box" title="color 2" id="color2">
		<?php esc_html_e('color 2', 'lebulid');?>
		</div>
		<div class="box" title="color 3" id="color3">
		<?php esc_html_e('color 3', 'lebulid');?>
		</div>
		<div class="box" title="color 4" id="color4">
		<?php esc_html_e('color 4', 'lebulid');?>
		</div>
		<div class="box" title="color 5" id="color5">
		<?php esc_html_e('color 5', 'lebulid');?>
		</div>
		<div class="box" title="color 6" id="color6">
		<?php esc_html_e('color 6', 'lebulid');?>
		</div>
		<div class="box" title="color 7" id="color7">
		<?php esc_html_e('color 7', 'lebulid');?>
		</div>
		<div class="box" title="color 8" id="color8">
		<?php esc_html_e('color 8', 'lebulid');?>
		</div>
		<div class="box" title="color 9" id="color9">
		<?php esc_html_e('color 9', 'lebulid');?>
		</div>
		<div class="box" title="color 10" id="color10">
		<?php esc_html_e('color 10', 'lebulid');?>
		</div>
		<div class="box" title="color 11" id="color11">
		<?php esc_html_e('color 11', 'lebulid');?>
		</div>
		<div class="box" title="color 12" id="color12">
		<?php esc_html_e('color 12', 'lebulid');?>
		</div>
	</div>
</div>
-->   
<div class="clearfix"></div>

<?php lebuild_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>


</div>
<?php wp_footer(); ?>
</body>
</html>
