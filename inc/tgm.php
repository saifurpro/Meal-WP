<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'meal_register_required_plugins' );

function meal_register_required_plugins() {

	$plugins = array(
		array(
			'name'               => 'Meal Companion',
			'slug'               => 'meal-companion',
			'source'             => get_stylesheet_directory() . '/lib/plugins/meal-companion.zip',
			'required'           => true,
		),

	);
	$config = array(
		'id'           => 'meal', 
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true, 
		'dismissable'  => true, 
		'dismiss_msg'  => '',  
		'is_automatic' => false,
		'message'      => '', 
	);

	tgmpa( $plugins, $config );
}