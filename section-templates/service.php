<?php 
global $section_id;
$meal_section_meta = get_post_meta($section_id, 'service_meta_box', true);

$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_desc = $meal_section->post_content;
?>
<div class="section bg-white services-section" data-aos="fade-up"
    id="<?php echo esc_attr($meal_section->post_name); ?>">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($meal_section_title); ?></h2>
                <?php echo apply_filters("the_content", $meal_section_desc); ?>
            </div>
        </div>
        <div class="row">

            <?php 
        $meal_services = $meal_section_meta['services'];
        foreach($meal_services as $meal_service):
        ?>

            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="media feature-icon d-block text-center">
                    <div class="icon">
                        <span class="<?php echo esc_attr($meal_service['icon']); ?>"></span>
                    </div>
                    <div class="media-body">
                        <h3><?php echo esc_html($meal_service['name']) ?></h3>
                        <?php echo apply_filters("the_content", $meal_service['description']) ?>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</div> <!-- .section -->