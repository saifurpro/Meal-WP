<?php 
global $section_id;
$meal_section_meta = get_post_meta($section_id, 'chef_meta_box', true);

$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_desc = $meal_section->post_content;
?>

<div class="section bg-white" data-aos="fade-up" id="<?php echo esc_attr($meal_section->post_name); ?>">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 section-heading text-center">
                <h2 class="heading mb-5"><?php echo esc_html($meal_section_title); ?></h2>
                <?php echo apply_filters("the_content", $meal_section_desc); ?>
            </div>
        </div>
        <div class="row">
            <?php 
            $meal_chefs = $meal_section_meta['chef'];
            foreach($meal_chefs as $meal_chef):
                $meal_chef_image = wp_get_attachment_image_src( $meal_chef['image'], "large" );
            ?>
            <div class="col-md-6 text-center mb-5">
                <div class="ftco-38">
                    <div class="ftco-38-img">
                        <div class="ftco-38-header">
                            <img src="<?php echo esc_url($meal_chef_image[0]); ?>"
                                alt="<?php echo wp_kses_post( ($meal_chef['name'])); ?>">
                            <h3 class="ftco-38-heading"><?php echo esc_html($meal_chef['name']); ?></h3>
                            <p class="ftco-38-subheading"><?php echo esc_html($meal_chef['title']); ?></p>
                        </div>
                        <div class="ftco-38-body">
                            <?php echo apply_filters("the_content", $meal_chef['bio']) ?>
                            <p>

                                <?php if($meal_chef['social_profiles']['facebook']): ?>
                                <a href="<?php echo esc_url($meal_chef['social_profiles']['facebook']);?>"
                                    class="p-2"><span class="fa fa-facebook"></span></a>
                                <?php endif; ?>

                                <?php if($meal_chef['social_profiles']['twitter']): ?>
                                <a href="<?php echo esc_url($meal_chef['social_profiles']['twitter']);?>"
                                    class="p-2"><span class="fa fa-twitter"></span></a>
                                <?php endif; ?>

                                <?php if($meal_chef['social_profiles']['instagram']): ?>
                                <a href="<?php echo esc_url($meal_chef['social_profiles']['instagram']);?>"
                                    class="p-2"><span class="fa fa-instagram"></span></a>
                                <?php endif; ?>

                                <?php if($meal_chef['social_profiles']['linkedIn']): ?>
                                <a href="<?php echo esc_url($meal_chef['social_profiles']['linkedIn']);?>"
                                    class="p-2"><span class="fa fa-linkedin"></span></a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- <div class="col-md-4"></div> -->
        </div>
    </div>
</div> <!-- .section -->