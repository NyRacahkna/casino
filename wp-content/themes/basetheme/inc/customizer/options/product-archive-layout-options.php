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
	'product_archive_tabs' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'woocommerce_product_catalog',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'woocommerce_product_catalog',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'woocommerce_product_catalog_design',
			),
			'active' => 'general',
		),
	),
	'product_archive_tabs_design' => array(
		'control_type' => 'thebase_tab_control',
		'section'      => 'woocommerce_product_catalog_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'basetheme' ),
				'target' => 'woocommerce_product_catalog',
			),
			'design' => array(
				'label'  => __( 'Design', 'basetheme' ),
				'target' => 'woocommerce_product_catalog_design',
			),
			'active' => 'design',
		),
	),
	'info_product_archive_title' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 2,
		'label'        => esc_html__( 'Archive Title', 'basetheme' ),
		'settings'     => false,
	),
	'info_product_archive_title_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'woocommerce_product_catalog_design',
		'priority'     => 2,
		'label'        => esc_html__( 'Archive Title', 'basetheme' ),
		'settings'     => false,
	),
	'product_archive_title' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 3,
		'default'      => thebase()->default( 'product_archive_title' ),
		'label'        => esc_html__( 'Show Archive Title?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'product_archive_title_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'label'        => esc_html__( 'Archive Title Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 4,
		'default'      => thebase()->default( 'product_archive_title_layout' ),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
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
	'product_archive_title_inner_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 4,
		'default'      => thebase()->default( 'product_archive_title_inner_layout' ),
		'label'        => esc_html__( 'Container Width', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'product_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.product-archive-hero-section',
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
	'product_archive_title_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'label'        => esc_html__( 'Product Archive Title Align', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'product_archive_title_align' ),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.product-archive-title',
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
	'product_archive_title_height' => array(
		'control_type' => 'thebase_range_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 5,
		'label'        => esc_html__( 'Container Min Height', 'basetheme' ),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'product_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#inner-wrap .product-archive-hero-section .entry-header',
				'property' => 'min-height',
				'pattern'  => '$',
				'key'      => 'size',
			),
		),
		'default'      => thebase()->default( 'product_archive_title_height' ),
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
	'product_archive_title_elements' => array(
		'control_type' => 'thebase_sorter_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 6,
		'default'      => thebase()->default( 'product_archive_title_elements' ),
		'label'        => esc_html__( 'Title Elements', 'basetheme' ),
		'transport'    => 'refresh',
		'settings'     => array(
			'elements'    => 'product_archive_title_elements',
			'title'       => 'product_archive_title_element_title',
			'breadcrumb'  => 'product_archive_title_element_breadcrumb',
			'description' => 'product_archive_title_element_description',
		),
	),
	'product_archive_title_heading_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Title Font', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_heading_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.product-archive-title h1',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'      => 'product_archive_title_heading_font',
			'options' => 'no-color',
		),
	),
	'product_archive_title_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Title Color', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.product-archive-title h1',
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
	'product_archive_title_description_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Description Colors', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_description_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.product-archive-title .archive-description',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.product-archive-title .archive-description a:hover',
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
	'product_archive_title_breadcrumb_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Breadcrumb Colors', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_breadcrumb_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.product-archive-title .thebase-breadcrumbs',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.product-archive-title .thebase-breadcrumbs a:hover',
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
	'product_archive_title_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Archive Title Background', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_background' ),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'product_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#inner-wrap .product-archive-hero-section .entry-hero-container-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Product Archive Title Background', 'basetheme' ),
		),
	),
	'product_archive_title_overlay_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Background Overlay Color', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_overlay_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.product-archive-hero-section .hero-section-overlay',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'product_archive_title_layout',
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
	'product_archive_title_border' => array(
		'control_type' => 'thebase_borders_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Border', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_border' ),
		'context'      => array(
			array(
				'setting'    => 'product_archive_title',
				'operator'   => '=',
				'value'      => true,
			),
			array(
				'setting'    => 'product_archive_title_layout',
				'operator'   => '=',
				'value'      => 'above',
			),
		),
		'settings'     => array(
			'border_top'    => 'product_archive_title_top_border',
			'border_bottom' => 'product_archive_title_bottom_border',
		),
		'live_method'     => array(
			'product_archive_title_top_border' => array(
				array(
					'type'     => 'css_border',
					'selector' => '.product-archive-hero-section .entry-hero-container-inner',
					'pattern'  => '$',
					'property' => 'border-top',
					'key'      => 'border',
				),
			),
			'product_archive_title_bottom_border' => array( 
				array(
					'type'     => 'css_border',
					'selector' => '.product-archive-hero-section .entry-hero-container-inner',
					'property' => 'border-bottom',
					'pattern'  => '$',
					'key'      => 'border',
				),
			),
		),
	),
	'info_product_archive_layout' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'settings'     => false,
	),
	'info_product_archive_layout_design' => array(
		'control_type' => 'thebase_title_control',
		'section'      => 'woocommerce_product_catalog_design',
		'priority'     => 10,
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'settings'     => false,
	),
	'product_archive_layout' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'label'        => esc_html__( 'Archive Layout', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 7,
		'default'      => thebase()->default( 'product_archive_layout' ),
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
	'product_archive_sidebar_id' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'woocommerce_product_catalog',
		'label'        => esc_html__( 'Product Archive Default Sidebar', 'basetheme' ),
		'transport'    => 'refresh',
		'priority'     => 7,
		'default'      => thebase()->default( 'product_archive_sidebar_id' ),
		'input_attrs'  => array(
			'options' => thebase()->sidebar_options(),
		),
	),
	'product_archive_content_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'label'        => esc_html__( 'Content Style', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_content_style' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => 'body.post-type-archive-product',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
			array(
				'type'     => 'class',
				'selector' => 'body.tax-product_cat',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
			array(
				'type'     => 'class',
				'selector' => 'body.tax-product_tag',
				'pattern'  => 'content-style-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'boxed' => array(
					'tooltip' => __( 'Boxed', 'basetheme' ),
					'icon'    => 'gridBoxed',
				),
				'unboxed' => array(
					'tooltip' => __( 'Unboxed', 'basetheme' ),
					'icon'    => 'gridUnboxed',
				),
			),
			'responsive' => false,
			'class'      => 'thebase-two-col',
		),
	),
	'product_archive_show_results_count' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'default'      => thebase()->default( 'product_archive_show_results_count' ),
		'label'        => esc_html__( 'Show Archive Results Count?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'product_archive_show_order' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'default'      => thebase()->default( 'product_archive_show_order' ),
		'label'        => esc_html__( 'Show Archive Sorting Dropdown?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'product_archive_toggle' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'default'      => thebase()->default( 'product_archive_toggle' ),
		'label'        => esc_html__( 'Show Archive Grid/List Toggle?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'product_archive_image_hover_switch' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'transport'    => 'refresh',
		'label'        => esc_html__( 'Product Image Hover Switch', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_image_hover_switch' ),
		'input_attrs'  => array(
			'layout' => array(
				'none' => array(
					'tooltip' => __( 'None', 'basetheme' ),
					'name' => __( 'None', 'basetheme' ),
				),
				'fade' => array(
					'tooltip' => __( 'Fade to second image', 'basetheme' ),
					'name' => __( 'Fade', 'basetheme' ),
				),
				'slide' => array(
					'tooltip' => __( 'Slide to second image', 'basetheme' ),
					'name' => __( 'Slide', 'basetheme' ),
				),
				'zoom' => array(
					'tooltip' => __( 'Zoom into second image', 'basetheme' ),
					'name' => __( 'Zoom', 'basetheme' ),
				),
				'flip' => array(
					'tooltip' => __( 'Flip to second image', 'basetheme' ),
					'name' => __( 'Flip', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'thebase-three-col thebase-auto-height',
		),
	),
	'product_archive_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'transport'    => 'refresh',
		'label'        => esc_html__( 'Button Action Style', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_style' ),
		'input_attrs'  => array(
			'layout' => array(
				'action-on-hover' => array(
					'tooltip' => __( 'Slide up on hover', 'basetheme' ),
					'name' => __( 'Bottom Slide Up', 'basetheme' ),
				),
				'action-visible' => array(
					'tooltip' => __( 'On the Bottom Always Visible', 'basetheme' ),
					'name' => __( 'Always Visible', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'thebase-tiny-text',
		),
	),
	'product_archive_button_style' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'transport'    => 'refresh',
		'label'        => esc_html__( 'Button Style', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_button_style' ),
		'input_attrs'  => array(
			'layout' => array(
				'text' => array(
					'tooltip' => __( 'Bold text with arrow icon.', 'basetheme' ),
					'name' => __( 'Text with Arrow', 'basetheme' ),
				),
				'button' => array(
					'tooltip' => __( 'Show as standard button', 'basetheme' ),
					'name' => __( 'Button', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'thebase-tiny-text',
		),
	),
	'product_archive_button_align' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'default'      => thebase()->default( 'product_archive_button_align' ),
		'label'        => esc_html__( 'Align Button at Bottom?', 'basetheme' ),
		'transport'    => 'refresh',
	),
	'product_archive_mobile_columns' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 15,
		'transport'    => 'refresh',
		'label'        => esc_html__( 'Mobile Columns Layout', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_mobile_columns' ),
		'input_attrs'  => array(
			'layout' => array(
				'default' => array(
					'tooltip' => '',
					'name' => __( 'One Column', 'basetheme' ),
				),
				'twocolumn' => array(
					'tooltip' => '',
					'name' => __( 'Two Columns', 'basetheme' ),
				),
			),
			'responsive' => false,
			'class'      => 'thebase-tiny-text',
		),
	),
	'product_archive_title_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Title Font', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_title_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.woocommerce ul.products li.product h3, .woocommerce ul.products li.product .product-details .woocommerce-loop-product__title, .woocommerce ul.products li.product .product-details .woocommerce-loop-category__title, .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-title',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'             => 'product_archive_title_font',
		),
	),
	'product_archive_price_font' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Price Font', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_price_font' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.woocommerce ul.products li.product .product-details .price',
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id'             => 'product_archive_price_font',
		),
	),
	'product_archive_button_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Colors', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_button_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'product_archive_button_background' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Background Colors', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_button_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button:hover',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'product_archive_button_border_colors' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Border Colors', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_button_border' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'property' => 'border-color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button:hover',
				'property' => 'border-color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'basetheme' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'basetheme' ),
					'palette' => true,
				),
			),
		),
	),
	'product_archive_button_border' => array(
		'control_type' => 'thebase_border_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Border', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_button_border' ),
		'live_method'     => array(
			array(
				'type'     => 'css_border',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'property' => 'border',
				'pattern'  => '$',
				'key'      => 'border',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
			'color'      => false,
		),
	),
	'product_archive_button_radius' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'woocommerce_product_catalog_design',
		'priority'     => 10,
		'default'      => thebase()->default( 'product_archive_button_radius' ),
		'label'        => esc_html__( 'Product Archive Button Border Radius', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'property' => 'border-radius',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
	'product_archive_button_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Font', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_button_typography' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'pattern'  => array(
					'desktop' => '$',
					'tablet'  => '$',
					'mobile'  => '$',
				),
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'input_attrs'  => array(
			'id' => 'header_button_typography',
			'options' => 'no-color',
		),
	),
	'product_archive_button_shadow' => array(
		'control_type' => 'thebase_shadow_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Shadow', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css_boxshadow',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button',
				'property' => 'box-shadow',
				'pattern'  => '$',
				'key'      => '',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'default'      => thebase()->default( 'product_archive_button_shadow' ),
	),
	'product_archive_button_shadow_hover' => array(
		'control_type' => 'thebase_shadow_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Product Archive Button Hover State Shadow', 'basetheme' ),
		'live_method'     => array(
			array(
				'type'     => 'css_boxshadow',
				'selector' => '.woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button:hover',
				'property' => 'box-shadow',
				'pattern'  => '$',
				'key'      => '',
			),
		),
		'context'      => array(
			array(
				'setting'    => 'product_archive_button_style',
				'operator'   => '=',
				'value'      => 'button',
			),
		),
		'default'      => thebase()->default( 'product_archive_button_shadow_hover' ),
	),
	'product_archive_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Site Background', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-product, body.tax-product_cat, body.tax-product_tag',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip' => __( 'Product Archive Background', 'basetheme' ),
		),
	),
	'product_archive_content_background' => array(
		'control_type' => 'thebase_background_control',
		'section'      => 'woocommerce_product_catalog_design',
		'label'        => esc_html__( 'Content Background', 'basetheme' ),
		'default'      => thebase()->default( 'product_archive_content_background' ),
		'live_method'  => array(
			array(
				'type'     => 'css_background',
				'selector' => 'body.post-type-archive-product .content-bg, body.tax-product_cat .content-bg, body.tax-product_tag .content-bg, body.tax-product_cat.content-style-unboxed .site, body.tax-product_tag.content-style-unboxed .site, body.post-type-archive-product.content-style-unboxed .site',
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

