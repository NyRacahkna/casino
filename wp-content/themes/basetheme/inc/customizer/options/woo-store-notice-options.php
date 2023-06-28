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
	'woocommerce_store_notice_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'woocommerce_store_notice',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'woocommerce_store_notice',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'woocommerce_store_notice_design',
			),
			'active' => 'general',
		),
	),
	'woocommerce_store_notice_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'woocommerce_store_notice_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'woocommerce_store_notice',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'woocommerce_store_notice_design',
			),
			'active' => 'design',
		),
	),
	'woo_store_notice_placement' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_store_notice',
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'woo_store_notice_placement' ),
		'label'        => esc_html__( 'Store Notice Placement', 'basetheme' ),
		'input_attrs'  => array(
			'layout' => array(
				'standard' => array(
					'tooltip' => __( 'Hangs down over the top of the header', 'basetheme' ),
					'name'    => __( 'Hang Over Top', 'basetheme' ),
					'icon'    => '',
				),
				'above' => array(
					'tooltip' => __( 'Placed above the Header', 'basetheme' ),
					'name'    => __( 'Above', 'basetheme' ),
					'icon'    => '',
				),
				'bottom' => array(
					'tooltip' => __( 'Stuck to the Bottom of the screen', 'basetheme' ),
					'name'    => __( 'Bottom', 'basetheme' ),
					'icon'    => '',
				),
			),
			'responsive' => false,
		),
	),
	'woo_store_notice_hide_dismiss' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'woocommerce_store_notice',
		'default'      => thebase()->default( 'woo_store_notice_hide_dismiss' ),
		'label'        => esc_html__( 'Disable Dismiss Button?', 'basetheme' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting'    => 'woo_store_notice_placement',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
	),
	'woo_store_notice_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'woocommerce_store_notice_design',
		'label'        => esc_html__( 'Notice Font', 'basetheme' ),
		'default'      => thebase()->default( 'woo_store_notice_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.woocommerce-demo-store .woocommerce-store-notice, .woocommerce-demo-store .woocommerce-store-notice a',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id' => 'woo_store_notice_font',
		),
	),
	'woo_store_notice_background' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_store_notice_design',
		'label'        => esc_html__( 'Background Color', 'basetheme' ),
		'default'      => thebase()->default( 'woo_store_notice_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.woocommerce-demo-store .woocommerce-store-notice',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Overlay Color', 'basetheme' ),
					'palette' => true,
				),
			),
			'allowGradient' => true,
		),
	),
);

Theme_Customizer::add_settings( $settings );

