<?php

namespace LEBUILDPLUGIN\Element;


class Elementor {
	static $widgets = array(
		'h1_slider',
		'h1_about',
		'h1_service_icon',
		'h1_gallary',
		'h1_testimonial',
		'h1_team',
		'h1_newsletter',
		'h1_blog',
		'h1_clients',
		'footer_widget1',
		'footer_widget2',
		'footer_widget3',
		'footer_bottom',
		'h2_slider',
		'h2_about',
		'h2_clients',
		'h2_gallery',
		'h2_features',
		'h3_slider',
		'h3_service_icon',
		'h3_about_left',
		'h3_about_right',
		'h3_gallery',
		'h3_testimonial',
		'h3_newsletter',
		'h3_faq_left',
		'h3_faq_right',
		'h4_slider',
		'h4_service_icon',
		'h4_about_right',
		'h4_gallery',
		'h4_video',
		'service_details1',
		'service_details2',
		'service_details3',
		'project_details1',
		'project_details2',
		'project_details3',
		'project_details4',
		'wi_author',
		'wi_search',
		'wi_categories',
		'wi_testimonial',
		'testimonial',
		'faq_left',
		'faq_right',
		'faq_contact',
		'contact_info',
		'contact',
		'team_details_left',
		'team_details_right',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = LEBUILDPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\LEBUILDPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'lebuild',
			[
				'title' => esc_html__( 'Lebuild', 'lebuild' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'lebuild' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();