<?php
/**
 * Calls in Templates using theme hooks.
 *
 * @package thebase
 */

namespace TheBase;

use function TheBase\thebase;
use function get_template_part;
use function add_action;

defined( 'ABSPATH' ) || exit;
/**
 * Main Call for footer
 */
function footer_markup() {
	if ( thebase()->has_footer() ) {
		get_template_part( 'template-parts/footer/base' );
	}
}

/**
 * Footer Top Row
 */
function top_footer() {
	if ( thebase()->display_footer_row( 'top' ) ) {
		thebase()->get_template( 'template-parts/footer/footer', 'row', array( 'row' => 'top' ) );
	}
}

/**
 * Footer Middle Row
 */
function middle_footer() {
	if ( thebase()->display_footer_row( 'middle' ) ) {
		thebase()->get_template( 'template-parts/footer/footer', 'row', array( 'row' => 'middle' ) );
	}
}

/**
 * Footer Bottom Row
 */
function bottom_footer() {
	if ( thebase()->display_footer_row( 'bottom' ) ) {
		thebase()->get_template( 'template-parts/footer/footer', 'row', array( 'row' => 'bottom' ) );
	}
}

/**
 * Footer Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function footer_column( $row, $column ) {
	thebase()->render_footer( $row, $column );
}


/**
 * Footer HTML
 */
function footer_html() {
	$content    = thebase()->option( 'footer_html_content' );
	if ( $content || is_customize_preview() ) {
		$link_style = thebase()->option( 'footer_html_link_style' );
		echo '<div class="footer-html inner-link-style-' . esc_attr( $link_style ) . '">';
		thebase()->customizer_quick_link();
		echo '<div class="footer-html-inner">';
		$content = str_replace( '{copyright}', '&copy;', $content );
		$content = str_replace( '{year}', date_i18n( 'Y' ), $content );
		$content = str_replace( '{site-title}', get_bloginfo( 'name' ), $content );
		// translators: %s is link to BaseTheme.
		$content = str_replace( '{theme-credit}', sprintf( __( '- WordPress Theme by %s', 'basetheme' ), '' ), $content );
		echo do_shortcode( wpautop( $content ) );
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Desktop Navigation
 */
function footer_navigation() {
	?>
	<nav id="footer-navigation" class="footer-navigation"  aria-label="<?php esc_attr_e( 'Footer Navigation', 'basetheme' ); ?>">
		<?php thebase()->customizer_quick_link(); ?>
		<div class="footer-menu-container">
			<?php
			if ( thebase()->is_footer_nav_menu_active() ) {
				thebase()->display_footer_nav_menu( array( 'menu_id' => 'footer-menu' ) );
			} else {
				thebase()->display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #footer-navigation -->
	<?php
}

/**
 * Desktop Social
 */
function footer_social() {
	$items      = thebase()->sub_option( 'footer_social_items', 'items' );
	$title      = thebase()->option( 'footer_social_title' );
	$show_label = thebase()->option( 'footer_social_show_label' );
	$brand_colors = thebase()->option( 'footer_social_brand' );
	$brand_color_class = '';
	if ( 'onhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-hover';
	} elseif ( 'untilhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-until';
	} elseif ( 'always' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-always';
	}
	echo '<div class="footer-social-wrap">';
	thebase()->customizer_quick_link();
	if ( ! empty( $title ) ) {
		echo '<h2 class="widget-title">' . wp_kses_post( $title ) . '</h2>';
	}
	echo '<div class="footer-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( thebase()->option( 'footer_social_style' ) ) . esc_attr( $brand_color_class ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = thebase()->option( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = str_replace( 'mailto:', '', $link );
					if ( is_email( $link ) ) {
						$link = 'mailto:' . $link;
					}
				}
				echo '<a href="' . esc_attr( $link ) . '"' . ( $show_label ? '' : ' aria-label="' . esc_attr( $item['label'] ) . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] ) . 'class="social-button footer-social-item social-link-' . esc_attr( $item['id'] ) . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
				if ( 'image' === $item['source'] ) {
					if ( $item['imageid'] && wp_get_attachment_image( $item['imageid'], 'full', true ) ) {
						echo wp_get_attachment_image( $item['imageid'], 'full', true, array( 'class' => 'social-icon-image', 'style' => 'max-width:' . esc_attr( $item['width'] ) . 'px' ) );
					} elseif ( ! empty( $item['url'] ) ) {
						echo '<img src="' . esc_attr( $item['url'] ) . '" alt="' . esc_attr( $item['label'] ) . '" class="social-icon-image" style="max-width:' . esc_attr( $item['width'] ) . 'px"/>';
					}
				} elseif ( 'svg' === $item['source'] ) {
					if ( ! empty( $item['svg'] ) ) {
						echo '<span class="social-icon-custom-svg" style="max-width:' . esc_attr( $item['width'] ) . 'px">' . $item['svg'] . '</span>';
					}
				} else {
					thebase()->print_icon( $item['icon'], '', false );
				}
				if ( $show_label ) {
					echo '<span class="social-label">' . esc_html( $item['label'] ) . '</span>';
				}
				echo '</a>';
			}
		}
	}
	echo '</div>';
	echo '</div>';
}

/**
 * Scroll To Top.
 */
function scroll_up() {
	if ( thebase()->option( 'scroll_up' ) ) {
		echo '<a id="tb-scroll-up" tabindex="-1" aria-hidden="true" aria-label="' . esc_attr__( 'Scroll to top', 'basetheme' ) . '" href="#wrapper" class="thebase-scroll-to-top scroll-up-wrap scroll-ignore scroll-up-side-' . esc_attr( thebase()->option( 'scroll_up_side' ) ) . ' scroll-up-style-' . esc_attr( thebase()->option( 'scroll_up_style' ) ) . ' vs-lg-' . ( thebase()->sub_option( 'scroll_up_visiblity', 'desktop' ) ? 'true' : 'false' ) . ' vs-md-' . ( thebase()->sub_option( 'scroll_up_visiblity', 'tablet' ) ? 'true' : 'false' ) . ' vs-sm-' . ( thebase()->sub_option( 'scroll_up_visiblity', 'mobile' ) ? 'true' : 'false' ) . '">';
		thebase()->print_icon( thebase()->option( 'scroll_up_icon' ), esc_attr__( 'Scroll to top', 'basetheme' ), false );
		echo '</a>';
		echo '<button id="tb-scroll-up-reader" href="#wrapper" aria-label="' . esc_attr__( 'Scroll to top', 'basetheme' ) . '" class="thebase-scroll-to-top scroll-up-wrap scroll-ignore scroll-up-side-' . esc_attr( thebase()->option( 'scroll_up_side' ) ) . ' scroll-up-style-' . esc_attr( thebase()->option( 'scroll_up_style' ) ) . ' vs-lg-' . ( thebase()->sub_option( 'scroll_up_visiblity', 'desktop' ) ? 'true' : 'false' ) . ' vs-md-' . ( thebase()->sub_option( 'scroll_up_visiblity', 'tablet' ) ? 'true' : 'false' ) . ' vs-sm-' . ( thebase()->sub_option( 'scroll_up_visiblity', 'mobile' ) ? 'true' : 'false' ) . '">';
		thebase()->print_icon( thebase()->option( 'scroll_up_icon' ), esc_attr__( 'Scroll to top', 'basetheme' ), false );
		echo '</button>';
	}
}
