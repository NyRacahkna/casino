<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item site-header-item-mobile-navigation mobile-navigation-layout-stretch-<?php echo ( thebase()->option( 'mobile_navigation_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_mobile_navigation">
	<?php
	/**
	 * TheBase Mobile Navigation
	 *
	 * Hooked TheBase\mobile_navigation
	 */
	do_action( 'thebase_mobile_navigation' );
	?>
</div><!-- data-section="mobile_navigation" -->
