<?php
/**
 * Template part for displaying the header
 *
 * @package thebase
 */

namespace TheBase;

thebase()->print_styles( 'thebase-header' );
?>
<header id="masthead" class="site-header"  <?php thebase()->print_microdata( 'header' ); ?>>
	<div id="main-header" class="site-header-wrap">
		<div class="site-header-inner-wrap<?php echo esc_attr( 'top_main_bottom' === thebase()->option( 'header_sticky' ) ? ' thebase-sticky-header' : '' ); ?>"<?php
		if ( 'top_main_bottom' === thebase()->option( 'header_sticky' ) ) {
			echo ' data-reveal-scroll-up="' . ( thebase()->option( 'header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
			echo ' data-shrink="' . ( thebase()->option( 'header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
			if ( thebase()->option( 'header_sticky_shrink' ) ) {
				echo ' data-shrink-height="' . esc_attr( thebase()->sub_option( 'header_sticky_main_shrink', 'size' ) ) . '"';
			}
		}
		?>>
			<div class="site-header-upper-wrap">
				<div class="site-header-upper-inner-wrap<?php echo esc_attr( 'top_main' === thebase()->option( 'header_sticky' ) ? ' thebase-sticky-header' : '' ); ?>"<?php
				if ( 'top_main' === thebase()->option( 'header_sticky' ) ) {
					echo ' data-reveal-scroll-up="' . ( thebase()->option( 'header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
					echo ' data-shrink="' . ( thebase()->option( 'header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
					if ( thebase()->option( 'header_sticky_shrink' ) ) {
						echo ' data-shrink-height="' . esc_attr( thebase()->sub_option( 'header_sticky_main_shrink', 'size' ) ) . '"';
					}
				}
				?>>
					<?php
					/**
					 * TheBase Top Header
					 *
					 * Hooked TheBase\top_header
					 */
					do_action( 'thebase_top_header' );
					/**
					 * TheBase Main Header
					 *
					 * Hooked TheBase\main_header
					 */
					do_action( 'thebase_main_header' );
					?>
				</div>
			</div>
			<?php
			/**
			 * TheBase Bottom Header
			 *
			 * Hooked TheBase\bottom_header
			 */
			do_action( 'thebase_bottom_header' );
			?>
		</div>
	</div>
	<?php
	/**
	 * TheBase Mobile Header
	 *
	 * Hooked TheBase\mobile_header
	 */
	do_action( 'thebase_mobile_header' );
	?>
</header><!-- #masthead -->
