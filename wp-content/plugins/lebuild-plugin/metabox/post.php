<?php
return array(
	'title' => 'lebuild Post Setting',
	'id' => 'lebuild_meta_post',
	'icon' => 'el el-cogs',
	'position' => 'normal',
	'priority' => 'core',
	'post_types' => array( 'post' ),
	'sections' => array(
		array(
			'id' => 'lebuild_post_meta_setting',
			'fields' => array(
				array(
					'id' => 'meta_image',
					'type' => 'media',
					'title' => esc_html__( 'Meta image', 'indext' ),
				),
				

			),
		),
	),
);