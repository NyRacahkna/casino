<?php
/**
 * Header Main Row Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

ob_start(); ?>
<div class="thebase-compontent-tabs nav-tab-wrapper wp-clearfix">
	<a href="#" class="nav-tab thebase-general-tab thebase-compontent-tabs-button nav-tab-active" data-tab="general">
		<span><?php esc_html_e( 'General', 'basetheme' ); ?></span>
	</a>
	<a href="#" class="nav-tab thebase-design-tab thebase-compontent-tabs-button" data-tab="design">
		<span><?php esc_html_e( 'Design', 'basetheme' ); ?></span>
	</a>
</div>
<?php
$compontent_tabs = ob_get_clean();
$settings        = array(
	'footer_html_tabs' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'footer_html',
		'settings'     => false,
		'priority'     => 1,
		'description'  => $compontent_tabs,
	),
	'footer_html_content' => array(
		'control_type' => 'thebase_editor_control',
		'sanitize'     => 'wp_kses_post',
		'section'      => 'footer_html',
		'description'  => esc_html__( 'Available Placeholders: {copyright} {year} {site-title} {theme-credit}', 'basetheme' ),
		'priority'     => 4,
		'default'      => thebase()->default( 'footer_html_content' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'input_attrs'  => array(
			'id' => 'footer_html',
		),
		'partial'      => array(
			'selector'            => '.footer-html',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\footer_html',
		),
	),
	'footer_html_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'footer_html',
		'label'        => esc_html__( 'Content Align', 'basetheme' ),
		'priority'     => 5,
		'default'      => thebase()->default( 'footer_html_align' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.site-info',
				'pattern'  => array(
					'desktop' => 'content-align-$',
					'tablet'  => 'content-tablet-align-$',
					'mobile'  => 'content-mobile-align-$',
				),
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'left'   => array(
					'tooltip'  => __( 'Left Align', 'basetheme' ),
					'dashicon' => 'editor-alignleft',
				),
				'center' => array(
					'tooltip'  => __( 'Center Align', 'basetheme' ),
					'dashicon' => 'editor-aligncenter',
				),
				'right'  => array(
					'tooltip'  => __( 'Right Align', 'basetheme' ),
					'dashicon' => 'editor-alignright',
				),
			),
			'responsive' => true,
		),
	),
	'footer_html_vertical_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'footer_html',
		'label'        => esc_html__( 'Content Vertical Align', 'basetheme' ),
		'priority'     => 5,
		'default'      => thebase()->default( 'footer_html_vertical_align' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'live_method'  => array(
			array(
				'type'     => 'class',
				'selector' => '.site-info',
				'pattern'  => array(
					'desktop' => 'content-valign-$',
					'tablet'  => 'content-tablet-valign-$',
					'mobile'  => 'content-mobile-valign-$',
				),
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'top' => array(
					'tooltip' => __( 'Top Align', 'basetheme' ),
					'icon'    => 'aligntop',
				),
				'middle' => array(
					'tooltip' => __( 'Middle Align', 'basetheme' ),
					'icon'    => 'alignmiddle',
				),
				'bottom' => array(
					'tooltip' => __( 'Bottom Align', 'basetheme' ),
					'icon'    => 'alignbottom',
				),
			),
			'responsive' => true,
		),
	),
	'footer_html_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'footer_html',
		'label'        => esc_html__( 'Font', 'basetheme' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
		'default'      => thebase()->default( 'footer_html_typography' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '#colophon .footer-html',
				'pattern'  => array(
					'desktop' => '$',
					'tablet'  => '$',
					'mobile'  => '$',
				),
				'property' => 'font',
				'key'      => 'typography',
			),
		),
		'input_attrs'  => array(
			'id' => 'footer_html_typography',
		),
	),
	'footer_html_link_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'footer_html',
		'label'        => esc_html__( 'Link Colors', 'basetheme' ),
		'default'      => thebase()->default( 'footer_html_link_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#colophon .site-footer-row-container .site-footer-row .footer-html a',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '#colophon .site-footer-row-container .site-footer-row .footer-html a:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
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
	'footer_html_link_style' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'footer_html',
		'default'      => thebase()->default( 'footer_html_link_style' ),
		'label'        => esc_html__( 'Link Style', 'basetheme' ),
		'input_attrs'  => array(
			'options' => array(
				'normal' => array(
					'name' => __( 'Underline', 'basetheme' ),
				),
				'plain' => array(
					'name' => __( 'No Underline', 'basetheme' ),
				),
			),
		),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '#colophon .footer-html',
				'pattern'  => 'inner-link-style-$',
				'key'      => '',
			),
		),
	),
	'footer_html_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'footer_html',
		'priority'     => 10,
		'default'      => thebase()->default( 'footer_html_margin' ),
		'label'        => esc_html__( 'Margin', 'basetheme' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#colophon .footer-html',
				'property' => 'margin',
				'pattern'  => '$',
				'key'      => 'measure',
			),
		),
		'input_attrs'  => array(
			'responsive' => false,
		),
	),
);

Theme_Customizer::add_settings( $settings );

