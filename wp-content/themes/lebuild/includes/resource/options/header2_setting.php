<?php
return array(
	'title'      => esc_html__( 'Header 2 Setting', 'lebuild' ),
	'id'         => 'header2_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'logo_type2',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Logo Style', 'lebuild' ),
			'desc'    => esc_html__( 'Select anyone logo style to show in header', 'lebuild' ),
			'options' => array(
				'image' => esc_html__( 'Image Logo', 'lebuild' ),
				'text'  => esc_html__( 'Text Logo', 'lebuild' ),
			),
			'default' => 'image',
		),
		array(
			'id'       => 'image_logo2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'lebuild' ),
			'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'lebuild' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo.png' ),
			'required' => array( array( 'logo_type2', 'equals', 'image' ) ),
		),
		array(
			'id'       => 'logo_dimension2',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'lebuild' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'lebuild' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array(
				array( 'logo_type2', 'equals', 'image' ),
			),
		),
		array(
			'id'       => 'logo_text2',
			'type'     => 'text',
			'title'    => esc_html__( 'Logo Text', 'lebuild' ),
			'subtitle' => esc_html__( 'Enter Logo Text', 'lebuild' ),
			'required' => array(
				array( 'logo_type2', 'equals', 'text' ),
			),
		),
		array(
			'id'          => 'logo_typography2',
			'type'        => 'typography',
			'title'       => esc_html__( 'Typography', 'lebuild' ),
			'google'      => true,
			'font-backup' => false,
			'text-align'  => false,
			'line-height' => false,
			'output'      => array( 'h2.site-description' ),
			'units'       => 'px',
			'subtitle'    => esc_html__( 'Select Styles for text logo', 'lebuild' ),
			'default'     => array(
				'color'       => '#333',
				'font-style'  => '700',
				'font-family' => 'Abel',
				'google'      => true,
				'font-size'   => '33px',
			),
			'required'    => array(
				array( 'logo_type2', 'equals', 'text' ),
			),
		),

		array(
			'id'    => 'header_social_share2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'lebuild' ),
			'desc'  => esc_html__( 'Click an icon to activate social profile icons in header.', 'lebuild' ),
		),
		array(
			'id'    => 'header_project2',
			'type'  => 'text',
			'title' => esc_html__( 'Projects Link', 'lebuild' ),
		),
	),
);
