<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Farmerpress
* @since Farmerpress 1.0.0
*/

if ( ! function_exists( 'farmerpress_validate_long_excerpt' ) ) :
  function farmerpress_validate_long_excerpt( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 5 ) {
		 $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'farmerpress' ) );
	 } elseif ( $value > 100 ) {
		 $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_slider_count' ) ) :
  function farmerpress_validate_slider_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 10 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 10', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_product_layout_gallery_count' ) ) :
  function farmerpress_validate_product_layout_gallery_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 15 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 15', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_featured_count' ) ) :
  function farmerpress_validate_featured_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 10 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 10', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_accessories_count' ) ) :
  function farmerpress_validate_accessories_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 15 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 15', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'farmerpress_validate_service_count' ) ) :
  function farmerpress_validate_service_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 3 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of service is 3', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of service is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_gallery_count' ) ) :
  function farmerpress_validate_gallery_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 3 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of service is 3', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of service is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'farmerpress_validate_blog_count' ) ) :
  function farmerpress_validate_blog_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_featured_product_count' ) ) :
  function farmerpress_validate_featured_product_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_recent_product_count' ) ) :
  function farmerpress_validate_recent_product_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_client_count' ) ) :
  function farmerpress_validate_client_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of logo is 1', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of logo is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'farmerpress_validate_trending_product_count' ) ) :
  function farmerpress_validate_trending_product_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of logo is 1', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of logo is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'farmerpress_validate_testimonial_count' ) ) :
  function farmerpress_validate_testimonial_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'farmerpress' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of testimonial is 1', 'farmerpress' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of testimonial is 12', 'farmerpress' ) );
	 }
	 return $validity;
  }
endif;




























