<?php

define( 'LEBUILD_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'lebuild_wp_load', 5 );

function lebuild_wp_load() {

	defined( 'LEBUILD_URL' ) or define( 'LEBUILD_URL', get_template_directory_uri() . '/' );
	define(  'LEBUILD_KEY','!@#lebuild');
	define(  'LEBUILD_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'LEBUILD_NONCE' ) ) {
		define( 'LEBUILD_NONCE', 'lebuild_wp_theme' );
	}

	( new \LEBUILD\Includes\Classes\Base )->loadDefaults();
	( new \LEBUILD\Includes\Classes\Ajax )->actions();

}
add_action( 'init', 'lebuild_bunch_theme_init');
function lebuild_bunch_theme_init()
{
	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';
	

}
