<?php
/**
 * Header Builder Options
 *
 * @package thebase
 */

namespace TheBase;

use TheBase\Theme_Customizer;
use function TheBase\thebase;

ob_start(); ?>
<div class="thebase-compontent-custom fonts-flush-button wp-clearfix">
	<span class="customize-control-title">
		<?php esc_html_e( 'Flush Local Fonts Cache', 'basetheme' ); ?>
	</span>
	<span class="description customize-control-description">
		<?php esc_html_e( 'Click the button to reset the local fonts cache', 'basetheme' ); ?>
	</span>
	<input type="button" class="button thebase-flush-local-fonts-button" name="thebase-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'basetheme' ); ?>" />
</div>
<?php
$thebase_flush_button = ob_get_clean();

Theme_Customizer::add_settings(
	array(
		'enable_scroll_to_id' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_performance',
			'default'      => thebase()->default( 'enable_scroll_to_id' ),
			'label'        => esc_html__( 'Enable Scroll To ID', 'basetheme' ),
		),
		'lightbox' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_performance',
			'default'      => thebase()->default( 'lightbox' ),
			'label'        => esc_html__( 'Enable Lightbox', 'basetheme' ),
		),
		'load_fonts_local' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_performance',
			'default'      => thebase()->default( 'load_fonts_local' ),
			'label'        => esc_html__( 'Load Google Fonts Locally', 'basetheme' ),
		),
		'preload_fonts_local' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_performance',
			'default'      => thebase()->default( 'preload_fonts_local' ),
			'label'        => esc_html__( 'Preload Local Fonts', 'basetheme' ),
			'context'      => array(
				array(
					'setting'    => 'load_fonts_local',
					'operator'   => '==',
					'value'      => true,
				),
			),
		),
		'load_fonts_local_flush' => array(
			'control_type' => 'thebase_blank_control',
			'section'      => 'general_performance',
			'settings'     => false,
			'description'  => $thebase_flush_button,
			'context'      => array(
				array(
					'setting'    => 'load_fonts_local',
					'operator'   => '==',
					'value'      => true,
				),
			),
		),
		'enable_preload' => array(
			'control_type' => 'thebase_switch_control',
			'sanitize'     => 'thebase_sanitize_toggle',
			'section'      => 'general_performance',
			'default'      => thebase()->default( 'enable_preload' ),
			'label'        => esc_html__( 'Enable CSS Preload', 'basetheme' ),
		),
	)
);
