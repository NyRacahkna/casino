<?php
/**
 * Template part for displaying a post's featured image
 *
 * @package thebase
 */

namespace TheBase;

// Audio or video attachments can have featured images, so they need to be specifically checked.
$support_slug = get_post_type();
if ( 'attachment' === $support_slug ) {
	if ( wp_attachment_is( 'audio' ) ) {
		$support_slug .= ':audio';
	} elseif ( wp_attachment_is( 'video' ) ) {
		$support_slug .= ':video';
	}
}

if ( post_password_required() || ! post_type_supports( $support_slug, 'thumbnail' ) || ! has_post_thumbnail() ) {
	return;
}
if ( is_singular( get_post_type() ) ) {
	?>
	<div class="post-thumbnail article-post-thumbnail thebase-thumbnail-position-<?php echo esc_attr( thebase()->get_feature_position() ); ?><?php echo ( 'behind' === thebase()->get_feature_position() ? ' align' . esc_attr( thebase()->option( 'post_feature_width', 'wide' ) ) : '' ); ?> thebase-thumbnail-ratio-<?php echo esc_attr( thebase()->option( $support_slug . '_feature_ratio', '2-3' ) ); ?>">
		<div class="post-thumbnail-inner">
			<?php the_post_thumbnail( apply_filters( 'thebase_single_featured_image_size', 'full' ), array( 'class' => 'post-top-featured') ); ?>
		</div>
	</div><!-- .post-thumbnail -->
	<?php
} else {
	?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<div class="post-thumbnail-inner">
			<?php
			global $wp_query;
			if ( 0 === $wp_query->current_post ) {
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'class' => 'post-top-featured',
						'alt'   => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			} else {
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			}
			?>
		</div>
	</a><!-- .post-thumbnail -->
	<?php
}
