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
$settings = array(
	'mobile_html_tabs' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'mobile_html',
		'settings'     => false,
		'priority'     => 1,
		'description'  => $compontent_tabs,
	),
	'mobile_html_content' => array(
		'control_type' => 'thebase_editor_control',
		'section'      => 'mobile_html',
		'sanitize'     => 'wp_kses_post',
		'priority'     => 4,
		'default'      => thebase()->default( 'mobile_html_content' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'input_attrs'  => array(
			'id' => 'mobile_html',
		),
		'partial'      => array(
			'selector'            => '.mobile-html',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\mobile_html',
		),
	),
	'mobile_html_wpautop' => array(
		'control_type' => 'thebase_switch_control',
		'sanitize'     => 'thebase_sanitize_toggle',
		'section'      => 'mobile_html',
		'default'      => thebase()->default( 'mobile_html_wpautop' ),
		'label'        => esc_html__( 'Automatically Add Paragraphs', 'basetheme' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'partial'      => array(
			'selector'            => '.mobile-html',
			'container_inclusive' => true,
			'render_callback'     => 'TheBase\mobile_html',
		),
	),
	'mobile_html_typography' => array(
		'control_type' => 'thebase_typography_control',
		'section'      => 'mobile_html',
		'label'        => esc_html__( 'Font', 'basetheme' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
		'default'      => thebase()->default( 'mobile_html_typography' ),
		'live_method'     => array(
			array(
				'type'     => 'css_typography',
				'selector' => '.mobile-html',
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
			'id' => 'mobile_html_typography',
		),
	),
	'mobile_html_link_color' => array(
		'control_type' => 'thebase_color_control',
		'section'      => 'mobile_html',
		'label'        => esc_html__( 'Link Colors', 'basetheme' ),
		'default'      => thebase()->default( 'mobile_html_link_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '.mobile-html a',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '.mobile-html a:hover',
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
	'mobile_html_link_style' => array(
		'control_type' => 'thebase_select_control',
		'section'      => 'mobile_html',
		'default'      => thebase()->default( 'mobile_html_link_style' ),
		'label'        => esc_html__( 'Link Style', 'basetheme' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'design',
			),
		),
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
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '#mobile-header .mobile-html',
				'pattern'  => 'inner-link-style-$',
				'key'      => '',
			),
		),
	),
	'mobile_html_margin' => array(
		'control_type' => 'thebase_measure_control',
		'section'      => 'mobile_html',
		'priority'     => 10,
		'default'      => thebase()->default( 'mobile_html_margin' ),
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
				'selector' => '.mobile-html',
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

