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
	'llms_membership_archive_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'llms_membership_archive',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'llms_membership_archive',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'llms_membership_archive_design',
			),
			'active' => 'general',
		),
	),
	'llms_membership_archive_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'llms_membership_archive_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'llms_membership_archive',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'llms_membership_archive_design',
			),
			'active' => 'design',
		),
	),
	'info_llms_membership_archive_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_membership_archive',
		'priority'     => 2,
		'label'        => esc_html__( 'Archive Title', 'basetheme' ),
		'settings'     => false,
	),
	'info_llms_membership_archive_title_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_membership_archive_design',
		'priority'     => 2,
		'label'        => esc_html__( 'Archive Title', 'basetheme' ),
		'settings'     => false,
	),
	'llms_membership_archive_title' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'llms_membership_archive',
		'priority'     => 3,
		'default'      => thebase()->default( 'llms_membership_archive_title' ),
		'label'        => esc_html__( 'Show Archive Title?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'llms_membership_archive_title_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_membership_archive',
		'label'        => esc_html__( 'Archive Title Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_membership_archive_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
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
	'llms_membership_archive_title_inner_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_membership_archive',
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_membership_archive_title_inner_layout' ),
		'label'        => esc_html__( 'Container Width', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'llms_membership_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.llms_membership-archive-hero-section',
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
	'llms_membership_archive_title_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_membership_archive',
		'label'        => esc_html__( 'Membership Archive Title Align', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'llms_membership_archive_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.llms_membership-archive-title',
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
	'llms_membership_archive_title_height' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'llms_membership_archive',
		'priority'     => 5,
		'label'        => esc_html__( 'Container Min Height', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'llms_membership_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#inner-wrap .llms_membership-archive-hero-section .entry-header',
				'property' => 'min-height',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'default'      => thebase()->default( 'llms_membership_archive_title_height' ),
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
	'llms_membership_archive_title_elements' => array(
		'control_type' => 'thebase_sorter_control',
		'section'      => 'llms_membership_archive',
		'priority'     => 6,
		'default'      => thebase()->default( 'llms_membership_archive_title_elements' ),
		'label'        => esc_html__( 'Title Elements', 'basetheme' ),
		'transport'    => 'refresh',
		'settings'     => array(
			'elements'    => 'llms_membership_archive_title_elements',
			'title'       => 'llms_membership_archive_title_element_title',
			'breadcrumb'  => 'llms_membership_archive_title_element_breadcrumb',
			'description' => 'llms_membership_archive_title_element_description',
		),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
	),
	'llms_membership_archive_title_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Title Color', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_title_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.llms_membership-archive-title h1',
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
	'llms_membership_archive_title_description_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Description Colors', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_title_description_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.llms_membership-archive-title .archive-description',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.llms_membership-archive-title .archive-description a:hover',
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
	'llms_membership_archive_title_breadcrumb_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Breadcrumb Colors', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_title_breadcrumb_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.llms_membership-archive-title .thebase-breadcrumbs',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.llms_membership-archive-title .thebase-breadcrumbs a:hover',
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
	'llms_membership_archive_title_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Archive Title Background', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_title_background' ),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'llms_membership_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#inner-wrap .llms_membership-archive-hero-section .entry-hero-container-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Membership Archive Title Background', 'basetheme' ),
		),
	),
	'llms_membership_archive_title_overlay_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Background Overlay Color', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_title_overlay_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.llms_membership-archive-hero-section .hero-section-overlay',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'llms_membership_archive_title_layout',
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
	'llms_membership_archive_title_border' => array(
		'control_type' => 'thebase_borders_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Border', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_title_border' ),
		'context'      => array(
			array(
				'setting'    => 'llms_membership_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'llms_membership_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'settings'     => array(
			'border_top'    => 'llms_membership_archive_title_top_border',
			'border_bottom' => 'llms_membership_archive_title_bottom_border',
		),
		'live_method'     => array(
			'llms_membership_archive_title_top_border' => array(
				array(
					'type'     => 'css_border',
					'selector' => '.llms_membership-archive-hero-section .entry-hero-container-inner',
					'pattern'  => '$',
					'property' => 'border-top',
					'key'      => 'border',
				),
			),
			'llms_membership_archive_title_bottom_border' => array( 
				array(
					'type'     => 'css_border',
					'selector' => '.llms_membership-archive-hero-section .entry-hero-container-inner',
					'property' => 'border-bottom',
					'pattern'  => '$',
					'key'      => 'border',
				),
			),
		),
	),
	'info_llms_membership_archive_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_membership_archive',
		'priority'     => 10,
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'settings'     => false,
	),
	'info_llms_membership_archive_layout_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'llms_membership_archive_design',
		'priority'     => 10,
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'settings'     => false,
	),
	'llms_membership_archive_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_membership_archive',
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'llms_membership_archive_layout' ),
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
	'llms_membership_archive_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_membership_archive',
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'llms_membership_archive_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.post-type-archive-llms_membership',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
			array(
				'type'     => 'class',
				'selector' => 'body.tax-membership_cat',
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
	'llms_membership_archive_columns' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'llms_membership_archive',
		'priority'     => 20,
		'label'        => esc_html__( 'Membership Archive Columns', 'basetheme' ),
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'llms_membership_archive_columns' ),
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
	'llms_membership_archive_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Site Background', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-llms_membership, body.tax-membership_cat',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Membership Archive Background', 'basetheme' ),
		),
	),
	'llms_membership_archive_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'llms_membership_archive_design',
		'label'        => esc_html__( 'Content Background', 'basetheme' ),
		'default'      => thebase()->default( 'llms_membership_archive_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-llms_membership .content-bg, body.tax-membership_cat .content-bg, body.tax-membership_cat.content-style-unboxed .site, body.post-type-archive-llms_membership.content-style-unboxed .site',
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

