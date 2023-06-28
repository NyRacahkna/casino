<?php
/*
  Plugin Name: Custom Shortcodes
  Description: custom Custom Shortcodes for custom wordpress themes.
  Version: 1.0
  Author: custom
 */
?>
<?php  if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
?>
<?php 
 // Before VC Init
if ( ! defined( 'TM_SHORTCODE_DIR' ) ) {
define( 'TM_SHORTCODE_DIR', plugin_dir_path( __FILE__ ) );  
}
if ( ! defined( 'TM_SHORTCODE_URL' ) ) {
	define( 'TM_SHORTCODE_URL', plugin_dir_url( __FILE__ ) );
}
    //.. Code from other Tutorials ..//
function excursion_shortcode_init()
{
    // Require new custom Element
    require_once( TM_SHORTCODE_DIR.'/shortcodes/custom-shortcodes.php' ); 
}
add_action('excursion_shortcode_init', 'excursion_shortcode_init');
function excursion_shortcode_install() { 
	do_action( 'excursion_shortcode_init' );
}
add_action( 'plugins_loaded', 'excursion_shortcode_install', 11 );
function excursion_add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
	}
add_filter('upload_mimes', 'excursion_add_file_types_to_uploads');
?>