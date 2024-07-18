<?php
/**
 * Blog Post Main File.
 *
 * @package LEBUILD
 * @author  template_path
 * @version 1.0
 */

get_header();
$data    = \LEBUILD\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-xs-12 col-sm-12';
$options = lebuild_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

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

<section class="blog-details-area single">
    <div class="container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'lebuild_sidebar', $data );
				}
			?>
            <div class="wp-style content-side <?php echo esc_attr( $class ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
				
                	<?php lebuild_template_load( 'templates/blog-single/single-content.php', compact( 'options', 'data' ) ); ?>
				
				<?php endwhile; ?>
            </div>
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
