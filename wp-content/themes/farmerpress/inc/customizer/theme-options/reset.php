<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'farmerpress_reset_section', array(
	'title'             => esc_html__('Reset all settings','farmerpress'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'farmerpress' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'farmerpress_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'farmerpress' ),
	'section'           => 'farmerpress_reset_section',
	'type'              => 'checkbox',
) );
