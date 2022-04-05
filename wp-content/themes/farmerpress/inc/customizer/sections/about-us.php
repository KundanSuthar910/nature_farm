<?php
/**
 * About Us Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add About Us section
$wp_customize->add_section( 'farmerpress_about_us_section', array(
	'title'             => esc_html__( ' About Us','farmerpress' ),
	'description'       => esc_html__( 'About Us Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
	
) );

// About Us content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[about_us_section_enable]', array(
	'default'			=> 	$options['about_us_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[about_us_section_enable]', array(
	'label'             => esc_html__( 'About Us Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_about_us_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

// layout_zoom title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[about_us_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_us_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[about_us_subtitle]', array(
	'label'           	=> esc_html__( 'Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_about_us_section',
	'active_callback' 	=> 'farmerpress_is_about_us_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[about_us_subtitle]', array(
		'selector'            => '#about-us h3.section-subtitle',
		'settings'            => 'farmerpress_theme_options[about_us_subtitle]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_about_us_subtitle_partial',
    ) );
}


// about_us pages drop down chooser control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[about_us_content_page]', array(
	'sanitize_callback' => 'farmerpress_sanitize_page',
) );

$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[about_us_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'farmerpress' ), 
	'section'           => 'farmerpress_about_us_section',
	'choices'			=> farmerpress_page_choices(),
	'active_callback'	=> 'farmerpress_is_about_us_section_enable',
) ) );


$wp_customize->add_setting( 'farmerpress_theme_options[about_us_btn_label]', array(
	'default'          	=> $options['about_us_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[about_us_btn_label]', array(
	'label'           	=>  esc_html__( 'About Us Button Label', 'farmerpress' ),
	'section'        	=> 'farmerpress_about_us_section',
	'active_callback' 	=> 'farmerpress_is_about_us_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[about_us_btn_label]', array(
		'selector'            => '#about-us .read-more .btn',
		'settings'            => 'farmerpress_theme_options[about_us_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_about_us_btn_label_partial',
    ) );
}