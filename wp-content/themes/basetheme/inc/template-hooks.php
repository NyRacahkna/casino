<?php
/**
 * Calls in content using theme hooks.
 *
 * @package thebase
 */

namespace TheBase;

use function TheBase\thebase;
use function add_action;

defined( 'ABSPATH' ) || exit;

/**
 * TheBase Header.
 *
 * @see TheBase\header_markup();
 */
add_action( 'thebase_header', 'TheBase\header_markup' );

/**
 * TheBase Header Rows
 *
 * @see TheBase\top_header();
 * @see TheBase\main_header();
 * @see TheBase\bottom_header();
 */
add_action( 'thebase_top_header', 'TheBase\top_header' );
add_action( 'thebase_main_header', 'TheBase\main_header' );
add_action( 'thebase_bottom_header', 'TheBase\bottom_header' );

/**
 * TheBase Header Columns
 *
 * @see TheBase\header_column();
 */
add_action( 'thebase_render_header_column', 'TheBase\header_column', 10, 2 );

/**
 * TheBase Mobile Header
 *
 * @see TheBase\mobile_header();
 */
add_action( 'thebase_mobile_header', 'TheBase\mobile_header' );

/**
 * TheBase Mobile Header Rows
 *
 * @see TheBase\mobile_top_header();
 * @see TheBase\mobile_main_header();
 * @see TheBase\mobile_bottom_header();
 */
add_action( 'thebase_mobile_top_header', 'TheBase\mobile_top_header' );
add_action( 'thebase_mobile_main_header', 'TheBase\mobile_main_header' );
add_action( 'thebase_mobile_bottom_header', 'TheBase\mobile_bottom_header' );

/**
 * TheBase Mobile Header Columns
 *
 * @see TheBase\mobile_header_column();
 */
add_action( 'thebase_render_mobile_header_column', 'TheBase\mobile_header_column', 10, 2 );

/**
 * Desktop Header Elements.
 *
 * @see TheBase\site_branding();
 * @see TheBase\primary_navigation();
 * @see TheBase\secondary_navigation();
 * @see TheBase\header_html();
 * @see TheBase\header_button();
 * @see TheBase\header_cart();
 * @see TheBase\header_social();
 * @see TheBase\header_search();
 */
add_action( 'thebase_site_branding', 'TheBase\site_branding' );
add_action( 'thebase_primary_navigation', 'TheBase\primary_navigation' );
add_action( 'thebase_secondary_navigation', 'TheBase\secondary_navigation' );
add_action( 'thebase_header_html', 'TheBase\header_html' );
add_action( 'thebase_header_button', 'TheBase\header_button' );
add_action( 'thebase_header_cart', 'TheBase\header_cart' );
add_action( 'thebase_header_social', 'TheBase\header_social' );
add_action( 'thebase_header_search', 'TheBase\header_search' );
/**
 * Mobile Header Elements.
 *
 * @see TheBase\mobile_site_branding();
 * @see TheBase\navigation_popup_toggle();
 * @see TheBase\mobile_navigation();
 * @see TheBase\mobile_html();
 * @see TheBase\mobile_button();
 * @see TheBase\mobile_cart();
 * @see TheBase\mobile_social();
 * @see TheBase\primary_navigation();
 */
add_action( 'thebase_mobile_site_branding', 'TheBase\mobile_site_branding' );
add_action( 'thebase_navigation_popup_toggle', 'TheBase\navigation_popup_toggle' );
add_action( 'thebase_mobile_navigation', 'TheBase\mobile_navigation' );
add_action( 'thebase_mobile_html', 'TheBase\mobile_html' );
add_action( 'thebase_mobile_button', 'TheBase\mobile_button' );
add_action( 'thebase_mobile_cart', 'TheBase\mobile_cart' );
add_action( 'thebase_mobile_social', 'TheBase\mobile_social' );

/**
 * Hero Title
 *
 * @see TheBase\hero_title();
 */
add_action( 'thebase_hero_header', 'TheBase\hero_title' );

/**
 * Page Title area
 *
 * @see TheBase\thebase_entry_header();
 */
add_action( 'thebase_entry_hero', 'TheBase\thebase_entry_header', 10, 2 );
add_action( 'thebase_entry_header', 'TheBase\thebase_entry_header', 10, 2 );

/**
 * Archive Title area
 *
 * @see TheBase\thebase_entry_archive_header();
 */
add_action( 'thebase_entry_archive_hero', 'TheBase\thebase_entry_archive_header', 10, 2 );
add_action( 'thebase_entry_archive_header', 'TheBase\thebase_entry_archive_header', 10, 2 );

/**
 * Singular Content
 *
 * @see TheBase\single_markup();
 */
add_action( 'thebase_single', 'TheBase\single_markup' );

/**
 * Singular Inner Content
 *
 * @see TheBase\single_content();
 */
add_action( 'thebase_single_content', 'TheBase\single_content' );

/**
 * 404 Content
 *
 * @see TheBase\get_404_content();
 */
add_action( 'thebase_404_content', 'TheBase\get_404_content' );

/**
 * Comments List
 *
 * @see TheBase\comments_list();
 */
add_action( 'thebase_comments', 'TheBase\comments_list' );

/**
 * Comment Form
 *
 * @see TheBase\comments_form();
 */
function check_comments_form_order() {
	$priority = ( thebase()->option( 'comment_form_before_list' ) ? 5 : 15 );
	add_action( 'thebase_comments', 'TheBase\comments_form', $priority );
}
add_action( 'thebase_comments', 'TheBase\check_comments_form_order', 1 );
/**
 * Archive Content
 *
 * @see TheBase\archive_markup();
 */
add_action( 'thebase_archive', 'TheBase\archive_markup' );

/**
 * Archive Entry Content.
 *
 * @see TheBase\loop_entry();
 */
add_action( 'thebase_loop_entry', 'TheBase\loop_entry' );

/**
 * Archive Entry thumbnail.
 *
 * @see TheBase\loop_entry_thumbnail();
 */
add_action( 'thebase_loop_entry_thumbnail', 'TheBase\loop_entry_thumbnail' );

/**
 * Archive Entry header.
 *
 * @see TheBase\loop_entry_header();
 */
add_action( 'thebase_loop_entry_content', 'TheBase\loop_entry_header', 10 );
/**
 * Archive Entry Summary.
 *
 * @see TheBase\loop_entry_summary();
 */
add_action( 'thebase_loop_entry_content', 'TheBase\loop_entry_summary', 20 );
/**
 * Archive Entry Footer.
 *
 * @see TheBase\loop_entry_footer();
 */
add_action( 'thebase_loop_entry_content', 'TheBase\loop_entry_footer', 30 );

/**
 * Archive Entry Taxonomies.
 *
 * @see TheBase\loop_entry_taxonomies();
 */
add_action( 'thebase_loop_entry_header', 'TheBase\loop_entry_taxonomies', 10 );
/**
 * Archive Entry Title.
 *
 * @see TheBase\loop_entry_title();
 */
add_action( 'thebase_loop_entry_header', 'TheBase\loop_entry_title', 20 );
/**
 * Archive Entry Meta.
 *
 * @see TheBase\loop_entry_meta();
 */
add_action( 'thebase_loop_entry_header', 'TheBase\loop_entry_meta', 30 );

/**
 * Main Call for footer
 *
 * @see TheBase\footer_markup();
 */
add_action( 'thebase_footer', 'TheBase\footer_markup' );

/**
 * Footer Top Row
 *
 * @see TheBase\top_footer();
 */
add_action( 'thebase_top_footer', 'TheBase\top_footer' );

/**
 * Footer Middle Row
 *
 * @see TheBase\middle_footer()
 */
add_action( 'thebase_middle_footer', 'TheBase\middle_footer' );

/**
 * Footer Bottom Row
 *
 * @see TheBase\bottom_footer()
 */
add_action( 'thebase_bottom_footer', 'TheBase\bottom_footer' );

/**
 * Footer Column
 *
 * @see TheBase\footer_column()
 */
add_action( 'thebase_render_footer_column', 'TheBase\footer_column', 10, 2 );


/**
 * Footer Elements
 *
 * @see TheBase\footer_html();
 * @see TheBase\footer_navigation()
 * @see TheBase\footer_social()
 */
add_action( 'thebase_footer_html', 'TheBase\footer_html' );
add_action( 'thebase_footer_navigation', 'TheBase\footer_navigation' );
add_action( 'thebase_footer_social', 'TheBase\footer_social' );

/**
 * WP Footer.
 *
 * @see TheBase\scroll_up();
 */
add_action( 'wp_footer', 'TheBase\scroll_up' );
