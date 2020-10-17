<?php 

function meal_section_chef_meta_box($options){

    $section_id = 0;
    
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    
    if(get_post_type( $section_id ) != 'sections'){
        return $options;
    }
    
    $section_meta = get_post_meta($section_id, 'section_type_meta_box', true);

    $section_type = $section_meta['select_section_type'] ?? ""; 

    if($section_type != 'chef'){
        return $options;
    }

    $options[]    = array(
    'id'          => 'chef_meta_box',
    'title'       => __('Chef Section', 'meal'),
    'post_type'   => 'sections',
    'context'     => 'normal',
    'priority'    => 'default',
    'sections'    => array(
        array(
        'name'    => 'section_chef',
        'fields'  => array(
            array(
            'id'              => 'chef',
            'type'            => 'group',
            'title'           => __('Chef', 'meal'),
            'button_title'    => __("New Chef", "meal"),
            'accordion_title' => __("Add New Chef", "meal"),
            'fields'          => array(
                array(
                'id'    => 'name',
                'type'  => 'text',
                'title' => __("Name", "meal"),
                ),
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
                'id'    => 'bio',
                'type'  => 'textarea',
                'title' => __("Bio", "meal"),
                ),
                array(
                'id'        => 'social_profiles',
                'type'      => 'fieldset',
                'title'     => __('Social Profiles', 'meal'),
                'fields'    => array(
                    array(
                    'id'    => 'facebook',
                    'type'  => 'text',
                    'title' => __('Facebook', 'meal'),
                    ),
                    array(
                    'id'    => 'twitter',
                    'type'  => 'text',
                    'title' => __('Twitter', 'meal'),
                    ),
                    array(
                    'id'    => 'linkedIn',
                    'type'  => 'text',
                    'title' => __('LinkedIn', 'meal'),
                    ),
                    array(
                    'id'    => 'instagram',
                    'type'  => 'text',
                    'title' => __('Instagram', 'meal'),
                    ),
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
add_filter('cs_metabox_options', 'meal_section_chef_meta_box');