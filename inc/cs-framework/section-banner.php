<?php 

function meal_section_banner_meta_box($options){

    $section_id = 0;
    
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    
    if(get_post_type( $section_id ) != 'sections'){
        return $options;
    }
    
    $section_meta = get_post_meta($section_id, 'section_type_meta_box', true);

    $section_type = $section_meta['select_section_type'] ?? ""; 

    if($section_type != 'banner'){
        return $options;
    }

    $options[]    = array(
    'id'          => 'section_banner_meta_box',
    'title'       => __('Banner Section', 'meal'),
    'post_type'   => 'sections',
    'context'     => 'normal',
    'priority'    => 'default',
    'sections'    => array(
        array(
        'name'    => 'section_banner',
        'fields'  => array(
            array(
            'id'                => 'banner_img',
            'type'              => 'image',
            'title'             => __('Banner Image', 'meal'),
            ),
            array(
            'id'                => 'banner_btn_text',
            'type'              => 'text',
            'title'             => __('Banner Button Text', 'meal'),
            ),
            array(
            'id'                => 'banner_btn_link',
            'type'              => 'text',
            'title'             => __('Banner button Link', 'meal'),
            ),
        ),
        ),
    ),
    );
    return $options;
}
add_filter('cs_metabox_options', 'meal_section_banner_meta_box');