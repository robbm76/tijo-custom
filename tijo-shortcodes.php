<?php
/*
   Plugin Name: Tijo Shortcodes
   Plugin URI: http://wordpress.org/extend/plugins/tijo-shortcodes/
   Version: 1.0
   Author: Josh Horneck
   Author URI: http://tijo.io
   Description: This plugin contains a CPT and Taxonomy generator and basic shortcodes like tabs, accordions, Genesis columns, buttons and more.
   Text Domain: tijo-custom
   License: GPLv3
  */

//Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

// Load Shortcodes
require_once ( plugin_dir_path(__FILE__) . '/includes/shortcodes.php');
// Load CPT Helper
require_once( plugin_dir_path( __FILE__ ) . '/includes/core-classes/CPT_Core/CPT_Core.php' );
// Load Taxonomy Helper
require_once( plugin_dir_path( __FILE__ ) . '/includes/core-classes/Taxonomy_Core/Taxonomy_Core.php' );
// Load CPT/tax registration
require_once ( plugin_dir_path(__FILE__) . '/includes/custom-content.php');

// enqueue jqueryui script
function tijo_jqueryui_ui_scripts() {
    wp_enqueue_script('custom-scripts', plugin_dir_url(__FILE__) . '/js/scripts.js', array('jquery'));
    add_action( 'plugins_loaded', array( 'tijo-shortcodes', 'get_instance' ) );
}

add_action('wp_enqueue_scripts', 'tijo_jqueryui_ui_scripts');