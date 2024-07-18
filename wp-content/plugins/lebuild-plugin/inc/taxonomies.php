<?php

namespace LEBUILDPLUGIN\Inc;


use LEBUILDPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wplebuild' ),
			'singular_name'     => _x( 'Project Category', 'wplebuild' ),
			'search_items'      => __( 'Search Category', 'wplebuild' ),
			'all_items'         => __( 'All Categories', 'wplebuild' ),
			'parent_item'       => __( 'Parent Category', 'wplebuild' ),
			'parent_item_colon' => __( 'Parent Category:', 'wplebuild' ),
			'edit_item'         => __( 'Edit Category', 'wplebuild' ),
			'update_item'       => __( 'Update Category', 'wplebuild' ),
			'add_new_item'      => __( 'Add New Category', 'wplebuild' ),
			'new_item_name'     => __( 'New Category Name', 'wplebuild' ),
			'menu_name'         => __( 'Project Category', 'wplebuild' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'lebuild_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wplebuild' ),
			'singular_name'     => _x( 'Service Category', 'wplebuild' ),
			'search_items'      => __( 'Search Category', 'wplebuild' ),
			'all_items'         => __( 'All Categories', 'wplebuild' ),
			'parent_item'       => __( 'Parent Category', 'wplebuild' ),
			'parent_item_colon' => __( 'Parent Category:', 'wplebuild' ),
			'edit_item'         => __( 'Edit Category', 'wplebuild' ),
			'update_item'       => __( 'Update Category', 'wplebuild' ),
			'add_new_item'      => __( 'Add New Category', 'wplebuild' ),
			'new_item_name'     => __( 'New Category Name', 'wplebuild' ),
			'menu_name'         => __( 'Service Category', 'wplebuild' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'lebuild_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wplebuild' ),
			'singular_name'     => _x( 'Testimonials Category', 'wplebuild' ),
			'search_items'      => __( 'Search Category', 'wplebuild' ),
			'all_items'         => __( 'All Categories', 'wplebuild' ),
			'parent_item'       => __( 'Parent Category', 'wplebuild' ),
			'parent_item_colon' => __( 'Parent Category:', 'wplebuild' ),
			'edit_item'         => __( 'Edit Category', 'wplebuild' ),
			'update_item'       => __( 'Update Category', 'wplebuild' ),
			'add_new_item'      => __( 'Add New Category', 'wplebuild' ),
			'new_item_name'     => __( 'New Category Name', 'wplebuild' ),
			'menu_name'         => __( 'Testimonials Category', 'wplebuild' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'lebuild_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wplebuild' ),
			'singular_name'     => _x( 'Team Category', 'wplebuild' ),
			'search_items'      => __( 'Search Category', 'wplebuild' ),
			'all_items'         => __( 'All Categories', 'wplebuild' ),
			'parent_item'       => __( 'Parent Category', 'wplebuild' ),
			'parent_item_colon' => __( 'Parent Category:', 'wplebuild' ),
			'edit_item'         => __( 'Edit Category', 'wplebuild' ),
			'update_item'       => __( 'Update Category', 'wplebuild' ),
			'add_new_item'      => __( 'Add New Category', 'wplebuild' ),
			'new_item_name'     => __( 'New Category Name', 'wplebuild' ),
			'menu_name'         => __( 'Team Category', 'wplebuild' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'lebuild_team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wplebuild' ),
			'singular_name'     => _x( 'Faq Category', 'wplebuild' ),
			'search_items'      => __( 'Search Category', 'wplebuild' ),
			'all_items'         => __( 'All Categories', 'wplebuild' ),
			'parent_item'       => __( 'Parent Category', 'wplebuild' ),
			'parent_item_colon' => __( 'Parent Category:', 'wplebuild' ),
			'edit_item'         => __( 'Edit Category', 'wplebuild' ),
			'update_item'       => __( 'Update Category', 'wplebuild' ),
			'add_new_item'      => __( 'Add New Category', 'wplebuild' ),
			'new_item_name'     => __( 'New Category Name', 'wplebuild' ),
			'menu_name'         => __( 'Faq Category', 'wplebuild' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'lebuild_faqs', $args );
	}
	
}
