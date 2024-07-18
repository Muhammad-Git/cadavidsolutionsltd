<?php
/**
 * Default Template Main File.
 *
 * @package LEBUILD
 * @author  template_path
 * @version 1.0
 */

get_header();
$data  = \LEBUILD\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-xs-12 col-sm-12';
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'lebuild_banner', $data );?>
<?php else:?> 
<section class="breadcrumb-area" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content text-center clearfix">
                    <div class="title">
                       <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <?php echo lebuild_the_breadcrumb(); ?>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>

<!--Start blog area-->
<section class="blog-standard-area mrindex">
    <div class="container">
        <div class="row text-right-rtl">
		
        	<?php
            if ( $data->get( 'layout' ) == 'left' ) {
                do_action( 'lebuild_sidebar', $data );
            }
            ?>
            <div class="wp-style content-side <?php echo esc_attr( $class ); ?>">
                    <div class="blog-modern-content text">
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
		<?php wp_link_pages(array('before'=>'<div class="paginate_links">'.esc_html__('Pages: ', 'lebuild'), 'after' => '</div>', 'link_before'=>'', 'link_after'=>'')); ?>
					
					
                    <?php comments_template() ?>
            </div>
            <?php
            if ( $layout == 'right' ) {
                $data->set('sidebar', 'default-sidebar');
                do_action( 'lebuild_sidebar', $data );
            }
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->

<?php get_footer(); ?>
