<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'lebuild_setup_theme' );
add_action( 'after_setup_theme', 'lebuild_load_default_hooks' );


function lebuild_setup_theme() {

	load_theme_textdomain( 'lebuild', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'lebuild_370x310', 370, 310, true ); //'lebuild_370x310 Our Services'
	add_image_size( 'lebuild_70x70', 70, 70, true ); //'lebuild_70x70 Our Testimonials'
	add_image_size( 'lebuild_370x290', 370, 290, true ); //'lebuild_370x290 Latest News'
	add_image_size( 'lebuild_440x305', 440, 305, true ); //'lebuild_440x305 Our Team'
	add_image_size( 'lebuild_310x305', 310, 305, true ); //'lebuild_310x305 Our Team V2'
	add_image_size( 'lebuild_1170x440', 1170, 440, true ); //'lebuild_1170x440 Our Blog'
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'lebuild' ),
		'rtl_menu' => esc_html__( 'RTL Menu', 'lebuild' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'lebuild' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'lebuild_admin_init', 2000000 );
}

/**
 * [lebuild_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function lebuild_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [lebuild_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function lebuild_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'lebuild' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'lebuild' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'lebuild' ),
		'before_widget' => '<div id="%1$s" class="mrwidget widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'lebuild'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'lebuild'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget single-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('RTL Footer Widget', 'lebuild'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'lebuild'),
		'before_widget'=>'<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget single-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'lebuild'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'lebuild'),
		'before_widget'=>'<div id="%1$s" class="service-widget single-sidebar %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	}
	register_sidebar(array(
	    'name' => esc_html__( 'Blog Listing', 'lebuild' ),
	    'id' => 'blog-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'lebuild' ),
		'before_widget' => '<div id="%1$s" class="mrwidget widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '</h3></div>',
	));
	if ( ! is_object( lebuild_WSH() ) ) {
		return;
	}

	$sidebars = lebuild_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( lebuild_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title"><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'lebuild_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function lebuild_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'lebuild' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'lebuild' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'lebuild' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'lebuild' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'lebuild' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'lebuild' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'lebuild' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'lebuild' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'lebuild' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'lebuild_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function lebuild_enqueue_scripts() {

	
    //styles
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css' );
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css' );
	wp_enqueue_style( 'color', get_template_directory_uri() . '/assets/css/color.css' );
	wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/css/custom-animate.css' );
	wp_enqueue_style( 'date-picker', get_template_directory_uri() . '/assets/css/date-picker.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
	wp_enqueue_style( 'hiddenbar', get_template_directory_uri() . '/assets/css/hiddenbar.css' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css' );
	wp_enqueue_style( 'imp', get_template_directory_uri() . '/assets/css/imp.css' );
	wp_enqueue_style( 'bootstrap-touchspin', get_template_directory_uri() . '/assets/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/assets/css/jquery.bxslider.css' );
	wp_enqueue_style( 'jquery-fancybox-min', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'jquery-mCustomScrollbar-min', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'polyglot-language-switcher', get_template_directory_uri() . '/assets/css/polyglot-language-switcher.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'timePicker', get_template_directory_uri() . '/assets/css/timePicker.css' );

//module-css
	wp_enqueue_style( 'about-section', get_template_directory_uri() . '/assets/css/module-css/about-section.css' );
	wp_enqueue_style( 'banner-section', get_template_directory_uri() . '/assets/css/module-css/banner-section.css' );
	wp_enqueue_style( 'blog-section', get_template_directory_uri() . '/assets/css/module-css/blog-section.css' );
	wp_enqueue_style( 'breadcrumb-section', get_template_directory_uri() . '/assets/css/module-css/breadcrumb-section.css' );
	wp_enqueue_style( 'contact-page', get_template_directory_uri() . '/assets/css/module-css/contact-page.css' );
	wp_enqueue_style( 'fact-counter-section', get_template_directory_uri() . '/assets/css/module-css/fact-counter-section.css' );
	wp_enqueue_style( 'faq-section', get_template_directory_uri() . '/assets/css/module-css/faq-section.css' );
	wp_enqueue_style( 'features-section', get_template_directory_uri() . '/assets/css/module-css/features-section.css' );
	wp_enqueue_style( 'footer-section', get_template_directory_uri() . '/assets/css/module-css/footer-section.css' );
	wp_enqueue_style( 'gallery-section', get_template_directory_uri() . '/assets/css/module-css/gallery-section.css' );
	wp_enqueue_style( 'header-section', get_template_directory_uri() . '/assets/css/module-css/header-section.css' );
	wp_enqueue_style( 'partner-section', get_template_directory_uri() . '/assets/css/module-css/partner-section.css' );
	wp_enqueue_style( 'project-section', get_template_directory_uri() . '/assets/css/module-css/project-section.css' );
	wp_enqueue_style( 'service-section', get_template_directory_uri() . '/assets/css/module-css/service-section.css' );
	wp_enqueue_style( 'shop-section', get_template_directory_uri() . '/assets/css/module-css/shop-section.css' );
	wp_enqueue_style( 'team-section', get_template_directory_uri() . '/assets/css/module-css/team-section.css' );
	wp_enqueue_style( 'testimonial-section', get_template_directory_uri() . '/assets/css/module-css/testimonial-section.css' );
	wp_enqueue_style( 'thm-form-section', get_template_directory_uri() . '/assets/css/module-css/thm-form-section.css' );
	wp_enqueue_style( 'video-gallery-section', get_template_directory_uri() . '/assets/css/module-css/video-gallery-section.css' );
	wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	

	wp_enqueue_style( 'lebuild-sidebar', get_template_directory_uri() . '/assets/css/sidebar.css' );
	wp_enqueue_style( 'lebuild-error', get_template_directory_uri() . '/assets/css/error.css' );
	wp_enqueue_style( 'lebuild-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css' );
	wp_enqueue_style( 'lebuild-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	wp_enqueue_style( 'lebuild-main', get_stylesheet_uri() );
	wp_enqueue_style( 'lebuild-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'lebuild-fixing', get_template_directory_uri() . '/assets/css/fixing.css' );
	wp_enqueue_style( 'lebuild-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'lebuild-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	
	//Temp
	wp_enqueue_style( 'color-panel', get_template_directory_uri() . '/assets/temp/color-panel.css' );

	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/js/aos.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-bundle-min', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-select-min', get_template_directory_uri().'/assets/js/bootstrap-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/assets/js/html5shiv.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-bootstrap-touchspin', get_template_directory_uri().'/assets/js/jquery.bootstrap-touchspin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-bxslider-min', get_template_directory_uri().'/assets/js/jquery.bxslider.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-countdown-min', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-countTo', get_template_directory_uri().'/assets/js/jquery.countTo.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-easing-min', get_template_directory_uri().'/assets/js/jquery.easing.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-enllax-min', get_template_directory_uri().'/assets/js/jquery.enllax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-magnific-popup-min', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-paroller-min', get_template_directory_uri().'/assets/js/jquery.paroller.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-polyglot-language-switcher', get_template_directory_uri().'/assets/js/jquery.polyglot.language.switcher.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jQuery-style-switcher-min', get_template_directory_uri().'/assets/js/jQuery.style.switcher.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'knob', get_template_directory_uri().'/assets/js/knob.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'pagenav', get_template_directory_uri().'/assets/js/pagenav.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax-min', get_template_directory_uri().'/assets/js/parallax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'slick', get_template_directory_uri().'/assets/js/slick.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'timePicker', get_template_directory_uri().'/assets/js/timePicker.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'TweenMax-min', get_template_directory_uri().'/assets/js/TweenMax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax-scroll', get_template_directory_uri().'/assets/js/parallax-scroll.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'plugins', get_template_directory_uri().'/assets/js/plugins.js', array( 'jquery' ), '2.1.2', true );
	
	

	
	wp_enqueue_script( 'lebuild-main-script', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
	//Temp
	wp_enqueue_script( 'jquery-cookie', get_template_directory_uri().'/assets/temp/jquery.cookie.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'themepanel', get_template_directory_uri().'/assets/temp/themepanel.js', array( 'jquery' ), '2.1.2', true );
	
}
add_action( 'wp_enqueue_scripts', 'lebuild_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function lebuild_fonts_url() {
	
	$fonts_url = '';

		$font_families['Open Sans']      = 'Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap';
		
		$font_families['Poppins']      = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';

		$font_families = apply_filters( 'REXAR/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function lebuild_theme_styles() {
    wp_enqueue_style( 'lebuild-theme-fonts', lebuild_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'lebuild_theme_styles' );
add_action( 'admin_enqueue_scripts', 'lebuild_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) lebuild_set function

/**
 * [lebuild_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'lebuild_set' ) ) {
	function lebuild_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) lebuild_add_editor_styles function

function lebuild_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'lebuild_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = lebuild_WSH()->option(); 
if( lebuild_set($options, 'boxed_wrapper') ){

	add_filter( 'body_class', function( $classes ) {
		$classes[] = 'boxed_wrapper';
		return $classes;
	} );
}

function lebuild_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
/**
 * product per page
 */
add_filter( 'loop_shop_per_page', 'lebuild_loop_shop_per_page', 20 );

function lebuild_loop_shop_per_page( $cols ) {
		$options     = lebuild_WSH()->option();		
		$shop_product = esc_attr( $options->get( 'shop_product') );	
		
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols =  $shop_product;
  return $cols;
}