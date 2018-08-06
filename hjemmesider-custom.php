<?php
/*
Plugin Name: Custom style - Hjemmesider.dk
Plugin URI: <a href="https://www.hjemmesider.dk"<br />
Description:</a> Tilføj ny funktionalitet til WordPress hjemmeside
Version: 1.1
Author: Hjemmesider.dk
Author URI: https://www.hjemmesider.dk.dk
*/

add_action('wp_enqueue_scripts', 'hjemmesider_custom_register_plugin_styles', 15);

// CSS filer
function hjemmesider_custom_register_plugin_styles() {
    wp_register_style('hc-style', plugins_url('hjemmesider-custom/css/style.min.css'));
    wp_enqueue_style('hc-style');
}

// Script filer
function hc_scripts() {
    wp_register_script('hc_script', plugins_url() . '/hjemmesider-custom/js/min/plugin.min.js', array('jquery', 'jquery-ui-accordion'),'',true);
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

// PERSON
require_once ('files/posttype-person.php');
require_once ('files/acf-person-fields.php');
require_once ('files/shortcode-person.php');

// EVENTS
// require_once ('files/shortcode-event.php');
require_once ('files/posttype-event.php');