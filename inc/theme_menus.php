<?php 

function meal_menus()
{
    $locations = array(
        'primary'   =>  __('Main Menu', 'meal'),
    );

    register_nav_menus($locations);
}
add_action('init', 'meal_menus');