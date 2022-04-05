<?php
/**
 * services Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add services section
$wp_customize->add_section( 'farmerpress_services_section', array(
	'title'             => esc_html__( 'Services','farmerpress' ),
	'description'       => esc_html__( 'Services Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// services content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[services_section_enable]', array(
	'default'			=> 	$options['services_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[services_section_enable]', array(
	'label'             => esc_html__( 'Services Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_services_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );



// services title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[services_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['services_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[services_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_services_section',
	'active_callback' 	=> 'farmerpress_is_services_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[services_title]', array(
		'selector'            => '.front-service .section-header h2',
		'settings'            => 'farmerpress_theme_options[services_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_services_title_partial',
	) ); 
}

// services title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[services_description]', array(
	'default'			=> $options['services_description'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[services_description]', array(
	'label'           	=> esc_html__( 'Section Description', 'farmerpress' ),
	'section'        	=> 'farmerpress_services_section',
	'active_callback' 	=> 'farmerpress_is_services_section_enable',
	'type'				=> 'textarea',
) ); 

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[services_description]', array(
		'selector'            => '.front-service .section-header h3',
		'settings'            => 'farmerpress_theme_options[services_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_services_description_partial',
	) );
}

// layout_zoom image setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[services_background_image]', array(
	'sanitize_callback' => 'farmerpress_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'farmerpress_theme_options[services_background_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'farmerpress' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'farmerpress' ), 1920, 1280 ),
		'section'     		=> 'farmerpress_services_section',
		'active_callback'	=> 'farmerpress_is_services_section_enable',
) ) );



		
for ( $i = 1; $i <= 3; $i++ ) :
			// services pages drop down chooser control and setting
	$wp_customize->add_setting( 'farmerpress_theme_options[services_content_page_' . $i . ']', array(
		'sanitize_callback' => 'farmerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[services_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_services_section',
		'choices'			=> farmerpress_page_choices(),
		'active_callback'	=> 'farmerpress_is_services_section_enable',
	) ) );
					
					
		
	$wp_customize->add_setting( 'farmerpress_theme_options[services_content_icon_' . $i . ']', array(
		'default'          	=> 'fa-angellist',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Farmerpress_Icon_Picker( $wp_customize, 'farmerpress_theme_options[services_content_icon_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Icon %d', 'farmerpress' ), $i ),
        'section'           => 'farmerpress_services_section',
        'active_callback'   => 'farmerpress_is_services_section_enable',
    ) ) );

    $wp_customize->add_setting( 'farmerpress_theme_options[services_hr_'. $i .']', array(
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Farmerpress_Customize_Horizontal_Line( $wp_customize, 'farmerpress_theme_options[services_hr_'. $i .']',
        array(
            'section'           => 'farmerpress_services_section',
            'active_callback'   => 'farmerpress_is_services_section_enable',
            'type'            => 'hr'
    ) ) );
endfor;
