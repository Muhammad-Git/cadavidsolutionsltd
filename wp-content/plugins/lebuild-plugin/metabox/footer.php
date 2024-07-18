<?php

return array(
	'id'     => 'lebuild_footer_settings',
	'title'  => esc_html__( "Lebuild footer Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'lebuild' ),
			'options' => array(
				'd'    => esc_html__( 'Default', 'lebuild' ),
				'e'    => esc_html__( 'Elementor', 'lebuild' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Footer Styles', 'lebuild' ),
			'options'  => array(
				'footer_v1' => array(
					'alt' => 'Footer LTR Style',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
				),
				
			),
			'required' => array( array( 'footer_source_type', 'equals', 'd' ) ),
		),
	),
);