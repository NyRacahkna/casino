<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package thebase
 */

namespace TheBase;

get_header();

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

thebase()->print_styles( 'thebase-content' );
/**
 * Hook for everything, makes for better elementor theming support.
 */
do_action( 'thebase_single' );

get_footer();
