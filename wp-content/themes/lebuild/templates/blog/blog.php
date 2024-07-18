<?php
$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html();

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage LEBUILD
 * @author     Tona Theme
 * @version    1.0
 */

if ( class_exists( 'Lebuild_Resizer' ) ) {
	$img_obj = new Lebuild_Resizer();
} else {
	$img_obj = array();
}
$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>

	<div class="single-blog-style1 wow fadeInUp" data-wow-duration="1500ms">
		<div class="img-holder">
			<div class="inner">
				<?php the_post_thumbnail(); ?>
				<div class="overlay-icon">
					<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span class="flaticon-plus"></span></a>
				</div>
			</div>
		</div>
		<div class="text-holder">
			<ul class="meta-info">
				<?php if($options->get('blog_post_date' ) ): ?>
				<li><i class="flaticon-calendar"></i><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?>, <?php echo get_the_date('Y'); ?></a></li>
				<?php endif; ?>
				
				<?php if($options->get('blog_post_comments' ) ): ?>
				<li><i class="flaticon-message"></i><?php comments_number(); ?></li>
				<?php endif;?>
				
				<?php if($options->get('blog_post_author' ) ): ?>
				<li><i class="fa fa-user "></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li>
				<?php endif;?>
			</ul>
			<h3 class="blog-title">
				<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
			</h3>
			<div class="text">
				<?php the_excerpt(); ?>
			</div>			
			<a class="btn-one" href="<?php echo esc_url(get_permalink(get_the_id()));?>"><span class="txt"><?php esc_html_e('Read More', 'lebulid');?><i class="flaticon-right-arrow-1 arrow1"></i></span></a>
					
	
			
		</div> 
	</div> 
    
</div>