<?php
get_header();
echo get_post_type();
?>

<div class="brk-content">
	<?php if( have_posts() ): ?>
		<div class="brk-msnry">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<div class="brk-paging">
			<?php //echo Brk()->pagination(); ?>
		</div>
	<?php else: ?>
		<?php //get_template_part( 'templates/content-none' ); ?>
	<?php endif; ?>
</div>

<?php

get_footer();

?>