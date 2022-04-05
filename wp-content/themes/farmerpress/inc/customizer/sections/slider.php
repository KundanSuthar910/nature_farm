<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Travel Master Pro
 * @since Travel Master Pro 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'farmerpress_slider_section', array(
	'title'             => esc_html__( 'Main Slider','farmerpress' ),
	'description'       => esc_html__( 'Slider Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_slider_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );


$wp_customize->add_setting( 'farmerpress_theme_options[slider_subtitle]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['slider_subtitle'],
		'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[slider_subtitle]', array(
	'label'           	=> esc_html__( 'Slider Subtitle', 'farmerpress' ),
	'section'        	=> 'farmerpress_slider_section',
	'active_callback' 	=> 'farmerpress_is_slider_section_enable',
	'type'				=> 'text',
) );


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[slider_subtitle]', array(
		'selector'            => '#featured-slider h3.sub-title',
		'settings'            => 'farmerpress_theme_options[slider_subtitle]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_slider_subtitle_partial',
    ) );
}

$wp_customize->add_setting( 'farmerpress_theme_options[slider_btn_label]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['slider_btn_label'],
		'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'farmerpress' ),
	'section'        	=> 'farmerpress_slider_section',
	'active_callback' 	=> 'farmerpress_is_slider_section_enable',
	'type'				=> 'text',
) ); 


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[slider_btn_label]', array(
		'selector'            => '#featured-slider .read-more .btn',
		'settings'            => 'farmerpress_theme_options[slider_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_slider_btn_label_partial',
    ) );
}



$wp_customize->add_setting( 'farmerpress_theme_options[slider_hr_2]', array(
	'sanitize_callback' => 'sanitize_text_field'

) );

$wp_customize->add_control( new Farmerpress_Customize_Horizontal_Line( $wp_customize, 'farmerpress_theme_options[slider_hr_2]',
	array(
		'section'         => 'farmerpress_slider_section',
		'active_callback' => 'farmerpress_is_slider_section_enable',
		'type'			  => 'hr'
) ) );



for ( $i = 1; $i <= 3; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'farmerpress_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'farmerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_slider_section',
		'choices'			=> farmerpress_page_choices(),
		'active_callback'	=> 'farmerpress_is_slider_section_enable',
	) ) );

endfor;

