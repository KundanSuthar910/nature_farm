<?php
/**
 * Counter Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add Counter section
$wp_customize->add_section( 'farmerpress_counter_section', array(
	'title'             => esc_html__( 'Counter','farmerpress' ),
	'description'       => esc_html__( 'Counter Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// Counter content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[counter_section_enable]', array(
	'default'			=> 	$options['counter_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[counter_section_enable]', array(
	'label'             => esc_html__( 'Counter Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_counter_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

// counter number control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[counter_count]', array(
	'default'          	=> $options['counter_count'],
	'sanitize_callback' => 'farmerpress_sanitize_number_range',
) );

$wp_customize->add_control( 'farmerpress_theme_options[counter_count]', array(
	'label'             => esc_html__( 'Number of Counter', 'farmerpress' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 8. Please input the valid number and save. Then refresh the page to see the change.', 'farmerpress' ),
	'section'           => 'farmerpress_counter_section',
	'active_callback'   => 'farmerpress_is_counter_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 8,
		'style' => 'width: 100px;'
		),
) );

// counter number control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[counter_image]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'farmerpress_theme_options[counter_image]', array(
	'label'             => esc_html__( 'Image', 'farmerpress' ),
	'section'           => 'farmerpress_counter_section',
	'active_callback'   => 'farmerpress_is_counter_section_enable',
) ) );

for ( $i = 1; $i <= $options['counter_count']; $i++ ) :


	// counter custom date
	$wp_customize->add_setting( 'farmerpress_theme_options[counter_text_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'farmerpress_theme_options[counter_text_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Title %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_counter_section',
		'active_callback'	=> 'farmerpress_is_counter_section_enable',
	) );

	// counter custom date
	$wp_customize->add_setting( 'farmerpress_theme_options[counter_subtitle_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'farmerpress_theme_options[counter_subtitle_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Sub Title %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_counter_section',
		'active_callback'	=> 'farmerpress_is_counter_section_enable',
	) );

	// counter custom button
	$wp_customize->add_setting( 'farmerpress_theme_options[counter_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'farmerpress_theme_options[counter_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_counter_section',
		'active_callback'	=> 'farmerpress_is_counter_section_enable',
	) );

	// Separator setting
	$wp_customize->add_setting( 'farmerpress_theme_options[counter_separator_' . $i . ']', array(
		'sanitize_callback' => 'farmerpress_sanitize_html',
	) );

	$wp_customize->add_control( new Farmerpress_Customize_Horizontal_Line( $wp_customize, 'farmerpress_theme_options[counter_separator_' . $i . ']', array(
		'section'           => 'farmerpress_counter_section',
		'active_callback'	=> 'farmerpress_is_counter_section_enable',
		'type'				=> 'hr',
	) ) );
endfor;