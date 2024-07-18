<?php
/**
* Single Post Content Template
*
* @package    WordPress
* @subpackage LEBUILD
* @author     Tona Theme
* @version    1.0
*/
?>
<?php global $wp_query;

$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html();

$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

$gallery = get_post_meta( $page_id, 'lebuild_gallery_images', true );

$video = get_post_meta( $page_id, 'lebuild_video_url', true );


$audio_type = get_post_meta( $page_id, 'lebuild_audio_type', true );

?>

<div class="blog-details_content">
	<div class="blog-details_main_image">
		<?php the_post_thumbnail(); ?>
	</div> 
	<div class="blog-details_text">
		<ul class="meta-info meta_post_single">
		
				<li><i class="flaticon-calendar"></i><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?>, <?php echo get_the_date('Y'); ?></a></li>
			
				
			
				<li><i class="flaticon-message"></i><?php comments_number(); ?></li>
			
				
			
				<li><i class="fa fa-user "></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li>
			
			</ul>
		<div class="text">
			<?php the_content(); ?>
			<div class="clearfix"></div>
			<?php wp_link_pages(array('before'=>'<div class="paginate_links">'.esc_html__('Pages: ', 'lebuild'), 'after' => '</div>', 'link_before'=>'', 'link_after'=>'')); ?>
		</div>  
	</div> 
<?php if ( has_category() ) : ?>
	<div class="post_tags">
		<?php the_tags('<span class="tagxc fa fa-tags"></span>', '<span class="commax">,</span>  ', ''); ?>
	</div>
<?php endif; ?>
	<?php comments_template(); ?>

</div>