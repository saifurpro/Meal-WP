<?php 

function meal_landing_page_nav_menu_change($menus) {
    $string_to_replace = home_url('/').'section/';

    if(is_front_page()){
        foreach($menus as $menu){
            $new_url = str_replace($string_to_replace, "#", $menu->url);

            if($menu->url != $new_url){
                $new_url = rtrim($new_url,"/");
            }
            $menu->url = $new_url;
        }
    }   
    return $menus;
}
add_filter('wp_nav_menu_objects', 'meal_landing_page_nav_menu_change');