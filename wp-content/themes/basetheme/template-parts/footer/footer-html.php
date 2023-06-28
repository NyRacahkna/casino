<?php
/**
 * Template part for displaying the footer info
 *
 * @package thebase
 */

namespace TheBase;

$align = ( thebase()->sub_option( 'footer_html_align', 'desktop' ) ? thebase()->sub_option( 'footer_html_align', 'desktop' ) : 'default' );
$tablet_align = ( thebase()->sub_option( 'footer_html_align', 'tablet' ) ? thebase()->sub_option( 'footer_html_align', 'tablet' ) : 'default' );
$mobile_align = ( thebase()->sub_option( 'footer_html_align', 'mobile' ) ? thebase()->sub_option( 'footer_html_align', 'mobile' ) : 'default' );

$valign = ( thebase()->sub_option( 'footer_html_vertical_align', 'desktop' ) ? thebase()->sub_option( 'footer_html_vertical_align', 'desktop' ) : 'default' );
$tablet_valign = ( thebase()->sub_option( 'footer_html_vertical_align', 'tablet' ) ? thebase()->sub_option( 'footer_html_vertical_align', 'tablet' ) : 'default' );
$mobile_valign = ( thebase()->sub_option( 'footer_html_vertical_align', 'mobile' ) ? thebase()->sub_option( 'footer_html_vertical_align', 'mobile' ) : 'default' );

?>

<div class="footer-widget-area site-info site-footer-focus-item content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?>" data-section="thebase_customizer_footer_html">
	<div class="footer-widget-area-inner site-info-inner">
		<?php
		/**
		 * TheBase Footer HTML
		 *
		 * Hooked TheBase\footer_html
		 */
		do_action( 'thebase_footer_html' );
		?>
	</div>
</div><!-- .site-info -->
