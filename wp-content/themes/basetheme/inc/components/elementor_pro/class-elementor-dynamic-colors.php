<?php
/**
 * TheBase\Elementor_Pro\Component class
 *
 * @package thebase
 */

namespace TheBase\Elementor_Pro;

use TheBase\Component_Interface;
use Elementor;
use \ElementorPro\Modules\DynamicTags\Tags\Base\Data_Tag;
use \Elementor\Modules\DynamicTags\Module;
use \Elementor\Controls_Manager;
use function TheBase\thebase;
use function add_action;

if ( class_exists( '\ElementorPro\Modules\DynamicTags\Tags\Base\Data_Tag' ) ) {

	/**
	 * Class for adding Elementor plugin support.
	 */
	class Elementor_Dynamic_Colors extends \ElementorPro\Modules\DynamicTags\Tags\Base\Data_Tag {

		/**
		 * Get Name
		 *
		 * Returns the Name of the tag
		 *
		 * @since 2.0.0
		 * @access public
		 *
		 * @return string
		 */
		public function get_name() {
			return 'thebase-color-palette';
		}

		/**
		 * Get Title
		 *
		 * Returns the title of the Tag
		 *
		 * @since 2.0.0
		 * @access public
		 *
		 * @return string
		 */
		public function get_title() {
			return __( 'Color Palette', 'basetheme' );
		}

		/**
		 * Get Group
		 *
		 * Returns the Group of the tag
		 *
		 * @since 2.0.0
		 * @access public
		 *
		 * @return string
		 */
		public function get_group() {
			return 'thebase-palette';
		}

		/**
		 * Get Categories
		 *
		 * Returns an array of tag categories
		 *
		 * @since 2.0.0
		 * @access public
		 *
		 * @return array
		 */
		public function get_categories() {
			return [ \Elementor\Modules\DynamicTags\Module::COLOR_CATEGORY ];
		}

		/**
		 * Register Controls
		 *
		 * Registers the Dynamic tag controls
		 *
		 * @since 2.0.0
		 * @access protected
		 *
		 * @return void
		 */
		protected function _register_controls() {

			$variables = array(
				'palette1' => __( '1 - Accent', 'basetheme' ),
				'palette2' => __( '2 - Accent - alt', 'basetheme' ),
				'palette3' => __( '3 - Strongest text', 'basetheme' ),
				'palette4' => __( '4 - Strong Text', 'basetheme' ),
				'palette5' => __( '5 - Medium text', 'basetheme' ),
				'palette6' => __( '6 - Subtle Text', 'basetheme' ),
				'palette7' => __( '7 - Subtle Background', 'basetheme' ),
				'palette8' => __( '8 - Lighter Background', 'basetheme' ),
				'palette9' => __( '9 - White or offwhite', 'basetheme' ),
			);
			$this->add_control(
				'thebase_palette',
				array(
					'label' => __( 'Color', 'basetheme' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => $variables,
				)
			);
		}
		/**
		 * Get Value
		 *
		 * Returns the value of the Dynamic tag
		 *
		 * @since 2.0.0
		 * @access public
		 *
		 * @return void
		 */
		public function get_value( array $options = array() ) {
			$param_name = $this->get_settings( 'thebase_palette' );
			if ( ! $param_name ) {
				return;
			}
			$value = 'var(--global-' . $param_name . ')';
			return $value;
		}
	}
}
