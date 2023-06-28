<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

use function TheBase\thebase;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( thebase()->option( 'tertiary_navigation_stretch' ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( thebase()->option( 'tertiary_navigation_fill_stretch' ) ? 'true' : 'false' ); ?>" data-section="thebase_customizer_tertiary_navigation">
	<?php
	/**
	 * Base tertiary Navigation
	 *
	 * Hooked TheBase\tertiary_navigation
	 */
	do_action( 'thebase_tertiary_navigation' );
	?>
</div><!-- data-section="tertiary_navigation" -->
