<?php get_header();
the_post();
?>
<div class="section bg-white" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title mb-5">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <?php the_post_thumbnail("large"); ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section bg-light">
    <?php 
        if(! post_password_required() && comments_open() ){
        comments_template();
        } 
    ?>
</div>


<?php get_footer(); ?>

