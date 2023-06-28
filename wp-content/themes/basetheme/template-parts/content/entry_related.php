<?php
/**
 * Template part for displaying a post's footer
 *
 * @package thebase
 */

namespace TheBase;

use WP_Query;
use function add_action;
use function apply_filters;
use function TheBase\thebase;
use function get_template_part;

thebase()->print_styles( 'thebase-related-posts' );
thebase()->print_styles( 'thebase-slide' );
wp_enqueue_script( 'thebase-slide-init' );

$args          = get_related_posts_args( $post->ID );
$cols          = get_related_posts_columns();
$columns_class = apply_filters( 'thebase_related_posts_columns_class', ( 2 === $cols['xxl'] ? 'grid-sm-col-2 grid-lg-col-2' : 'grid-sm-col-2 grid-lg-col-3' ) );

$bpc = new WP_Query( apply_filters( 'thebase_related_posts_carousel_args', $args ) );
if ( $bpc ) :
	$num = $bpc->post_count;
	if ( $num > 0 ) {
		?>
		<div class="entry-related alignfull entry-related-style-<?php echo esc_attr( thebase()->option( 'post_related_style' ) ); ?>">
			<div class="entry-related-inner content-container site-container">
				<div class="entry-related-inner-content alignwide">
					<?php echo wp_kses_post( apply_filters( 'thebase_single_post_similar_posts_title', '<h2 class="entry-related-title">' . esc_html__( 'Similar Posts', 'basetheme' ) . '</h2>' ) ); ?>
					<div class="entry-related-carousel thebase-slide-init grid-cols <?php echo esc_attr( $columns_class ); ?>" data-columns-xxl="<?php echo esc_attr( $cols['xxl'] ); ?>" data-columns-xl="<?php echo esc_attr( $cols['xl'] ); ?>" data-columns-md="<?php echo esc_attr( $cols['md'] ); ?>" data-columns-sm="<?php echo esc_attr( $cols['sm'] ); ?>" data-columns-xs="<?php echo esc_attr( $cols['xs'] ); ?>" data-columns-ss="<?php echo esc_attr( $cols['ss'] ); ?>" data-slider-anim-speed="400" data-slider-scroll="1" data-slider-dots="true" data-slider-arrows="true" data-slider-hover-pause="false" data-slider-auto="false" data-slider-speed="7000" data-slider-gutter="40" data-slider-loop="<?php echo esc_attr( thebase()->option( 'post_related_carousel_loop' ) ? 'true' : 'false' ); ?>" data-slider-next-label="<?php echo esc_attr__( 'Next', 'basetheme' ); ?>" data-slider-slide-label="<?php echo esc_attr__( 'Posts', 'basetheme' ); ?>" data-slider-prev-label="<?php echo esc_attr__( 'Previous', 'basetheme' ); ?>">
						<?php
						while ( $bpc->have_posts() ) :
							$bpc->the_post();
							echo '<div class="carousel-item">';
							get_template_part( 'template-parts/content/entry', get_post_type() );
							echo '</div>';
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div><!-- .entry-author -->
		<?php
	}
endif;
wp_reset_postdata();
