<?php
/**
 * Template part for displaying the header branding/logo
 *
 * @package thebase
 */

namespace TheBase;

?>
<div class="site-header-item site-header-focus-item" data-section="title_tagline">
	<?php
	/**
	 * TheBase Site Branding
	 *
	 * Hooked TheBase\site_branding
	 */
	do_action( 'thebase_site_branding' );
	?>
</div><!-- data-section="title_tagline" -->
