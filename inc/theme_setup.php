<?php 


function meal_theme_setup() {
    load_theme_textdomain('meal', get_template_directory() . '/languages');

    add_theme_support( 'automatic-feed-links' );
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support( 'html5', array(
        'search-form', 
        'comment-form', 
        'comment-list', 
        'gallery', 
        'caption', 
        'style',
        'script',
    ) );
    add_theme_support( 'post-formats', array(
        'aside', 
        'image', 
        'video', 
        'quote', 
        'link', 
        'gallery', 
        'status', 
        'audio', 
        'chat'
    ) );

    add_theme_support(
        'custom-background', 
        apply_filters(
            'meal_custom_background_args', array(
                'default-color' =>  'ffffff',
                'default-image' =>  ''
        ) ) 
    );
    
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'meal_theme_setup');