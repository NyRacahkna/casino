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
	'info_llms_quiz_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_quiz_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'Quiz Title', 'basetheme' ),
		'settings'     => false,
	),
	'llms_quiz_title' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'llms_quiz_layout',
		'priority'     => 3,
		'default'      => thebase()->default( 'llms_quiz_title' ),
		'label'        => esc_html__( 'Show Quiz Title?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'llms_quiz_title_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_quiz_layout',
		'label'        => esc_html__( 'Quiz Title Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_quiz_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'llms_quiz_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'normal' => array(
					'tooltip' => __( 'In Content', 'basetheme' ),
					'icon'    => 'incontent',
				),
				'above' => array(
					'tooltip' => __( 'Above Content', 'basetheme' ),
					'icon'    => 'abovecontent',
				),
			),
			'responsive' => false,
			'class'      => 'thebase-two-col',
		),
	),
	'llms_quiz_title_inner_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_quiz_layout',
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_quiz_title_inner_layout' ),
		'label'        => esc_html__( 'Title Container Width', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'llms_quiz_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'llms_quiz_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.llms_quiz-hero-section',
				'pattern'  => 'entry-hero-layout-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'standard' => array(
					'tooltip' => __( 'Background Fullwidth, Content Contained', 'basetheme' ),
					'name'    => __( 'Standard', 'basetheme' ),
					'icon'    => '',
				),
				'fullwidth' => array(
					'tooltip' => __( 'Background & Content Fullwidth', 'basetheme' ),
					'name'    => __( 'Fullwidth', 'basetheme' ),
					'icon'    => '',
				),
				'contained' => array(
					'tooltip' => __( 'Background & Content Contained', 'basetheme' ),
					'name'    => __( 'Contained', 'basetheme' ),
					'icon'    => '',
				),
			),
			'responsive' => false,
		),
	),
	'llms_quiz_title_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_quiz_layout',
		'label'        => esc_html__( 'Quiz Title Align', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_quiz_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'llms_quiz_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.llms_quiz-title',
				'pattern'  => array(
					'desktop' => 'title-align-$',
					'tablet'  => 'title-tablet-align-$',
					'mobile'  => 'title-mobile-align-$',
				),
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'left' => array(
					'tooltip'  => __( 'Left Align Title', 'basetheme' ),
					'dashicon' => 'editor-alignleft',
				),
				'center' => array(
					'tooltip'  => __( 'Center Align Title', 'basetheme' ),
					'dashicon' => 'editor-aligncenter',
				),
				'right' => array(
					'tooltip'  => __( 'Right Align Title', 'basetheme' ),
					'dashicon' => 'editor-alignright',
				),
			),
			'responsive' => true,
		),
	),
	'info_llms_quiz_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_quiz_layout',
		'priority'     => 10,
		'label'        => esc_html__( 'Quiz Layout', 'basetheme' ),
		'settings'     => false,
	),
	'llms_quiz_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_quiz_layout',
		'label'        => esc_html__( 'Quiz Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'llms_quiz_layout' ),
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
			'responsive' => false,
			'class'      => 'thebase-three-col',
		),
	),
	'llms_quiz_sidebar_id' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'llms_quiz_layout',
		'label'        => esc_html__( 'Quiz Default Sidebar', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'llms_quiz_sidebar_id' ),
		'input_attrs'  => array(
			'options' => thebase()->sidebar_options(),
		),
	),
	'llms_quiz_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_quiz_layout',
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'llms_quiz_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-llms_quiz',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'boxed' => array(
					'tooltip' => __( 'Boxed', 'basetheme' ),
					'icon' => 'boxed',
				),
				'unboxed' => array(
					'tooltip' => __( 'Unboxed', 'basetheme' ),
					'icon' => 'narrow',
				),
			),
			'responsive' => false,
			'class'      => 'thebase-two-col',
		),
	),
	'llms_quiz_vertical_padding' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_quiz_layout',
		'label'        => esc_html__( 'Content Vertical Padding', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'llms_quiz_vertical_padding' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-llms_quiz',
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
);

Theme_Customizer::add_settings( $settings );

