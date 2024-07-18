<?php
if ( ! function_exists( "lebuild_add_metaboxes" ) ) {
	function lebuild_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php',
			'post.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( LEBUILDPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/lebuild_options/boxes", "lebuild_add_metaboxes" );
}

