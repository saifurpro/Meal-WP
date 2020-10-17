<?php 

function meal_section_type_meta_box($options){

  
$options[]    = array(
  'id'          => 'section_type_meta_box',
  'title'       => __('Section Type', 'meal'),
  'post_type'   => 'sections',
  'context'     => 'normal',
  'priority'    => 'default',
  'sections'    => array(
    array(
      'name'    => 'section_type_meta_box_section',
      'fields'  => array(
        array(
        'id'                => 'select_section_type',
        'type'              => 'select',
        'title'             => __('Select Section Type', 'meal'),
            'options'       => array(
                'banner'        => __('Banner Area', 'meal'),
                'chef'          => __('Chef Area', 'meal'),
                'gallery'       => __('Gallery Area', 'meal'),
                'menu'          => __('Menu Area', 'meal'),
                'service'       => __('Service Area', 'meal'),
                'reservation'   => __('Reservation Area', 'meal'),
                'featured'      => __('Featured Section', 'meal'),
                'review'        => __('Testimonials', 'meal'),
                'contact'       => __('Get in Touch', 'meal'),
                'footer'        => __('Footer', 'meal'),
            ),
            'default_option'    => 'Select a section type',
        ),
      ),
    ),
  ),
);
return $options;
}
add_filter('cs_metabox_options', 'meal_section_type_meta_box');