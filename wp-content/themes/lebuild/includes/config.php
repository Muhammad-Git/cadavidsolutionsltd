<?php
/**
 * Theme config file.
 *
 * @package LEBUILD
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['lebuild_main_header'][] 	= array( 'lebuild_preloader', 98 );
$config['default']['lebuild_main_header'][] 	= array( 'lebuild_main_header_area', 99 );

$config['default']['lebuild_main_footer'][] 	= array( 'lebuild_preloader', 98 );
$config['default']['lebuild_main_footer'][] 	= array( 'lebuild_main_footer_area', 99 );

$config['default']['lebuild_sidebar'][] 	    = array( 'lebuild_sidebar', 99 );

$config['default']['lebuild_banner'][] 	    = array( 'lebuild_banner', 99 );


return $config;
