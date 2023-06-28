<?php
/**
 * Template part for displaying a pagination
 *
 * @package thebase
 */

namespace TheBase;

the_posts_pagination(
	apply_filters(
		'thebase_pagination_args',
		array(
			'mid_size'           => 2,
			'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous Page', 'basetheme' ) . '</span>' . thebase()->get_icon( 'arrow-left', _x( 'Previous', 'previous set of archive results', 'basetheme' ) ),
			'next_text'          => '<span class="screen-reader-text">' . __( 'Next Page', 'basetheme' ) . '</span>' . thebase()->get_icon( 'arrow-right', _x( 'Next', 'next set of archive results', 'basetheme' ) ),
			'screen_reader_text' => __( 'Page navigation', 'basetheme' ),
		)
	)
);
