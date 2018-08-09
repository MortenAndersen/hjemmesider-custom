<?php
// POSTTYPE

add_action( 'init', 'hjemmesider_custom_create_posttype_event' );
function hjemmesider_custom_create_posttype_event() {


   // Event
    register_post_type('hjemmesider_event', array('labels' => array('name' => __('Events', 'pp-domain'), 'singular_name' => __('Event', 'pp-domain')), 'public' => true, 'has_archive' => true, 'menu_icon' => 'dashicons-welcome-write-blog', 'supports' => array('title', 'editor', 'thumbnail'), 'rewrite' => array('slug' => 'event'),));

}

function hjemmesider_custom_function_event() {
    hjemmesider_costom_create_posttype_event();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'hjemmesider_custom_function_event' );


// ACF


//  Date Picker Validation --- Start Date should be less than End Date.

    add_action('acf/validate_save_post', 'my_acf_validate_save_post', 10, 0);

    function my_acf_validate_save_post()
    {

        $hc_event_start = $_POST['acf']['field_58d2edf8969c1'];
        $hc_event_start = new DateTime($hc_event_start);

        $hc_event_end = $_POST['acf']['field_58d2ee16969c2'];
        $hc_event_end = new DateTime($hc_event_end);

        // check custom $_POST data
            if ($hc_event_start > $hc_event_end) {
                acf_add_validation_error('name of datepicker field you want to display error message. ', 'End Date should be greater than or Equal to Start Date');
            }
    }
