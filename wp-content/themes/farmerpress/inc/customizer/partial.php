<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Farmerpress
* @since Farmerpress 1.0.0
*/


// Service Section
if ( ! function_exists( 'farmerpress_topbar_title_partial' ) ) :
    // popular destination title
    function farmerpress_topbar_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['topbar_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_copyright_text_partial' ) ) :
    // popular destination title
    function farmerpress_copyright_text_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;


//==============================================================================//
//=======CTA Section =======//

if ( ! function_exists( 'farmerpress_cta_subtitle_partial' ) ) :
    // Cta Read more Text
    function farmerpress_cta_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['cta_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_cta_description_partial' ) ) :
    // Cta Read more Text
    function farmerpress_cta_description_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['cta_description'] );
    }
endif;

if ( ! function_exists( 'farmerpress_cta_btn_label_partial' ) ) :
    // Cta Read more Text
    function farmerpress_cta_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['cta_btn_label'] );
    }
endif;

if ( ! function_exists( 'farmerpress_alt_cta_btn_label_partial' ) ) :
    // Cta Read more Text
    function farmerpress_alt_cta_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['alt_cta_btn_label'] );
    }
endif;

//=======About Section =======//

if ( ! function_exists( 'farmerpress_about_us_subtitle_partial' ) ) :
    // Cta Read more Text
    function farmerpress_about_us_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['about_us_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_about_us_btn_label_partial' ) ) :
    // Cta Read more Text
    function farmerpress_about_us_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['about_us_btn_label'] );
    }
endif;

if ( ! function_exists( 'farmerpress_about_us_description_partial' ) ) :
    // Cta Read more Text
    function farmerpress_about_us_description_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['about_us_description'] );
    }
endif;

//=======Benefits Section =======//

if ( ! function_exists( 'farmerpress_benefits_subtitle_partial' ) ) :
    // Cta Read more Text
    function farmerpress_benefits_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['benefits_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_benefits_btn_label_partial' ) ) :
    // Cta Read more Text
    function farmerpress_benefits_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['benefits_btn_label'] );
    }
endif;

//=====Blog Section =====//

if ( ! function_exists( 'farmerpress_blog_title_partial' ) ) :
    // popular destination title
    function farmerpress_blog_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_blog_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_blog_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['blog_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_blog_readmore_text_partial' ) ) :
    // popular destination title
    function farmerpress_blog_readmore_text_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['blog_readmore_text'] );
    }
endif;

//=====Popular Product Section =====//

if ( ! function_exists( 'farmerpress_featured_btn_label_partial' ) ) :
    // popular destination title
    function farmerpress_featured_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['featured_btn_label'] );
    }
endif;


//=====Latest News Section =====//

if ( ! function_exists( 'farmerpress_latest_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_latest_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['latest_news_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_latest_news_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_latest_news_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['latest_news_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_latest_news_read_more_text_partial' ) ) :
    // popular destination title
    function farmerpress_latest_news_read_more_text_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['latest_news_read_more_text'] );
    }
endif;

//=====Latest Posts Section =====//

if ( ! function_exists( 'farmerpress_latest_blog_title_partial' ) ) :
    // popular destination title
    function farmerpress_latest_blog_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['latest_blog_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_latest_blog_btn_label_partial' ) ) :
    // popular destination title
    function farmerpress_latest_blog_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['latest_blog_btn_label'] );
    }
endif;

//=====Magazine Latest News Section =====//

if ( ! function_exists( 'farmerpress_magazine_latest_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_magazine_latest_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['magazine_latest_news_title'] );
    }
endif;

//=====Magazine Must Read News Section =====//

if ( ! function_exists( 'farmerpress_must_read_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_must_read_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['must_read_news_title'] );
    }
endif;

//=====Magazine Popular News Section =====//

if ( ! function_exists( 'farmerpress_popular_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_popular_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['popular_news_title'] );
    }
endif;

//=====Magazine Recent News Section =====//

if ( ! function_exists( 'farmerpress_recent_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_recent_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['recent_news_title'] );
    }
endif;

//=====Magazine Sport News Section =====//

if ( ! function_exists( 'farmerpress_sport_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_sport_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['sport_news_title'] );
    }
endif;

//=====Magazine Trending News Section =====//

if ( ! function_exists( 'farmerpress_trending_news_title_partial' ) ) :
    // popular destination title
    function farmerpress_trending_news_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['trending_news_title'] );
    }
endif;

//=====Popular Posts Section =====//

if ( ! function_exists( 'farmerpress_popular_blog_title_partial' ) ) :
    // popular destination title
    function farmerpress_popular_blog_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['popular_blog_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_popular_blog_btn_label_partial' ) ) :
    // popular destination title
    function farmerpress_popular_blog_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['popular_blog_btn_label'] );
    }
endif;

//=====Popular Product Section =====//

if ( ! function_exists( 'farmerpress_popular_product_title_partial' ) ) :
    // popular destination title
    function farmerpress_popular_product_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['popular_product_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_popular_product_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_popular_product_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['popular_product_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_popular_product_des_partial' ) ) :
    // popular destination title
    function farmerpress_popular_product_des_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['popular_product_des'] );
    }
endif;


//=====Portfolio Section =====//

if ( ! function_exists( 'farmerpress_portfolio_title_partial' ) ) :
    // popular destination title
    function farmerpress_portfolio_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['portfolio_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_portfolio_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_portfolio_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['portfolio_subtitle'] );
    }
endif;

//=====Product Collection Section =====//

if ( ! function_exists( 'farmerpress_product_collection_btn_label_partial' ) ) :
    // popular destination title
    function farmerpress_product_collection_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['product_collection_btn_label'] );
    }
endif;


//===== Recent Product Section =====//

if ( ! function_exists( 'farmerpress_recent_product_title_partial' ) ) :
    // popular destination title
    function farmerpress_recent_product_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['recent_product_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_recent_product_sub_title_partial' ) ) :
    // popular destination title
    function farmerpress_recent_product_sub_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['recent_product_sub_title'] );
    }
endif;

//===== Recommended Product Section =====//

if ( ! function_exists( 'farmerpress_recommended_product_title_partial' ) ) :
    // popular destination title
    function farmerpress_recommended_product_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['recommended_product_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_recommended_product_sub_title_partial' ) ) :
    // popular destination title
    function farmerpress_recommended_product_sub_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['recommended_product_sub_title'] );
    }
endif;

//===== Recommended Product Section =====//

if ( ! function_exists( 'farmerpress_services_title_partial' ) ) :
    // popular destination title
    function farmerpress_services_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['services_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_services_description_partial' ) ) :
    // popular destination title
    function farmerpress_services_description_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['services_description'] );
    }
endif;

//===== Slider Section =====//

if ( ! function_exists( 'farmerpress_slider_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_slider_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['slider_subtitle'] );
    }
endif;

if ( ! function_exists( 'farmerpress_slider_btn_label_partial' ) ) :
    // popular destination title
    function farmerpress_slider_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['slider_btn_label'] );
    }
endif;

//===== Subscription Section =====//

if ( ! function_exists( 'farmerpress_subscription_title_partial' ) ) :
    // popular destination title
    function farmerpress_subscription_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['subscription_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_subscription_sub_title_partial' ) ) :
    // popular destination title
    function farmerpress_subscription_sub_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['subscription_sub_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_subscription_btn_label_partial' ) ) :
    // popular destination title
    function farmerpress_subscription_btn_label_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['subscription_btn_label'] );
    }
endif;

//===== Team Section =====//

if ( ! function_exists( 'farmerpress_team_title_partial' ) ) :
    // popular destination title
    function farmerpress_team_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['team_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_team_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_team_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['team_subtitle'] );
    }
endif;

//===== testimonial Section =====//

if ( ! function_exists( 'farmerpress_testimonial_title_partial' ) ) :
    // popular destination title
    function farmerpress_testimonial_title_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'farmerpress_testimonial_subtitle_partial' ) ) :
    // popular destination title
    function farmerpress_testimonial_subtitle_partial() {
        $options = farmerpress_get_theme_options();
        return esc_html( $options['testimonial_subtitle'] );
    }
endif;