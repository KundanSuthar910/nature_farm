<?php
/**
 * Benefits  Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add Benefits  section
$wp_customize->add_section( 'farmerpress_benefits_section', array(
	'title'             => esc_html__( ' Benefits Section','farmerpress' ),
	'description'       => esc_html__( 'Benefits  Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// Benefits  content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[benefits_section_enable]', array(
	'default'			=> 	$options['benefits_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[benefits_section_enable]', array(
	'label'             => esc_html__( 'Benefits  Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_benefits_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );



// layout_zoom title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[benefits_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['benefits_subtitle'],
) );

$wp_customize->add_control( 'farmerpress_theme_options[benefits_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_benefits_section',
	'active_callback' 	=> 'farmerpress_is_benefits_section_enable',
	'type'				=> 'text',
) );


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[benefits_subtitle]', array(
		'selector'            => '#future-benefits h3.section-subtitle',
		'settings'            => 'farmerpress_theme_options[benefits_subtitle]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_benefits_subtitle_partial',
    ) );
}


// benefits pages drop down chooser control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[benefits_content_page]', array(
	'sanitize_callback' => 'farmerpress_sanitize_page',
) );

$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[benefits_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'farmerpress' ), 
	'section'           => 'farmerpress_benefits_section',
	'choices'			=> farmerpress_page_choices(),
	'active_callback'	=> 'farmerpress_is_benefits_section_enable',
) ) );

$wp_customize->add_setting( 'farmerpress_theme_options[benefits_btn_label]', array(
	'default'			=> $options['benefits_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[benefits_btn_label]', array(
	'label'           	=>  esc_html__( 'Benefits  Button Label', 'farmerpress' ),
	'section'        	=> 'farmerpress_benefits_section',
	'active_callback' 	=> 'farmerpress_is_benefits_section_enable',
	'type'				=> 'text',
) );
// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[benefits_btn_label]', array(
		'selector'            => '#future-benefits .read-more .btn',
		'settings'            => 'farmerpress_theme_options[benefits_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_benefits_btn_label_partial',
    ) );
}