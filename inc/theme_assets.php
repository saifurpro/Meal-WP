<?php 


function meal_assets() {
    wp_enqueue_style('meal-gfonts', '//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700', array(), '1.0', 'all');
    wp_enqueue_style('meal-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-animate-css', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-magnific-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-aos-css', get_template_directory_uri() . '/assets/css/aos.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-datepicker-css', get_template_directory_uri() . '/assets/css/bootstrap-datepicker.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-timepicker-css', get_template_directory_uri() . '/assets/css/jquery.timepicker.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-ionicons-css', get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-font-awesome-css', get_template_directory_uri() . '/assets/fonts/fontawesome/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-flaticon-css', get_template_directory_uri() . '/assets/fonts/flaticon/font/flaticon.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-portfolio-css', get_template_directory_uri() . '/assets/css/portfolio.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-main-style-css', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('meal-theme-style', get_stylesheet_uri(), array(), MEAL_VERSION, 'all');

    wp_enqueue_script('meal-popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-waypoints-js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-magnific-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-datepicker-js', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-timepicker-js', get_template_directory_uri() . '/assets/js/jquery.timepicker.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-stellar-js', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-aos-js', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-gfonts-js', '//maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false', array(), '1.0', true);
    wp_enqueue_script('meal-imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-portfolio-js', get_template_directory_uri() . '/assets/js/portfolio.js', array('jquery'), '1.0', true);
    wp_enqueue_script('meal-load_more-js', get_template_directory_uri() . '/assets/js/load_more.js', array('jquery'), MEAL_VERSION, true);

    if(is_page_template('page-templates/landing-page.php')):

        wp_enqueue_script('meal-reservation-js', get_template_directory_uri() . '/assets/js/reservation.js', array('jquery'), '1.0', true);
        wp_enqueue_script('meal-contact-js', get_template_directory_uri() . '/assets/js/contact.js', array('jquery'), '1.0', true);

        $ajaxurl = admin_url('admin-ajax.php');
        wp_localize_script( 'meal-reservation-js', 'mealurl', array('ajaxurl'=>$ajaxurl) );
        wp_localize_script( 'meal-contact-js', 'mealurl', array('ajaxurl'=>$ajaxurl) );

    endif;

    wp_enqueue_script('meal-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meal_assets' );

function meal_classic_editor_styles()
{

    $classic_editor_styles = array(
        '/assets/css/editor-style.css',
    );

    add_editor_style($classic_editor_styles);
}

add_action('init', 'meal_classic_editor_styles');