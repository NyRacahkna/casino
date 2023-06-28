<?php
/**
 * TemplateMela functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */

// Activate WordPress Maintenance Mode
add_action('init', 'tm_wordpress_maintain');
function tm_wordpress_maintain() {
	if ( file_exists( ABSPATH . 'maintenance.php' ) ) {
		// we show this message if 1. you're not logged in, 2. you're not on /wp-admin/ (index.php is redirecting you to wp-login.php), 3. you're not on login page
		if ( !is_user_logged_in() && !is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php')) ) {
		
			header(($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.0').' 503 Service Temporarily Unavailable',true,503);
			header('Retry-After: 18000');
			header('X-Powered-By:'); //hide PHP

			// you can insert whatever you want :)
			include( ABSPATH . 'maintenance.php' );
			exit;
		}
	}
}
// Disable Autosave in WordPress 5.0+ version with Gutenberg Editor, WORKING IN WORDPRESS 5.9
add_filter( 'block_editor_settings', 'tm_block_editor_settings', 10, 2 );
function tm_block_editor_settings( $editor_settings, $post ) {
	$editor_settings['autosaveInterval'] = 9999999; //number of second [default value is 10]
	return $editor_settings;
}

// Disable xmlrpc for security
add_filter( 'xmlrpc_enabled', '__return_false' );

// DISABLED AUTHORS END POINT because of HACKS username
function tm_disable_rest_endpoints ( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
}
add_filter('rest_endpoints', 'tm_disable_rest_endpoints');
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');

// ERROR PAGE TITLE
add_filter( 'wp_die_handler', function () {
	 return function ( $message, $title, $args ) {
		 _default_wp_die_handler( $message, esc_html( get_bloginfo( 'name' ) ) . ' › Error', $args );
	 };
	 return '_default_wp_die_handler';
 });

 // DISABLE WP emojis to improve performance
add_action('init', 'tm_disable_emoji_feature');
function tm_disable_emoji_feature() {
	// Prevent Emoji from loading on the front-end
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove from admin area also
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 

	// Remove from RSS feeds also
	remove_filter( 'the_content_feed', 'wp_staticize_emoji');
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji');

	// Remove from Embeds
	remove_filter( 'embed_head', 'print_emoji_detection_script' );

	// Remove from emails
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Disable from TinyMCE editor. Currently disabled in block editor by default
	add_filter( 'tiny_mce_plugins', 'tm_disable_emojis_tinymce' );

    add_filter( 'emoji_svg_url', '__return_false' );
	
	// Finally, prevent character conversion too without this, emojis still work if it is available on the user's device
	add_filter( 'option_use_smilies', '__return_false' );

}
function tm_disable_emojis_tinymce( $plugins ) {
	if( is_array($plugins) ) {
		$plugins = array_diff( $plugins, array( 'wpemoji' ) );
	}
	return $plugins;
}

// Allow SVG to upload
add_filter(
	'wp_check_filetype_and_ext',
	function( $data, $file, $filename, $mimes ) {
		global $wp_version;
		$filetype = wp_check_filetype( $filename, $mimes );
		return array(
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		);
	},10,4 );

add_action( 'init', 'tm_override_page_support' );
function tm_override_page_support() {
    //remove_post_type_support( 'page', 'editor' );
    //remove_post_type_support( 'page', 'author' );
    //remove_post_type_support( 'page', 'comments' );
    //remove_post_type_support( 'page', 'thumbnail' );
    remove_post_type_support( 'page', 'excerpt' );
    //remove_post_type_support( 'page', 'page-attributes' );
    //remove_post_type_support( 'page', 'post-formats' );
    remove_post_type_support( 'page', 'revisions' );

	remove_post_type_support( 'post', 'revisions' );

	remove_post_type_support( 'page', 'disabled_post_lock' );
	remove_post_type_support( 'post', 'disabled_post_lock' );
	
}

add_action( 'wp', 'wpse_282498_wp' );
function wpse_282498_wp() {
	$page_layout = ( is_home() || is_front_page() ) ? 'fullwidth' : 'normal';
	$page_title  = ( is_home() || is_front_page() ) ? false : true;
	//echo $page_layout . ' ' . $page_title;
	if( is_front_page() ) {
		//add_filter( 'thebase_theme_options_defaults', 'add_option_defaults_home' , 10 );
	} else {
	//	add_filter( 'thebase_theme_options_defaults', 'add_option_defaults' , 10 );
	}
}
  
function add_option_defaults_home( $defaults ) {
	$update_options = array(
		'page_layout'             => 'fullwidth',
		'page_title'              => false,
		'page_content_style'      => 'unboxed',
	);
	$defaults = array_merge(
		$defaults,
		$update_options
	);
	return $defaults;
}

function add_option_defaults( $defaults ) {
	$update_options = array(
		'page_layout'             => 'normal',
		'page_title'              => true,
		'page_content_style'      => 'unboxed',
	);
	$defaults = array_merge(
		$defaults,
		$update_options
	);
	return $defaults;
}
// Load the `custom-theme` functions.
require get_stylesheet_directory() . '/inc/custom-theme.php';

add_action('wp_enqueue_scripts', 'child_enqueue_styles');
function child_enqueue_styles() {
	wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
	wp_enqueue_style( 'child-owlcarousel', get_stylesheet_directory_uri() . '/assets/css/owl-carousel.min.css', array(), 102);
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), 104);
}

// Custom Function
require get_stylesheet_directory() . '/custom/functions.php';

function tmpmela_load_scripts_child() {	
	wp_enqueue_script( 'child-min-theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), 101);
	wp_enqueue_script( 'child-min-migrate-theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery-migrate.min.js', array(), 102);
	wp_enqueue_script( 'child-theme-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), 103);
	wp_enqueue_script( 'child-owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owlcarousel.min.js', array(), 104);
}
add_action( 'wp_enqueue_scripts', 'tmpmela_load_scripts_child' );