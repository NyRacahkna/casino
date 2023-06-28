<?php
/**
 * Template part for displaying the Mobile Header
 *
 * @package thebase
 */

namespace TheBase;

?>

<div id="mobile-header" class="site-mobile-header-wrap">
	<div class="site-header-inner-wrap<?php echo esc_attr( 'top_main_bottom' === thebase()->option( 'mobile_header_sticky' ) ? ' thebase-sticky-header' : '' ); ?>"<?php
	if ( 'top_main_bottom' === thebase()->option( 'mobile_header_sticky' ) ) {
		echo ' data-shrink="' . ( thebase()->option( 'mobile_header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
		echo ' data-reveal-scroll-up="' . ( thebase()->option( 'mobile_header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
		if ( thebase()->option( 'mobile_header_sticky_shrink' ) ) {
			echo ' data-shrink-height="' . esc_attr( thebase()->sub_option( 'mobile_header_sticky_main_shrink', 'size' ) ) . '"';
		}
	}
	?>>
		<div class="site-header-upper-wrap">
			<div class="site-header-upper-inner-wrap<?php echo esc_attr( 'top_main' === thebase()->option( 'mobile_header_sticky' ) ? ' thebase-sticky-header' : '' ); ?>"<?php
			if ( 'top_main' === thebase()->option( 'mobile_header_sticky' ) ) {
				echo ' data-shrink="' . ( thebase()->option( 'mobile_header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
				echo ' data-reveal-scroll-up="' . ( thebase()->option( 'mobile_header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
				if ( thebase()->option( 'mobile_header_sticky_shrink' ) ) {
					echo ' data-shrink-height="' . esc_attr( thebase()->sub_option( 'mobile_header_sticky_main_shrink', 'size' ) ) . '"';
				}
			}
			?>>
			<?php
			/**
			 * TheBase Top Header
			 *
			 * Hooked thebase_mobile_top_header 10
			 */
			do_action( 'thebase_mobile_top_header' );
			/**
			 * TheBase Main Header
			 *
			 * Hooked thebase_mobile_main_header 10
			 */
			do_action( 'thebase_mobile_main_header' );
			?>
			</div>
		</div>
		<?php
		/**
		 * TheBase Mobile Bottom Header
		 *
		 * Hooked thebase_mobile_bottom_header 10
		 */
		do_action( 'thebase_mobile_bottom_header' );
		?>
	</div>
</div>
