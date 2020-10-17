<?php 

function meal_companion_sections_cpt() {
	/**
	 * Post Type: Sections.
	 */

	$labels = [
		"name" => __( "Sections", "meal" ),
		"singular_name" => __( "Section", "meal" ),
	];

	$args = [
		"label" => __( "Sections", "meal" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "section", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-media-document",
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "sections", $args );
}
add_action( 'init', 'meal_companion_sections_cpt' );


function meal_companion_recipes_cpt() {
/**
	 * Post Type: Recipes.
	 */

	$labels = [
		"name" => __( "Recipes", "meal" ),
		"singular_name" => __( "Recipe", "meal" ),
		"featured_image"=>	__("Recipe Image", "meal"),
		"set_featured_image"=>	__("Set Recipe Image", "meal"),
		"remove_featured_image"=>	__("Remove Recipe Image", "meal"),
		"use_featured_image"=>	__("Use Recipe Image", "meal"),

	];

	$args = [
		"label" => __( "Recipes", "meal" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "recipe", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-carrot",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies"	=>	array("category")
	];

	register_post_type( "recipe", $args );
}
add_action( 'init', 'meal_companion_recipes_cpt' );


function meal_companion_reservations_cpt() {
	/**
	 * Post Type: Reservation.
	 */

	$labels = [
		"name" => __( "Reservations", "meal" ),
		"singular_name" => __( "Reservation", "meal" ),
	];

	$args = [
		"label" => __( "Reservations", "meal" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "recipe", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-food",
		"supports" => [ "title" ],
	];

	register_post_type( "reservation", $args );
}
add_action( 'init', 'meal_companion_reservations_cpt' );