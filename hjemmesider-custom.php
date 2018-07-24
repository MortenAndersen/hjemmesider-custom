<?php
/*
Plugin Name: Custom style - Hjemmesider.dk
Plugin URI: <a href="https://www.hjemmesider.dk"<br />
Description:</a> Tilføj ny funktionalitet til WordPress hjemmeside
Version: 1.1
Author: Hjemmesider.dk
Author URI: https://www.hjemmesider.dk.dk
*/

// CSS filer

add_action('wp_enqueue_scripts', 'hjemmesider_custom_register_plugin_styles', 15);
function hjemmesider_custom_register_plugin_styles() {
    wp_register_style('hc-grid', plugins_url('hjemmesider-custom/css/hc-default.css'));
    wp_enqueue_style('hc-grid');

    wp_register_style('hc-box', plugins_url('hjemmesider-custom/css/hc-box.css'));
    wp_enqueue_style('hc-box');

    wp_register_style('hc-tab', plugins_url('hjemmesider-custom/css/hc-tab.css'));
    wp_enqueue_style('hc-tab');

    wp_register_style('hc-lightbox', plugins_url('hjemmesider-custom/css/hc-lightbox.css'));
    wp_enqueue_style('hc-lightbox');
}

// Script filer

function hc_scripts() {
    // BX Slider
	wp_register_script('hc_script_bx_slider', plugins_url() . '/hjemmesider-custom/js/jquery.bxslider.min.js', array('jquery'));
    wp_enqueue_script('hc_script_bx_slider');
    // Lightbox
    wp_register_script('hc_script_bx_lightbox', plugins_url() . '/hjemmesider-custom/js/lightbox.js', array('jquery'));
    wp_enqueue_script('hc_script_bx_lightbox');
    // Plugin js
    wp_register_script('hc_script', plugins_url() . '/hjemmesider-custom/js/hc-script.js', array('jquery', 'jquery-ui-accordion'),'',true);
    wp_enqueue_script('hc_script');
}
add_action('wp_enqueue_scripts', 'hc_scripts');



// BOX
require_once ('files/acf-box-fields.php');
require_once ('files/shortcode-box.php');

// ACCORDION
require_once ('files/acf-accordion-fields.php');
require_once ('files/shortcode-accordion.php');

// TABS
require_once ('files/acf-tabs-fields.php');
require_once ('files/shortcode-tabs.php');

// FILER
require_once ('files/acf-filer-fields.php');
require_once ('files/shortcode-filer.php');

// BILLEDGALLERI
require_once ('files/acf-galleri-fields.php');
require_once ('files/shortcode-galleri.php');

// WP LOOP
require_once ('files/shortcode-wp-loop.php');

// EVENTS
// require_once ('files/shortcode-event.php');
// require_once ('files/posttype.php');