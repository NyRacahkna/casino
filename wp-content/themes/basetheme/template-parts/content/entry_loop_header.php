<?php
/**
 * Template part for displaying a post's header
 *
 * @package thebase
 */

namespace TheBase;

?>
<header class="entry-header">

	<?php
	/**
	 * Hook for entry header.
	 *
	 * @hooked TheBase\loop_entry_taxonomies - 10
	 * @hooked TheBase\loop_entry_title - 20
	 * @hooked TheBase\loop_entry_meta - 30
	 */
	do_action( 'thebase_loop_entry_header' );
	?>
</header><!-- .entry-header -->
