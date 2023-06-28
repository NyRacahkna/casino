<?php
/**
 * 404 Layout options.
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$layout_404_settings = array(
	'404_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'general_404',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'general_404',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'general_404_design',
			),
			'active' => 'general',
		),
	),
	'404_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'general_404_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'general_404',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'general_404_design',
			),
			'active' => 'design',
		),
	),
	'info_404_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'general_404',
		'priority'     => 10,
		'label'        => esc_html__( '404 Layout', 'basetheme' ),
		'settings'     => false,
	),
	'info_404_layout_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'general_404_design',
		'priority'     => 10,
		'label'        => esc_html__( '404 Layout', 'basetheme' ),
		'settings'     => false,
	),
	'404_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'general_404',
		'label'        => esc_html__( '404 Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( '404_layout' ),
		'input_attrs'  => array(
			'layout' => array(
				'normal' => array(
					'name' => __( 'Normal', 'basetheme' ),
					'icon' => 'normal',
				),
				'narrow' => array(
					'name' => __( 'Narrow', 'basetheme' ),
					'icon' => 'narrow',
				),
				'fullwidth' => array(
					'name' => __( 'Fullwidth', 'basetheme' ),
					'icon' => 'fullwidth',
				),
				'left' => array(
					'name' => __( 'Left Sidebar', 'basetheme' ),
					'icon' => 'leftsidebar',
				),
				'right' => array(
					'name' => __( 'Right Sidebar', 'basetheme' ),
					'icon' => 'rightsidebar',
				),
			),
			'class'      => 'thebase-three-col',
			'responsive' => false,
		),
	),
	'404_sidebar_id' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'general_404',
		'label'        => esc_html__( '404 Default Sidebar', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( '404_sidebar_id' ),
		'input_attrs'  => array(
			'options' => thebase()->sidebar_options(),
		),
	),
	'404_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'general_404',
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( '404_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.error404',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'boxed' => array(
					'name' => __( 'Boxed', 'basetheme' ),
					'icon' => 'boxed',
				),
				'unboxed' => array(
					'name' => __( 'Unboxed', 'basetheme' ),
					'icon' => 'narrow',
				),
			),
			'responsive' => false,
			'class'      => 'thebase-two-col',
		),
	),
	'404_vertical_padding' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'general_404',
		'label'        => esc_html__( 'Content Vertical Padding', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( '404_vertical_padding' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.error404',
				'pattern'  => 'content-vertical-padding-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'show' => array(
					'name' => __( 'Enable', 'basetheme' ),
				),
				'hide' => array(
					'name' => __( 'Disable', 'basetheme' ),
				),
				'top' => array(
					'name' => __( 'Top Only', 'basetheme' ),
				),
				'bottom' => array(
					'name' => __( 'Bottom Only', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'thebase-two-grid',
		),
	),
	'404_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'general_404_design',
		'label'        => esc_html__( 'Site Background', 'basetheme' ),
		'default'      => thebase()->default( '404_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.error404',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( '404 Background', 'basetheme' ),
		),
	),
	'404_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'general_404_design',
		'label'        => esc_html__( 'Content Background', 'basetheme' ),
		'default'      => thebase()->default( '404_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.error404 .content-bg, body.error404.content-style-unboxed .site',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( '404 Content Background', 'basetheme' ),
		),
	),
);
Theme_Customizer::add_settings( $layout_404_settings );
