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
	'sfwd-courses_archive_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'sfwd_courses_archive_layout',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'sfwd_courses_archive_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'sfwd_courses_archive_layout_design',
			),
			'active' => 'general',
		),
	),
	'sfwd-courses_archive_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'sfwd_courses_archive_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'sfwd_courses_archive_layout_design',
			),
			'active' => 'design',
		),
	),
	'info_sfwd-courses_archive_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'Archive Title', 'basetheme' ),
		'settings'     => false,
	),
	'info_sfwd-courses_archive_title_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'priority'     => 2,
		'label'        => esc_html__( 'Archive Title', 'basetheme' ),
		'settings'     => false,
	),
	'sfwd-courses_archive_title' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 3,
		'default'      => thebase()->default( 'sfwd-courses_archive_title' ),
		'label'        => esc_html__( 'Show Archive Title?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'sfwd-courses_archive_title_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_courses_archive_layout',
		'label'        => esc_html__( 'Archive Title Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'sfwd-courses_archive_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
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
	'sfwd-courses_archive_title_inner_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 4,
		'default'      => thebase()->default( 'sfwd-courses_archive_title_inner_layout' ),
		'label'        => esc_html__( 'Container Width', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-courses_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.sfwd-courses-archive-hero-section',
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
	'sfwd-courses_archive_title_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_courses_archive_layout',
		'label'        => esc_html__( 'Course Title Align', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'sfwd-courses_archive_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.sfwd-courses-archive-title',
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
	'sfwd-courses_archive_title_height' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 5,
		'label'        => esc_html__( 'Container Min Height', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-courses_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#inner-wrap .sfwd-courses-archive-hero-section .entry-header',
				'property' => 'min-height',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_height' ),
		'input_attrs'  => array(
			'min'     => array(
				'px'  => 10,
				'em'  => 1,
				'rem' => 1,
				'vh'  => 2,
			),
			'max'     => array(
				'px'  => 800,
				'em'  => 12,
				'rem' => 12,
				'vh'  => 100,
			),
			'step'    => array(
				'px'  => 1,
				'em'  => 0.01,
				'rem' => 0.01,
				'vh'  => 1,
			),
			'units'   => array( 'px', 'em', 'rem', 'vh' ),
		),
	),
	'sfwd-courses_archive_title_elements' => array(
		'control_type' => 'thebase_sorter_control',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 6,
		'default'      => thebase()->default( 'sfwd-courses_archive_title_elements' ),
		'label'        => esc_html__( 'Title Elements', 'basetheme' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'settings'     => array(
			'elements'    => 'sfwd-courses_archive_title_elements',
			'title'       => 'sfwd-courses_archive_title_element_title',
			'breadcrumb'  => 'sfwd-courses_archive_title_element_breadcrumb',
			'description' => 'sfwd-courses_archive_title_element_description',
		),
	),
	'sfwd-courses_archive_title_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Title Color', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.sfwd-courses-archive-title h1',
				'property' => 'color',
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
	'sfwd-courses_archive_title_description_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Description Colors', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_description_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.sfwd-courses-archive-title .archive-description',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.sfwd-courses-archive-title .archive-description a:hover',
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
					'tooltip' => __( 'Link Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'sfwd-courses_archive_title_breadcrumb_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Breadcrumb Colors', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_breadcrumb_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.sfwd-courses-archive-title .thebase-breadcrumbs',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.sfwd-courses-archive-title .thebase-breadcrumbs a:hover',
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
					'tooltip' => __( 'Link Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'sfwd-courses_archive_title_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Archive Title Background', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_background' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-courses_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#inner-wrap .sfwd-courses-archive-hero-section .entry-hero-container-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Course Archive Title Background', 'basetheme' ),
		),
	),
	'sfwd-courses_archive_title_overlay_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Background Overlay Color', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_overlay_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.sfwd-courses-archive-hero-section .hero-section-overlay',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-courses_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
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
	'sfwd-courses_archive_title_border' => array(
		'control_type' => 'thebase_borders_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Border', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_title_border' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-courses_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-courses_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'settings'     => array(
			'border_top'    => 'sfwd-courses_archive_title_top_border',
			'border_bottom' => 'sfwd-courses_archive_title_bottom_border',
		),
		'live_method'     => array(
			'sfwd-courses_archive_title_top_border' => array(
				array(
					'type'     => 'css_border',
					'selector' => '.sfwd-courses-archive-hero-section .entry-hero-container-inner',
					'pattern'  => '$',
					'property' => 'border-top',
					'key'      => 'border',
				),
			),
			'sfwd-courses_archive_title_bottom_border' => array( 
				array(
					'type'     => 'css_border',
					'selector' => '.sfwd-courses-archive-hero-section .entry-hero-container-inner',
					'property' => 'border-bottom',
					'pattern'  => '$',
					'key'      => 'border',
				),
			),
		),
	),
	'info_sfwd-courses_archive_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 10,
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'settings'     => false,
	),
	'info_sfwd-courses_archive_layout_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'priority'     => 10,
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'settings'     => false,
	),
	'sfwd-courses_archive_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_courses_archive_layout',
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'sfwd-courses_archive_layout' ),
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
	'sfwd-courses_archive_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_courses_archive_layout',
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'sfwd-courses_archive_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.post-type-archive-sfwd-courses',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'boxed' => array(
					'tooltip' => __( 'Boxed', 'basetheme' ),
					'icon' => 'gridBoxed',
				),
				'unboxed' => array(
					'tooltip' => __( 'Unboxed', 'basetheme' ),
					'icon' => 'gridUnboxed',
				),
			),
			'responsive' => false,
			'class'      => 'thebase-two-col',
		),
	),
	'sfwd-courses_archive_columns' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_courses_archive_layout',
		'priority'     => 20,
		'label'        => esc_html__( 'Course Archive Columns', 'basetheme' ),
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'sfwd-courses_archive_columns' ),
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
	'sfwd-courses_archive_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Site Background', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-sfwd-courses',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Course Archive Background', 'basetheme' ),
		),
	),
	'sfwd-courses_archive_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'sfwd_courses_archive_layout_design',
		'label'        => esc_html__( 'Content Background', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-courses_archive_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-sfwd-courses .content-bg, body.post-type-archive-sfwd-courses.content-style-unboxed .site',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Archive Content Background', 'basetheme' ),
		),
	),
);

Theme_Customizer::add_settings( $settings );

