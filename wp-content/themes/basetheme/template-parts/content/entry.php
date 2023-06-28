<?php
/**
 * Template part for displaying a post
 *
 * @package thebase
 */

namespace TheBase;

?>

<article <?php post_class( 'entry content-bg loop-entry' ); ?>>
	<?php
		/**
		 * Hook for entry thumbnail.
		 *
		 * @hooked TheBase\loop_entry_thumbnail
		 */
		do_action( 'thebase_loop_entry_thumbnail' );
	?>
	<div class="entry-content-wrap">
		<?php
		/**
		 * Hook for entry content.
		 *
		 * @hooked TheBase\loop_entry_header - 10
		 * @hooked TheBase\loop_entry_summary - 20
		 * @hooked TheBase\loop_entry_footer - 30
		 */
		do_action( 'thebase_loop_entry_content' );
		?>
	</div>
</article>
