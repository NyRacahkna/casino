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
	'info_tribe_events_archive_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'tribe_events_archive',
		'priority'     => 10,
		'label'        => esc_html__( 'Events Layout', 'basetheme' ),
		'settings'     => false,
	),
	'tribe_events_archive_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'tribe_events_archive',
		'label'        => esc_html__( 'Events Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'tribe_events_archive_layout' ),
		'input_attrs'  => array(
			'layout' => array(
				'normal' => array(
					'tooltip' => __( 'Normal', 'basetheme' ),
					'icon' => 'normal',
				),
				'narrow' => array(
					'tooltip' => __( 'Narrow', 'basetheme' ),
					'icon' => 'narrow',
				),
				'fullwidth' => array(
					'tooltip' => __( 'Fullwidth', 'basetheme' ),
					'icon' => 'fullwidth',
				),
				'left' => array(
					'tooltip' => __( 'Left Sidebar', 'basetheme' ),
					'icon' => 'leftsidebar',
				),
				'right' => array(
					'tooltip' => __( 'Right Sidebar', 'basetheme' ),
					'icon' => 'rightsidebar',
				),
			),
			'class'      => 'thebase-three-col',
			'responsive' => false,
		),
	),
	'tribe_events_archive_sidebar_id' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'tribe_events_archive',
		'label'        => esc_html__( 'Events Sidebar', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'tribe_events_archive_sidebar_id' ),
		'input_attrs'  => array(
			'options' => thebase()->sidebar_options(),
		),
	),
	'tribe_events_archive_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'tribe_events_archive',
		'label'        => esc_html__( 'Events Background', 'basetheme' ),
		'default'      => thebase()->default( 'tribe_events_archive_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-tribe_events .site, body.post-type-archive-tribe_events.content-style-unboxed .site',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Events Background', 'basetheme' ),
		),
	),
);

Theme_Customizer::add_settings( $settings );

