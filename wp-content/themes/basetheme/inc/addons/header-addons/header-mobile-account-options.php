<?php
/**
 * Header Account Options.
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$settings = array(
	'header_mobile_account_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'header_mobile_account',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'header_mobile_account',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'header_mobile_account_design',
			),
			'active' => 'general',
		),
	),
	'header_mobile_account_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'header_mobile_account_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'header_mobile_account',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'header_mobile_account_design',
			),
			'active' => 'design',
		),
	),
	'header_mobile_account_preview' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_preview' ),
		'label'        => esc_html__( 'Preview/Customize', 'basetheme' ),
		'transport'    => 'refresh',
		'input_attrs'  => array(
			'layout' => array(
				'in' => array(
					'name' => __( 'Logged in view', 'basetheme' ),
				),
				'out' => array(
					'name' => __( 'Logged out view', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'base-two-forced',
		),
	),
	'info_header_mobile_account_logged_out' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'header_mobile_account',
		'label'        => esc_html__( 'Logged Out Options', 'basetheme' ),
		'settings'     => false,
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
	),
	'header_mobile_account_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_style' ),
		'label'        => esc_html__( 'Account Style', 'basetheme' ),
		'partial'      => array(
			'selector'            => '.header-mobile-account-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'label' => array(
					'name' => __( 'Label', 'basetheme' ),
				),
				'icon' => array(
					'name' => __( 'Icon', 'basetheme' ),
				),
				'label_icon' => array(
					'name' => __( 'Label + Icon', 'basetheme' ),
				),
				'icon_label' => array(
					'name' => __( 'Icon + Label', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'base-two-forced',
		),
	),
	'header_mobile_account_label' => array(
		'control_type' => 'thebase_text_control',
		'sanitize'     => 'sanitize_text_field',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_label' ),
		'label'        => esc_html__( 'Account Label', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'html',
				'selector' => '.header-mobile-account-in-wrap .header-account-label',
				'pattern'  => '$',
				'key'      => '',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_style',
				'operator'   => 'contain',
				'value'      => 'label',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
	),
	'header_mobile_account_icon' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_icon' ),
		'label'        => esc_html__( 'Account Icon', 'basetheme' ),
		'partial'      => array(
			'selector'            => '.header-mobile-account-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_style',
				'operator'   => 'contain',
				'value'      => 'icon',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'account' => array(
					'icon' => 'account',
				),
				'account2' => array(
					'icon' => 'account2',
				),
				'account3' => array(
					'icon' => 'account3',
				),
			),
			'responsive' => false,
		),
	),
	'header_mobile_account_action' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_action' ),
		'label'        => esc_html__( 'Account Action', 'basetheme' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'link' => array(
					'name' => __( 'Link', 'basetheme' ),
				),
				'modal' => array(
					'name' => __( 'Modal Login', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'base-two-forced',
		),
	),
	'header_mobile_account_modal_registration' => array(
		'control_type' => 'thebase_switch_control',
		'section'      => 'header_mobile_account',
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_action',
				'operator'   => '=',
				'value'      => 'modal',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'default'      => thebase()->default( 'header_mobile_account_modal_registration' ),
		'label'        => esc_html__( 'Show registration link below login?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'header_account_modal_registration_link' => array(
		'control_type' => 'thebase_text_control',
		'sanitize'     => 'esc_url_raw',
		'section'      => 'header_mobile_account',
		'label'        => esc_html__( 'Registration Link', 'basetheme' ),
		'default'      => thebase()->default( 'header_account_modal_registration_link' ),
		'priority'     => 20,
		'partial'      => array(
			'selector'            => '.header-mobile-account-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
			array(
				'setting'    => 'header_mobile_account_action',
				'operator'   => '=',
				'value'      => 'modal',
			),
			array(
				'setting'    => 'header_mobile_account_modal_registration',
				'operator'   => '=',
				'value'      => true,
			),
		),
	),
	'header_mobile_account_link' => array(
		'control_type' => 'thebase_text_control',
		'section'      => 'header_mobile_account',
		'sanitize'     => 'esc_url_raw',
		'label'        => esc_html__( 'Account Item Link', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_link' ),
		'partial'      => array(
			'selector'            => '.header-mobile-account-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
			array(
				'setting'    => 'header_mobile_account_action',
				'operator'   => '!=',
				'value'      => 'modal',
			),
		),
	),
	'info_header_mobile_account_design_logged_out' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Logged Out Options', 'basetheme' ),
		'settings'     => false,
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
	),
	'header_mobile_account_icon_size' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Icon Size', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button .nav-drop-title-wrap > .thebase-svg-iconset, .header-mobile-account-wrap .header-account-button > .thebase-svg-iconset',
				'property' => 'font-size',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
			array(
				'setting'    => 'header_mobile_account_style',
				'operator'   => 'contain',
				'value'      => 'icon',
			),
		),
		'default'      => thebase()->default( 'header_mobile_account_icon_size' ),
		'input_attrs'  => array(
			'min'        => array(
				'px'  => 0,
				'em'  => 0,
				'rem' => 0,
			),
			'max'        => array(
				'px'  => 100,
				'em'  => 12,
				'rem' => 12,
			),
			'step'       => array(
				'px'  => 1,
				'em'  => 0.01,
				'rem' => 0.01,
			),
			'units'      => array( 'px', 'em', 'rem' ),
			'responsive' => false,
		),
	),
	'header_mobile_account_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Account Colors', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'header_mobile_account_background' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Account Background', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_background' ),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button:hover',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Background', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Background', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'header_mobile_account_radius' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_radius' ),
		'label'        => esc_html__( 'Border Radius', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button',
				'property' => 'border-radius',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'header_mobile_account_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Label Font', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_typography' ),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_style',
				'operator'   => 'contain',
				'value'      => 'label',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.header-mobile-account-wrap .header-account-button .header-account-label',
				'pattern'  => array(
					'desktop' => '$',
					'tablet'  => '$',
					'mobile'  => '$',
				),
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'header_mobile_account_typography',
			'options' => 'no-color',
		),
	),
	'header_mobile_account_padding' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_padding' ),
		'label'        => esc_html__( 'Padding', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap .header-account-button',
				'property' => 'padding',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'header_mobile_account_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_margin' ),
		'label'        => esc_html__( 'Margin', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-wrap',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'out',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'info_header_mobile_account_logged_in' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'header_mobile_account',
		'label'        => esc_html__( 'Logged In Options', 'basetheme' ),
		'settings'     => false,
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
	),
	'header_mobile_account_in_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_in_style' ),
		'label'        => esc_html__( 'Account Style', 'basetheme' ),
		'partial'      => array(
			'selector'            => '.header-mobile-account-in-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'label' => array(
					'name' => __( 'Label', 'basetheme' ),
				),
				'icon' => array(
					'name' => __( 'Icon', 'basetheme' ),
				),
				'label_icon' => array(
					'name' => __( 'Label + Icon', 'basetheme' ),
				),
				'icon_label' => array(
					'name' => __( 'Icon + Label', 'basetheme' ),
				),
				'user_label' => array(
					'name' => __( 'Avatar + Label', 'basetheme' ),
				),
				'label_user' => array(
					'name' => __( 'Label + Avatar', 'basetheme' ),
				),
				'user_name' => array(
					'name' => __( 'Avatar + User Name', 'basetheme' ),
				),
				'name_user' => array(
					'name' => __( 'User Name + Avatar', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'base-two-forced',
		),
	),
	'header_mobile_account_in_label' => array(
		'control_type' => 'thebase_text_control',
		'sanitize'     => 'sanitize_text_field',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_in_label' ),
		'label'        => esc_html__( 'Account Label', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_in_style',
				'operator'   => 'contain',
				'value'      => 'label',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'html',
				'selector' => '.header-mobile-account-in-wrap .header-account-label',
				'pattern'  => '$',
				'key'      => '',
			),
		),
	),
	'header_mobile_account_in_icon' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'header_mobile_account',
		'default'      => thebase()->default( 'header_mobile_account_in_icon' ),
		'label'        => esc_html__( 'Account Icon', 'basetheme' ),
		'partial'      => array(
			'selector'            => '.header-mobile-account-in-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_in_style',
				'operator'   => 'contain',
				'value'      => 'icon',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'account' => array(
					'icon' => 'account',
				),
				'account2' => array(
					'icon' => 'account2',
				),
				'account3' => array(
					'icon' => 'account3',
				),
			),
			'responsive' => false,
		),
	),
	// 'header_mobile_account_in_action' => array(
	// 	'control_type' => 'thebase_radio_icon_control',
	// 	'section'      => 'header_mobile_account',
	// 	'default'      => thebase()->default( 'header_mobile_account_in_action' ),
	// 	'label'        => esc_html__( 'Account Action', 'basetheme' ),
	// 	'transport'    => 'refresh',
	// 	'context'      => array(
	// 		array(
	// 			'setting'    => 'header_mobile_account_preview',
	// 			'operator'   => '=',
	// 			'value'      => 'in',
	// 		),
	// 	),
	// 	'input_attrs'  => array(
	// 		'layout' => array(
	// 			'link' => array(
	// 				'name' => __( 'Link', 'basetheme' ),
	// 			),
	// 		),
	// 		'responsive' => false,
	// 		'class'      => 'base-two-forced',
	// 	),
	// ),
	'header_mobile_account_in_link' => array(
		'control_type' => 'thebase_text_control',
		'section'      => 'header_mobile_account',
		'sanitize'     => 'esc_url_raw',
		'label'        => esc_html__( 'Account Item Link', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_in_link' ),
		'partial'      => array(
			'selector'            => '.header-mobile-account-in-wrap',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_mobile_account',
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
	),
	'info_header_mobile_account_design_logged_in' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Logged In Options', 'basetheme' ),
		'settings'     => false,
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
	),
	'header_mobile_account_in_icon_size' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Icon/Image Size', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button .nav-drop-title-wrap > .thebase-svg-iconset, .header-mobile-account-in-wrap .header-account-button > .thebase-svg-iconset',
				'property' => 'font-size',
				'pattern'  => '$',
				'key'      => 'size',
			),
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-avatar',
				'property' => 'width',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'default'      => thebase()->default( 'header_mobile_account_in_icon_size' ),
		'input_attrs'  => array(
			'min'        => array(
				'px'  => 0,
				'em'  => 0,
				'rem' => 0,
			),
			'max'        => array(
				'px'  => 100,
				'em'  => 12,
				'rem' => 12,
			),
			'step'       => array(
				'px'  => 1,
				'em'  => 0.01,
				'rem' => 0.01,
			),
			'units'      => array( 'px', 'em', 'rem' ),
			'responsive' => false,
		),
	),
	'header_mobile_account_in_image_radius' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_in_image_radius' ),
		'label'        => esc_html__( 'Avatar Border Radius', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-avatar',
				'property' => 'border-radius',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_in_style',
				'operator'   => 'contain',
				'value'      => 'user',
			),
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
	),
	'header_mobile_account_in_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Account Colors', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_in_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
	),
	'header_mobile_account_in_background' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Account Background', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_in_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button:hover',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Background', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Background', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'header_mobile_account_in_radius' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_in_radius' ),
		'label'        => esc_html__( 'Border Radius', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button',
				'property' => 'border-radius',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'header_mobile_account_in_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'header_mobile_account_design',
		'label'        => esc_html__( 'Label/Name Font', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_account_in_typography' ),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.header-mobile-account-in-wrap .header-account-button .header-account-label',
				'pattern'  => array(
					'desktop' => '$',
					'tablet'  => '$',
					'mobile'  => '$',
				),
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'header_mobile_account_in_typography',
			'options' => 'no-color',
		),
	),
	'header_mobile_account_in_padding' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_in_padding' ),
		'label'        => esc_html__( 'Padding', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap .header-account-button',
				'property' => 'padding',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'header_mobile_account_in_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_account_design',
		'default'      => thebase()->default( 'header_mobile_account_in_margin' ),
		'label'        => esc_html__( 'Margin', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.header-mobile-account-in-wrap',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'header_mobile_account_preview',
				'operator'   => '=',
				'value'      => 'in',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	// Mobile Trans.
	'transparent_header_mobile_account_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'Logged out Account Colors', 'basetheme' ),
		'default'      => thebase()->default( 'transparent_header_mobile_account_color' ),
		'context'      => array(
			array(
				'setting'  => '__device',
				'operator' => 'in',
				'value'    => array( 'mobile', 'tablet' ),
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.transparent-header .header-mobile-account-wrap .header-account-button',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.transparent-header .header-mobile-account-wrap .header-account-button:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'transparent_header_mobile_account_background' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'Logged out Account Background', 'basetheme' ),
		'default'      => thebase()->default( 'transparent_header_mobile_account_background' ),
		'context'      => array(
			array(
				'setting'  => '__device',
				'operator' => 'in',
				'value'    => array( 'mobile', 'tablet' ),
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.transparent-header .header-mobile-account-wrap .header-account-button',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.transparent-header .header-mobile-account-wrap .header-account-button:hover',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Background', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Background', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'transparent_header_mobile_account_in_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'Logged in Account Colors', 'basetheme' ),
		'default'      => thebase()->default( 'transparent_header_mobile_account_in_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.mobile-transparent-header .header-mobile-account-in-wrap  .header-account-button',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.mobile-transparent-header .header-mobile-account-in-wrap  .header-account-button:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
		'context'      => array(
			array(
				'setting'  => '__device',
				'operator' => 'in',
				'value'    => array( 'mobile', 'tablet' ),
			),
		),
	),
	'transparent_header_mobile_account_in_background' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'Logged in Account Background', 'basetheme' ),
		'default'      => thebase()->default( 'transparent_header_mobile_account_in_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.mobile-transparent-header .header-mobile-account-in-wrap  .header-account-button',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.mobile-transparent-header .header-mobile-account-in-wrap  .header-account-button:hover',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting'  => '__device',
				'operator' => 'in',
				'value'    => array( 'mobile', 'tablet' ),
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Background', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Background', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
);

Theme_Customizer::add_settings( $settings );

