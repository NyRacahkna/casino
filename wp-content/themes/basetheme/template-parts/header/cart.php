<?php
/**
 * Template part for displaying the header cart modual
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="thebase_customizer_cart">
	<?php
	/**
	 * TheBase Header Cart
	 *
	 * Hooked TheBase\header_cart
	 */
	do_action( 'thebase_header_cart' );
	?>
</div><!-- data-section="cart" -->
