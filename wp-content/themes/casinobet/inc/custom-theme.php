<?php
/**
 * Class for the Custom Theme
 *
 * @package thebase
 */

namespace TheBase\Custom_Theme;


use TheBase\Theme_Customizer;
use function TheBase\thebase;
use TheBase_Blocks_Frontend;
use TheBase\Component_Interface;
use TheBase\Templating_Component_Interface;
use TheBase\TheBase_CSS;
use LearnDash_Settings_Section;
use function TheBase\get_webfont_url;
use function TheBase\print_webfont_preload;
use function add_action;
use function add_filter;
use function wp_enqueue_style;
use function wp_register_style;
use function wp_style_add_data;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_styles;
use function esc_attr;
use function esc_url;
use function wp_style_is;
use function _doing_it_wrong;
use function wp_print_styles;
use function post_password_required;
use function is_singular;
use function comments_open;
use function get_comments_number;
use function apply_filters;
use function add_query_arg;
use function wp_add_inline_style;

/**
 * Main plugin class
 */
class Custom_Theme {
	/**
	 * Instance Control
	 *
	 * @var null
	 */
	private static $instance = null;

	/**
	 * Holds theme array sections.
	 *
	 * @var the theme settings sections.
	 */
	private $update_options = array();
	
	 /**
 	  * Holds default palette values
	  *
 	  * @var values of the theme settings.
 	  */
	 protected static $default_palette = null;

	/**
	 * Instance Control.
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Throw error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @return void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning instances of the class is Forbidden', 'basetheme' ), '1.0' );
	}

	/**
	 * Disable un-serializing of the class.
	 *
	 * @return void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of the class is forbidden', 'basetheme' ), '1.0' );
	}
	/**
	 * Constructor function.
	 */
	public function __construct() {
		
		add_filter( 'thebase_theme_options_defaults', array( $this, 'add_option_defaults' ), 10 );
		add_filter( 'thebase_global_palette_defaults', array( $this, 'add_color_option_defaults' ), 50 );
		add_action( 'thebase_hero_header', array( $this, 'shop_filter' ), 5 );
		add_action( 'thebase_before_sidebar', array( $this, 'close_shop_filter' ),  5 );
		add_filter( 'thebase_dynamic_css', array( $this, 'child_dynamic_css' ), 30 );
	}
	public function child_dynamic_css( $css ) {
		$generated_css = $this->generate_child_css();
		if ( ! empty( $generated_css ) ) {
		$css .= "\n/* Base Pro Header CSS */\n" . $generated_css;
		}
		return $css;
	}
	public function generate_child_css () {
		$css = new TheBase_CSS();
		
		$css->set_selector( '.primary-sidebar.widget-area .widget-title, .widget_block h2,.widget_block .widgettitle,.widget_block .widgettitle,.primary-sidebar h2' );
		$css->render_font( thebase()->option( 'sidebar_widget_title' ), $css );
		return $css->css_output();
	}
	/**
	 * set child theme Default color.
	 */
	public function add_color_option_defaults( $defaults ) {
		if ( is_null( self::$default_palette ) ) {
		self::$default_palette = '{"palette":[{"color":"#FF0052","slug":"palette1","name":"Palette Color 1"},{"color":"#FFFFFF","slug":"palette2","name":"Palette Color 2"},{"color":"#FFFFFF","slug":"palette3","name":"Palette Color 3"},{"color":"#FFFFFF","slug":"palette4","name":"Palette Color 4"},{"color":"#E3E3E5","slug":"palette5","name":"Palette Color 5"},{"color":"#E5E5E5","slug":"palette6","name":"Palette Color 6"},{"color":"#0E123C","slug":"palette7","name":"Palette Color 7"},{"color":"#161C4A","slug":"palette8","name":"Palette Color 8"},{"color":"#00053C","slug":"palette9","name":"Palette Color 9"}],"second-palette":[{"color":"#2B6CB0","slug":"palette1","name":"Palette Color 1"},{"color":"#215387","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#FFFFFF","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"third-palette":[{"color":"#2B6CB0","slug":"palette1","name":"Palette Color 1"},{"color":"#215387","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"active":"palette"}';
		}
		return self::$default_palette;
	}

	/**
	 * Shop Filter
	 */
	public function shop_filter() {
		if (  thebase()->has_sidebar() ) {	
		echo '<div class="thebase-show-sidebar-btn thebase-action-btn thebase-style-text">';
		echo '<span class="drawer-overlay" data-drawer-target-string="#mobile-drawer"></span>';
		echo '<span class="menu-toggle-icon 00">'.thebase()->print_icon( 'menu', '', false ).'</span>';
		echo '</div>';
		}
	}
	/**
	 * Shop Filter Close
	 */
	public function close_shop_filter($sale) {
		if (  thebase()->has_sidebar() ) {
		echo '<div class="thebase-hide-sidebar-btn">';
		echo '<span class="menu-toggle-icon">'.thebase()->print_icon( 'close', '', false ).'</span>';
		echo '</div>';
		}
	}
	public function add_option_defaults( $defaults ) {

		$update_options = array(
			'page_layout'             => 'normal',
			'page_title'              => true,
			'page_content_style'      => 'unboxed',
			//background
			'site_background'                => array(
				'desktop' => array(
					'color' => 'palette9',
				),
			),
			// Logo.
			'logo_width' => array(
				'size' => array(
					'mobile'  => 150,
					'tablet'  => 180,
					'desktop' => 210,
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'logo_layout'     => array(
				'include' => array(
					'mobile'  => 'logo_only',
					'tablet'  => 'logo_only',
					'desktop' => 'logo_only',
				),
			),
			'brand_typography' => array(
				'size' => array(
					'desktop' => 30,
				),
				'lineHeight' => array(
					'desktop' => 1.2,
				),
				'family'  => 'inherit',
				'transform' => 'uppercase',
				'google'  => false,
				'weight'  => '500',
				'variant' => '500',
				'color'   => 'palette9',
			),
			'brand_typography_color'  => array(
				'hover'  => 'palette9',
				'active' => 'palette9',
			),
			'brand_tag_typography' => array(
				'size' => array(
					'desktop' => 16,
				),
				'lineHeight' => array(
					'desktop' => 1.4,
				),
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '500',
				'variant' => '500',
				'color'   => 'palette5',
			),
			'header_logo_padding' => array(
				'size'   => array( 
					'desktop' => array( '', '', '', '' ),
				),
				'unit'   => array(
					'desktop' => 'px',
				),
				'locked' => array(
					'desktop' => false,
				),
			),
			//button
			'buttons_padding' => array(
				'size'   => array( 
					'mobile' => array( '17', '28', '17', '28' ),
					'tablet' => array( '14', '23', '14', '23' ),
					'desktop' => array( '19', '30', '19', '30' ), 
				),
				'unit'   => array(
					'mobile' => 'px',
					'tablet' => 'px',
					'desktop' => 'px',
				),
				'locked' => array(
					'desktop' => false,
				),
			),
			'buttons_border' => array(
				'desktop' => array(
					'width' => 0,
					'unit'  => 'px',
					'style' => 'solid',
					'color'  => 'palette1',
					'hover'  => 'palette1',
				),
			),
			'buttons_background' => array(
				'color'  => 'palette1',
				'hover'  => 'palette2',
			),
			'buttons_color' => array(
				'color'  => 'palette2',
				'hover'  => 'palette7',
			),
			'buttons_shadow' => array(
				'color'   => 'rgba(0,0,0,0)',
				'hOffset' => 0,
				'vOffset' => 0,
				'blur'    => 0,
				'spread'  => 0,
				'inset'   => false,
			),
			'buttons_shadow_hover' => array(
				'color'   => 'rgba(0,0,0,0)',
				'hOffset' => 0,
				'vOffset' => 0,
				'blur'    => 0,
				'spread'  => 0,
				'inset'   => false,
			),
			'buttons_border_radius' => array(
				'size' => array(
					'mobile'  => '0',
					'tablet'  => '0',
					'desktop' => '0',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'buttons_typography' => array(
				'size' => array(
					'desktop' => '13',
				),
				'lineHeight' => array(
					'desktop' => '',
				),
				'lineType' =>  'px',
				'letterSpacing' => array(
					'desktop' => '0.6',
				),
				'spacingType'=> 'px',
				'transform' => 'uppercase',
				'family'  => 'Kumbh Sans',
				'google'  => false,
				'weight'  => '600',
				'variant' => '600',
				'style' =>'',
				'color' => 'palette2',
			),	
			'header_button_size'       => 'custom',
			'header_button_padding'   => array(
				'size'   => array( '15', '29', '15', '29' ),
				'unit'   => 'px',
				'locked' => false,
			),
			'header_button_color'              => array(
				'color' => 'palette1',
				'hover' => 'palette7',
			),
			'header_button_radius' => array(
				'size'   => array( '0', '0', '0', '0' ),
				'unit'   => 'px',
				'locked' => true,
			),
			'header_button_label'      => __( 'Get Started', 'tempmela' ),
			'header_button_link'      => 'http://192.168.0.150/user2/wordpress/casinobet/contact-us/',
			'header_button_shadow' => array(
				'color'   => 'rgba(0,0,0,0)',
				'hOffset' => 0,
				'vOffset' => 0,
				'blur'    => 0,
				'spread'  => 0,
				'inset'   => false,
			),
			'header_button_shadow_hover' => array(
				'color'   => 'rgba(0,0,0,0)',
				'hOffset' => 0,
				'vOffset' => 0,
				'blur'    => 0,
				'spread'  => 0,
				'inset'   => false,
			),
			'header_button_typography' => array(
				'size' => array(
					'desktop' => '13',
				),
				'lineHeight' => array(
					'desktop' => '',
				),
				'lineType'=> 'px',
				'letterSpacing' => array(
					'mobile' => '0.5',
					'tablet' => '0.5',
					'desktop' => '0.5',
				),
				'spacingType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'transform' => 'uppercase',
				'weight'  => '700',
				'variant' => '700',
			),
			'boxed_grid_border_radius' => array(
				'size'   => array( '0', '0', '0', '0' ),
				'unit'   => 'px',
				'locked' => true,
			),
			//Search
			'search_archive_layout'               => 'left',
			'search_archive_title_color' => array(
				'color' => 'palette2',
			),
			'search_archive_title_height'       => array(
				'size' => array(
					'mobile'  => '200',
					'tablet'  => '220',
					'desktop' => '220',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'search_archive_columns' => '2',
			'search_archive_title_align' => array(
				'mobile'  => 'center',
				'tablet'  => 'center',
				'desktop' => 'center',
			),
			'search_archive_item_meta_font'   => array(
				'size' => array(
					'mobile' => '14',
					'tablet' => '14',
					'desktop' => '14',
				),
				'lineHeight' => array(
					'mobile' => '1.3',
					'tablet' => '1.6',
					'desktop' => '1.6',
				),
				'lineType' =>  'px',
				'letterSpacing' => array(
					'mobile' => '3.2',
					'tablet' => '3.2',
					'desktop' => '3.2',
				),
				'spacingType'=> 'px',
				'transform' => 'inherit',
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '',
				'variant' => '',
			),
			'search_archive_item_category_font'   => array(
				'size' => array(
					'mobile' => '14',
					'tablet' => '14',
					'desktop' => '14',
				),
				'lineHeight' => array(
					'mobile' => '1.3',
					'tablet' => '1.6',
					'desktop' => '1.6',
				),
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '400',
				'variant' => '400',
			),
			'search_archive_item_category_color' => array(
				'color' => 'palette5',
				'hover' => 'palette5',
			),
			'search_archive_item_meta_color' => array(
				'color' => 'palette5',
				'hover' => 'palette5',
			),
			'search_archive_title_background'    => array(
				'desktop' => array(
					'color' => 'palette7',
				),
			),
			'search_archive_element_excerpt' => array(
				'enabled'     => false,
				'words'       => 18,
				'fullContent' => false,
			),
			'search_archive_element_categories'   => array(
				'enabled' => false,
				'style'   => 'normal',
				'divider' => 'vline',
			),
			'search_archive_element_meta' => array(
				'id'                     => 'meta',
				'enabled'                => true,
				'divider'                => 'dot',
				'author'                 => false,
				'authorLink'             => true,
				'authorImage'            => false,
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
			),
			'search_archive_content_style'        => 'unboxed',
			'search_archive_title_layout' => 'above',
			'search_archive_item_title_font'   => array(
				'size' => array(
					'desktop' => '22',
				),
				'lineHeight' => array(
					'desktop' => '1.3',
				),
				'family'  => '',
				'google'  => false,
				'weight'  => '500',
				'variant' => '500',
			),

			// Scroll To Top.
			'scroll_up'               => true,
			'scroll_up_side'          => 'right',
			'scroll_up_icon'          => 'chevron-up',
			'scroll_up_color'                     => array(
				'color'  => 'palette1',
				'hover'  => 'palette1',
			),
			'scroll_up_style' => 'outline',
			'scroll_up_border_colors'         => array(
				'color'  => 'palette1',
				'hover'  => 'palette1',
			),
			'scroll_up_border'    => array(),
			//single-product
			'product_title_height'       => array(
				'size' => array(
					'mobile'  => 150,
					'tablet'  => 180,
					'desktop' => 200,
				),
			),
			'product_tab_title'   => false,
			'product_tab_style'   => 'normal',
			'custom_quantity' => true,
			'product_title_breadcrumb_color' => array(
				'color' => 'palette2',
				'hover' => 'palette1',
			),
			'product_above_category_font'   => array(
				'size' => array(
					'mobile'  => '25',
					'tablet'  => '35',
					'desktop' => '45',
				),
				'lineHeight' => array(
					'desktop' => '',
				),
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '700',
				'variant' => '700',
				'color'   => 'palette3',
				'transform' => 'capitalize',
			),
			'product_title_elements'           => array( 'category', 'breadcrumb', 'above_title' ),
			'product_title_element_breadcrumb' => array(
				'enabled' => true,
				'show_title' => true,
			),
			//content-width
			'content_width' => array(
				'size' => 1248,
				'unit' => 'px',
			),
			'content_background' => array(
				'desktop' => array(
					'color' => 'palette7',
				),
			),
			//header-main-layout
			'page_title_background'   => array(
				'desktop' => array(
					'color' => 'palette7',
				),
			),
			'page_title_font'   => array(
				'color' => 'palette2',
			),
			'page_title_breadcrumb_color' => array(
				'color' => 'palette3',
				'hover' => 'palette1',
			),
			'post_title_font'   => array(
				'size' => array(
					'desktop' => '',
				),
				'lineHeight' => array(
					'desktop' => '',
				),
				'family'  => 'Rajdhani',
				'google'  => true,
				'weight'  => '',
				'variant' => '',
				'color'   => 'palette2',
			),
			'page_title_height'       => array(
				'size' => array(
					'mobile'  => '200',
					'tablet'  => '220',
					'desktop' => '220',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'header_main_height' => array(
				'size' => array(
					'mobile'  => 80,
					'tablet'  => 90,
					'desktop' => 110,
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'header_main_layout' => array(
				'mobile'  => '',
				'tablet'  => '',
				'desktop' => 'fullwidth',
			),
			'primary_navigation_vertical_spacing'   => array(
				'size' => 2.5,
				'unit' => 'em',
			),
			'page_title_layout' => 'above',
			'dropdown_navigation_typography'            => array(
				'size' => array(
					'desktop' => 16,
				),
				'lineHeight' => array(
					'desktop' => '',
				),	
				'lineType'=> 'px',
				'letterSpacing' => array(
					'mobile' => '0.5',
					'tablet' => '0.5',
					'desktop' => '0.5',
				),
				'spacingType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => false,
				'transform' => 'capitalize',
				'weight'  => '500',
				'variant' => '500',
				'color'  => 'palette2',
			),
			'dropdown_navigation_color'              => array(
				'color'  => 'palette7',
				'hover'  => 'palette7',
				'active' => 'palette1',
			),
			'dropdown_navigation_width'  => array(
				'size' => 250,
				'unit' => 'px',
			),
			'dropdown_navigation_background'              => array(
				'color'  => 'palette8',
				'hover'  => 'palette1',
				'active' => 'palette2',
			),
			'dropdown_navigation_divider'              => array(
				'width' => 1,
				'unit'  => 'px',
				'style' => 'solid',
				'color' => 'palette7',
			),
			'dropdown_navigation_vertical_spacing'   => array(
				'size' => 1,
				'unit' => 'em',
			),
			'mobile_navigation_color'              => array(
				'color'  => 'palette2',
				'hover'  => 'palette1',
				'active' => 'palette1',
			),
			'header_search_modal_color'  => array(
				'color' => 'palette2',
				'hover' => 'palette2',
			),
			'header_sticky' => 'No',
			'mobile_header_sticky' => 'No',
			'header_sticky_background' => array(
				'mobile' => array(
					'color' => 'palette9',
				),
				'tablet' => array(
					'color' => 'palette9',
				),
				'desktop' => array(
					'color' => 'palette9',
				),
			),
			'header_sticky_navigation_color'              => array(
				'color'  => 'palette9',
				'hover'  => 'palette1',
				'active' => 'palette1',
			),
			'header_search_icon_size' => array(
				'size' => array(
					'mobile'  => 0.9,
					'tablet'  => 0.9,
					'desktop' => 1,
				),
				'unit' => array(
					'mobile'  => 'em',
					'tablet'  => 'em',
					'desktop' => 'em',
				),
			),
			'header_search_icon'   => 'search2',
			'header_desktop_items' => array(
				'top' => array(
					'top_left'         => array(),
					'top_left_center'  => array(),
					'top_center'       => array(),
					'top_right_center' => array(),
					'top_right'        => array(),
				),
				'main' => array(
					'main_left' => array( 'logo' ),
					'main_center' => array('navigation'),
					'main_right' => array( 'Search', 'button' ),
				),
				'bottom' => array(
					'bottom_left'         => array(),
					'bottom_left_center'  => array(),
					'bottom_center'       => array(),
					'bottom_right_center' => array(),
					'bottom_right'        => array(),
				),
			),
			// Mobile Header.
			'header_mobile_items' => array(
				'popup' => array(
					'popup_content' => array( 'mobile-navigation' ),
				),
				'top' => array(
					'top_left'   => array(),
					'top_center' => array(),
					'top_right'  => array(),
				),
				'main' => array(
					'main_left'   => array( 'mobile-logo' ),
					'main_center' => array(),
					'main_right'  => array( 'popup-toggle','button' ),
				),
				'bottom' => array(
					'bottom_left'   => array(),
					'bottom_center' => array(),
					'bottom_right'  => array(),
				),
			),
			'mobile_trigger_icon_size'   => array(
				'size' => 25,
				'unit' => 'px',
			),
			'mobile_trigger_padding' => array(
				'size'   => array( 0, 0, 0, 0 ),
				'unit'   => 'em',
				'locked' => false,
			),
			// Navigation.
			'primary_navigation_typography' => array(
				'letterSpacing' => array(
					'mobile' => '0.5',
					'tablet' => '0.5',
					'desktop' => '0.5',
				),
				'spacingType'=> 'px',
				'size' => array(
					'desktop' => '15',
				),
				'lineHeight' => array(
					'desktop' => '',
				),
				'lineType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => false,
				'weight'  => '500',
				'variant' => '500',
				'transform' => 'capitalize',
				'color'  => 'palette2',
			),
			'transparent_header_device' => array(
				'desktop' => true,
				'tablet' => true,
				'mobile'  => true,
			),
			'transparent_header_enable' => true,
			'transparent_header_post' => false,
			'transparent_header_page' => true,
			'primary_navigation_color' => array(
				'color'  => 'palette2',
				'hover'  => 'palette1',
				'active' => 'palette1',
			),
			'header_wrap_background' => array(
				'desktop' => array(
					'color' => '',
				),
			),
			'transparent_header_background'                => array(
				'desktop' => array(
					'color' => 'transparent',
				),
			),
			'primary_navigation_spacing' => array(
				'size' => 40,
				'unit' => 'px',
			),
			'header_search_color' => array(
				'color' => 'palette2',
				'hover' => 'palette1',
			),
			'header_main_padding' => array(
				'size'   => array( 
					'mobile' => array( '', '15', '', '15' ),
					'desktop' => array( '', '40', '', '40' ),
				),
			),
			// Footer.
			'footer_items'       => array(
				'top' => array(
					'top_1' => array(),
					'top_2' => array(),
					'top_3' => array(),
					'top_4' => array(),
					'top_5' => array(),
				),
				'middle' => array(
					'middle_1' => array('footer-widget1'),
					'middle_2' => array('footer-widget2'),
					'middle_3' => array('footer-widget3'),
					'middle_4' => array('footer-widget4'),
					'middle_5' => array(),
				),
				'bottom' => array(
					'bottom_1' => array( 'footer-html'),
					'bottom_2' => array( 'footer-widget5'),
					'bottom_3' => array(),
					'bottom_4' => array(),
					'bottom_5' => array(),
				),
			),
			'footer_wrap_background' => array(
				'desktop' => array(
					'color' => 'palette2',
				),
			),
			'footer_top_background' => array(
				'desktop' => array(
					'color' => 'palette2',
				),
			),
			
			'footer_top_columns' => '1',
					'footer_top_collapse' => 'normal',
					'footer_top_layout'  => array(
						'mobile'  => 'row',
						'tablet'  => '',
						'desktop' => 'equal',
					),
					'footer_top_direction'         => array(
						'mobile'  => '',
						'tablet'  => '',
						'desktop' => 'row',
			),
			'footer_top_top_spacing' => array(
				'size' => array(
					'mobile'  => '40',
					'tablet'  => '40',
					'desktop' => '98',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'footer_top_bottom_spacing' => array(
				'size' => array(
					'mobile'  => '40',
					'tablet'  => '40',
					'desktop' => '93',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'footer_top_widget_title'  => array(
				'size' => array(
					'desktop' => '',
				),
				'lineHeight' => array(
					'desktop' => '25',
				),
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '',
				'variant' => '',
				'color'   => 'palette1',
			),
			'footer_middle_widget_title'  => array(
				'size' => array(
					'desktop' => '21',
				),
				'lineHeight' => array(
					'desktop' => '28',
				),
				'lineType'=> 'px',
				'letterSpacing' => array(
					'mobile' => '0',
					'tablet' => '0',
					'desktop' => '0',
				),
				'spacingType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '600',
				'variant' => '600',
				'color'   => 'palette2',
				'transform' =>'capitalize',
				'style' =>'',
			),
			'footer_social_vertical_align' => array(
				'desktop' => 'middle',
			),
			'footer_bottom_top_border' => array(
				'desktop' => array(
					'width' => 1,
					'unit'  => 'px',
					'style' => 'solid',
					'color'  => 'palette3',
				),
			),
			'footer_middle_columns' => '4',
					'footer_middle_layout'  => array(
						'mobile'  => 'row',
						'tablet'  => '',
						'desktop' => 'left-forty',
					),
			'footer_middle_column_spacing' => array(
				'size' => array(
					'mobile'  => '0',
					'tablet'  => '0',
					'desktop' => '30',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			
			'footer_middle_link_style' => 'noline',
			'footer_middle_height' => array(
				'size' => array(
					'mobile'  => '',
					'tablet'  => '',
					'desktop' => '',
				),
			),
			'footer_middle_top_spacing' => array(
				'size' => array(
					'mobile'  => '',
					'tablet'  => '55',
					'desktop' => '160',
				),
			),
			'footer_middle_bottom_spacing' => array(
				'size' => array(
					'mobile'  => '',
					'tablet'  => '55',
					'desktop' => '160',
				),
			),
			'footer_social_margin' => array(
				'size'   => array( '25', '', '', '' ),
				'unit'   => 'px',
				'locked' => false,
			),
			//footer-bottom
			'footer_bottom_top_spacing' => array(
				'size' => array(
					'mobile'  => '5',
					'tablet'  => '5',
					'desktop' => '5',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'footer_bottom_bottom_spacing' => array(
				'size' => array(
					'mobile'  => '5',
					'tablet'  => '5',
					'desktop' => '5',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			//Footer HTML
			'footer_html_content'    => '{copyright} {year} All Rights Reserved. Developed By Codezeel',
			'footer_html_align'  => array(
						'mobile'  => 'left',
						'tablet'  => 'left',
						'desktop' => 'left',
					),
			// Footer Social.
			'footer_social_items' => array(
				'items' => array(
					array(
						'id'      => 'facebook',
						'enabled' => true,
						'source'  => 'icon',
						'url'     => '',
						'imageid' => '',
						'width'   => 20,
						'icon'    => 'facebookAlt2',
						'label'   => 'Facebook',
					),
					array(
						'id'      => 'twitter',
						'enabled' => true,
						'source'  => 'icon',
						'url'     => '',
						'imageid' => '',
						'width'   => 20,
						'icon'    => 'twitter',
						'label'   => 'Twitter',
					),
					array(
						'id'      => 'instagram',
						'enabled' => true,
						'source'  => 'icon',
						'url'     => '',
						'imageid' => '',
						'width'   => 20,
						'icon'    => 'instagramAlt',
						'label'   => 'Instagram',
					),
					array(
						'id'      => 'linkedin',
						'enabled' => true,
						'source'  => 'icon',
						'url'     => '',
						'imageid' => '',
						'width'   => 20,
						'icon'    => 'linkedinAlt',
						'label'   => 'linkedin',
					),
				),
			),
			'footer_social_style'        => 'outline',
			'footer_social_show_label'   => false,
			'footer_social_item_spacing' => array(
				'size' => 0.1,
				'unit' => 'em',
			),
			'footer_social_icon_size' => array(
				'size' => 20,
				'unit' => 'px',
			),
			'footer_social_border_radius' => array(
				'size' => 50,
				'unit' => 'px',
			),
			'footer_social_item_spacing' => array(
				'size' => 0.5,
				'unit' => 'em',
			),
			'footer_social_color' => array(
				'color' => 'palette1',
				'hover' => 'palette9',
			),
			'footer_social_background' => array(
				'color' => 'palette6',
				'hover' => 'palette9',
			),
			'footer_middle_layout'  => array(
				'mobile'  => 'row',
				'tablet'  => '',
				'desktop' => 'left-forty',
			),
			'footer_middle_direction' => array(
				'mobile'  => '',
				'tablet'  => '',
				'desktop' => 'column',
			),
			'footer_middle_contain'         => array(
				'mobile'  => '',
				'tablet'  => '',
				'desktop' => 'contained',
			),
			'footer_middle_widget_content' => array(
				'size' => array(
					'desktop' => '15',
				),
				'letterSpacing' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => '0.6',
				),
				'spacingType'=> 'px',
				'lineHeight' => array(
					'desktop' => '',
				),
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '400',
				'variant' => '400',
				'color'   => 'palette5',
				'transform' => 'capitalize',
			),
			'footer_middle_link_colors' => array(
				'color' => 'palette2',
				'hover' => 'palette1',	
			),
			'footer_html_typography' => array(
				'size' => array(
					'desktop' => '15',
				),
				'lineHeight' => array(
					'desktop' => '30',
				),
				'lineType'=> 'px',
				'letterSpacing' => array(
					'mobile' => '0.5',
					'tablet' => '0.5',
					'desktop' => '0.5',
				),
				'spacingType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '400',
				'variant' => '400',
				'color'   => 'palette5',
				'transform' => 'capitalize',
			),
			'footer_html_link_color' => array(
				'color' => 'palette5',
				'hover' => 'palette5',
			),
			'footer_html_link_style' => 'plain',
			// Typography.
			'base_font' => array(
				'letterSpacing' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => '0.6',
				),
				'spacingType'=> 'px',
				'size' => array(
					'mobile' => 15,
					'tablet' => 15,
					'desktop' => 15,
				),
				'unit' => array(
					'mobile' => 'px',
					'tablet' => 'px',
					'desktop' => 'px',
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 24,
				),
				'lineType' => 'px',				
				'google'  => true,
				'family'  => 'Kumbh Sans',
				'style' => '',
				'weight'  => '400',
				'transform' => 'none',
				'variant' => '400',
				'color'   => 'palette5',
			),
			'load_base_italic'    => true,
			'link_color' => array(
				'highlight'      => 'palette1',
				'highlight-alt'  => 'palette5',
				'highlight-alt2' => 'palette5',
				'style'          => 'no-underline',
			),
			'heading_font' => array(
				'family' => 'Kumbh Sans',
			),
			'h1_font' => array(
				'letterSpacing' => array(
					'mobile' => '0',
					'tablet' => '0',
					'desktop' => '0',
				),
				'spacingType'=> 'px',
				'size' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 45,
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 55,
				),
				'lineType' => 'px',
				'weight'  => '600',
				'variant' => '600',
				'transform' => 'capitalize',
				'family'  => 'Kumbh Sans',
				'color'   => 'palette2',
			),
			'h2_font' => array(
				'letterSpacing' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => '0',
				),
				'spacingType'=> 'px',
				'size' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 39,
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 46,
				),
				'linetype' => 'px',
				'weight'  => '600',
				'variant' => '600',
				'family'  => 'Kumbh Sans',
				'color'   => 'palette2'
			),
			'h3_font' => array(
				'letterSpacing' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => '0',
				),
				'spacingType'=> 'px',
				'size' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 33,
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 40,
				),
				'lineType' => 'px',
				'weight'  => '500',
				'variant' => '500',
				'transform' => 'capitalize',
				'family'  => 'inherit',
				'color'   => 'palette2',
			),
			'h4_font' => array(
				'letterSpacing' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => '0',
				),
				'spacingType'=> 'px',
				'size' => array(
					'desktop' => 27,
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 34,
				),
				'lineType' => 'px',
				'weight'  => '600',
				'variant' => '600',
				'family'  => 'inherit',
				'color'   => 'palette2',
			),
			'h5_font' => array(
				'letterSpacing' => array(
					'mobile' => '0.3',
					'tablet' => '0.3',
					'desktop' => '0.3',
				),
				'spacingType'=> 'px',
				'size' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 21,
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 30,
				),
				'lineType' => 'px',
				'weight'  => '600',
				'variant' => '600',
				'transform' => 'capitalize',
				'family'  => 'Kumbh Sans',
				'color'   => 'palette2',
			),
			'h6_font' => array(
				'letterSpacing' => array(
					'mobile' => '0.6',
					'tablet' => '0.6',
					'desktop' => '0.6',
				),
				'spacingType'=> 'px',
				'size' => array(
					'desktop' => 15,
				),
				'lineHeight' => array(
					'mobile' => '',
					'tablet' => '',
					'desktop' => 24,
				),
				'lineType' => 'px',
				'weight'  => '400',
				'variant' => '400',
				'transform' => 'normal',
				'family'  => 'Kumbh Sans',
				'color'   => 'palette5',
			),
			'mobile_trigger_color' => array(
				'color' => 'palette2',
				'hover' => 'palette1',
			),
			// Product Controls.
			'product_above_layout'       => 'title',
			'product_above_title_font'   => array(
				'size' => array(
					'desktop' => '32',
				),
				'lineHeight' => array(
					'desktop' => '1.5',
				),
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '700',
				'variant' => '700',
				'color'   => 'palette2',
				'transform' => 'capitalize',
			),
			//Page-Layout
			'page_title_align'         => array(
				'mobile'  => 'center',
				'tablet'  => 'center',
				'desktop' => 'center',
			),
			'page_title_element_breadcrumb' => array(
				'enabled' => true,
				'show_title' => true,
			),
			//blog
			'post_archive_layout'               => 'left',
					'post_archive_content_style'        => 'unboxed',
					'post_archive_columns'              => '2',
					'post_archive_item_image_placement' => 'above',
					'post_archive_item_vertical_alignment' => 'top',
					'post_archive_sidebar_id'           => 'sidebar-primary',
					'post_archive_elements'             => array( 'feature', 'categories', 'meta' ,'title', 'excerpt', 'readmore' ),
					'post_archive_element_categories'   => array(
						'enabled' => true,
						'style'   => 'normal',
						'divider' => 'vline',
			),
			
			'post_archive_title_background'    => array(
				'desktop' => array(
					'color' => 'palette7',
				),
			),
			'post_archive_title_height'       => array(
				'size' => array(
					'mobile'  => '',
					'tablet'  => '',
					'desktop' => '220',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'post_archive_title_color' => array(
				'color' => 'palette2',
				'hover' => 'palette9',
			),
			'post_archive_title_breadcrumb_color' => array(
				'color' => 'palette2',
				'hover' => 'palette1',
			),
			'post_author_box'         => true,
			'post_author_box_style'   => 'normal',
			'post_archive_layout' => 'left',
			'post_archive_sidebar_id' => 'sidebar-primary',
			'post_archive_columns' => '2',
			'post_archive_title_align' => array(
				'mobile'  => 'center',
				'tablet'  => 'center',
				'desktop' => 'center',
			),
			'boxed_grid_shadow' => array(
				'color'   => 'rgba(0,0,0,0)',
				'hOffset' => 0,
				'vOffset' => 15,
				'blur'    => 15,
				'spread'  => -10,
				'inset'   => false,
			),
			'product_archive_title_height'       => array(
				'size' => array(
					'mobile'  => '150',
					'tablet'  => '180',
					'desktop' => '200',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'product_archive_title_heading_font' => array(
				'size' => array(
					'mobile'  => '25',
					'tablet'  => '35',
					'desktop' => '45',
				),
				'lineHeight' => array(
					'mobile'  => '',
					'tablet'  => '',
					'desktop' => '55',
				),
				'lineType'=> 'px',
				'letterSpacing' => array(
					'mobile' => '0',
					'tablet' => '0',
					'desktop' => '0',
				),
				'spacingType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '600',
				'variant' => '600',
				'transform' => 'capitalize',
				'color' => 'palette2',
			),
			'product_archive_sidebar_id' => 'sidebar-secondary',
			'post_archive_title_elements' => array( 'title' , 'breadcrumb' , 'description' ),
			'post_archive_title_element_breadcrumb' => array(
				'enabled' => true,
				'show_title' => true,
			),
			'product_archive_title_breadcrumb_color' => array(
				'color' => 'palette2',
				'hover' => 'palette1',
			),
			'page_title_breadcrumb_font'   => array(
				'size' => array(
					'desktop' => '16',
				),
				'lineHeight' => array(
					'desktop' => '1.6',
				),
				'linetype' => 'em',
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '500',
				'variant' => '',
			),
			'post_archive_title_element_description' => array(
				'enabled' => false,
			),
			'post_archive_element_categories'   => array(
				'enabled' => false,
				'style'   => 'normal',
				'divider' => 'vline',
			),
			'post_archive_element_feature' => array(
				'enabled'   => true,
				'ratio'     => '3-4',
				'size'      => 'medium_large',
				'imageLink' => true,
			),
			'post_archive_element_meta' => array(
				'author' => false,
			),
			'post_archive_element_excerpt' => array(
				'enabled'     => true,
				'words'       => 18,
				'fullContent' => false,
			),
			'post_archive_item_title_font'   => array(
				'size' => array(
					'mobile'  => '22',
					'tablet'  => '24',
					'desktop' => '26',
				),
				'family'  => 'Kumbh Sans',
				'weight'  => '700',
				'color'   => 'palette2',
			),
			'post_archive_item_meta_font'   => array(
				'size' => array(
					'desktop' => '13',
				),
				'lineHeight' => array(
					'desktop' => '29',
				),
				'lineType'=> 'px',
				'letterSpacing' => array(
					'mobile' => '0.6',
					'tablet' => '0.6',
					'desktop' => '0.6',
				),
				'spacingType'=> 'px',
				'family'  => 'Kumbh Sans',
				'color'   => 'palette2',
				'google'  => true,
				'weight'  => '500',
				'variant' => '500',
				'transform' => 'uppercase',
			),
			'post_title_meta_font'   => array(
				'size' => array(
					'desktop' => '14',
				),
			),
			// Post Layout.
			'post_title_elements'=> array( 'breadcrumb', 'title', 'categories', 'meta', '' ),
			'post_author_box_style'   => 'center',
			'product_archive_layout' => 'left',
			'post_vertical_padding' => 'disable',
			'post_feature_width' => 'Stretch Full',
			'post_layout' => 'normal',
			'post_content_style' => 'boxed',
			'post_feature_position'   => 'behind',
			'post_feature_ratio' => '9-16',
			'post_related_columns' => '3',
			//archive
			'product_archive_title_font'   => array(
						'size' => array(
							'desktop' => '20',
						),
						'lineHeight' => array(
							'desktop' => '1.5',
						),
						'lineType' =>  'em',
						'letterSpacing' => array(
							'mobile' => '',
							'tablet' => '',
							'desktop' => '0.3',
						),
						'spacingType'=> 'px',
						'transform' => 'inherit',
						'family'  => 'inherit' ,
						'google'  => false,
						'weight'  => '600',
						'variant' => '600',
						'color'   => 'palette2',
			),
			'product_archive_price_font'   => array(
						'size' => array(
							'desktop' => '15',
						),
						'lineHeight' => array(
							'desktop' => '22',
						),
						'lineType' =>  'px',
						'letterSpacing' => array(
							'mobile' => '',
							'tablet' => '',
							'desktop' => '0.3',
						),
						'spacingType'=> 'px',
						'transform' => 'inherit',
						'family'  => 'inherit',
						'google'  => true,
						'weight'  => '400',
						'variant' => '400',
						'color'   => 'palette2',
			),
			'product_content_style'      => 'unboxed',

			// Sidebar.
			'sidebar_width'   => array(
				'size' => '24',
				'unit' => '%',
			),
			'sidebar_padding'        => array(
				'size'   => array( 
					'desktop' => array( '0', '1.5', '1.5', '1.5' ),
				),
				'unit'   => array(
					'desktop' => 'em',
				),
				'locked' => array(
					'desktop' => false,
				),
			),
			'sidebar_link_style' => 'plain',
			'sidebar_link_colors' => array(
				'color' => 'palette3',
				'hover' => 'palette1',
			),
			'sidebar_widget_spacing'   => array(
				'size' => array(
					'mobile'  => '',
					'tablet'  => 1.5,
					'desktop' => 1.6,
				),
				'unit' => array(
					'mobile'  => 'em',
					'tablet'  => 'em',
					'desktop' => 'em',
				),
			),
			'sidebar_widget_title' => array(
				'size' => array(
					'desktop' => 22,
				),
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '600',
				'variant' => '600',
				'color'   => 'palette2',
				'transform' => 'capitalize',
			),
			'sidebar_widget_content'            => array(
				'size' => array(
					'desktop' => '',
				),
				'lineHeight' => array(
					'desktop' => '1.5',
				),
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '',
				'variant' => '',
				'color'   => 'palette2',
			),
			//single-blog
			'boxed_spacing'   => array(
				'size' => array(
					'mobile'  => 1.5,
					'tablet'  => 2.8,
					'desktop' => 2.8,
				),
				'unit' => array(
					'mobile'  => 'rem',
					'tablet'  => 'rem',
					'desktop' => 'rem',
				),
			),
			'post_title_height'       => array(
				'size' => array(
					'mobile'  => '200',
					'tablet'  => '220',
					'desktop' => '220',
				),
				'unit' => array(
					'mobile'  => 'px',
					'tablet'  => 'px',
					'desktop' => 'px',
				),
			),
			'post_title_background'   => array(
				'desktop' => array(
					'color' => 'palette7',
				),
			),
			'post_title_element_meta' => array(
				'id'                     => 'meta',
				'enabled'                => true,
				'divider'                => 'dot',
				'author'                 => true,
				'authorLink'             => true,
				'authorImage'            => false,
				'authorImageSize'        => 25,
				'authorEnableLabel'      => true,
				'authorLabel'            => '',
				'date'                   => false,
				'dateEnableLabel'        => false,
				'dateLabel'              => '',
				'dateUpdated'            => false,
				'dateUpdatedEnableLabel' => false,
				'dateUpdatedLabel'       => '',
				'categories'             => false,
				'categoriesEnableLabel'  => false,
				'categoriesLabel'        => '',
				'comments'               => false,
			),
			'post_content_style' => 'boxed',
			'post_title_element_excerpt' => array(
				'enabled' => true,
			),
			'post_title_category_font'   => array(
				'size' => array(
					'desktop' => '14',
				),
				'lineHeight' => array(
					'desktop' => '',
				),
				'family'  => 'inherit',
				'google'  => false,
				'weight'  => '500',
				'variant' => '',
			),
			'post_title_element_breadcrumb' => array(
				'enabled' => false,
				'show_title' => true,
			),
			'post_title_category_color' => array(
				'color' => 'palette2',
				'hover' => 'palette1',
			),
			'post_title_align' => array(
				'mobile'  => 'left',
				'tablet'  => 'left',
				'desktop' => 'left',
			),
			'post_title_layout'       => 'above',
			'post_title_align' => array(
				'mobile'  => 'center',
				'tablet'  => 'center',
				'desktop' => 'center',
			),
			'boxed_shadow' => array(
				'color'   => 'rgba(0,0,0,0)',
				'hOffset' => 0,
				'vOffset' => 0,
				'blur'    => 0,
				'spread'  => 0,
				'inset'   => false,
			),
			'boxed_border_radius' => array(
				'size'   => array( '0', '0', '0', '0' ),
				'unit'   => 'px',
				'locked' => true,
			),
			'post_title_element_categories' => array(
				'enabled' => false,
				'style'   => 'normal',
				'divider' => 'vline',
			),
			'post_related_title_font' => array(              
				'size' => array(
					'desktop' => '50',
				),
				'lineHeight' => array(
					'desktop' => '60',
				),
				'lineType'=> 'px',
				'family'  => 'Kumbh Sans',
				'google'  => true,
				'weight'  => '600',
				'variant' => '600',
				'color'   => 'palette2',
			),
			//404 Pgae
			'404_content_style' => 'unboxed',
			//woocommerce
			'product_archive_title_element_breadcrumb' => array(
				'enabled' => true,
				'show_title' => true,
			),
			'product_archive_title_elements'      => array( 'title', 'breadcrumb', 'description' ),
			'product_archive_title_element_description' => array(
				'enabled' => false,
			),
			'woo_account_navigation_layout' => 'right',
			'product_archive_button_style' => 'text',
		);
		$defaults = array_merge(
			$defaults,
			$update_options
		);
		return $defaults;
	}
	public function add_addon_option_defaults( $defaults ) {
		$addon_update_options = array(
			// Header Contact.
			'header_mobile_contact_icon_size' => array(
				'size' => 1.5,
				'unit' => 'em',
			),
			'header_mobile_contact_color' => array(
				'color'  => 'palette9',
				'hover' => 'palette9',
			),
			'header_mobile_contact_items' => array(
				'items' => array(
					array(
						'id'      => 'phone',
						'enabled' => true,
						'source'  => 'icon',
						'url'     => '',
						'imageid' => '',
						'width'   => 24,
						'link'     => '',
						'icon'    => 'phoneAlt2',
						'label'   => '',
					),
				),
			),
		);
		$defaults = array_merge(
			$defaults,
			$addon_update_options
		);
		return $defaults;
	}

}

Custom_Theme::get_instance();
