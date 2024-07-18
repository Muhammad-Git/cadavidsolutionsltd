<?php
/**
 * Theme functions and definitions.
 */
function lebuild_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'lebuild-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'lebuild-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'lebuild-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'lebuild-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'lebuild_child_enqueue_styles' );