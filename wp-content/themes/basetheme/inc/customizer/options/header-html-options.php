<?php
/**
 * Header Main Row Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$settings = array(
	'header_html_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'header_html',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'header_html',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'header_html_design',
			),
			'active' => 'general',
		),
	),
	'header_html_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'header_html_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'header_html',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'header_html_design',
			),
			'active' => 'design',
		),
	),
	'header_html_content' => array(
		'control_type' => 'thebase_editor_control',
		'section'      => 'header_html',
		'sanitize'     => 'wp_kses_post',
		'priority'     => 4,
		'default'      => thebase()->default( 'header_html_content' ),
		'partial'      => array(
			'selector'            => '.header-html',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_html',
		),
		'input_attrs'  => array(
			'id' => 'header_html',
		),
	),
	'header_html_wpautop' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'header_html',
		'default'      => thebase()->default( 'header_html_wpautop' ),
		'label'        => esc_html__( 'Automatically Add Paragraphs', 'basetheme' ),
		'partial'      => array(
			'selector'            => '.header-html',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_html',
		),
	),
	'header_html_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'header_html_design',
		'label'        => esc_html__( 'Font', 'basetheme' ),
		'default'      => thebase()->default( 'header_html_typography' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '#main-header .header-html',
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
			'id' => 'header_html_typography',
		),
	),
	'header_html_link_style' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'header_html_design',
		'default'      => thebase()->default( 'header_html_link_style' ),
		'label'        => esc_html__( 'Link Style', 'basetheme' ),
		'input_attrs'  => array(
			'options' => array(
				'normal' => array(
					'name' => __( 'Underline', 'basetheme' ),
				),
				'plain' => array(
					'name' => __( 'No Underline', 'basetheme' ),
				),
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '#main-header .header-html',
				'pattern'  => 'inner-link-style-$',
				'key'      => '',
			),
		),
	),
	'header_html_link_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'header_html_design',
		'label'        => esc_html__( 'Link Colors', 'basetheme' ),
		'default'      => thebase()->default( 'header_html_link_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-html a',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-html a:hover',
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
	'header_html_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_html_design',
		'priority'     => 10,
		'default'      => thebase()->default( 'header_html_margin' ),
		'label'        => esc_html__( 'Margin', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-html',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
);

Theme_Customizer::add_settings( $settings );

