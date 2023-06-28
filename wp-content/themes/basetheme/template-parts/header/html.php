<?php
/**
 * Template part for displaying the header HTML Modual
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="thebase_customizer_header_html">
	<?php
	/**
	 * TheBase Header HTML
	 *
	 * Hooked TheBase\header_html
	 */
	do_action( 'thebase_header_html' );
	?>
</div><!-- data-section="header_html" -->
