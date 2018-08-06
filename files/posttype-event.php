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