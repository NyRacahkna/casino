<?php
/**
 * Product Layout Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$settings = array(
	'info_llms_dashboard_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_dashboard_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'Dashboard Navigation', 'basetheme' ),
		'settings'     => false,
	),
	'llms_dashboard_navigation_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_dashboard_layout',
		'label'        => esc_html__( 'Navigation Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_dashboard_navigation_layout' ),
		'input_attrs'  => array(
			'layout' => array(
				'left' => array(
					'tooltip' => __( 'Positioned on Left Content', 'basetheme' ),
					'name'    => __( 'Left', 'basetheme' ),
					'icon'    => '',
				),
				'above' => array(
					'tooltip' => __( 'Positioned on Top Content', 'basetheme' ),
					'name'    => __( 'Above', 'basetheme' ),
					'icon'    => '',
				),
				'right' => array(
					'tooltip' => __( 'Positioned on Right Content', 'basetheme' ),
					'name'    => __( 'Right', 'basetheme' ),
					'icon'    => '',
				),
			),
			'responsive' => false,
		),
	),
	'llms_dashboard_archive_columns' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_dashboard_layout',
		'priority'     => 20,
		'label'        => esc_html__( 'Course and Membership Items Columns', 'basetheme' ),
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'llms_dashboard_archive_columns' ),
		'input_attrs'  => array(
			'layout' => array(
				'2' => array(
					'name' => __( '2', 'basetheme' ),
				),
				'3' => array(
					'name' => __( '3', 'basetheme' ),
				),
				'4' => array(
					'name' => __( '4', 'basetheme' ),
				),
			),
			'responsive' => false,
		),
	),
);

Theme_Customizer::add_settings( $settings );

