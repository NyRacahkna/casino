<?php
/**
 * The main archive template file
 *
 * @package thebase
 */

namespace TheBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

thebase()->print_styles( 'thebase-content' );
/**
 * Hook for main archive content.
 */
do_action( 'thebase_archive' );

get_footer();
