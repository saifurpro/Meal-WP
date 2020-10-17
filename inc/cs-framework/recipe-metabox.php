<?php 

function meal_recipe_meta_box($options){

  
$options[]    = array(
  'id'          => 'section_recipe_meta_box',
  'title'       => __('Recipe Settings', 'meal'),
  'post_type'   => 'recipe',
  'context'     => 'normal',
  'priority'    => 'default',
  'sections'    => array(
    array(
      'name'    => 'recipe_meta_box',
      'fields'  => array(
        array(
        'id'                => 'price',
        'type'              => 'text',
        'title'             => __('Price', 'meal'),
        'default'           =>  '0.0'
        ),
      ),
    ),
  ),
);
return $options;
}
add_filter('cs_metabox_options', 'meal_recipe_meta_box');