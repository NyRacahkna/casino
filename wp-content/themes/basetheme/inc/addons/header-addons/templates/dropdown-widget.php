<?php
/**
 * Template part for displaying the header dropdown widget
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="thebase_customizer_header_dropdown_widget">
	<?php
	/**
	 * Base Header Dropdown Widget
	 *
	 * Hooked TheBase\header_dropdown_widget
	 */
	do_action( 'thebase_header_dropdown_widget' );
	?>
</div><!-- data-section="header_dropdown_widget" -->
