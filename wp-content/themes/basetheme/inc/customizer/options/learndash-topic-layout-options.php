<?php
/**
 * Topic Layout Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

$settings = array(
	'sfwd-topic_layout_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'sfwd_topic_layout',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'sfwd_topic_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'sfwd_topic_layout_design',
			),
			'active' => 'general',
		),
	),
	'sfwd-topic_layout_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'sfwd_topic_layout_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'sfwd_topic_layout',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'sfwd_topic_layout_design',
			),
			'active' => 'design',
		),
	),
	'info_sfwd-topic_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 2,
		'label'        => esc_html__( 'Topic Title', 'basetheme' ),
		'settings'     => false,
	),
	'info_sfwd-topic_title_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_topic_layout_design',
		'priority'     => 2,
		'label'        => esc_html__( 'Topic Title', 'basetheme' ),
		'settings'     => false,
	),
	'sfwd-topic_title' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 3,
		'default'      => thebase()->default( 'sfwd-topic_title' ),
		'label'        => esc_html__( 'Show Topic Title?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'sfwd-topic_title_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Topic Title Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'sfwd-topic_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
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
	'sfwd-topic_title_inner_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 4,
		'default'      => thebase()->default( 'sfwd-topic_title_inner_layout' ),
		'label'        => esc_html__( 'Title Container Width', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-topic_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.sfwd-topic-hero-section',
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
	'sfwd-topic_title_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Topic Title Align', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'sfwd-topic_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.sfwd-topic-title',
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
	'sfwd-topic_title_height' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 5,
		'label'        => esc_html__( 'Title Container Min Height', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-topic_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#inner-wrap .sfwd-topic-hero-section .entry-header',
				'property' => 'min-height',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'default'      => thebase()->default( 'sfwd-topic_title_height' ),
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
	'sfwd-topic_title_elements' => array(
		'control_type' => 'thebase_sorter_control',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 6,
		'default'      => thebase()->default( 'sfwd-topic_title_elements' ),
		'label'        => esc_html__( 'Title Elements', 'basetheme' ),
		'transport'    => 'refresh',
		'settings'     => array(
			'elements'    => 'sfwd-topic_title_elements',
			'title' => 'sfwd-topic_title_element_title',
			'breadcrumb'  => 'sfwd-topic_title_element_breadcrumb',
		),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'group' => 'sfwd-topic_title_element',
		),
	),
	'sfwd-topic_title_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Topic Title Font', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_title_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.sfwd-topic-title h1',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'input_attrs'  => array(
			'id'             => 'sfwd-topic_title_font',
			'headingInherit' => true,
		),
	),
	'sfwd-topic_title_breadcrumb_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Breadcrumb Colors', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_title_breadcrumb_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.sfwd-topic-title .thebase-breadcrumbs',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.sfwd-topic-title .thebase-breadcrumbs a:hover',
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
	'sfwd-topic_title_breadcrumb_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Breadcrumb Font', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_title_breadcrumb_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.sfwd-topic-title .thebase-breadcrumbs',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'sfwd-topic_title_breadcrumb_font',
			'options' => 'no-color',
		),
	),
	'sfwd-topic_title_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Topic Above Area Background', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_title_background' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-topic_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#inner-wrap .sfwd-topic-hero-section .entry-hero-container-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Topic Title Background', 'basetheme' ),
		),
	),
	'sfwd-topic_title_featured_image' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'sfwd_topic_layout_design',
		'default'      => thebase()->default( 'sfwd-topic_title_featured_image' ),
		'label'        => esc_html__( 'Use Featured Image for Background?', 'basetheme' ),
		'transport'    => 'refresh',
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-topic_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
	),
	'sfwd-topic_title_overlay_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Background Overlay Color', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_title_overlay_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.sfwd-topic-hero-section .hero-section-overlay',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-topic_title_layout',
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
	'sfwd-topic_title_border' => array(
		'control_type' => 'thebase_borders_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Border', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_title_border' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'sfwd-topic_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'settings'     => array(
			'border_top'    => 'sfwd-topic_title_top_border',
			'border_bottom' => 'sfwd-topic_title_bottom_border',
		),
		'live_method'     => array(
			'sfwd-topic_title_top_border' => array(
				array(
					'type'     => 'css_border',
					'selector' => '.sfwd-topic-hero-section .entry-hero-container-inner',
					'pattern'  => '$',
					'property' => 'border-top',
					'key'      => 'border',
				),
			),
			'sfwd-topic_title_bottom_border' => array( 
				array(
					'type'     => 'css_border',
					'selector' => '.sfwd-topic-hero-section .entry-hero-container-inner',
					'property' => 'border-bottom',
					'pattern'  => '$',
					'key'      => 'border',
				),
			),
		),
	),
	'info_sfwd-topic_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 10,
		'label'        => esc_html__( 'Topic Layout', 'basetheme' ),
		'settings'     => false,
	),
	'info_sfwd-topic_layout_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'sfwd_topic_layout_design',
		'priority'     => 10,
		'label'        => esc_html__( 'Topic Layout', 'basetheme' ),
		'settings'     => false,
	),
	'sfwd-topic_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Topic Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'sfwd-topic_layout' ),
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
	'sfwd-topic_sidebar_id' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Topic Default Sidebar', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 10,
		'default'      => thebase()->default( 'sfwd-topic_sidebar_id' ),
		'input_attrs'  => array(
			'options' => thebase()->sidebar_options(),
		),
	),
	'sfwd-topic_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'sfwd-topic_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-sfwd-topic',
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
	'sfwd-topic_vertical_padding' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Content Vertical Padding', 'basetheme' ),
		'priority'     => 10,
		'default'      => thebase()->default( 'sfwd-topic_vertical_padding' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-sfwd-topic',
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
	'sfwd-topic_feature' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'sfwd_topic_layout',
		'priority'     => 20,
		'default'      => thebase()->default( 'sfwd-topic_feature' ),
		'label'        => esc_html__( 'Show Featured Image?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'sfwd-topic_feature_position' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Featured Image Position', 'basetheme' ),
		'priority'     => 20,
		'transport'    => 'refresh',
		'default'      => thebase()->default( 'sfwd-topic_feature_position' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_feature',
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
	'sfwd-topic_feature_ratio' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sfwd_topic_layout',
		'label'        => esc_html__( 'Featured Image Ratio', 'basetheme' ),
		'priority'     => 20,
		'default'      => thebase()->default( 'sfwd-topic_feature_ratio' ),
		'context'      => array(
			array(
				'setting'    => 'sfwd-topic_feature',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.single-sfwd-topic .article-post-thumbnail',
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
	'sfwd-topic_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Site Background', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single-sfwd-topic',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Topic Background', 'basetheme' ),
		),
	),
	'sfwd-topic_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'sfwd_topic_layout_design',
		'label'        => esc_html__( 'Content Background', 'basetheme' ),
		'default'      => thebase()->default( 'sfwd-topic_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.single-sfwd-topic .content-bg, body.single-sfwd-topic.content-style-unboxed .site',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Topic Content Background', 'basetheme' ),
		),
	),
);

Theme_Customizer::add_settings( $settings );

