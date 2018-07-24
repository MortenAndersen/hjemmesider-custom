<?php
// POSTTYPE

add_action( 'init', 'hjemmesider_custom_create_posttype' );
function hjemmesider_custom_create_posttype() {


   // Event
    register_post_type('hjemmesider_event', array('labels' => array('name' => __('Events', 'pp-domain'), 'singular_name' => __('Event', 'pp-domain')), 'public' => true, 'has_archive' => true, 'menu_icon' => 'dashicons-welcome-write-blog', 'supports' => array('title', 'editor', 'thumbnail'), 'rewrite' => array('slug' => 'event'),));

}

function hjemmesider_custom_function() {
    hjemmesider_costom_create_posttype();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'hjemmesider_custom_function' );