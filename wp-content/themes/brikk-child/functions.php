<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

require_once(get_stylesheet_directory() . '/inc/enqueue_files.php');
require_once(get_stylesheet_directory() . '/inc/post_action.php');
require_once(get_stylesheet_directory() . '/inc/users_functions.php');


function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'footer Menu' ));
  register_nav_menu('footer-bottom-menu',__( 'footer bottom Menu' ));
}
add_action( 'init', 'register_footer_menu' );

function add_class_on_a_tag($classes, $item, $args)
{	
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
return $classes;
}
add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);

// SMTP Setting
add_action( 'phpmailer_init', 'my_smtp_phpemailer' );
function my_smtp_phpemailer( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host       = SMTP_HOST;
	$phpmailer->SMTPAuth   = SMTP_AUTH;
	$phpmailer->Port       = SMTP_PORT;
	$phpmailer->Username   = SMTP_USER;
	$phpmailer->Password   = SMTP_PASS;
	$phpmailer->SMTPSecure = SMTP_SECURE;
	$phpmailer->From       = SMTP_FROM;
	$phpmailer->FromName   = SMTP_NAME;
}
// SMTP Setting