<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Tona Theme
 * @author     Tona Theme
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

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