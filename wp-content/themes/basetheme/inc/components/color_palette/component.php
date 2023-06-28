<?php
/**
 * TheBase\Color_Palette\Component class
 *
 * @package thebase
 */

namespace TheBase\Color_Palette;

use TheBase\Component_Interface;
use TheBase_Control_Color_Palette;
use function TheBase\thebase;
use function add_action;
use function add_theme_support;
use function apply_filters;

/**
 * Class for adding custom logo support.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'color_palette';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', array( $this, 'color_palette_register' ), 80 );
		add_action( 'after_setup_theme', array( $this, 'action_add_editor_support' ) );
	}

	/**
	 * Add settings
	 *
	 * @access public
	 * @param object $wp_customize the customizer object.
	 * @return void
	 */
	public function color_palette_register( $wp_customize ) {
		$wp_customize->add_setting(
			'thebase_global_palette',
			array(
				'transport'         => 'postMessage',
				'type'              => 'option',
				'default'           => thebase()->get_palette_for_customizer(),
				'capability'        => apply_filters( 'thebase_palette_customizer_capability', 'manage_options' ),
				'sanitize_callback' => 'wp_kses',
			)
		);
		$wp_customize->add_control(
			new TheBase_Control_Color_Palette(
				$wp_customize,
				'thebase_color_palette',
				array(
					'label'       => __( 'Global Palette', 'basetheme' ),
					'description' => __( 'Learn how to use this', 'basetheme' ),
					'section'     => 'thebase_customizer_general_colors',
					'settings'    => 'thebase_global_palette',
					'priority'    => 8,
				)
			)
		);
	}
	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {

		/**
		 * Add support for color palettes.
		 */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Accent', 'basetheme' ),
					'slug'  => 'theme-palette1',
					'color' => thebase()->palette_option( 'palette1' ),
				),
				array(
					'name'  => __( 'Accent - alt', 'basetheme' ),
					'slug'  => 'theme-palette2',
					'color' => thebase()->palette_option( 'palette2' ),
				),
				array(
					'name'  => __( 'Strongest text', 'basetheme' ),
					'slug'  => 'theme-palette3',
					'color' => thebase()->palette_option( 'palette3' ),
				),
				array(
					'name'  => __( 'Strong Text', 'basetheme' ),
					'slug'  => 'theme-palette4',
					'color' => thebase()->palette_option( 'palette4' ),
				),
				array(
					'name'  => __( 'Medium text', 'basetheme' ),
					'slug'  => 'theme-palette5',
					'color' => thebase()->palette_option( 'palette5' ),
				),
				array(
					'name'  => __( 'Subtle Text', 'basetheme' ),
					'slug'  => 'theme-palette6',
					'color' => thebase()->palette_option( 'palette6' ),
				),
				array(
					'name'  => __( 'Subtle Background', 'basetheme' ),
					'slug'  => 'theme-palette7',
					'color' => thebase()->palette_option( 'palette7' ),
				),
				array(
					'name'  => __( 'Lighter Background', 'basetheme' ),
					'slug'  => 'theme-palette8',
					'color' => thebase()->palette_option( 'palette8' ),
				),
				array(
					'name'  => __( 'White or offwhite', 'basetheme' ),
					'slug'  => 'theme-palette9',
					'color' => thebase()->palette_option( 'palette9' ),
				),
			)
		);
	}
}
