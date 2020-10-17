<?php 

if(site_url() == "http://localhost/meal") {
    define("MEAL_VERSION", time() );
} else {
    define("MEAL_VERSION", wp_get_theme() -> get("Version") );
}

function get_recipe_category($recipe_id) {
    $terms = wp_get_post_terms( $recipe_id, 'category');
    if($terms){
        $first_term = array_shift($terms);
        return $first_term->name;
    }
}

require_once get_template_directory() . '/inc/theme_setup.php';
require_once get_template_directory() . '/inc/theme_assets.php';
require_once get_template_directory() . '/inc/theme_menus.php';
require_once get_template_directory() . '/inc/tgm.php';
require_once get_template_directory() . '/lib/cs-framework/cs-framework.php';
require_once get_template_directory() . '/inc/cs-framework/init.php';
require_once get_template_directory() . '/inc/cs-framework/section-type-metabox.php';
require_once get_template_directory() . '/inc/cs-framework/page-metabox.php';
require_once get_template_directory() . '/inc/cs-framework/section-banner.php';
require_once get_template_directory() . '/inc/cs-framework/section-featured.php';
require_once get_template_directory() . '/inc/cs-framework/section-gallery.php';
require_once get_template_directory() . '/inc/cs-framework/section-chef.php';
require_once get_template_directory() . '/inc/cs-framework/section-service.php';
require_once get_template_directory() . '/inc/cs-framework/taxonomy-featured.php';
require_once get_template_directory() . '/inc/cs-framework/recipe-metabox.php';

function meal_blog_post_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'meal_blog_post_excerpt_length', 999 );

function meal_comment_form_fields($fields) {
    $comment_field = $fields['comment'];
    $cookies_field = $fields['cookies'];
    
    unset( $fields['comment'] );
    unset( $fields['cookies'] );

    $fields['comment'] = $comment_field;

    return $fields;
}
add_filter('comment_form_fields', 'meal_comment_form_fields');

function get_max_page_number() {
    global $wp_query;
    return $wp_query->max_num_pages;
}

function meal_process_reservation() {
    if(check_ajax_referer( 'reservation', 'rn' )){
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_text_field($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $persons = sanitize_text_field($_POST['persons']);
        $date = sanitize_text_field($_POST['date']);
        $time = sanitize_text_field($_POST['time']);

        $data = array(
            'name'  =>  $name,
            'email' =>  $email,
            'phone' =>  $phone,
            'persons'=> $persons,
            'date'  =>  $date,
            'time'  =>  $time
        );

        $reservation_args = array( 
            'post_type'     =>  'reservation',
            'post_author'   =>  1,
            'post_date'     =>  date('Y-m-d H:i:s'),
            'post_status'   =>  'publish',
            'post_title'    =>  sprintf('%s - Reservation for %s persons on %s - %s', $name, $persons, $date . " : " . $time, $email ),
            'meta_input'     =>  $data
        );

        $reservations = new WP_Query(array( 
            'post_type'     =>  'reservation',
            'post_status'   =>  'publish',
            'meta_query'    =>  array( 
                'relation'      =>  'AND',
                'email_check'   =>  array(
                    'key'       =>  'email',
                    'value'    =>  $email
                ),
                
                'date_check'   =>  array(
                    'key'       =>  'date',
                    'value'    =>  $date
                ),
                
                'time_check'   =>  array(
                    'key'       =>  'time',
                    'value'    =>  $time
                ),

            )
        ));
        if($reservations->found_posts>0){
            echo 'Duplicate';
        }else {
            $wp_error = "";
            wp_insert_post( $reservation_args, $wp_error );
            if(! $wp_error){
                echo "Successful";
            }
        }
    }else {
        echo "Not allowed";
    }
    die();
}
add_action('wp_ajax_reservation', 'meal_process_reservation');
add_action('wp_ajax_nopriv_reservation', 'meal_process_reservation');

function meal_contact_email() {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $message = isset($_POST['message']) ? $_POST['message'] : "";

    $_message = sprintf("%s \nFrom: %s\nEmail: %s\nPhone: %s", $message, $name, $email, $phone );

    $admin_email = get_option('admin_email');
    wp_mail($admin_email, __('New Message ', 'meal'), $_message, "From: saifur703@gmail.com\r\n");
    die("Mail sent successful");
}
add_action('wp_ajax_contact', 'meal_contact_email');
add_action('wp_ajax_nopriv_contact', 'meal_contact_email');