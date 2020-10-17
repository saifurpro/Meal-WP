<?php
define('CS_ACTIVE_FRAMEWORK', true); // default true
define('CS_ACTIVE_METABOX', true); // default true
define('CS_ACTIVE_TAXONOMY', true); // default true
define('CS_ACTIVE_SHORTCODE', false); // default true
define('CS_ACTIVE_CUSTOMIZE', false); // default true

define('CS_ACTIVE_LIGHT_THEME', true); // default false

function meal_codestar_init()
{
    CSFramework_Metabox::instance(array());
    CSFramework_Taxonomy::instance(array());

    $settings = array(
        'menu_title' => __('Meal Options', 'meal'),
        'menu_type' => 'menu',
        'menu_slug' => 'meal-options-panel',
        'framework_title' => __('Meal Options', 'meal'),
        'ajax_save' => false,
        'show_reset_all' => true,
    );
    new CSFramework($settings, meal_get_theme_options());
}
add_action('init', 'meal_codestar_init');

function meal_get_theme_options()
{
    $options = array();

    $options[] = array(
        'name' => 'meal_theme_activation',
        'title' => __('Theme Activation', 'meal'),
        'icon' => 'fa fa-heart',
        'fields' => array(
            array(
                'id' => 'username',
                'type' => 'text',
                'title' => __('Username', 'meal'),
            ),
            array(
                'id' => 'purchase_code',
                'type' => 'text',
                'title' => __('Purchase Code', 'meal'),
            ),
        ),
    );
    return $options;
}