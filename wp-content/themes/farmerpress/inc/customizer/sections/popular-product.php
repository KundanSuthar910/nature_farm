<?php
/**
 * popular_product Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( !class_exists('WooCommerce') ) {
    return;
}
// Add popular_product section
$wp_customize->add_section( 'farmerpress_popular_product_section', array(
    'title'             => esc_html__( 'Popular Product Section','farmerpress' ),
    'description'       => esc_html__( 'Popular Product Section Section options.', 'farmerpress' ),
    'panel'             => 'farmerpress_front_page_panel',
) );

// popular_product content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[popular_product_section_enable]', array(
    'default'           =>  $options['popular_product_section_enable'],
    'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[popular_product_section_enable]', array(
    'label'             => esc_html__( 'Popular product Section Enable', 'farmerpress' ),
    'section'           => 'farmerpress_popular_product_section',
    'on_off_label'      => farmerpress_switch_options(),
) ) );




// popular_product title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[popular_product_title]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['popular_product_title'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[popular_product_title]', array(
    'label'             => esc_html__( 'Title', 'farmerpress' ),
    'section'           => 'farmerpress_popular_product_section',
    'active_callback'   => 'farmerpress_is_popular_product_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[popular_product_title]', array(
        'selector'            => '#our-products .section-header h2',
        'settings'            => 'farmerpress_theme_options[popular_product_title]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'farmerpress_popular_product_title_partial',
    ) );
}


// popular_product title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[popular_product_subtitle]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['popular_product_subtitle'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[popular_product_subtitle]', array(
    'label'             => esc_html__( 'Sub Title', 'farmerpress' ),
    'section'           => 'farmerpress_popular_product_section',
    'active_callback'   => 'farmerpress_is_popular_product_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[popular_product_subtitle]', array(
        'selector'            => '#our-products .section-header p.section-subtitle',
        'settings'            => 'farmerpress_theme_options[popular_product_subtitle]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'farmerpress_popular_product_subtitle_partial',
    ) );
}

// popular_product title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[popular_product_des]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['popular_product_des'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[popular_product_des]', array(
    'label'             => esc_html__( 'Description', 'farmerpress' ),
    'section'           => 'farmerpress_popular_product_section',
    'active_callback'   => 'farmerpress_is_popular_product_section_enable',
    'type'              => 'text',
) );


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[popular_product_des]', array(
        'selector'            => '#our-products .section-content p',
        'settings'            => 'farmerpress_theme_options[popular_product_des]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'farmerpress_popular_product_des_partial',
    ) );
}



for( $i = 1 ; $i <= 4 ; $i++ ){

    $wp_customize->add_setting( 'farmerpress_theme_options[popular_product_cat_' . $i . ']', array(
        'sanitize_callback' => 'farmerpress_sanitize_select',
        'default'   => 1,
    ) );

    $wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[popular_product_cat_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Product Category %d', 'farmerpress' ), $i ),
        'section'           => 'farmerpress_popular_product_section',
        'choices'           => farmerpress_get_woo_product_cat(),
        'active_callback'   => 'farmerpress_is_popular_product_section_enable',
    ) ) );
}
