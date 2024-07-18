<?php
return array(
	'title'      => 'Lebuild Project Setting',
	'id'         => 'lebuild_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'lebuild_project' ),
	'sections'   => array(
		array(
			'id'     => 'lebuild_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'meta_subtitle',
					'type'  => 'text',
					'title' => esc_html__( 'Subtitle', 'lebuild' ),
				),
				array(
					'id'    => 'page_link',
					'type'  => 'text',
					'title' => esc_html__( 'Page Link', 'lebuild' ),
				),
				array(
					'id'    => 'image_link',
					'type'  => 'text',
					'title' => esc_html__( 'Image Link', 'lebuild' ),
				),
				array(
					'id'    => 'meta_number',
					'type'  => 'text',
					'title' => esc_html__( 'Column Number', 'lebuild' ),
					'default' => esc_html__( '3', 'lebuild' ),
				),
			),
		),
	),
);