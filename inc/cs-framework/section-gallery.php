<?php 

function meal_section_gallery_meta_box($options){

    $section_id = 0;
    
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    
    if(get_post_type( $section_id ) != 'sections'){
        return $options;
    }
    
    $section_meta = get_post_meta($section_id, 'section_type_meta_box', true);

    $section_type = $section_meta['select_section_type'] ?? ""; 

    if($section_type != 'gallery'){
        return $options;
    }

    $options[]    = array(
    'id'          => 'section_gallery_meta_box',
    'title'       => __('Gallery Section', 'meal'),
    'post_type'   => 'sections',
    'context'     => 'normal',
    'priority'    => 'default',
    'sections'    => array(
        array(
        'name'    => 'section_gallery',
        'fields'  => array(
            array(
            'id'              => 'gallery',
            'type'            => 'group',
            'title'           => __('Gallery', 'meal'),
            'button_title'    => __("New Gallery", "meal"),
            'accordion_title' => __("Add New Gallery", "meal"),
            'fields'          => array(
                array(
                'id'    => 'title',
                'type'  => 'text',
                'title' => __("Title", "meal"),
                ),
                array(
                'id'    => 'image',
                'type'  => 'image',
                'title' => __("Image", "meal"),
                ),
                array(
                'id'    => 'categories',
                'type'  => 'text',
                'title' => __("Categories", "meal"),
                ),
            ),
            ),
        ),
        ),
    ),
    );
    return $options;
}
add_filter('cs_metabox_options', 'meal_section_gallery_meta_box');