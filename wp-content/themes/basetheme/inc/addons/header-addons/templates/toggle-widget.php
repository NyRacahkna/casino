<?php
/**
 * Template part for displaying the header toggle widget
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="thebase_customizer_header_toggle_widget">
	<?php
	/**
	 * Base Header Toggle Widget
	 *
	 * Hooked TheBase\header_toggle_widget
	 */
	do_action( 'thebase_header_toggle_widget' );
	?>
</div><!-- data-section="header_toggle_widget" -->
