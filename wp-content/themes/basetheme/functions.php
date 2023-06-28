<?php
/**
 * TheBase functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thebase
 */

define( 'basetheme_VERSION', '1.0.0' );
define( 'basetheme_MINIMUM_WP_VERSION', '5.2' );
define( 'basetheme_MINIMUM_PHP_VERSION', '7.0' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], basetheme_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), basetheme_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Load the `thebase()` entry point function.
require get_template_directory() . '/inc/class-theme.php';

// Load the `thebase()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'TheBase\thebase' );


add_theme_support( "wp-block-styles" );
add_theme_support( "custom-logo");
add_theme_support( "custom-header");
add_theme_support( "custom-background");
add_theme_support( 'register_block_style' );
add_theme_support( 'register_block_pattern' );

