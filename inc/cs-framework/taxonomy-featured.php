<?php 
function meal_taxonomy_featured_meta_box($options){
    $options[] = array( 
        'id'    =>  'meal_tax_featured',
        'taxonomy'=>    'category',
        'fields'=>  array(
            array(
                'id'=>'featured',
                'type'=>'switcher',
                'title'=> __('Featured?', 'meal')
            )
        )
    );

    return $options;
}
add_filter("cs_taxonomy_options", "meal_taxonomy_featured_meta_box");