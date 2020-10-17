<?php 
define( 'CS_ACTIVE_FRAMEWORK',  false  ); // default true
define( 'CS_ACTIVE_METABOX',    true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    true ); // default true
define( 'CS_ACTIVE_SHORTCODE',  false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',  false ); // default true

define( 'CS_ACTIVE_LIGHT_THEME', true ); // default false

function meal_codestar_init() {
    CSFramework_Metabox::instance(array());
    CSFramework_Taxonomy::instance(array());
}
add_action('init', 'meal_codestar_init');