<?php
/**
 * Header Builder Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

ob_start(); ?>
<div class="thebase-build-tabs nav-tab-wrapper wp-clearfix">
	<a href="#" class="nav-tab preview-desktop thebase-build-tabs-button" data-device="desktop">
		<span class="dashicons dashicons-desktop"></span>
		<span><?php esc_html_e( 'Desktop', 'basetheme' ); ?></span>
	</a>
	<a href="#" class="nav-tab preview-tablet preview-mobile thebase-build-tabs-button" data-device="tablet">
		<span class="dashicons dashicons-smartphone"></span>
		<span><?php esc_html_e( 'Tablet / Mobile', 'basetheme' ); ?></span>
	</a>
</div>
<span class="button button-secondary thebase-builder-hide-button thebase-builder-tab-toggle"><span class="dashicons dashicons-no"></span><?php esc_html_e( 'Hide', 'basetheme' ); ?></span>
<span class="button button-secondary thebase-builder-show-button thebase-builder-tab-toggle"><span class="dashicons dashicons-edit"></span><?php esc_html_e( 'Header Builder', 'basetheme' ); ?></span>
<?php
$builder_tabs = ob_get_clean();
ob_start();
?>
<div class="thebase-compontent-tabs nav-tab-wrapper wp-clearfix">
	<a href="#" class="nav-tab thebase-general-tab thebase-compontent-tabs-button nav-tab-active" data-tab="general">
		<span><?php esc_html_e( 'General', 'basetheme' ); ?></span>
	</a>
	<a href="#" class="nav-tab thebase-design-tab thebase-compontent-tabs-button" data-tab="design">
		<span><?php esc_html_e( 'Design', 'basetheme' ); ?></span>
	</a>
</div>
<?php
$compontent_tabs = ob_get_clean();
$settings = array(
	'header_builder' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'header_builder',
		'settings'     => false,
		'description'  => $builder_tabs,
	),
	'header_desktop_items' => array(
		'control_type' => 'thebase_builder_control',
		'section'      => 'header_builder',
		'default'      => thebase()->default( 'header_desktop_items' ),
		'context'      => array(
			array(
				'setting' => '__device',
				'value'   => 'desktop',
			),
		),
		'partial'      => array(
			'selector'            => '#masthead',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_markup',
		),
		'choices'      => array(
			'logo'          => array(
				'name'    => esc_html__( 'Logo', 'basetheme' ),
				'section' => 'title_tagline',
			),
			'navigation'          => array(
				'name'    => esc_html__( 'Primary Navigation', 'basetheme' ),
				'section' => 'thebase_customizer_primary_navigation',
			),
			'navigation-2'        => array(
				'name'    => esc_html__( 'Secondary Navigation', 'basetheme' ),
				'section' => 'thebase_customizer_secondary_navigation',
			),
			'search' => array(
				'name'    => esc_html__( 'Search', 'basetheme' ),
				'section' => 'thebase_customizer_header_search',
			),
			'button'        => array(
				'name'    => esc_html__( 'Button', 'basetheme' ),
				'section' => 'thebase_customizer_header_button',
			),
			'social'        => array(
				'name'    => esc_html__( 'Social', 'basetheme' ),
				'section' => 'thebase_customizer_header_social',
			),
			'html'          => array(
				'name'    => esc_html__( 'HTML', 'basetheme' ),
				'section' => 'thebase_customizer_header_html',
			),
		),
		'input_attrs'  => array(
			'group' => 'header_desktop_items',
			'rows'  => array( 'top', 'main', 'bottom' ),
			'zones' => array(
				'top' => array(
					'top_left'         => is_rtl() ? esc_html__( 'Top - Right', 'basetheme' ) : esc_html__( 'Top - Left', 'basetheme' ),
					'top_left_center'  => is_rtl() ? esc_html__( 'Top - Right Center', 'basetheme' ) : esc_html__( 'Top - Left Center', 'basetheme' ),
					'top_center'       => esc_html__( 'Top - Center', 'basetheme' ),
					'top_right_center' => is_rtl() ? esc_html__( 'Top - Left Center', 'basetheme' ) : esc_html__( 'Top - Right Center', 'basetheme' ),
					'top_right'        => is_rtl() ? esc_html__( 'Top - Left', 'basetheme' ) : esc_html__( 'Top - Right', 'basetheme' ),
				),
				'main' => array(
					'main_left'         => is_rtl() ? esc_html__( 'Main - Right', 'basetheme' ) : esc_html__( 'Main - Left', 'basetheme' ),
					'main_left_center'  => is_rtl() ? esc_html__( 'Main - Right Center', 'basetheme' ) : esc_html__( 'Main - Left Center', 'basetheme' ),
					'main_center'       => esc_html__( 'Main - Center', 'basetheme' ),
					'main_right_center' => is_rtl() ? esc_html__( 'Main - Left Center', 'basetheme' ) : esc_html__( 'Main - Right Center', 'basetheme' ),
					'main_right'        => is_rtl() ? esc_html__( 'Main - Left', 'basetheme' ) : esc_html__( 'Main - Right', 'basetheme' ),
				),
				'bottom' => array(
					'bottom_left'         => is_rtl() ? esc_html__( 'Bottom - Right', 'basetheme' ) : esc_html__( 'Bottom - Left', 'basetheme' ),
					'bottom_left_center'  => is_rtl() ? esc_html__( 'Bottom - Right Center', 'basetheme' ) : esc_html__( 'Bottom - Left Center', 'basetheme' ),
					'bottom_center'       => esc_html__( 'Bottom - Center', 'basetheme' ),
					'bottom_right_center' => is_rtl() ? esc_html__( 'Bottom - Left Center', 'basetheme' ) : esc_html__( 'Bottom - Right Center', 'basetheme' ),
					'bottom_right'        => is_rtl() ? esc_html__( 'Bottom - Left', 'basetheme' ) : esc_html__( 'Bottom - Right', 'basetheme' ),
				),
			),
		),
	),
	'header_tab_settings' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'header_layout',
		'settings'     => false,
		'priority'     => 1,
		'description'  => $compontent_tabs,
	),
	'header_desktop_available_items' => array(
		'control_type' => 'thebase_available_control',
		'section'      => 'header_layout',
		'settings'     => false,
		'input_attrs'  => array(
			'group'  => 'header_desktop_items',
			'zones'  => array( 'top', 'main', 'bottom' ),
		),
		'context'      => array(
			array(
				'setting' => '__device',
				'value'   => 'desktop',
			),
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
	),
	'header_mobile_items' => array(
		'control_type' => 'thebase_builder_control',
		'section'      => 'header_builder',
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'header_mobile_items' ),
		'context'      => array(
			array(
				'setting'  => '__device',
				'operator' => 'in',
				'value'    => array( 'tablet', 'mobile' ),
			),
		),
		'partial'      => array(
			'selector'            => '#mobile-header',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\mobile_header',
		),
		'choices'      => array(
			'mobile-logo'          => array(
				'name'    => esc_html__( 'Logo', 'basetheme' ),
				'section' => 'title_tagline',
			),
			'mobile-navigation' => array(
				'name'    => esc_html__( 'Mobile Navigation', 'basetheme' ),
				'section' => 'thebase_customizer_mobile_navigation',
			),
			// 'mobile-navigation2'          => array(
			// 	'name'    => esc_html__( 'Horizontal Navigation', 'basetheme' ),
			// 	'section' => 'mobile_horizontal_navigation',
			// ),
			'search' => array(
				'name'    => esc_html__( 'Search Toggle', 'basetheme' ),
				'section' => 'thebase_customizer_header_search',
			),
			'mobile-button'        => array(
				'name'    => esc_html__( 'Button', 'basetheme' ),
				'section' => 'thebase_customizer_mobile_button',
			),
			'mobile-social'        => array(
				'name'    => esc_html__( 'Social', 'basetheme' ),
				'section' => 'thebase_customizer_mobile_social',
			),
			'mobile-html'          => array(
				'name'    => esc_html__( 'HTML', 'basetheme' ),
				'section' => 'thebase_customizer_mobile_html',
			),
			'popup-toggle'          => array(
				'name'    => esc_html__( 'Trigger', 'basetheme' ),
				'section' => 'thebase_customizer_mobile_trigger',
			),
		),
		'input_attrs'  => array(
			'group' => 'header_mobile_items',
			'rows'  => array( 'popup', 'top', 'main', 'bottom' ),
			'zones' => array(
				'popup' => array(
					'popup_content' => esc_html__( 'Popup Content', 'basetheme' ),
				),
				'top' => array(
					'top_left'   => is_rtl() ? esc_html__( 'Top - Right', 'basetheme' ) : esc_html__( 'Top - Left', 'basetheme' ),
					'top_center' => esc_html__( 'Top - Center', 'basetheme' ),
					'top_right'  => is_rtl() ? esc_html__( 'Top - Left', 'basetheme' ) : esc_html__( 'Top - Right', 'basetheme' ),
				),
				'main' => array(
					'main_left'   => is_rtl() ? esc_html__( 'Main - Right', 'basetheme' ) : esc_html__( 'Main - Left', 'basetheme' ),
					'main_center' => esc_html__( 'Main - Center', 'basetheme' ),
					'main_right'  => is_rtl() ? esc_html__( 'Main - Left', 'basetheme' ) : esc_html__( 'Main - Right', 'basetheme' ),
				),
				'bottom' => array(
					'bottom_left'   => is_rtl() ? esc_html__( 'Bottom - Right', 'basetheme' ) : esc_html__( 'Bottom - Left', 'basetheme' ),
					'bottom_center' => esc_html__( 'Bottom - Center', 'basetheme' ),
					'bottom_right'  => is_rtl() ? esc_html__( 'Bottom - Left', 'basetheme' ) : esc_html__( 'Bottom - Right', 'basetheme' ),
				),
			),
		),
	),
	'header_mobile_available_items' => array(
		'control_type' => 'thebase_available_control',
		'section'      => 'header_layout',
		'settings'     => false,
		'input_attrs'  => array(
			'group'  => 'header_mobile_items',
			'zones'  => array( 'popup', 'top', 'main', 'bottom' ),
		),
		'context'      => array(
			array(
				'setting'  => '__device',
				'operator' => 'in',
				'value'    => array( 'tablet', 'mobile' ),
			),
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
	),
	'header_transparent_link' => array(
		'control_type' => 'thebase_focus_button_control',
		'section'      => 'header_layout',
		'settings'     => false,
		'priority'     => 20,
		'label'        => esc_html__( 'Transparent Header', 'basetheme' ),
		'input_attrs'  => array(
			'section' => 'thebase_customizer_transparent_header',
		),
	),
	'header_sticky_link' => array(
		'control_type' => 'thebase_focus_button_control',
		'section'      => 'header_layout',
		'settings'     => false,
		'priority'     => 20,
		'label'        => esc_html__( 'Sticky Header', 'basetheme' ),
		'input_attrs'  => array(
			'section' => 'thebase_customizer_header_sticky',
		),
	),
	'header_wrap_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'header_layout',
		'label'        => esc_html__( 'Header Background', 'basetheme' ),
		'default'      => thebase()->default( 'header_wrap_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#masthead',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Header Background', 'basetheme' ),
		),
	),
	'header_mobile_switch' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'header_layout',
		'transport'    => 'refresh',
		'label'        => esc_html__( 'Screen size to switch to mobile header', 'basetheme' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
		'default'      => thebase()->default( 'header_mobile_switch' ),
		'input_attrs'  => array(
			'min'        => array(
				'px'  => 0,
			),
			'max'        => array(
				'px'  => 4000,
			),
			'step'       => array(
				'px'  => 1,
			),
			'units'      => array( 'px' ),
			'responsive' => false,
		),
	),
);

Theme_Customizer::add_settings( $settings );

