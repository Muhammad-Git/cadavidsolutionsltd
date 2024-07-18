<?php
return array(
	'title'      => 'Lebuild Team Setting',
	'id'         => 'lebuild_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'lebuild_team' ),
	'sections'   => array(
		array(
			'id'     => 'lebuild_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'lebuild' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'lebuild' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'lebuild' ),
				),
			),
		),
	),
);