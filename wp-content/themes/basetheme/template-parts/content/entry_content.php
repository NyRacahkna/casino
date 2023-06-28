<?php
/**
 * Template part for displaying a post's content
 *
 * @package thebase
 */

namespace TheBase;

?>

<div class="<?php echo esc_attr( apply_filters( 'thebase_entry_content_class', 'entry-content single-content' ) ); ?>">
	<?php
	do_action( 'thebase_single_before_entry_content' );

	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'basetheme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basetheme' ),
			'after'  => '</div>',
		)
	);
	do_action( 'thebase_single_after_entry_content' );
	?>
</div><!-- .entry-content -->
