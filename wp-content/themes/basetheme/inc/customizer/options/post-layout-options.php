<?php
/**
 * Post Layout Options.
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$thebase_post_settings = array(
	'post_layout_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'post_layout',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'post_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'post_layout_design',
			),
			'active' => 'general',
		),
	),
	'post_layout_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'post_layout_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'post_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'post_layout_design',
			),
			'active' => 'design',
		),
	),
	'info_post_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'post_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'Post Title', 'basetheme' ),
		'settings'     => false,
	),
	'info_post_title_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'post_layout_design',
		'priority'     => 2,
		'label'        => esc_html__( 'Post Title', 'basetheme' ),
		'settings'     => false,
	),
	'post_title' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 3,
		'default'      => thebase()->default( 'post_title' ),
		'label'        => esc_html__( 'Show Post Title?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_title_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Post Title Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'post_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'post_title',
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
	'post_title_inner_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'priority'     => 4,
		'default'      => thebase()->default( 'post_title_inner_layout' ),
		'label'        => esc_html__( 'Container Width', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.post-hero-section',
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
	'post_title_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Post Title Align', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'post_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.post-title',
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
	'post_title_height' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'post_layout',
		'priority'     => 5,
		'label'        => esc_html__( 'Container Min Height', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#inner-wrap .post-hero-section .entry-header',
				'property' => 'min-height',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'default'      => thebase()->default( 'post_title_height' ),
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
	'post_title_elements' => array(
		'control_type' => 'thebase_sorter_control',
		'section'      => 'post_layout',
		'priority'     => 6,
		'default'      => thebase()->default( 'post_title_elements' ),
		'label'        => esc_html__( 'Title Elements', 'basetheme' ),
		'transport'    => 'refresh',
		'settings'     => array(
			'elements'   => 'post_title_elements',
			'title'      => 'post_title_element_title',
			'breadcrumb' => 'post_title_element_breadcrumb',
			'meta'       => 'post_title_element_meta',
			'categories' => 'post_title_element_categories',
			'excerpt'    => 'post_title_element_excerpt',
		),
		'input_attrs'  => array(
			'defaults' => array(
				'categories' => thebase()->default( 'post_title_element_categories' ),
				'title'      => thebase()->default( 'post_title_element_title' ),
				'meta'       => thebase()->default( 'post_title_element_meta' ),
				'excerpt'    => thebase()->default( 'post_title_element_excerpt' ),
				'breadcrumb' => thebase()->default( 'post_title_element_breadcrumb' ),
			),
			'dividers' => array(
				'dot' => array(
					'icon' => 'dot',
				),
				'slash' => array(
					'icon' => 'slash',
				),
				'dash' => array(
					'icon' => 'dash',
				),
				'vline' => array(
					'icon' => 'vline',
				),
				'customicon' => array(
					'icon' => 'hours',
				),
			),
		),
	),
	'post_title_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Post Title Font', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.post-title h1',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'             => 'post_title_font',
			'headingInherit' => true,
		),
	),
	'post_title_category_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Category Colors', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_category_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.post-title .entry-taxonomies, .post-title .entry-taxonomies a',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.post-title .entry-taxonomies a:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
			array(
				'type'     => 'css',
				'selector' => '.post-title .entry-taxonomies .category-style-pill a',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.post-title .entry-taxonomies .category-style-pill a:hover',
				'property' => 'background',
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
	'post_title_category_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Category Font', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_category_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.post-title .entry-taxonomies, .post-title .entry-taxonomies a',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'post_title_category_font',
			'options' => 'no-color',
		),
	),
	'post_title_breadcrumb_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Breadcrumb Colors', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_breadcrumb_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.post-title .thebase-breadcrumbs',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.post-title .thebase-breadcrumbs a:hover',
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
	'post_title_breadcrumb_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Breadcrumb Font', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_breadcrumb_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.post-title .thebase-breadcrumbs',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'post_title_breadcrumb_font',
			'options' => 'no-color',
		),
	),
	'post_title_meta_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Meta Colors', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_meta_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.post-title .entry-meta',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.post-title .entry-meta a:hover',
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
	'post_title_meta_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Meta Font', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_meta_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.post-title .entry-meta',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'post_title_meta_font',
			'options' => 'no-color',
		),
	),
	'post_title_excerpt_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Excerpt Colors', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_meta_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.post-title .title-entry-excerpt',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.post-title .title-entry-excerpt a:hover',
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
	'post_title_excerpt_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Excerpt Font', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_excerpt_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.post-title .title-entry-excerpt',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'post_title_excerpt_font',
			'options' => 'no-color',
		),
	),
	'post_title_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Post Title Background', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_background' ),
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#inner-wrap .post-hero-section .entry-hero-container-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Post Title Background', 'basetheme' ),
		),
	),
	'post_title_featured_image' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout_design',
		'default'      => thebase()->default( 'post_title_featured_image' ),
		'label'        => esc_html__( 'Use Featured Image for Background?', 'basetheme' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
	),
	'post_title_overlay_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Background Overlay Color', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_overlay_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.post-hero-section .hero-section-overlay',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_title_layout',
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
	'post_title_border' => array(
		'control_type' => 'thebase_borders_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Border', 'basetheme' ),
		'default'      => thebase()->default( 'post_title_border' ),
		'context'      => array(
			array(
				'setting'    => 'post_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'settings'     => array(
			'border_top'    => 'post_title_top_border',
			'border_bottom' => 'post_title_bottom_border',
		),
		'live_method'     => array(
			'post_title_top_border' => array(
				array(
					'type'     => 'css_border',
					'selector' => '.post-hero-section .entry-hero-container-inner',
					'pattern'  => '$',
					'property' => 'border-top',
					'key'      => 'border',
				),
			),
			'post_title_bottom_border' => array( 
				array(
					'type'     => 'css_border',
					'selector' => '.post-hero-section .entry-hero-container-inner',
					'property' => 'border-bottom',
					'pattern'  => '$',
					'key'      => 'border',
				),
			),
		),
	),
	'info_post_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'post_layout',
		'priority'     => 10,
		'label'        => esc_html__( 'Default Post Layout', 'basetheme' ),
		'settings'     => false,
	),
	'info_post_layout_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'post_layout_design',
		'priority'     => 10,
		'label'        => esc_html__( 'Default Post Layout', 'basetheme' ),
		'settings'     => false,
	),
	'post_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Default Post Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'post_layout' ),
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
	'post_sidebar_id' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Post Default Sidebar', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'post_sidebar_id' ),
		'input_attrs'  => array(
			'options' => thebase()->sidebar_options(),
		),
	),
	'post_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'post_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single',
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
	'post_vertical_padding' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Content Vertical Padding', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'post_vertical_padding' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single',
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
	'post_feature' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_feature' ),
		'label'        => esc_html__( 'Show Featured Image?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_feature_position' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Featured Image Position', 'basetheme' ),
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_feature_position' ),
		'context'      => array(
			array(
				'setting'    => 'post_feature',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'above' => array(
					'name' => __( 'Above', 'basetheme' ),
				),
				'behind' => array(
					'name' => __( 'Behind', 'basetheme' ),
				),
				'below' => array(
					'name' => __( 'Below', 'basetheme' ),
				),
			),
			'responsive' => false,
		),
	),
	'post_feature_width' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Featured Image Width', 'basetheme' ),
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_feature_width' ),
		'context'      => array(
			array(
				'setting'    => 'post_feature',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'post_feature_position',
				'operator'   => '=',
				'value'      => 'behind',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'wide' => array(
					'name' => __( 'Wide', 'basetheme' ),
				),
				'full' => array(
					'name' => __( 'Stretch Full', 'basetheme' ),
				),
			),
			'responsive' => false,
		),
	),
	'post_feature_ratio' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Featured Image Ratio', 'basetheme' ),
		'priority'     => 20,
		'default'      => thebase()->default( 'post_feature_ratio' ),
		'context'      => array(
			array(
				'setting'    => 'post_feature',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single .article-post-thumbnail',
				'pattern'  => 'thebase-thumbnail-ratio-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'inherit' => array(
					'name' => __( 'Inherit', 'basetheme' ),
				),
				'1-1' => array(
					'name' => __( '1:1', 'basetheme' ),
				),
				'3-4' => array(
					'name' => __( '4:3', 'basetheme' ),
				),
				'2-3' => array(
					'name' => __( '3:2', 'basetheme' ),
				),
				'9-16' => array(
					'name' => __( '16:9', 'basetheme' ),
				),
				'1-2' => array(
					'name' => __( '2:1', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class' => 'thebase-three-col-short',
		),
	),
	'post_tags' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_tags' ),
		'label'        => esc_html__( 'Show Post Tags?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_footer_area_boxed' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_footer_area_boxed' ),
		'label'        => esc_html__( 'Show Footer Area in Boxed Mode?', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'post_content_style',
				'operator'   => '=',
				'value'      => 'boxed',
			),
		),
	),
	'post_author_box' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_author_box' ),
		'label'        => esc_html__( 'Show Post Author Box?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_author_box_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'label'        => esc_html__( 'Author Box Style', 'basetheme' ),
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_author_box_style' ),
		'context'      => array(
			array(
				'setting'    => 'post_author_box',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'normal' => array(
					'name' => __( 'Normal', 'basetheme' ),
				),
				'center' => array(
					'name' => __( 'Center', 'basetheme' ),
				),
			),
			'responsive' => false,
		),
	),
	'post_author_box_link' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_author_box_link' ),
		'label'        => esc_html__( 'Use Author Archive Link?', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'post_author_box',
				'operator'   => '=',
				'value'      => true,
			),
		),
	),
	'post_navigation' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_navigation' ),
		'label'        => esc_html__( 'Show Post Navigation?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_related' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_related' ),
		'label'        => esc_html__( 'Show Related Posts?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_related_columns' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'post_layout',
		'priority'     => 20,
		'label'        => esc_html__( 'Related Posts Columns', 'basetheme' ),
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_related_columns' ),
		'context'      => array(
			array(
				'setting'    => 'post_related',
				'operator'   => '=',
				'value'      => true,
			),
		),
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
	'post_related_carousel_loop' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_related_carousel_loop' ),
		'label'        => esc_html__( 'Endlessly Loop Related Carousel?', 'basetheme' ),
		'transport'    => 'refresh',
		array(
			'setting'    => 'post_related',
			'operator'   => '=',
			'value'      => true,
		),
	),
	'post_comments' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'post_comments' ),
		'label'        => esc_html__( 'Show Comments?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'post_comments_date' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'post_layout',
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'post_comments_date' ),
		'label'        => esc_html__( 'Show Comment Date?', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'post_comments',
				'operator'   => '=',
				'value'      => true,
			),
		),
	),
	'post_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Site Background', 'basetheme' ),
		'default'      => thebase()->default( 'post_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Post Background', 'basetheme' ),
		),
	),
	'post_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Content Background', 'basetheme' ),
		'default'      => thebase()->default( 'post_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single .content-bg, body.single.content-style-unboxed .site',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Post Content Background', 'basetheme' ),
		),
	),
	'info_post_related_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Related Posts Section', 'basetheme' ),
		'settings'     => false,
		'context'      => array(
			array(
				'setting'    => 'post_related',
				'operator'   => '=',
				'value'      => true,
			),
		),
	),
	'post_related_title_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Related Posts Section Title Font', 'basetheme' ),
		'default'      => thebase()->default( 'post_related_title_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.site .entry-related h2.entry-related-title',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'             => 'post_related_title_font',
			'headingInherit' => true,
		),
		'context'      => array(
			array(
				'setting'    => 'post_related',
				'operator'   => '=',
				'value'      => true,
			),
		),
	),
	'post_related_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'post_layout_design',
		'label'        => esc_html__( 'Related Posts Section Background', 'basetheme' ),
		'default'      => thebase()->default( 'post_related_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single .entry-related',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'post_related',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Related Posts Background', 'basetheme' ),
		),
	),
);

Theme_Customizer::add_settings( $thebase_post_settings );

