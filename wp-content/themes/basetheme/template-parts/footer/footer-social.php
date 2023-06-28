<?php
/**
 * Template part for displaying the Footer Social Module
 *
 * @package thebase
 */

namespace TheBase;

$align        = ( thebase()->sub_option( 'footer_social_align', 'desktop' ) ? thebase()->sub_option( 'footer_social_align', 'desktop' ) : 'default' );
$tablet_align = ( thebase()->sub_option( 'footer_social_align', 'tablet' ) ? thebase()->sub_option( 'footer_social_align', 'tablet' ) : 'default' );
$mobile_align = ( thebase()->sub_option( 'footer_social_align', 'mobile' ) ? thebase()->sub_option( 'footer_social_align', 'mobile' ) : 'default' );

$valign        = ( thebase()->sub_option( 'footer_social_vertical_align', 'desktop' ) ? thebase()->sub_option( 'footer_social_vertical_align', 'desktop' ) : 'default' );
$tablet_valign = ( thebase()->sub_option( 'footer_social_vertical_align', 'tablet' ) ? thebase()->sub_option( 'footer_social_vertical_align', 'tablet' ) : 'default' );
$mobile_valign = ( thebase()->sub_option( 'footer_social_vertical_align', 'mobile' ) ? thebase()->sub_option( 'footer_social_vertical_align', 'mobile' ) : 'default' );
if ( ! wp_style_is( 'thebase-header', 'enqueued' ) ) {
	wp_enqueue_style( 'thebase-header' );
}
?>
<div class="footer-widget-area widget-area site-footer-focus-item footer-social content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?>" data-section="thebase_customizer_footer_social">
	<div class="footer-widget-area-inner footer-social-inner">
		<?php
		/**
		 * TheBase Footer Social
		 *
		 * Hooked TheBase\footer_social
		 */
		do_action( 'thebase_footer_social' );
		?>
	</div>
</div><!-- data-section="footer_social" -->
