<?php
/**
 * Header HTML2 Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$settings = array(
	'header_html2_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'header_html2',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'header_html2',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'header_html2_design',
			),
			'active' => 'general',
		),
	),
	'header_html2_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'header_html2_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'header_html2',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'header_html2_design',
			),
			'active' => 'design',
		),
	),
	'header_html2_content' => array(
		'control_type' => 'thebase_editor_control',
		'sanitize'     => 'wp_kses_post',
		'section'      => 'header_html2',
		'priority'     => 4,
		'default'      => thebase()->default( 'header_html2_content' ),
		'partial'      => array(
			'selector'            => '.header-html2',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_html2',
		),
		'input_attrs'  => array(
			'id' => 'header_html2',
		),
	),
	'header_html2_wpautop' => array(
		'control_type' => 'thebase_switch_control',
		'section'      => 'header_html2',
		'default'      => thebase()->default( 'header_html2_wpautop' ),
		'label'        => esc_html__( 'Automatically Add Paragraphs', 'basetheme' ),
		'partial'      => array(
			'selector'            => '.header-html2',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\header_html2',
		),
	),
	'header_html2_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'header_html2_design',
		'label'        => esc_html__( 'Font', 'basetheme' ),
		'default'      => thebase()->default( 'header_html2_typography' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '#main-header .header-html2',
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
			'id' => 'header_html2_typography',
		),
	),
	'header_html2_link_style' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'header_html2_design',
		'default'      => thebase()->default( 'header_html2_link_style' ),
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
				'selector' => '#main-header .header-html2',
				'pattern'  => 'inner-link-style-$',
				'key'      => '',
			),
		),
	),
	'header_html2_link_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'header_html2_design',
		'label'        => esc_html__( 'Link Colors', 'basetheme' ),
		'default'      => thebase()->default( 'header_html2_link_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-html2 a',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-html2 a:hover',
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
	'header_html2_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_html2_design',
		'priority'     => 10,
		'default'      => thebase()->default( 'header_html2_margin' ),
		'label'        => esc_html__( 'Margin', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#main-header .header-html2',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'transparent_header_html2_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'HTML2 Colors', 'basetheme' ),
		'default'      => thebase()->default( 'transparent_header_html2_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.transparent-header #main-header .header-html2,.mobile-transparent-header .mobile-html2',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.transparent-header #main-header .header-html2 a, .mobile-transparent-header .mobile-html2 a',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'link',
			),
			array(
				'type'     => 'css',
				'selector' => '.transparent-header #main-header .header-html2 a:hover, .mobile-transparent-header .mobile-html2 a:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Color', 'basetheme' ),
					'palette' => true,
				),
				'link' => array(
					'tooltip' => __( 'Link Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Link Hover', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
);

Theme_Customizer::add_settings( $settings );

