<?php
/***************** Blog Posts ****************/
function shortcode_blog_posts_container($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => '2',
		'number_of_posts' => '6',
		'category' => '',
		'width' => '600',
		'height' => '369',
		'excerpt_length' => '75',
		'linktext' => '',
	), $atts));
if(!empty($category)):
	$term_id = $category;	
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $number_of_posts,
		'orderby' => 'date',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $term_id
			)
		)
	);	
else:
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $number_of_posts,
		'orderby' => 'date'	
	);	
endif;	

$i = 1;
wp_reset_postdata();

$output = '';
$blog_array = new WP_Query( $args );	
$count = $blog_array->post_count;
$output = '';
if ( $blog_array->have_posts() ):
	$output .= '<div id="blog-posts-products" class="blog-posts-content posts-content">';			
		if($type == "slider") { 
			if($count > $items_per_column)
				$output .= '<div id="'.$items_per_column.'_blog_carousel" class="slider blog-carousel">';
			else
				$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
		} else {
			$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
		}
	while ( $blog_array->have_posts() ) : $blog_array->the_post();

		if($i % $items_per_column == 1 )
			$class = " first";
		elseif($i % $items_per_column == 0 )
			$class = " last";
		else
			$class = "";
		$post_day = get_the_date('d');
		$post_month = get_the_date('F');
		$post_year = get_the_date('Y');
		$post_author = get_the_author();
        $comments = wp_count_comments(get_the_ID());		
		$args = array(
			'status' => 'approved',
			'number' => '5',
			'post_id' => get_the_ID()
		);		
		$comments = wp_count_comments(get_the_ID()); 				   
		if ( has_post_thumbnail() && ! post_password_required() ) :	
			$post_thumbnail_id = get_post_thumbnail_id();
		$image = wp_get_attachment_url( $post_thumbnail_id );
		endif;	
		$output .= '<div class="item container '.$class.' blog">';
		$output .= '<div class="container-inner loop-entry type-post">';
		if ( has_post_thumbnail() && ! post_password_required() ) :	
		$output .= '<a href="'.get_permalink().'" class="post-thumbnail"><div class="post-thumbnail-inner">';
		$output .= '<img src="'.$image.'" title="'.get_the_title().'" alt="'.get_the_title().'" height="'.$height.'" width="'.$width.'"/>';	
		$output .='<div class="entry-meta entry-meta-divider-customicon">';
		$output .= '<span class="posted-on">'.$post_month.' '.$post_day.''.esc_html__(',').' '.$post_year.'</span>';
		$output .= '</div>';
		$output .= '</div></a>';
		endif;	
		$output .= '<div class="entry-content-wrap">';
		$output .= '<header class="entry-header">';
		
		$output .= '<h6 class="entry-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h6>';
		if ($excerpt_length > 0){ 
			$output .= '<div class="post-description">'.basetheme_blog_post_excerpt($excerpt_length).'</div>';
		} 
		$output .= '</header>';
		$output .= '<footer class="entry-footer">';
		if(!empty($linktext)):
			$output .= '<div class="entry-actions"><p class="more-link-wrap"><a class="post-more-link" href="'.get_permalink().'">'.$linktext.'</a></p></div>';
		endif;
		$output .= '</footer>';	
		$output .= '</div>';	
		$output .= '</div></div>';
	$i++;
endwhile;
wp_reset_postdata();
$output .=	'</div></div>';
endif;
return $output;
}
add_shortcode('blog_posts', 'shortcode_blog_posts_container');

/***************** Products ****************/
function woo_products_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'type' => 'slider',
		'items_per_column' => 4,
		'product' => 'shop',
		'classname' => '',
		'no_more'  => 'No more Products to display'	
	), $atts));
	$logotype = $type;	
	$output = '';	
	
	$output .= '<div class="woo-products woo-content products_block '.$product.' '.$classname.'">';
	if($type == "slider") { 
		$output .= '<div id="'.$items_per_column.'_woo_carousel" class="woo-carousel cols-'.$items_per_column.'">';
	}
	elseif($type == "list") { 
		$output .= '<div class="woo_list woo-list cols-'.$items_per_column.'">';
	}
	else {
		$output .= '<div class="woo_grid woo-grid cols-'.$items_per_column.'">';
	}
	$output .= do_shortcode($content).'</div>';
	$output .='</div>';
	return $output;
}
add_shortcode('woo_products', 'woo_products_container');
	
/******************** Single product Category  ***************/
function woo_single_category($atts, $content = null) {		
	extract(shortcode_atts(array(
		'height' => '159',
		'width' => '143',
		'hide_empty' => '1',
		'target' => '_self',
		'limit' => '2',
		'orderby' => 'name',
		'order' => 'ASC',
		'id' => '',
	), $atts));
$category_ids_array = explode(",",'product_cat');	
$output = '';

	$cat = get_term_by( 'id', $id, 'product_cat' );

	$args = array(
		'parent'        => 0,
		'hide_empty'    => $hide_empty,
		'taxonomy'      => 'product_cat',
	);

	$categories = get_categories( $args );	
	$category_ids = get_term( $cat, 'product_cat' );
	$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
		if( empty ($thumbnail_id)):
			$image = get_template_directory_uri()."/assets/images/placeholder.png";		
		else:
			$image = wp_get_attachment_url( $thumbnail_id );				
		endif;					
	$output .= '<div class="single-category-block">';	
	$output .= '<div class="cat-img-block"><a class="cat-img" target="'.$target.'" href="'.get_category_link( $category_ids ).'" title="'.$cat->name.'" ><img src="'.$image.'" title="'.$cat->name.'" alt="'.$cat->name.'"  height="'.$height.'" width="'.$width.'"/></a></div>';	
	$output .= '<div class="category-list">';
	$output .= '<h3><a class="cat_name" target="'.$target.'" href="'.get_category_link( $category_ids ).'"  title="'.$cat->name.'">'.$cat->name.'</a></h3>';
	$output .= '<div class="sub_category">';	
	$child_args = array(
				'taxonomy' => 'product_cat',
				'orderby' => $orderby,
				'order' => $order,
				'hide_empty' => false,
				'parent'   => $cat->term_id,
				'limit' => $limit,
			);
		$child_product_cats = get_terms( $child_args);
	
		foreach ($child_product_cats as $child_product_cat)
		{ 
		$output .= '<a href="'.get_term_link($child_product_cat).'">'.$child_product_cat->name.'</a>';
		}
	$output .= '</div>';
	$output .= '<a class="view-more-link" target="'.$target.'" href="'.get_category_link( $category_ids ).'"  title="'.$cat->name.'"><span class="view-more">'.esc_html__('View More').'</span></a>';
	$output .= '</div>';
		
$output .= '</div>';
return $output;
}
add_shortcode("woo_single_category", "woo_single_category");

/*************** Woo Category Slider & Grid **************/
function shortcode_woo_product_categories($atts, $content = null) {
	extract(shortcode_atts(array(
			'type' => 'grid',
			'style' => '1',
			'items_per_column' => '3',
			'height' => '261',
			'width' => '277',
			'child_category' => '',
			'hide_empty' => '1',
			'items_per_page' => '10',
			'target' => '_self',
			'link_text' => '',
			'count_display' => 'yes',
		), $atts));
	$category_ids_array = explode(",",'product_cat');	
	$output = '';
		$name='';
		$category_link_text='';		
		if($link_text !== ""){
			$category_link_text= '<span class="cat-all-category"><a class="button cat_name" target="'.$target.'" href="'.$link_text.'">'.esc_html__('View All', 'kartwow').'</a></span>';
		}
		$readmore='';
		if($type == "slider"){
			$output .= '<div class="woo_categories_slider woo_categories_block">';
			$output .= '<div id="'.$items_per_column.'_category_carousel" class="category-carousel">';
		}
		else{
			$output .= '<div class="woo_categories_grid woo_categories_block">';
			$output .= '<div id="'.$items_per_column.'_category_grid" class="grid-cols grid-lg-col-'.$items_per_column.'">';
		}
		$args = array(
			'parent'        => $child_category,
			'hide_empty'    => $hide_empty,
			'taxonomy'      => 'product_cat',
			'number'        => $items_per_page,
		);
		$categories = get_categories( $args );
		foreach($categories as $cat){	
			$category_ids = get_term( $cat, 'product_cat' );
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
				if( empty ($thumbnail_id)):
					$src = get_template_directory_uri()."/assets/images/placeholder.png";		
				else:
					$src = wp_get_attachment_url( $thumbnail_id );
				endif;
									
			$output .= '<div class="cat-outer-block style-'.$style.'">';
			$output .= '<div class="cat-inner-block">';
			if($style == '1') :
			$output .= '<div class="cat-img-block">';
			$output .= '<a class="cat-img" target="'.$target.'" href="'.get_category_link( $category_ids ).'" title="'.$cat->name.'" >';
			$output .= '<img src="'.$src.'" title="'.$cat->name.'" alt="'.$cat->name.'"  height="'.$height.'" width="'.$width.'"/>';
			$output .= '</a>';
			$output .= '</div>';
			endif;	
			$output .= '<div class="cat_description">';			
			$output .= '<a class="cat_name" target="'.$target.'" href="'.get_category_link( $category_ids ).'"  title="'.$cat->name.'">'.$cat->name.'</a>';			
			if($count_display == "yes"):
				$output .= '<span class="cat-count">('.$cat->count.')</span>';	
			endif;	
			$output .= '</div>';			
			$output .= '</div>';
			$output .= '</div>';
		}	
	$output .= '</div>';
	$output .= $category_link_text;
	$output .= '</div>';	
	return $output;
	}
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	add_shortcode("woo_categories", "shortcode_woo_product_categories");
	endif;	

	/***************** Instagram ****************/
function shortcode_instagram($atts) {
	extract(shortcode_atts(array(
		'accessToken' => 'https://ig.instant-tokens.com/users/bc2afecf-30b2-4a91-b819-38edd295cd71/instagram/17841402307816714/token?userSecret=jird860sk2dgid0scrvj5',
		'limit' => '5',
		'type' => 'grid',
		'item_per_row' => '2',
		'username' => 'templatemela',
		), $atts));
$output = '';
	?>
	<script>
(function () {
  var feedToken = 'https://ig.instant-tokens.com/users/bc2afecf-30b2-4a91-b819-38edd295cd71/instagram/17841402307816714/token?userSecret=jird860sk2dgid0scrvj5';

    fetch(feedToken).then(function(resp) {
      return resp.json();
    }).then(function (data) {
      var feed = new Instafeed({
        accessToken: data.Token, // Access token from json response
        target: 'instafeed',
        limit: $limit,
        template: "<div class='item instafeed-item-wrap'><a href='\{\{link\}\}'><figure style='display: block; background-image: url(\{\{image\}\}');'></figure></a></div>",
        after: function() {
            // disable button if no more results to load
            $('.instafeed-item-wrap figure').lazy();
        },
      });
      feed.run();
    }).catch(function (error) {
      console.log(error);
    });

})();
</script>
	<?php
	$output .= '<div class="main-container instagram">';
	$output .= '<div class="instagram-feed limit-'.$limit.'">';
	if($type == "slider"){
	$output .= '<div id="instafeed" class="insta-owl-carousel owl-carousel"></div>';
	} else{
	$output .= '<div id="instafeed" class="insta-grid  grid-lg-col-'.$item_per_row.'"></div>';
	}
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('instagram', 'shortcode_instagram');

	// /********************* Hot products Grid/slider ***************/ 
function scheduled_hot_products( $atts ) {
		global $woocommerce_loop,$wpdb;	
		extract( shortcode_atts( array(
			'per_page'      => '12',
			'columns'       => '4',
			'orderby'       => 'title',
			'order'         => 'asc'
		), $atts ) );
	
		// Get products on sale
		$product_ids_raw = $wpdb->get_results(
	"SELECT posts.ID, posts.post_parent
	FROM `$wpdb->posts` posts
	INNER JOIN `$wpdb->postmeta` ON (posts.ID = wp_postmeta.post_id)
	INNER JOIN `$wpdb->postmeta` AS mt1 ON (posts.ID = mt1.post_id)
	WHERE
	posts.post_status = 'publish'
	AND  (mt1.meta_key = '_sale_price_dates_to' AND mt1.meta_value >= ".time().") 
	GROUP BY posts.ID 
	ORDER BY posts.post_title ASC LIMIT 0,12");
	
	$product_ids_on_sale = array();
	
	foreach ( $product_ids_raw as $product_raw ) 
	{
	if(!empty($product_raw->post_parent))
	{
		$product_ids_on_sale[] = $product_raw->post_parent;
	}
	else
	{
		$product_ids_on_sale[] = $product_raw->ID;  
	}
	}
	$product_ids_on_sale = array_unique($product_ids_on_sale);	
		$meta_query   = array();
		$meta_query[] = WC()->query->visibility_meta_query();
		$meta_query[] = WC()->query->stock_status_meta_query();
		$meta_query   = array_filter( $meta_query );
	
		$args = array(
			'posts_per_page'    => $per_page,
			'orderby'           => $orderby,
			'order'             => $order,
			'no_found_rows'     => 1,
			'post_status'       => 'publish',
			'post_type'         => 'product',
			'meta_query'        => $meta_query,
			'post__in'          => array_merge( array( 0 ), $product_ids_on_sale )
		);
	
		ob_start();
	
		$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );	
		$woocommerce_loop['columns'] = $columns;	
		if ( $products->have_posts() ) : ?>	
			<?php woocommerce_product_loop_start(); ?>	
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>	
					<?php wc_get_template_part( 'content', 'product' ); ?>	
				<?php endwhile; // end of the loop. ?>	
			<?php woocommerce_product_loop_end(); ?>	
		<?php endif;	
		wp_reset_postdata();	
		return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';	}
	add_shortcode( 'woo_hot_products', 'scheduled_hot_products' );
