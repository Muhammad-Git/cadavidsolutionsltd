<?php


/** Set ABSPATH for execution */
define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define( 'WPINC', 'wp-includes' );


/**
 * @ignore
 */
function add_filter() {}

/**
 * @ignore
 */
function esc_attr($str) {return $str;}

/**
 * @ignore
 */
function apply_filters() {}

/**
 * @ignore
 */
function get_option() {}

/**
 * @ignore
 */
function is_lighttpd_before_150() {}

/**
 * @ignore
 */
function add_action() {}

/**
 * @ignore
 */
function did_action() {}

/**
 * @ignore
 */
function do_action_ref_array() {}

/**
 * @ignore
 */
function get_bloginfo() {}

/**
 * @ignore
 */
function is_admin() {return true;}

/**
 * @ignore
 */
function site_url() {}

/**
 * @ignore
 */
function admin_url() {}

/**
 * @ignore
 */
function home_url() {}

/**
 * @ignore
 */
function includes_url() {}

/**
 * @ignore
 */
function wp_guess_url() {}

if ( ! function_exists( 'json_encode' ) ) :
/**
 * @ignore
 */
function json_encode() {}
endif;



/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

$color = $_GET['main_color'];

ob_start(); ?>



/*** 
=====================================================
	Theme Main Color Css
=====================================================
***/

.main-menu .navigation>li:hover>a,
.main-menu .navigation>li.current>a,
.main-menu .navigation>li>ul>li>a:hover,
.main-menu .navigation> li> ul> li:hover> a,
.main-menu .navigation> li> ul> li> ul> li> a:hover,
.main-menu .navigation> li> .megamenu li:hover a,
.main-menu .navigation> li> ul> li.dropdown> a:after,
.mobile-menu .navigation li.current > a,
.mobile-menu .navigation li > a:hover,
.outer-search-box-style1 .seach-toggle:hover,
.outer-search-box-style1 .seach-toggle.active,
.sticky-header .main-menu .navigation>li:hover>a,
.sticky-header .main-menu .navigation>li.current>a,
.clr1,
.sec-title .sub-title h5,
.single-service-style1:hover .icon-holder .inner,
.subscribe-content-box .subscribe-title p,
.subscribe-box p span,
.single-blog-style1 .text-holder .blog-title a:hover,
.main-menu.style2 .navigation>li:hover>a, 
.main-menu.style2 .navigation>li.current>a,
.header-social-link-2 ul li a:hover,
.header-contact-info-two ul li a:hover,
.main-slider.style3 .slide .sub-title h4,
.accordion-box .accordion .accord-btn.active h4,
.main-slider.style4 .slide .sub-title h4,
.breadcrumb-menu ul li:hover a,
.breadcrumb-menu ul li.active,
.service-details-content .top .social_link .social-links-style1 li a:hover i,
.sidebar-search-box .search-form button,
.single-review-box .text_box .inner .meta_box ul li a:hover,
.review-form-box .review-box p span,
.testimonial-style3-content .inner-content .quote-icon,
.single-testimonial-style3.style3instyle4 .quote-icon,
.view-as-box .icon ul li a:hover,
.payment-tab .tab-btns li:hover i,
.payment-tab .tab-btns li.active-btn i,
.sidebar-categories-box li a:hover,
.single-info-box .text .social-links-style1 li a:hover i,
.contact-style1_form .title p span,
.header-contact-info .right p a:hover,
.breadcrumb-menu ul li,
a.blog-one__btn.thm-btn:hover

{
	color:#<?php echo esc_attr( $color ); ?>!important;
}


/*** 
=====================================================
	Theme Main Background Color Css
=====================================================
***/

.bgclr1,
.main-menu .navigation> li> ul> li> a:before,
.main-menu .navigation> li> ul> li> ul> li a:before,
.main-menu .navigation> li> .megamenu li> a:before,
.nav-outer .mobile-nav-toggler .inner,
.thm-social-link1 ul li a:before,
.header-top-left::before,
.header-social-link-1 .social-link ul li a:before,
.header-bottom_right__btn::before,
.btn-one.style2,
.btn-one .txt i.arrow1::after,
.single-partner-logo-box:before,
.header-bottom_style2_right__btn a,
.main-slider.style2 .slide .image-layer:before,
.single-gallery-item .img-holder:after,
.header-bottom_right__btn_style2 a,
.single-service-style2:before,
.header-bottom_right__btn_style2.style2instyle3 a,
.sidebar-author-box,
.single-review-box:hover .img_box .inner:after,
.sidebar-categories-box li a::after,
.single-product-item .img-holder .overlay-content a,
.single-product-item .title-holder .right a::before,
.single-product-image-holder .slider-pager .thumb-box li .img-holder:before,
.addto-cart-box .menu-box ul li a:hover,
.product-tab-box .tab-btns .tab-btn.active-btn span, 
.product-tab-box .tab-btns .tab-btn:hover span,
.styled-pagination li:hover a,
.styled-pagination li.active a,
.breadcrumb-menu ul li i.arrow1::after,
.loader-wrap .layer .overlay,
.team-member-info-box .social-links-style1 li a:hover i,
.resume .info-box .title:after,
.woocommerce #place_order, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
span.page-numbers.current,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .price_slider_amount .button,
.lebuild-comment-item .img-holder:after,
.single-project-style1 .title-holder:before

{
	background: #<?php echo esc_attr( $color ); ?>!important;
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}


/************** border-color***************/

.main-slider .owl-theme .owl-nav .owl-prev:hover,
.main-slider .owl-theme .owl-nav .owl-next:hover,
.styled-pagination li:hover a,
.styled-pagination li.active a,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle

{
	border-color:#<?php echo esc_attr( $color ); ?>!important;
}

/* ------------------////End of Section////--------------*/

/************** box-shadow***************/
.featured-three-column .column .inner-box:hover

/************** box-shadow***************/
{
	box-shadow:0px 0px 10px <?php echo esc_attr( hex2rgba($color, 0.8));?> !important;
}

/* ------------------////End of Section////--------------*/

/**************  border-color***************/

.latest_blog_wrapper .post .date:after,.blog_post_meta .post .date:after

/**************  border-color rgba***************/
{
    border-color: rgba(253, 199, 22, 0)!important;
}
/* ------------------////End of Section////--------------*/



<?php 

$out = ob_get_clean();
$expires_offset = 31536000; // 1 year
header('Content-Type: text/css; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
header('Vary: Accept-Encoding'); // Handle proxies
header('Content-Encoding: gzip');

echo gzencode($out);
exit;