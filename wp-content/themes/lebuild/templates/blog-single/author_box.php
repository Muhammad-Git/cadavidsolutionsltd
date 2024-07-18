	<div class="blog-details-author">
		<div class="inner-box">
			<div class="img-box">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
			</div>
			<div class="text">
				<h3><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h3>
				<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
			</div> 
		</div>   
	</div>