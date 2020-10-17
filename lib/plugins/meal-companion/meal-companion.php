<?php 

/*
Plugin Name: Meal Companion
Plugin URI: https://github.com/Meal-WP/
Author: Saifur Rahman
Author URI: https://github.com/saifur703/
Description: Companion Plugin for Meal WordPress Theme.
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: meal-companion
Domain Path: /languages
*/

function meal_companion_text_domain() {
    load_plugin_textdomain('meal-companion', false, dirname(__FILE__) . '/languages');
}
add_action('plugin_loaded', 'meal_companion_text_domain');

require_once plugin_dir_path( __FILE__ ) . 'inc/cpt.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/section-navigation.php';