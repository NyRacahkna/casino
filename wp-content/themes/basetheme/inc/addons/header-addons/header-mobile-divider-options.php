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
	'header_mobile_divider_border' => array(
		'control_type' => 'thebase_border_control',
		'section'      => 'header_mobile_divider',
		'label'        => esc_html__( 'Mobile Divider', 'basetheme' ),
		'default'      => thebase()->default( 'header_mobile_divider_border' ),
		'live_method'     => array(
			array(
				'type'     => 'css_border',
				'selector' => '#mobile-header .header-mobile-divider',
				'pattern'  => '$',
				'property' => 'border-right',
				'pattern'  => '$',
				'key'      => 'border',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'header_mobile_divider_height' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'header_mobile_divider',
		'label'        => esc_html__( 'Mobile Divider Height', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#mobile-header .header-mobile-divider',
				'pattern'  => '$',
				'property' => 'height',
				'key'      => 'size',
			),
		),
		'default'      => thebase()->default( 'header_mobile_divider_height' ),
		'input_attrs'  => array(
			'min'     => array(
				'%'  => 0,
				'px'  => 0,
				'rem' => 0,
			),
			'max'     => array(
				'%'  => 100,
				'px'  => 100,
			),
			'step'    => array(
				'%'  => 1,
				'px'  => 1,
			),
			'units'   => array( '%', 'px' ),
			'responsive' => false,
		),
	),
	'header_mobile_divider_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'header_mobile_divider',
		'priority'     => 10,
		'default'      => thebase()->default( 'header_mobile_divider_margin' ),
		'label'        => esc_html__( 'Margin', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#mobile-header .header-mobile-divider',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'transparent_header_mobile_divider_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'transparent_header_design',
		'label'        => esc_html__( 'Mobile Divider Color', 'basetheme' ),
		'default'      => thebase()->default( 'transparent_header_mobile_divider_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.mobile-transparent-header #mobile-header .header-mobile-divider',
				'property' => 'border-color',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
);

Theme_Customizer::add_settings( $settings );

