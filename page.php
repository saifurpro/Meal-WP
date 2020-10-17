<?php get_header();
the_post();
?>
<div class="section bg-light" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
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


<?php get_footer(); ?>