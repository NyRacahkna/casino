<?php
/**
 * Template part for displaying a post's Hero header
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
<section class="entry-hero <?php echo esc_attr( get_post_type() ) . '-hero-section'; ?> <?php echo esc_attr( 'entry-hero-layout-' . thebase()->option( get_post_type() . '_title_inner_layout' ) ); ?>">
	<div class="entry-hero-container-inner">
		<div class="hero-section-overlay"></div>
		<div class="hero-container site-container">
			<header class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<?php
				/**
				 * TheBase Entry Hero
				 *
				 * Hooked thebase_entry_header 10
				 */
				do_action( 'thebase_entry_hero', get_post_type(), 'above' );
				?>
			</header><!-- .entry-header -->
		</div>
	</div>
</section><!-- .entry-hero -->
