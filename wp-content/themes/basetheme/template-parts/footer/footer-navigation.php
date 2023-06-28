<?php
/**
 * Template part for displaying the header Social Modual
 *
 * @package thebase
 */

namespace TheBase;

$align        = ( thebase()->sub_option( 'footer_navigation_align', 'desktop' ) ? thebase()->sub_option( 'footer_navigation_align', 'desktop' ) : 'default' );
$tablet_align = ( thebase()->sub_option( 'footer_navigation_align', 'tablet' ) ? thebase()->sub_option( 'footer_navigation_align', 'tablet' ) : 'default' );
$mobile_align = ( thebase()->sub_option( 'footer_navigation_align', 'mobile' ) ? thebase()->sub_option( 'footer_navigation_align', 'mobile' ) : 'default' );

$valign        = ( thebase()->sub_option( 'footer_navigation_vertical_align', 'desktop' ) ? thebase()->sub_option( 'footer_navigation_vertical_align', 'desktop' ) : 'default' );
$tablet_valign = ( thebase()->sub_option( 'footer_navigation_vertical_align', 'tablet' ) ? thebase()->sub_option( 'footer_navigation_vertical_align', 'tablet' ) : 'default' );
$mobile_valign = ( thebase()->sub_option( 'footer_navigation_vertical_align', 'mobile' ) ? thebase()->sub_option( 'footer_navigation_vertical_align', 'mobile' ) : 'default' );

?>
<div class="footer-widget-area widget-area site-footer-focus-item footer-navigation-wrap content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?> footer-navigation-layout-stretch-<?php echo ( thebase()->option( 'footer_navigation_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_footer_navigation">
	<div class="footer-widget-area-inner footer-navigation-inner">
		<?php
		/**
		 * TheBase Footer Navigation
		 *
		 * Hooked TheBase\footer_navigation
		 */
		do_action( 'thebase_footer_navigation' );
		?>
	</div>
</div><!-- data-section="footer_navigation" -->
