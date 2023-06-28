<?php
/**
 * Template part for displaying the header search_bar Module
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="thebase_customizer_header_search_bar">
	<?php
	/**
	 * Base Header Search Bar
	 *
	 * Hooked TheBase\header_search_bar
	 */
	do_action( 'thebase_header_search_bar' );
	?>
</div><!-- data-section="header_search_bar" -->
