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
	'info_woo_account_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'account_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'My Account Navigation', 'basetheme' ),
		'settings'     => false,
	),
	'woo_account_navigation_avatar' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'account_layout',
		'priority'     => 3,
		'default'      => thebase()->default( 'woo_account_navigation_avatar' ),
		'label'        => esc_html__( 'Show User Name and Avatar?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'woo_account_navigation_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'account_layout',
		'label'        => esc_html__( 'Navigation Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'woo_account_navigation_layout' ),
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
);

Theme_Customizer::add_settings( $settings );

