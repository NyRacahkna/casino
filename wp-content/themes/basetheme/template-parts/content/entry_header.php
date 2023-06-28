<?php
/**
 * Template part for displaying a post's header
 *
 * @package thebase
 */

namespace TheBase;

$classes   = array();
$classes[] = 'entry-header';
if ( is_singular( get_post_type() ) ) {
	$classes[] = get_post_type() . '-title';
	$classes[] = 'title-align-' . ( thebase()->sub_option( get_post_type() . '_title_align', 'desktop' ) ? thebase()->sub_option( get_post_type() . '_title_align', 'desktop' ) : 'inherit' );
	$classes[] = 'title-tablet-align-' . ( thebase()->sub_option( get_post_type() . '_title_align', 'tablet' ) ? thebase()->sub_option( get_post_type() . '_title_align', 'tablet' ) : 'inherit' );
	$classes[] = 'title-mobile-align-' . ( thebase()->sub_option( get_post_type() . '_title_align', 'mobile' ) ? thebase()->sub_option( get_post_type() . '_title_align', 'mobile' ) : 'inherit' );
}
?>
<header class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php
	do_action( 'thebase_single_before_entry_header' );
	/**
	 * TheBase Entry Header
	 *
	 * Hooked thebase_entry_header 10
	 */
	do_action( 'thebase_entry_header', get_post_type(), 'normal' );
	
	do_action( 'thebase_single_after_entry_header' );
	?>
</header><!-- .entry-header -->
