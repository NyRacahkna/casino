<?php
/**
 * Header Builder Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

Theme_Customizer::add_settings(
	array(
		'comment_form_before_list' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_comments',
			'default'      => thebase()->default( 'comment_form_before_list' ),
			'label'        => esc_html__( 'Move Comments input above comment list.', 'basetheme' ),
			'transport'    => 'refresh',
		),
		'comment_form_remove_web' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_comments',
			'default'      => thebase()->default( 'comment_form_remove_web' ),
			'label'        => esc_html__( 'Remove Comments Website field.', 'basetheme' ),
			'transport'    => 'refresh',
		),
	)
);
