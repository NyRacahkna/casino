<?php
/**
 * The main single item template file.
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
 * Hook for everything, makes for better elementor theming support.
 */
do_action( 'thebase_single' );

get_footer();
