<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( thebase()->option( 'secondary_navigation_stretch' ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( thebase()->option( 'secondary_navigation_fill_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_secondary_navigation">
	<?php
	/**
	 * TheBase Secondary Navigation
	 *
	 * Hooked TheBase\secondary_navigation
	 */
	do_action( 'thebase_secondary_navigation' );
	?>
</div><!-- data-section="secondary_navigation" -->
