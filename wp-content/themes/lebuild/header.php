<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package LEBUILD
 * @since   1.0
 * @version 1.0
 */
$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$icon_href = $options->get( 'image_favicon' ); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
		<?php if( $icon_href ):?>
		
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($icon_href['url']); ?>">
		<link rel="icon" type="image/png" href="<?php echo esc_url($icon_href['url']); ?>" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo esc_url($icon_href['url']); ?>" sizes="16x16">
		
		<?php endif; ?>
	<?php endif; ?>
	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
		

<body <?php body_class(); ?>> 

<?php
if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
}?>
	
<div class="boxed_wrapper <?php if($options->get( 'theme_rtl' ) ): echo esc_attr_e( 'rtl', 'lebuild' ); endif;?>">	
	
<?php do_action( 'lebuild_main_header' ); ?>	
		
 <?php if(!$options->get( 'theme_preloader' ) ):?>		
	<!-- Preloader -->
	<div class="loader-wrap">
		<div class="preloader"><div class="preloader-close">Preloader Close</div></div>
		<div class="layer layer-one"><span class="overlay"></span></div>
		<div class="layer layer-two"><span class="overlay"></span></div>        
		<div class="layer layer-three"><span class="overlay"></span></div>        
	</div>
 <?php endif; ?>
	
	
 <?php if($options->get( 'theme_mouse' ) ):?>	
	<div class="mouse-pointer" id="mouse-pointer">
		<div class="icon"><i class="far fa-angle-left"></i><i class="far fa-angle-right"></i></div>
	</div>
	<!-- mouse-pointer end -->
 <?php endif; ?>