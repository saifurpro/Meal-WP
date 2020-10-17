<?php
/**
 * Template Name: Landing
 */
get_header(); ?>

<div class="main-wrap " id="section-home">

    <?php 
            $meal_current_page_id = get_the_ID();
            $meal_page_meta = get_post_meta( $meal_current_page_id, 'section_picker_meta_box', true );

            foreach($meal_page_meta['select_section'] as $meal_page_section){

                $section_id = $meal_page_section['section'];
                $meal_section_meta = get_post_meta( $section_id, 'section_type_meta_box', true );
                $meal_section_type = $meal_section_meta['select_section_type'];

                 get_template_part("section-templates/{$meal_section_type}"); 

            }
        ?>

    <div class="map-wrap" id="map" data-aos="fade"></div>


    <?php get_footer(); ?>