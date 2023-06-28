<?php
/**
 * Calls in content using theme hooks.
 *
 * @package thebase
 */

namespace TheBase;

use function get_template_part;

defined( 'ABSPATH' ) || exit;

/**
 * Archive Content
 */
function archive_markup() {
	get_template_part( 'template-parts/content/archive', get_post_type() );
}

/**
 * Get Archive header classes.
 *
 * @return array $classes for the archive header.
 */
function get_archive_hero_classes() {
	$slug      = ( is_search() && ! is_post_type_archive( 'product' ) ? 'search' : get_post_type() );
	if ( empty( $slug ) ) {
		$queried_object = get_queried_object();
		if ( property_exists( $queried_object, 'taxonomy' ) ) {
			$current_tax = get_taxonomy( $queried_object->taxonomy );
			if ( property_exists( $current_tax, 'object_type' ) ) {
				$post_types = $current_tax->object_type;
				$slug = $post_types[0];
			}
		}
	}
	$classes   = array();
	$classes[] = 'entry-hero';
	$classes[] = $slug . '-archive-hero-section';
	$classes[] = 'entry-hero-layout-' . ( thebase()->option( $slug . '_archive_title_inner_layout' ) ? thebase()->option( $slug . '_archive_title_inner_layout' ) : 'inherit' );

	return apply_filters( 'thebase_archive_hero_classes', $classes );
}

/**
 * Get Archive header classes.
 *
 * @return array $classes for the archive header.
 */
function get_archive_title_classes() {
	$slug      = ( is_search() && ! is_post_type_archive( 'product' ) ? 'search' : get_post_type() );
	if ( empty( $slug ) ) {
		$queried_object = get_queried_object();
		if ( property_exists( $queried_object, 'taxonomy' ) ) {
			$current_tax = get_taxonomy( $queried_object->taxonomy );
			if ( property_exists( $current_tax, 'object_type' ) ) {
				$post_types = $current_tax->object_type;
				$slug = $post_types[0];
			}
		}
	}
	$classes   = array();
	$classes[] = 'entry-header';
	$classes[] = $slug . '-archive-title';
	$classes[] = 'title-align-' . ( thebase()->sub_option( $slug . '_archive_title_align', 'desktop' ) ? thebase()->sub_option( $slug . '_archive_title_align', 'desktop' ) : 'inherit' );
	$classes[] = 'title-tablet-align-' . ( thebase()->sub_option( $slug . '_archive_title_align', 'tablet' ) ? thebase()->sub_option( $slug . '_archive_title_align', 'tablet' ) : 'inherit' );
	$classes[] = 'title-mobile-align-' . ( thebase()->sub_option( $slug . '_archive_title_align', 'mobile' ) ? thebase()->sub_option( $slug . '_archive_title_align', 'mobile' ) : 'inherit' );
	return apply_filters( 'thebase_archive_title_classes', $classes );
}

/**
 * Get Archive container classes.
 *
 * @return array $classes for the archive container.
 */
function get_archive_container_classes() {
	$classes   = array();
	$classes[] = 'content-wrap';
	$classes[] = 'grid-cols';
	if ( is_search() ) {
		$classes[] = 'search-archive';
		if ( '1' === thebase()->option( 'search_archive_columns' ) ) {
			$placement    = thebase()->option( 'search_archive_item_image_placement' );
			$classes[] = 'grid-sm-col-1';
			$classes[] = 'grid-lg-col-1';
			$classes[] = 'item-image-style-' . $placement;
		} elseif ( '2' === thebase()->option( 'search_archive_columns' ) ) {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-2';
			$classes[] = 'item-image-style-above';
		} elseif ( '4' === thebase()->option( 'search_archive_columns' ) ) {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-4';
			$classes[] = 'item-image-style-above';
		} else {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-3';
			$classes[] = 'item-image-style-above';
		}
	} elseif ( 'post' === get_post_type() ) {
		$classes[] = 'post-archive';
		if ( '1' === thebase()->option( 'post_archive_columns' ) ) {
			$placement    = thebase()->option( 'post_archive_item_image_placement' );
			if ( 'beside' === $placement ) {
				$classes[] = 'item-content-vertical-align-' . thebase()->option( 'post_archive_item_vertical_alignment', 'top' );
			}
			$classes[] = 'grid-sm-col-1';
			$classes[] = 'grid-lg-col-1';
			$classes[] = 'item-image-style-' . $placement;
		} elseif ( '2' === thebase()->option( 'post_archive_columns' ) ) {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-2';
			$classes[] = 'item-image-style-above';
		} elseif ( '4' === thebase()->option( 'post_archive_columns' ) ) {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-4';
			$classes[] = 'item-image-style-above';
		} else {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-3';
			$classes[] = 'item-image-style-above';
		}
	} elseif ( thebase()->option( get_post_type() . '_archive_columns' ) ) {
		$classes[] = get_post_type() . '-archive';
		if ( '1' === thebase()->option( get_post_type() . '_archive_columns' ) ) {
			$placement = thebase()->option( get_post_type() . '_archive_item_image_placement', 'above' );
			$classes[] = 'grid-sm-col-1';
			$classes[] = 'grid-lg-col-1';
			$classes[] = 'item-image-style-' . $placement;
		} elseif ( '2' === thebase()->option( get_post_type() . '_archive_columns' ) ) {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-2';
			$classes[] = 'item-image-style-above';
		} elseif ( '4' === thebase()->option( get_post_type() . '_archive_columns' ) ) {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-4';
			$classes[] = 'item-image-style-above';
		} else {
			$classes[] = 'grid-sm-col-2';
			$classes[] = 'grid-lg-col-3';
			$classes[] = 'item-image-style-above';
		}
	} else {
		$classes[] = 'post-archive';
		$classes[] = 'grid-sm-col-2';
		$classes[] = 'grid-lg-col-3';
	}
	return apply_filters( 'thebase_archive_container_classes', $classes );
}

/**
 * Get Archive infinite attributes
 *
 * @return string $attributes for the archive container.
 */
function get_archive_infinite_attributes() {
	$attributes = '';
	return apply_filters( 'thebase_archive_infinite_attributes', $attributes );
}
/**
 * Get loop entry template.
 */
function loop_entry() {
	get_template_part( 'template-parts/content/entry', get_post_type() );
}

/**
 * Get loop entry thumbnail template.
 */
function loop_entry_thumbnail() {
	get_template_part( 'template-parts/content/entry_loop_thumbnail', get_post_type() );
}

/**
 * Get loop entry header template.
 */
function loop_entry_header() {
	get_template_part( 'template-parts/content/entry_loop_header', get_post_type() );
}
/**
 * Get loop entry content template.
 */
function loop_entry_summary() {
	get_template_part( 'template-parts/content/entry_summary', get_post_type() );
}
/**
 * Get loop entry footer template.
 */
function loop_entry_footer() {
	get_template_part( 'template-parts/content/entry_loop_footer', get_post_type() );
}
/**
 * Get loop entry taxonomies template.
 */
function loop_entry_taxonomies() {
	get_template_part( 'template-parts/content/entry_loop_taxonomies', get_post_type() );
}
/**
 * Get loop entry title template.
 */
function loop_entry_title() {
	get_template_part( 'template-parts/content/entry_loop_title', get_post_type() );
}
/**
 * Get loop entry meta template.
 */
function loop_entry_meta() {
	get_template_part( 'template-parts/content/entry_loop_meta', get_post_type() );
}
