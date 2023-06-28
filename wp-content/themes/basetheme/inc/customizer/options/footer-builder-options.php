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
<!-- <div class="thebase-build-tabs nav-tab-wrapper wp-clearfix">
	<a href="#" class="nav-tab preview-desktop thebase-build-tabs-button" data-device="desktop">
		<span class="dashicons dashicons-desktop"></span>
		<span><?php esc_html_e( 'Desktop', 'basetheme' ); ?></span>
	</a>
	<a href="#" class="nav-tab preview-tablet preview-mobile thebase-build-tabs-button" data-device="tablet">
		<span class="dashicons dashicons-smartphone"></span>
		<span><?php esc_html_e( 'Tablet / Mobile', 'basetheme' ); ?></span>
	</a>
</div> -->
<span class="button button-secondary thebase-builder-hide-button thebase-builder-tab-toggle"><span class="dashicons dashicons-no"></span><?php esc_html_e( 'Hide', 'basetheme' ); ?></span>
<span class="button button-secondary thebase-builder-show-button thebase-builder-tab-toggle"><span class="dashicons dashicons-edit"></span><?php esc_html_e( 'Footer Builder', 'basetheme' ); ?></span>
<?php
$builder_tabs = ob_get_clean();
ob_start(); ?>
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
	'footer_builder' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'footer_builder',
		'settings'     => false,
		'description'  => $builder_tabs,
	),
	'footer_items' => array(
		'control_type' => 'thebase_builder_control',
		'section'      => 'footer_builder',
		'default'      => thebase()->default( 'footer_items' ),
		'partial'      => array(
			'selector'            => '#colophon',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\footer_markup',
		),
		'choices'      => array(
			'footer-navigation'          => array(
				'name'    => esc_html__( 'Footer Navigation', 'basetheme' ),
				'section' => 'thebase_customizer_footer_navigation',
			),
			'footer-social'        => array(
				'name'    => esc_html__( 'Social', 'basetheme' ),
				'section' => 'thebase_customizer_footer_social',
			),
			'footer-html'          => array(
				'name'    => esc_html__( 'Copyright', 'basetheme' ),
				'section' => 'thebase_customizer_footer_html',
			),
			'footer-widget1' => array(
				'name'    => esc_html__( 'Widget 1', 'basetheme' ),
				'section' => 'sidebar-widgets-footer1',
			),
			'footer-widget2' => array(
				'name'    => esc_html__( 'Widget 2', 'basetheme' ),
				'section' => 'sidebar-widgets-footer2',
			),
			'footer-widget3' => array(
				'name'    => esc_html__( 'Widget 3', 'basetheme' ),
				'section' => 'sidebar-widgets-footer3',
			),
			'footer-widget4' => array(
				'name'    => esc_html__( 'Widget 4', 'basetheme' ),
				'section' => 'sidebar-widgets-footer4',
			),
			'footer-widget5' => array(
				'name'    => esc_html__( 'Widget 5', 'basetheme' ),
				'section' => 'sidebar-widgets-footer5',
			),
			'footer-widget6' => array(
				'name'    => esc_html__( 'Widget 6', 'basetheme' ),
				'section' => 'sidebar-widgets-footer6',
			),
		),
		'input_attrs'  => array(
			'group' => 'footer_items',
			'rows'  => array( 'top', 'middle', 'bottom' ),
			'zones' => array(
				'top' => array(
					'top_1' => esc_html__( 'Top - 1', 'basetheme' ),
					'top_2' => esc_html__( 'Top - 2', 'basetheme' ),
					'top_3' => esc_html__( 'Top - 3', 'basetheme' ),
					'top_4' => esc_html__( 'Top - 4', 'basetheme' ),
					'top_5' => esc_html__( 'Top - 5', 'basetheme' ),
				),
				'middle' => array(
					'middle_1' => esc_html__( 'Middle - 1', 'basetheme' ),
					'middle_2' => esc_html__( 'Middle - 2', 'basetheme' ),
					'middle_3' => esc_html__( 'Middle - 3', 'basetheme' ),
					'middle_4' => esc_html__( 'Middle - 4', 'basetheme' ),
					'middle_5' => esc_html__( 'Middle - 5', 'basetheme' ),
				),
				'bottom' => array(
					'bottom_1' => esc_html__( 'Bottom - 1', 'basetheme' ),
					'bottom_2' => esc_html__( 'Bottom - 2', 'basetheme' ),
					'bottom_3' => esc_html__( 'Bottom - 3', 'basetheme' ),
					'bottom_4' => esc_html__( 'Bottom - 4', 'basetheme' ),
					'bottom_5' => esc_html__( 'Bottom - 5', 'basetheme' ),
				),
			),
		),
	),
	'footer_tab_settings' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'footer_layout',
		'settings'     => false,
		'priority'     => 1,
		'description'  => $compontent_tabs,
	),
	'footer_available_items' => array(
		'control_type' => 'thebase_available_control',
		'section'      => 'footer_layout',
		'settings'     => false,
		'input_attrs'  => array(
			'group'  => 'footer_items',
			'zones'  => array( 'top', 'middle', 'bottom' ),
		),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
	),
	'footer_wrap_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'footer_layout',
		'label'        => esc_html__( 'Footer Background', 'basetheme' ),
		'default'      => thebase()->default( 'footer_wrap_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#colophon',
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
			'tooltip'  => __( 'Footer Background', 'basetheme' ),
		),
	),
	'enable_footer_on_bottom' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'footer_layout',
		'default'      => thebase()->default( 'enable_footer_on_bottom' ),
		'label'        => esc_html__( 'Keep footer on bottom of screen', 'basetheme' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
	),
);

Theme_Customizer::add_settings( $settings );

