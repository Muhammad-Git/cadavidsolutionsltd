<?php
return array(
	'title'      => 'Lebuild Service Setting',
	'id'         => 'lebuild_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'lebuild_service' ),
	'sections'   => array(
		array(
			'id'     => 'lebuild_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'lebuild' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'lebuild' ),
				),
			),
		),
	),
);