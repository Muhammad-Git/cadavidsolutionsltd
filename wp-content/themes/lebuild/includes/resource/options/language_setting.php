<?php

return array(

	'title'         => esc_html__( 'Language Settings', 'lebuild' ),
    'id'            => 'language_settings',
    'desc'          => '',
    'icon'			=> 'el el-globe',
    'fields'        => array(          
		array(
			'id' => 'optLanguage',
			'type' => 'language',
			'desc' => esc_html__('Please upload .mo language file', 'lebuild'),
			)
	),
);
