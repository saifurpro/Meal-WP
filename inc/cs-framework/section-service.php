<?php 

function meal_section_service_meta_box($options){

    $section_id = 0;
    
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    
    if(get_post_type( $section_id ) != 'sections'){
        return $options;
    }
    
    $section_meta = get_post_meta($section_id, 'section_type_meta_box', true);

    $section_type = $section_meta['select_section_type'] ?? ""; 

    if($section_type != 'service'){
        return $options;
    }

    $options[]    = array(
    'id'          => 'service_meta_box',
    'title'       => __('Service Section', 'meal'),
    'post_type'   => 'sections',
    'context'     => 'normal',
    'priority'    => 'default',
    'sections'    => array(
        array(
        'name'    => 'section_service',
        'fields'  => array(
            array(
            'id'              => 'services',
            'type'            => 'group',
            'title'           => __('service', 'meal'),
            'button_title'    => __("New Service", "meal"),
            'accordion_title' => __("Add New Service", "meal"),
            'fields'          => array(
                array(
                'id'    => 'name',
                'type'  => 'text',
                'title' => __("Name", "meal"),
                ),
                array(
                'id'    => 'icon',
                'title' => __("Icon", "meal"),
                'type'  => 'select',
                    'options'        => array(
                        'flaticon-soup'          => __("Soup", "meal"),
                        'flaticon-vegetables'    => __("Vegetables", "meal"),
                        'flaticon-pancake'       => __("Pancake", "meal"),
                        'flaticon-tray'          => __("Tray", "meal"),
                        'flaticon-salad'         => __("Salad", "meal"),
                        'flaticon-chicken'       => __("Chicken", "meal"),
                    ),
                    'default_option' => 'Select an icon',
                ),
                array(
                'id'    => 'description',
                'type'  => 'textarea',
                'title' => __("Description", "meal"),
                ),
            ),
            ),
        ),
        ),
    ),
    );
    return $options;
}
add_filter('cs_metabox_options', 'meal_section_service_meta_box');