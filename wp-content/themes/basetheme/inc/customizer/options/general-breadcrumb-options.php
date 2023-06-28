<?php
/**
 * Breadcrumb Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

Theme_Customizer::add_settings(
	array(
		'breadcrumb_engine' => array(
			'control_type' => 'thebase_select_control',
			'section'      => 'breadcrumbs',
			'transport'    => 'refresh',
			'default'      => thebase()->default( 'breadcrumb_engine' ),
			'label'        => esc_html__( 'Breadcrumb Engine', 'basetheme' ),
			'input_attrs'  => array(
				'options' => array(
					'' => array(
						'name' => __( 'Default', 'basetheme' ),
					),
					'rankmath' => array(
						'name' => __( 'RankMath (must have activated in plugin)', 'basetheme' ),
					),
					'yoast' => array(
						'name' => __( 'Yoast (must have activated in plugin)', 'basetheme' ),
					),
					'seopress' => array(
						'name' => __( 'SEOPress (must have activated in plugin)', 'basetheme' ),
					),
				),
			),
		),
		'breadcrumb_home_icon' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'breadcrumbs',
			'default'      => thebase()->default( 'breadcrumb_home_icon' ),
			'label'        => esc_html__( 'Use icon for home?', 'basetheme' ),
			'transport'    => 'refresh',
			'context'      => array(
				array(
					'setting'    => 'breadcrumb_engine',
					'operator'   => '=',
					'value'      => '',
				),
			),
		),
	)
);
