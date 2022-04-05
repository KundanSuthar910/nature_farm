<?php
/**
 * CTA Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add CTA section
$wp_customize->add_section( 'farmerpress_cta_section', array(
	'title'             => esc_html__( 'CTA','farmerpress' ),
	'description'       => esc_html__( 'CTA Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// CTA content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'CTA Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_cta_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );


$wp_customize->add_setting( 'farmerpress_theme_options[cta_btn_label]', array(
	'default'			=> 	$options['cta_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[cta_btn_label]', array(
	'label'           	=>  esc_html__( 'CTA Button Label', 'farmerpress' ),
	'section'        	=> 'farmerpress_cta_section',
	'active_callback' 	=> 'farmerpress_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[cta_btn_label]', array(
		'selector'            => '#call-to-action .read-more .btn-first',
		'settings'            => 'farmerpress_theme_options[cta_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_cta_btn_label_partial',
    ) );
}

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'farmerpress_sanitize_page',
) );

$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'farmerpress' ), 
	'section'           => 'farmerpress_cta_section',
	'choices'			=> farmerpress_page_choices(),
	'active_callback'	=> 'farmerpress_is_cta_section_enable',
) ) );


