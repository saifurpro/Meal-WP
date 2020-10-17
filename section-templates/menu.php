<?php 
global $section_id;
$meal_section_meta = get_post_meta($section_id, 'chef_meta_box', true);

$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_desc = $meal_section->post_content;
?>
<div class="section bg-light" data-aos="fade-up" id="<?php echo esc_attr($meal_section->post_name); ?>">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-5"><?php echo esc_html($meal_section_title); ?></h2>
                <?php echo apply_filters("the_content", $meal_section_desc); ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav site-tab-nav" id="pills-tab" role="tablist">
                    <?php 
                $meal_counter = 0;
                $meal_feat_categories = get_terms(array( 
                    'taxonomy'  =>  'category',
                    'meta_key'  =>  'meal_tax_featured',
                    'meta_value'=>  'a:1:{s:8:"featured";b:1;}',
                ));
                if($meal_feat_categories) :
                    foreach($meal_feat_categories as $meal_feat_category): 
                    $meal_counter++;
                    ?>

                    <li class="nav-item">
                        <a class="nav-link <?php if($meal_counter == 1){echo esc_attr('active');}?>"
                            id="pills-<?php echo esc_attr($meal_feat_category->name);?>-tab" data-toggle="pill"
                            href="#pills-<?php echo esc_attr($meal_feat_category->name);?>" role="tab"
                            aria-controls="pills-<?php echo esc_attr($meal_feat_category->name);?>"
                            aria-selected="<?php if($meal_counter == 1){echo esc_attr('true');}?>"><?php echo esc_attr($meal_feat_category->name);?></a>
                    </li>

                    <?php endforeach;
                endif;
                ?>


                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <?php 
                    
                    $meal_counter = 0;
                    foreach($meal_feat_categories as $meal_feat_category):
                        $meal_counter++;
                    ?>

                    <div class="tab-pane fade show <?php if($meal_counter == 1){echo esc_attr('active');}?>"
                        id="pills-<?php echo esc_attr($meal_feat_category->name);?>" role="tabpanel"
                        aria-labelledby="pills-<?php echo esc_attr($meal_feat_category->name);?>-tab">

                        <?php 
                    $meal_args = array(
                        'post_type' =>  'recipe',
                        'posts_per_page'=>-1,
                        'tax_query'=>array(
                            array(
                                'taxonomy'=>'category',
                                'field' =>  'slug',
                                'terms'=>$meal_feat_category->name,
                            ),
                        ),
                    );

                    $meal_feat_recipes = new WP_Query($meal_args);
                     
                        while($meal_feat_recipes->have_posts()): $meal_feat_recipes->the_post();

                        $meal_recipe_meta = get_post_meta(get_the_ID(), 'section_recipe_meta_box', true); 
                    ?>

                        <div class="d-block d-md-flex menu-food-item">

                            <div class="text order-1 mb-3">
                                <?php the_post_thumbnail(array('100', '100')); ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="price order-2">
                                <strong>

                                    <?php 
                                if($meal_recipe_meta){
                                    echo $meal_recipe_meta['price'];
                                }
                                ?>

                                </strong>
                            </div>
                        </div> <!-- .menu-food-item -->
                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .section -->