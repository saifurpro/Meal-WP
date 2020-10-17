<?php 

function meal_featured_meta_box($options){

    $section_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if(get_post_type( $section_id ) != 'sections'){
        return $options;
    }

    $section_meta = get_post_meta($section_id, 'section_type_meta_box', true);

    $section_type = $section_meta['select_section_type'] ?? ""; 

    if($section_type != 'featured'){
        return $options;
    }

$options[]    = array(
  'id'          => 'section_featured_meta_box',
  'title'       => __('Featured Recipes', 'meal'),
  'post_type'   => 'sections',
  'context'     => 'normal',
  'priority'    => 'default',
  'sections'    => array(
    array(
      'name'    => 'featured_recipe',
      'fields'  => array(
        array(
        'id'                => 'recipes',
        'type'              => 'group',
        'title'             => __('Select Recipe', 'meal'),
        'button_title'      => __('Add Recipe', 'meal'),
        'accordion_title'   => __('Add New Recipe', 'meal'),
            'fields'        => array(
                array(
                'id'            => 'recipe',
                'title'         => __('Select Recipe', 'meal'),
                'type'          => 'select',
                'options'       =>'post',
                'query_args'    => array(
                    'post_type'         => 'recipe',
                    'order'             => 'DESC',
                    'posts_per_page'    =>  -1,
                ),
                ),
            ),
        ),
      ),
    ),
  ),
);
return $options;
}
add_filter('cs_metabox_options', 'meal_featured_meta_box');