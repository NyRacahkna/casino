<?php
/**
 * Template part for displaying a post's metadata
 *
 * @package thebase
 */

namespace TheBase;

global $post;
$defaults = array(
	'id'                     => 'meta',
	'enabled'                => false,
	'divider'                => 'dot',
	'author'                 => true,
	'authorLink'             => true,
	'authorImage'            => true,
	'authorImageSize'        => 25,
	'authorEnableLabel'      => true,
	'authorLabel'            => '',
	'date'                   => true,
	'dateEnableLabel'        => false,
	'dateLabel'              => '',
	'dateUpdated'            => false,
	'dateUpdatedEnableLabel' => false,
	'dateUpdatedLabel'       => '',
	'categories'             => false,
	'categoriesEnableLabel'  => false,
	'categoriesLabel'        => '',
	'comments'               => false,
);
$slug              = ( is_search() ? 'search' : get_post_type() );
$elements          = thebase()->option( $slug . '_archive_element_meta', $defaults );
$title_meta        = array();
$meta_labels       = array();
$meta_divider      = 'dot';
$author_image      = false;
$author_link       = true;
$author_image_size = 25;
if ( isset( $elements ) && is_array( $elements ) && isset( $elements['enabled'] ) && false === $elements['enabled'] ) {
	return;
}
if ( isset( $elements ) && is_array( $elements ) ) {
	$elements = wp_parse_args( $elements, $defaults );
	if ( isset( $elements['divider'] ) && $elements['divider'] ) {
		$meta_divider = $elements['divider'];
	}
	if ( isset( $elements['author'] ) && $elements['author'] ) {
		$title_meta[] = 'author';
		if ( isset( $elements['authorEnableLabel'] ) && $elements['authorEnableLabel'] ) {
			$meta_labels['author'] = ( isset( $elements['authorLabel'] ) && ! empty( $elements['authorLabel'] ) ? $elements['authorLabel'] : __( 'By', 'basetheme' ) );
		}
		if ( isset( $elements['authorImage'] ) && $elements['authorImage'] ) {
			$author_image = true;
		}
		if ( isset( $elements['authorLink'] ) && ! $elements['authorLink'] ) {
			$author_link = false;
		}
		if ( isset( $elements['authorImageSize'] ) && $elements['authorImageSize'] ) {
			$author_image_size = absint( $elements['authorImageSize'] );
		}
	}
	if ( isset( $elements['date'] ) && $elements['date'] ) {
		$title_meta[] = 'date';
		if ( isset( $elements['dateEnableLabel'] ) && $elements['dateEnableLabel'] ) {
			$meta_labels['date'] = ( isset( $elements['dateLabel'] ) && ! empty( $elements['dateLabel'] ) ? $elements['dateLabel'] : __( 'Posted on', 'basetheme' ) );
		}
	}
	if ( isset( $elements['dateUpdated'] ) && $elements['dateUpdated'] ) {
		$title_meta[] = 'dateUpdated';
		if ( isset( $elements['dateUpdatedEnableLabel'] ) && $elements['dateUpdatedEnableLabel'] ) {
			$meta_labels['dateUpdated'] = ( isset( $elements['dateUpdatedLabel'] ) && ! empty( $elements['dateUpdatedLabel'] ) ? $elements['dateUpdatedLabel'] : __( 'Updated on', 'basetheme' ) );
		}
	}
	if ( isset( $elements['categories'] ) && $elements['categories'] ) {
		$title_meta[] = 'categories';
		if ( isset( $elements['categoriesEnableLabel'] ) && $elements['categoriesEnableLabel'] ) {
			$meta_labels['categories'] = ( isset( $elements['categoriesLabel'] ) && ! empty( $elements['categoriesLabel'] ) ? $elements['categoriesLabel'] : __( 'Posted in', 'basetheme' ) );
		}
	}
	if ( isset( $elements['comments'] ) && $elements['comments'] ) {
		$title_meta[] = 'comments';
	}
}

if ( empty( $title_meta ) ) {
	return;
}
$item_id       = get_the_ID();
$post_type_obj = get_post_type_object( get_post_type() );
?>
<div class="entry-meta entry-meta-divider-<?php echo esc_attr( $meta_divider ); ?>">
	<?php
	do_action( 'thebase_before_loop_entry_meta' );
	foreach ( $title_meta as $title_meta_item ) {
		switch ( $title_meta_item ) {
			case 'author':
				$author_string = '';
				// Show author only if the post type supports it.
				if ( post_type_supports( $post_type_obj->name, 'author' ) ) {
					$author_id = get_post_field( 'post_author', get_the_ID() );
					if ( $author_link ) {
						$author_string = sprintf(
							'<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
							esc_url( get_author_posts_url( $author_id ) ),
							esc_html( get_the_author_meta( 'display_name', $author_id ) )
						);
					} else {
						$author_string = sprintf(
							'<span class="author vcard"><span class="fn n">%1$s</span></span>',
							esc_html( get_the_author_meta( 'display_name', $author_id ) )
						);
					}
				}
				if ( ! empty( $author_string ) ) {
					$author_output = '<span class="posted-by">';
					if ( $author_image ) {
						$author_output .= '<span class="author-avatar"' . ( $author_image_size && 25 !== $author_image_size ? ' style="width:' . esc_attr( $author_image_size ) . 'px; height:' . esc_attr( $author_image_size ) . 'px;"' : '' ) .'>';
						if ( $author_link ) {
							$author_output .= sprintf(
								'<a class="author-image" href="%1$s">%2$s</a>',
								esc_url( get_author_posts_url( $author_id ) ),
								get_avatar( $author_id, $author_image_size )
							);
						} else {
							$author_output .= sprintf(
								'<span class="author-image">%1$s</span>',
								get_avatar( $author_id, $author_image_size )
							);
						}
						$author_output .= '<span class="image-size-ratio"></span>';
						$author_output .= '</span>';
					}
					if ( isset( $meta_labels['author'] ) ) {
						$author_output .= '<span class="meta-label">' . esc_html( $meta_labels['author'] ) . '</span>';
					}
					$author_output .= $author_string;
					$author_output .= '</span>';
					echo apply_filters( 'thebase_author_meta_output', $author_output ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				break;
			case 'date':
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
				}

				$time_string = sprintf(
					$time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);
				if ( ! empty( $time_string ) ) {
					?>
					<span class="posted-on">
						<?php
						if ( 'customicon' === $meta_divider ) {
							thebase()->print_icon( 'hoursAlt', '', false );
						}
						if ( isset( $meta_labels['date'] ) ) {
							echo '<span class="meta-label">' . esc_html( $meta_labels['date'] ) . '</span>';
						}
						echo $time_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</span>
					<?php
				}
				break;
			case 'dateUpdated':
				$time_string = sprintf(
					'<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);
				if ( ! empty( $time_string ) ) {
					?>
					<span class="updated-on">
						<?php
						if ( 'customicon' === $meta_divider ) {
							thebase()->print_icon( 'hoursAlt', '', false );
						}
						if ( isset( $meta_labels['dateUpdated'] ) ) {
							echo '<span class="meta-label">' . esc_html( $meta_labels['dateUpdated'] ) . '</span>';
						}
						echo $time_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</span>
					<?php
				}
				break;
			case 'categories':
				if ( 'post' === get_post_type() ) {
					/* translators: separator between taxonomy terms */
					$separator = _x( ', ', 'list item separator', 'basetheme' );
					?>
					<span class="category-links">
						<?php
						if ( 'customicon' === $meta_divider ) {
							thebase()->print_icon( 'folder', '', false );
						}
						if ( isset( $meta_labels['categories'] ) ) {
							echo '<span class="meta-label">' . esc_html( $meta_labels['categories'] ) . '</span>';
						}
						echo '<span class="category-link-items">' . get_the_category_list( esc_html( $separator ), '', get_the_ID() ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</span>
					<?php
				}
				break;
			case 'comments':
				echo '<div class="meta-comments">';
				if ( 'customicon' === $meta_divider ) {
					thebase()->print_icon( 'commentsAlt', '', false );
				}
				echo '<a class="meta-comments-link anchor-scroll" href="' . esc_url( get_the_permalink() ) . '#comments">';
				if ( '1' === get_comments_number() ) {
					echo esc_html( get_comments_number() ) . ' ' . esc_html__( 'Comment', 'basetheme' );
				} else {
					echo esc_html( get_comments_number() ) . ' ' . esc_html__( 'Comments', 'basetheme' );
				}
				echo '</a>';
				echo '</div>';
				break;
		}
	}
	do_action( 'thebase_after_loop_entry_meta' );
	?>
</div><!-- .entry-meta -->
<?php
