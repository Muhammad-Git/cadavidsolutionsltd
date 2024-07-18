<?php
$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html();
$search_image    = $options->get( 'search_image' );
$search_image    = lebuild_set( $search_image, 'url', LEBUILD_URI . 'assets/images/search.png' );

?>
<section class="error-page-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="error-content text-center" >
         
					<?php if($options->get('search_page_title' ) ): ?>
                    <div class="title thm_clr1"><?php echo wp_kses( $options->get( 'search_page_title'), $allowed_html ); ?></div>
				<?php else : ?>
	
					 <div class="title thm_clr1"><?php esc_html_e( 'Not Found', 'lebuild' ); ?></div>
			
			<?php endif; ?>	
					

				<?php if($options->get('search_page_text' ) ): ?>
                    <p><?php echo wp_kses( $options->get( 'search_page_text'), $allowed_html ); ?> </p>
				<?php else : ?>
		
				<p><?php esc_html_e('We are unable to find a page you are looking for, Try later or click the button.', 'lebuild');?>
				</p>
			<?php endif; ?>	
				<?php echo get_search_form(); ?><br>	
                    <div class="btns-box">
                        <a class="btn-one" href="<?php echo( home_url( '/' ) ); ?>"><span class="txt"><?php esc_html_e('Back To Home', 'lebuild');?></span></a>
                    </div>
					
					
                </div>    
            </div>
        </div>       
    </div>
</section>
