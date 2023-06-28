<?php
/**
 * Template part for displaying the footer info
 *
 * @package thebase
 */

namespace TheBase;

if ( thebase()->has_content() ) {
	thebase()->print_styles( 'thebase-content' );
}
thebase()->print_styles( 'thebase-footer' );

?>
<footer id="colophon" class="site-footer">
	<div class="site-footer-wrap">
		<?php
		/**
		 * TheBase Top footer
		 *
		 * Hooked TheBase\top_footer
		 */
		do_action( 'thebase_top_footer' );
		/**
		 * TheBase Middle footer
		 *
		 * Hooked TheBase\middle_footer
		 */
		do_action( 'thebase_middle_footer' );
		/**
		 * TheBase Bottom footer
		 *
		 * Hooked TheBase\bottom_footer
		 */
		do_action( 'thebase_bottom_footer' );
		?>
	</div>
</footer><!-- #colophon -->

