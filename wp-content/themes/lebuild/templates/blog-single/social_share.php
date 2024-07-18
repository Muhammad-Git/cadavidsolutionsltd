<?php 

$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html(); ?>




	<div class="categories-social-share-box">
		<div class="post-categories-box">
			<div class="title">
				<h3>Categories:</h3>
			</div>
			<div class="categories-items">
				<ul>
					<li><?php the_tags(' ', '<span class="commax">,</span>  ', ''); ?></li>
				</ul>
			</div>
		</div>
		<?php if($options->get('single_post_share' ) ): ?>
		<div class="post-social-share">
			<div class="clearfix">
				<?php if ( $options->get( 'single_social_share' ) && $options->get( 'single_post_share' ) ) : ?>
				<ul>
					<?php foreach ( $options->get( 'single_social_share' ) as $k => $v ) {
					if ( $v == '' ) {
						continue;
					} ?>
					<?php do_action('lebuild_social_share_output', $k ); ?>
				<?php } ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>  
		 <?php endif; ?>
	</div>

