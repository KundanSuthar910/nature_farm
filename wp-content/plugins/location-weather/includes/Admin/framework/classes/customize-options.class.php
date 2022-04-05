<?php
/**
 *  Framework customize-options.class file.
 *
 * @package    Location_weather
 * @subpackage Location_weather/framework
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

if ( ! class_exists( 'SPLWT_Customize_Options' ) ) {
	/**
	 *
	 * Customize Options Class
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	class SPLWT_Customize_Options extends SPLWT_Abstract {

		/**
		 * Unique ID/Name
		 *
		 * @var string
		 */
		public $unique = '';
		/**
		 * Abstract.
		 *
		 * @var string
		 */
		public $abstract = 'customize';
		/**
		 * Options
		 *
		 * @var array
		 */
		public $options = array();
		/**
		 * Setions.
		 *
		 * @var array
		 */
		public $sections = array();
		/**
		 * Pre fields.
		 *
		 * @var array
		 */
		public $pre_fields = array();
		/**
		 * Pre tabs.
		 *
		 * @var array
		 */
		public $pre_tabs = array();
		/**
		 * Priority.
		 *
		 * @var array
		 */
		public $priority = 10;
		/**
		 * Default arguments.
		 *
		 * @var array
		 */
		public $args = array(
			'database'        => 'option',
			'transport'       => 'refresh',
			'capability'      => 'manage_options',
			'save_defaults'   => true,
			'enqueue_webfont' => true,
			'async_webfont'   => false,
			'output_css'      => true,
			'defaults'        => array(),
		);

		/**
		 * Run framework construct.
		 *
		 * @param string $key The filter unique key.
		 * @param array  $params The parameters.
		 */
		public function __construct( $key, $params ) {

			$this->unique     = $key;
			$this->args       = apply_filters( "splwt_{$this->unique}_args", wp_parse_args( $params['args'], $this->args ), $this );
			$this->sections   = apply_filters( "splwt_{$this->unique}_sections", $params['sections'], $this );
			$this->pre_fields = $this->pre_fields( $this->sections );

			$this->get_options();
			$this->save_defaults();

			add_action( 'customize_register', array( &$this, 'add_customize_options' ) );
			add_action( 'customize_save_after', array( &$this, 'add_customize_save_after' ) );

			// Get options for enqueue actions.
			if ( is_customize_preview() ) {
				add_action( 'wp_enqueue_scripts', array( &$this, 'get_options' ) );
			}

			// wp enqeueu for typography and output css.
			parent::__construct();

		}

		/**
		 * Instance.
		 *
		 * @param object $key The instance key.
		 * @param array  $params All the parameters.
		 * @return mixed
		 */
		public static function instance( $key, $params = array() ) {
			return new self( $key, $params );
		}

		/**
		 * Add customize save after.
		 *
		 * @param object $wp_customize Wp customize option.
		 * @return void
		 */
		public function add_customize_save_after( $wp_customize ) {
			do_action( "splwt_{$this->unique}_save_before", $this->get_options(), $this, $wp_customize );
			do_action( "splwt_{$this->unique}_saved", $this->get_options(), $this, $wp_customize );
			do_action( "splwt_{$this->unique}_save_after", $this->get_options(), $this, $wp_customize );
		}

		/**
		 * Get default value
		 *
		 * @param array $field default field.
		 * @return string
		 */
		public function get_default( $field ) {

			$default = ( isset( $field['default'] ) ) ? $field['default'] : '';
			$default = ( isset( $this->args['defaults'][ $field['id'] ] ) ) ? $this->args['defaults'][ $field['id'] ] : $default;

			return $default;

		}

		/**
		 * Get option
		 *
		 * @return object
		 */
		public function get_options() {

			if ( 'theme_mod' === $this->args['database'] ) {
				$this->options = get_theme_mod( $this->unique, array() );
			} else {
				$this->options = get_option( $this->unique, array() );
			}

			if ( empty( $this->options ) ) {
				$this->options = array();
			}

			return $this->options;

		}

		/**
		 * Save defaults and set new fields value to main options.
		 *
		 * @return void
		 */
		public function save_defaults() {

			$tmp_options = $this->options;

			if ( ! empty( $this->pre_fields ) ) {
				foreach ( $this->pre_fields as $field ) {
					if ( ! empty( $field['id'] ) ) {
						$this->options[ $field['id'] ] = ( isset( $this->options[ $field['id'] ] ) ) ? $this->options[ $field['id'] ] : $this->get_default( $field );
					}
				}
			}

			if ( $this->args['save_defaults'] && empty( $this->args['show_in_customizer'] ) && empty( $tmp_options ) ) {

				if ( 'theme_mod' === $this->args['database'] ) {
					set_theme_mod( $this->unique, $this->options );
				} else {
					update_option( $this->unique, $this->options );
				}
			}

		}

		/**
		 * Pre fields method.
		 *
		 * @param array $sections The sections.
		 * @return $result
		 */
		public function pre_fields( $sections ) {

			$result = array();

			foreach ( $sections as $key => $section ) {
				if ( ! empty( $section['fields'] ) ) {
					foreach ( $section['fields'] as $field ) {
						$result[] = $field;
					}
				}
			}

			return $result;
		}

		/**
		 * Pre tabs.
		 *
		 * @param array $sections All the sections.
		 * @return mixed
		 */
		public function pre_tabs( $sections ) {

			$result  = array();
			$parents = array();

			foreach ( $sections as $key => $section ) {
				if ( ! empty( $section['parent'] ) ) {
					$parents[ $section['parent'] ][] = $section;
					unset( $sections[ $key ] );
				}
			}

			foreach ( $sections as $key => $section ) {
				if ( ! empty( $section['id'] ) && ! empty( $parents[ $section['id'] ] ) ) {
					$section['subs'] = $parents[ $section['id'] ];
				}
				$result[] = $section;
			}

			return $result;

		}

		/**
		 * Add customize options.
		 *
		 * @param object $wp_customize Wp customize options.
		 * @return void
		 */
		public function add_customize_options( $wp_customize ) {

			if ( ! class_exists( 'WP_Customize_Panel_SPLWT' ) ) {
				SPLW::include_plugin_file( 'functions/customize.php' );
			}

			if ( ! empty( $this->sections ) ) {

				$sections = $this->pre_tabs( $this->sections );

				foreach ( $sections as $section ) {

					if ( ! empty( $section['subs'] ) ) {

						$panel_id = ( isset( $section['id'] ) ) ? $section['id'] : $this->unique . '-panel-' . $this->priority;

						$wp_customize->add_panel(
							new WP_Customize_Panel_SPLWT(
								$wp_customize,
								$panel_id,
								array(
									'title'       => ( isset( $section['title'] ) ) ? $section['title'] : null,
									'description' => ( isset( $section['description'] ) ) ? $section['description'] : null,
									'priority'    => ( isset( $section['priority'] ) ) ? $section['priority'] : null,
								)
							)
						);

						$this->priority++;

						foreach ( $section['subs'] as $sub_section ) {

							$section_id = ( isset( $sub_section['id'] ) ) ? $sub_section['id'] : $this->unique . '-section-' . $this->priority;

							$this->add_section( $wp_customize, $section_id, $sub_section, $panel_id );

							$this->priority++;

						}
					} else {

							$section_id = ( isset( $section['id'] ) ) ? $section['id'] : $this->unique . '-section-' . $this->priority;

							$this->add_section( $wp_customize, $section_id, $section, false );

							$this->priority++;

					}
				}
			}

		}

		/**
		 * Add customize section
		 *
		 * @param object $wp_customize customize options.
		 * @param string $section_id section id.
		 * @param array  $section_args section argument.
		 * @param int    $panel_id panel id.
		 * @return void
		 */
		public function add_section( $wp_customize, $section_id, $section_args, $panel_id ) {

			if ( ! empty( $section_args['assign'] ) ) {

				$section_id = $section_args['assign'];

			} else {

				$wp_customize->add_section(
					new WP_Customize_Section_SPLWT(
						$wp_customize,
						$section_id,
						array(
							'title'       => ( isset( $section_args['title'] ) ) ? $section_args['title'] : '',
							'description' => ( isset( $section_args['description'] ) ) ? $section_args['description'] : '',
							'priority'    => ( isset( $section_args['priority'] ) ) ? $section_args['priority'] : '',
							'panel'       => ( $panel_id ) ? $panel_id : '',
						)
					)
				);

			}

			if ( ! empty( $section_args['fields'] ) ) {

				$field_key = 1;

				foreach ( $section_args['fields'] as $field ) {

					if ( isset( $field['id'] ) ) {
						$field['default'] = $this->get_default( $field );
					}

					$field_id        = ( isset( $field['id'] ) ) ? $field['id'] : '_nonce-' . $section_id . '-' . $field_key;
					$setting_args    = ( isset( $field['setting_args'] ) ) ? $field['setting_args'] : array();
					$control_args    = ( isset( $field['control_args'] ) ) ? $field['control_args'] : array();
					$field_transport = ( isset( $field['transport'] ) ) ? $field['transport'] : $this->args['transport'];
					$field_sanitize  = ( isset( $field['sanitize'] ) ) ? $field['sanitize'] : '';
					$field_validate  = ( isset( $field['validate'] ) ) ? $field['validate'] : '';
					$field_default   = ( isset( $field['default'] ) ) ? $field['default'] : '';
					$has_selective   = ( isset( $field['selective_refresh'] ) && isset( $wp_customize->selective_refresh ) ) ? true : false;

					$setting_id = $this->unique . '[' . $field_id . ']';

					$wp_customize->add_setting(
						$setting_id,
						wp_parse_args(
							$setting_args,
							array(
								'default'           => $field_default,
								'type'              => $this->args['database'],
								'transport'         => ( $has_selective ) ? 'postMessage' : $field_transport,
								'capability'        => $this->args['capability'],
								'sanitize_callback' => $field_sanitize,
								'validate_callback' => $field_validate,
							)
						)
					);

					$wp_customize->add_control(
						new WP_Customize_Control_SPLWT(
							$wp_customize,
							$setting_id,
							wp_parse_args(
								$control_args,
								array(
									'unique'   => $this->unique,
									'field'    => $field,
									'section'  => $section_id,
									'settings' => $setting_id,
								)
							)
						)
					);

					if ( $has_selective ) {
							$wp_customize->selective_refresh->add_partial( $setting_id, $field['selective_refresh'] );
					}

					$field_key++;
				}
			}

		}

	}
}