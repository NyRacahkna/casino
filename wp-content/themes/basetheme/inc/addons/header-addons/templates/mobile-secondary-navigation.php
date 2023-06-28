<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item site-header-item-mobile-navigation mobile-secondary-navigation-layout-stretch-<?php echo ( thebase()->option( 'mobile_secondary_navigation_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_mobile_secondary_navigation">
	<?php
	/**
	 * Base Mobile Secondary Navigation
	 *
	 * Hooked TheBase\mobile_secondary_navigation
	 */
	do_action( 'thebase_mobile_secondary_navigation' );
	?>
</div><!-- data-section="mobile_secondary_navigation" -->
