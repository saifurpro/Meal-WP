<?php get_header();?>


<div class="section bg-light" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title mb-5">
                    <h1><?php single_post_title(); ?></h1>
                </div>
            </div>
        </div>

        <?php if(have_posts() ): ?>
        <div class="row post-container">
            <?php while(have_posts()): the_post(); ?>
            <div class="col-lg-4">
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog-post' ); ?>>
                    <?php the_post_thumbnail("large"); ?>
                    <div class="single-blog-post-text">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <a href="<?php next_posts(get_max_page_number()); ?>" id="load_more" class="btn btn-danger"><?php _e("Load More", "meal"); ?></a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <?php
                 the_posts_navigation(array(
                     'screen_reader_text'   =>  ' '
                 ));
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>