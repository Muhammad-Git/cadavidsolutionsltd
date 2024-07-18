<?php 
/* Template Name: Lebuild Elementor Page */ 
/**
 * @package LEBUILD
 * @author  template_path
 * @version 1.0
 */
?>
<?php 
get_header();
$data  = \LEBUILD\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get('layout') ? $data->get('layout') : 'right';
$class = ( $data->get( 'layout' ) != 'full' ) ? 'col-lg-8 col-sm-12' : 'col-xs-12 col-sm-12 col-md-12';
do_action( 'lebuild_banner', $data );
?>
<?php while ( have_posts() ): the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
