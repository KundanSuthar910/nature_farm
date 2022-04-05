<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'farmerpress_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','farmerpress' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_testimonial_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_testimonial_section',
	'active_callback' 	=> 'farmerpress_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[testimonial_title]', array(
		'selector'            => '#testimonial-section .section-header h2',
		'settings'            => 'farmerpress_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_testimonial_title_partial',
	) );
}


// testimonial title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[testimonial_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[testimonial_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_testimonial_section',
	'active_callback' 	=> 'farmerpress_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[testimonial_subtitle]', array(
		'selector'            => '#testimonial-section .section-header h3',
		'settings'            => 'farmerpress_theme_options[testimonial_subtitle]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_testimonial_subtitle_partial',
	) );
}



for ( $i = 1; $i <= 5; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'farmerpress_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'farmerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_testimonial_section',
		'choices'			=> farmerpress_page_choices(),
		'active_callback'	=> 'farmerpress_is_testimonial_section_enable',
	) ) );


	$options['testimonial_position_'.$i] = isset($options['testimonial_position_'.$i]) ? $options['testimonial_position_'.$i] : esc_html__('Happy Client', 'farmerpress');
	// testimonial position setting and control
	$wp_customize->add_setting( 'farmerpress_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['testimonial_position_'.$i],
	) );

	$wp_customize->add_control( 'farmerpress_theme_options[testimonial_position_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'position %d', 'farmerpress' ), $i ),
		'section'        	=> 'farmerpress_testimonial_section',
		'active_callback' 	=> 'farmerpress_is_testimonial_section_enable',
		'type'				=> 'text',
	) );

	// testimonial hr setting and control
	$wp_customize->add_setting( 'farmerpress_theme_options[testimonial_hr_'. $i .']', array(
		'sanitize_callback' => 'farmerpress_sanitize_html'
	) );

	$wp_customize->add_control( new Farmerpress_Customize_Horizontal_Line( $wp_customize, 'farmerpress_theme_options[testimonial_hr_'. $i .']',
		array(
			'section'         => 'farmerpress_testimonial_section',
			'active_callback' => 'farmerpress_is_testimonial_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;