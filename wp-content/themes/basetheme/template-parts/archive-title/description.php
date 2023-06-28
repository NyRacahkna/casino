<?php
/**
 * Template part for displaying the archive description
 *
 * @package thebase
 */

namespace TheBase;

if ( apply_filters( 'thebase_show_archive_description', ( is_tax() || is_category() || is_tag() || ( is_archive() && ! is_search() && ! is_post_type_archive( 'product' ) ) ) ) ) {
	the_archive_description( '<div class="archive-description">', '</div>' );
}
