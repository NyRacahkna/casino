<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( thebase()->option( 'primary_navigation_stretch' ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( thebase()->option( 'primary_navigation_fill_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_primary_navigation">
	<?php
	/**
	 * TheBase Primary Navigation
	 *
	 * Hooked TheBase\primary_navigation
	 */
	do_action( 'thebase_primary_navigation' );
	?>
</div><!-- data-section="primary_navigation" -->
