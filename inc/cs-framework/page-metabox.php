<?php 

function meal_section_picker_meta_box($options){

    $page_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta( $page_id, '_wp_page_template', true );
    if ( ! in_array( $current_page_template, array( 'page-templates/landing-page.php' ) ) ) {
        return $options;
    }

$options[]    = array(
  'id'          => 'section_picker_meta_box',
  'title'       => __('Section Picker', 'meal'),
  'post_type'   => 'page',
  'context'     => 'normal',
  'priority'    => 'default',
  'sections'    => array(
    array(
      'name'    => 'section_picker',
      'fields'  => array(
        array(
        'id'                => 'select_section',
        'type'              => 'group',
        'title'             => __('Select Section', 'meal'),
        'button_title'      => __('Add Section', 'meal'),
        'accordion_title'   => __('Add New Section', 'meal'),
            'fields'        => array(
                array(
                'id'            => 'section',
                'title'         => __('Select Section', 'meal'),
                'type'          => 'select',
                'options'       =>'post',
                'query_args'    => array(
                    'post_type'         => 'sections',
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
add_filter('cs_metabox_options', 'meal_section_picker_meta_box');