<?php
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
    
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); 
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_style( 'global-styles');
    
    if ( !is_admin() ) {
    wp_enqueue_style('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css', '4.1.0');
    wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', '1.9.0');
    wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', '3.5.7');
    wp_enqueue_style('google_font', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', '1.0.0');
    wp_enqueue_style('font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', '4.7.0');
    wp_enqueue_style('semantic', 'https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css', '2.1.4');
    wp_enqueue_style('rangeSlider', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css', '2.3.0');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', '5.3.2');
    wp_enqueue_style('custom_style', get_stylesheet_directory_uri().'/assets/css/style.css', array('brk-dark'), '5.3.2');
    
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '5.3.2', 'true' );
    wp_enqueue_script('rangeSlider', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js', array(), '2.3.0', 'true' );
    wp_enqueue_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array(), '3.5.7', 'true' );
    wp_enqueue_script('wow_animate', get_stylesheet_directory_uri() . '/assets/js/wow-animate.js', array(), '1.1.3', 'true' );
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), '1.9.0', 'true' );
    wp_enqueue_script('semantic', 'https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js', array(), '2.1.4', 'true' );
    wp_enqueue_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js', array(), '4.1.0', 'true' );
    
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true );
    wp_enqueue_script('theme_script', get_stylesheet_directory_uri() . '/assets/js/theme_script.js', array(), '1.0.0', true );
    wp_localize_script( 'theme_script', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce('delete_account_nonce'),
        ));
}
    
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );


function custom_dashboard_styles() {
    wp_enqueue_style( 'custom-dashboard-style', get_stylesheet_directory_uri().'/assets/css/custom-dashboard.css', array(), false, 'all' );
    
    //wp_enqueue_script('fancybox', site_url().'/wp-includes/js/tinymce/wp-tinymce.js', array(), '4.9.11', 'true' );
}
// add_action( 'admin_enqueue_scripts', 'custom_dashboard_styles' );
add_action( 'admin_footer', 'custom_dashboard_styles' );


// END ENQUEUE PARENT ACTION