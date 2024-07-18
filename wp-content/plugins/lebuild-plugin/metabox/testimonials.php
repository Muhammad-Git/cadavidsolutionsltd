<?php
return array(
	'title'      => 'Lebuild Testimonials Setting',
	'id'         => 'lebuild_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'lebuild_testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'lebuild_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'test_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'lebuild' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'lebuild' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'default'  => '5',
				),
			),
		),
	),
);