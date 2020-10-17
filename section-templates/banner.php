<?php 
global $section_id;
$meal_section_meta = get_post_meta($section_id, 'section_banner_meta_box', true);

$meal_banner_image = "";
if(isset($meal_section_meta['banner_img'])){
    $meal_banner_image = wp_get_attachment_image_src( $meal_section_meta['banner_img'], 'large' );
}

$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_desc = $meal_section->post_content;
?>

<div class="cover_1 overlay bg-slant-white bg-light" id="<?php echo esc_attr($meal_section->post_name); ?>">
    <div class="img_bg" style="background-image: url('<?php echo esc_url($meal_banner_image[0]); ?>')"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up">
                    <h2 class="heading mb-5"><?php echo esc_html($meal_section_title); ?></h2>
                    <?php 
                $desc = apply_filters('the_content', $meal_section_desc); 
                $desc = str_replace('<p', '<p class="sub-heading mb-5"', $desc);
                echo wp_kses_post( $desc );
                ?>
                    <p><a href="<?php echo esc_url($meal_section_meta['banner_btn_link']); ?>"
                            class="smoothscroll btn btn-outline-white px-5 py-3"><?php echo esc_html($meal_section_meta['banner_btn_text']); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .cover_1 -->