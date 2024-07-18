<?php
/**
 * Tag Main File.
 *
 * @package LEBUILD
 * @author  template_path
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \LEBUILD\Includes\Classes\Common::instance()->data( 'tag' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-xs-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>

<?php if ( $data->get( 'banner' ) ) : ?>

<section class="breadcrumb-area" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">

<?php else : ?>	

<section class="breadcrumb-area" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/breadcrumb/breadcrumb-1.jpg');?>);">

<?php endif; ?>	


    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title">
                       <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul>
                            <?php echo lebuild_the_breadcrumb(); ?>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
 
<section class="blog-style1-area classic">
    <div class="container">
        <div class="row text-right-rtl">
                
                <!--Sidebar Start-->
                <?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'lebuild_sidebar', $data );
				}
				?>
                
                <div class=" content-side <?php echo esc_attr( $class ); ?>">
                    
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                lebuild_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    
                    <!--Pagination-->
                    <div class="styled-pagination text-center clearfix">
                    
						<?php lebuild_the_pagination(); ?>
                    </div>
                    
                </div>
                
                <!--Sidebar Start-->
                <?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'lebuild_sidebar', $data );
				}
				?>
                
            </div>
        </div>
    </section> 
    <!--End blog area--> 
	<?php
}
get_footer();