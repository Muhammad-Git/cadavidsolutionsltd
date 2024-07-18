<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Lebuild
 * @author     template_path
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help ', 'lebuild'), esc_url(home_url('/')));
$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \LEBUILD\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'lebuild_banner', $data );
$options = lebuild_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	


<section class="error-page-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="error-content text-center">
                   

								
			<?php if($options->get('404_title' ) ): ?>	  
				<h4><?php echo wp_kses( $options->get( '404_title'), $allowed_html ); ?></h4>
			<?php else: ?>	
				<h4><?php esc_html_e( 'Page Not Found', 'lebuild' ); ?></h4>
			<?php endif; ?>	
					
  
			<?php if($options->get('404_page_title' ) ): ?>	  
				<div class="title thm_clr1"><?php echo wp_kses( $options->get( '404_page_title'), $allowed_html ); ?></div>
			<?php else: ?>	
				 <div class="title thm_clr1"><?php esc_html_e( '404', 'lebuild' ); ?></div>
			<?php endif; ?>	
					

			<?php if($options->get('404_page_text' ) ): ?>	 
					<p><?php echo wp_kses( $options->get( '404_page_text'), $allowed_html ); ?></p>
			<?php else: ?>	
				 <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help ', 'lebuild' ); ?></p>
			<?php endif; ?>	     									
		<?php if(!$options->get('back_home_btn' ) ): ?>		
			<?php if($options->get('back_home_btn_label' ) ): ?>	
			    <div class="btns-box">
                        <a class="btn-one" href="<?php echo( home_url( '/' ) ); ?>"><span class="txt"><?php echo wp_kses( $options->get( 'back_home_btn_label'), $allowed_html ); ?></span></a>
                    </div>
			<?php else: ?>	
			  <div class="btns-box">
				  <a class="btn-one" href="<?php echo( home_url( '/' ) ); ?>"> <span class="txt"><?php esc_html_e('Back To Home', 'lebuild');?>
				</span></a></div>
			<?php endif; ?>		
				<?php endif; ?>					
                </div>    
            </div>
        </div>       
    </div>
</section>

    
<?php
}
get_footer(); ?>
