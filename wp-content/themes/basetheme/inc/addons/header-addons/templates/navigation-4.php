<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

use function TheBase\thebase;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( thebase()->option( 'quaternary_navigation_stretch' ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( thebase()->option( 'quaternary_navigation_fill_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_quaternary_navigation">
	<?php
	/**
	 * Base quaternary Navigation
	 *
	 * Hooked TheBase\quaternary_navigation
	 */
	do_action( 'thebase_quaternary_navigation' );
	?>
</div><!-- data-section="quaternary_navigation" -->
