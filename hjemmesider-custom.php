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


// OPTION PAGE
require_once ('files/option-page.php');

// vars from OPTION PAGE
$hc_custom_options = get_field('hc_custom_options', 'option');

// BOX
if( $hc_custom_options && in_array('Box', $hc_custom_options) ) {
require_once ('files/acf-box-fields.php');
require_once ('files/shortcode-box.php');
};

// ACCORDION
if( $hc_custom_options && in_array('Accordion', $hc_custom_options) ) {
require_once ('files/acf-accordion-fields.php');
require_once ('files/shortcode-accordion.php');
};

// TABS
if( $hc_custom_options && in_array('Tab', $hc_custom_options) ) {
require_once ('files/acf-tabs-fields.php');
require_once ('files/shortcode-tabs.php');
};

// FILER
if( $hc_custom_options && in_array('File', $hc_custom_options) ) {
require_once ('files/acf-filer-fields.php');
require_once ('files/shortcode-filer.php');
};

// BILLEDGALLERI
if( $hc_custom_options && in_array('Gallery', $hc_custom_options) ) {
require_once ('files/acf-galleri-fields.php');
require_once ('files/shortcode-galleri.php');
};

// WP LOOP
if( $hc_custom_options && in_array('Loop', $hc_custom_options) ) {
require_once ('files/shortcode-wp-loop.php');
};

// PERSON
if( $hc_custom_options && in_array('Person', $hc_custom_options) ) {
require_once ('files/posttype-person.php');
require_once ('files/acf-person-fields.php');
require_once ('files/shortcode-person.php');
};

// EVENTS
if( $hc_custom_options && in_array('Event', $hc_custom_options) ) {
require_once ('files/shortcode-event.php');
require_once ('files/posttype-event.php');
};
