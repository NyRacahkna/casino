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
</div>
<?php
$compontent_tabs = ob_get_clean();
$settings        = array(
	'footer_widget1_breaker' => array(
		'control_type' => 'thebase_blank_control',
		'section'      => 'sidebar-widgets-footer1',
		'settings'     => false,
		'priority'     => 5,
		'description'  => $compontent_tabs,
	),
	'footer_widget1_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sidebar-widgets-footer1',
		'label'        => esc_html__( 'Content Align', 'basetheme' ),
		'priority'     => 5,
		'default'      => thebase()->default( 'footer_widget1_align' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '.footer-widget1',
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
	'footer_widget1_vertical_align' => array(
		'control_type' => 'thebase_radio_icon_control',
		'section'      => 'sidebar-widgets-footer1',
		'label'        => esc_html__( 'Content Vertical Align', 'basetheme' ),
		'priority'     => 5,
		'default'      => thebase()->default( 'footer_widget1_vertical_align' ),
		'context'      => array(
			array(
				'setting' => '__current_tab',
				'value'   => 'general',
			),
		),
		'live_method'  => array(
			array(
				'type'     => 'class',
				'selector' => '.footer-widget1',
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
);

Theme_Customizer::add_settings( $settings );

