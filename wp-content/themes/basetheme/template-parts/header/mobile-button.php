<?php
/**
 * Template part for displaying the a button in the mobile header.
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="thebase_customizer_mobile_button">
	<?php
	/**
	 * TheBase Mobile Header Button
	 *
	 * Hooked TheBase\mobile_button
	 */
	do_action( 'thebase_mobile_button' );
	?>
</div><!-- data-section="mobile_button" -->
