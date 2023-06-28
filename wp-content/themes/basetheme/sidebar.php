<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thebase
 */

namespace TheBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! thebase()->has_sidebar() ) {
	return;
}
thebase()->print_styles( 'thebase-sidebar' );

?>
<aside id="secondary" role="complementary" class="primary-sidebar widget-area <?php echo esc_attr( thebase()->sidebar_id_class() ); ?> sidebar-link-style-<?php echo esc_attr( thebase()->option('sidebar_link_style') ); ?>">
	<div class="sidebar-inner-wrap">
		<?php
		/**
		 * Hook for before sidebar.
		 */
		do_action( 'thebase_before_sidebar' );

		thebase()->display_sidebar();
		/**
		 * Hook for after sidebar.
		 */
		do_action( 'thebase_after_sidebar' );
		?>
	</div>
</aside><!-- #secondary -->
