<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item site-header-item-navgation-popup-toggle" data-section="thebase_customizer_mobile_trigger">
	<?php
	/**
	 * TheBase Mobile Navigation Popup Toggle
	 *
	 * Hooked TheBase\navigation_popup_toggle
	 */
	do_action( 'thebase_navigation_popup_toggle' );
	?>
</div><!-- data-section="mobile_trigger" -->
