<?php
/**
 * Cake Shop Bakery Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Cake Shop Bakery
 */

if ( ! defined( 'CAKE_SHOP_BAKERY_URL' ) ) {
    define( 'CAKE_SHOP_BAKERY_URL', esc_url( 'https://www.themagnifico.net/themes/cake-shop-wordpress-theme/','cake-shop-bakery' ));
}

if ( ! defined( 'CAKE_SHOP_BAKERY_TEXT' ) ) {
    define( 'CAKE_SHOP_BAKERY_TEXT', __( 'Cake Shop Pro','cake-shop-bakery' ));
}

use WPTRT\Customize\Section\Cake_Shop_Bakery_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Cake_Shop_Bakery_Button::class );

    $manager->add_section(
        new Cake_Shop_Bakery_Button( $manager, 'cake_shop_bakery_pro', [
            'title'       => esc_html( CAKE_SHOP_BAKERY_TEXT, 'cake-shop-bakery' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'cake-shop-bakery' ),
            'button_url'  => esc_url( CAKE_SHOP_BAKERY_URL )
        ] )
    );

} );

if ( ! defined( 'CAKE_SHOP_BAKERY_LINK' ) ) {
    define( 'CAKE_SHOP_BAKERY_LINK', esc_url( 'https://www.themagnifico.net/themes/cake-shop-wordpress-theme/','cake-shop-bakery' ));
}

if ( ! defined( 'CAKE_SHOP_BAKERY_BUY_TEXT' ) ) {
    define( 'CAKE_SHOP_BAKERY_BUY_TEXT', __( 'Buy Cake Shop Pro','cake-shop-bakery' ));
}

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $cake_shop_bakery_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'cake-shop-bakery-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $cake_shop_bakery_version,
        true
    );

    wp_enqueue_style(
        'cake-shop-bakery-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $cake_shop_bakery_version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cake_shop_bakery_customize_register($wp_customize){

     // Pro Version
    class Cake_Shop_Bakery_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( CAKE_SHOP_BAKERY_BUY_TEXT,'cake-shop-bakery' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Cake_Shop_Bakery_sanitize_custom_control( $input ) {
        return $input;
    }


    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('cake_shop_bakery_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'cake-shop-bakery' ),
        'section'        => 'title_tagline',
        'settings'       => 'cake_shop_bakery_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cake_shop_bakery_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'cake-shop-bakery' ),
        'section'        => 'title_tagline',
        'settings'       => 'cake_shop_bakery_theme_description',
        'type'           => 'checkbox',
    )));

    // General Settings
     $wp_customize->add_section('cake_shop_bakery_general_settings',array(
        'title' => esc_html__('General Settings','cake-shop-bakery'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('cake_shop_bakery_preloader_hide', array(
        'default' => '0',
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'cake-shop-bakery' ),
        'section'        => 'cake_shop_bakery_general_settings',
        'settings'       => 'cake_shop_bakery_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'cake_shop_bakery_preloader_bg_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cake_shop_bakery_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_general_settings',
        'settings' => 'cake_shop_bakery_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'cake_shop_bakery_preloader_dot_1_color', array(
        'default' => '#dd3f2f',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cake_shop_bakery_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_general_settings',
        'settings' => 'cake_shop_bakery_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'cake_shop_bakery_preloader_dot_2_color', array(
        'default' => '#dd3f2f',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cake_shop_bakery_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_general_settings',
        'settings' => 'cake_shop_bakery_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('cake_shop_bakery_scroll_hide', array(
      'default' => false,
      'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'cake-shop-bakery' ),
        'section'        => 'cake_shop_bakery_general_settings',
        'settings'       => 'cake_shop_bakery_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cake_shop_bakery_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'cake-shop-bakery' ),
        'section'        => 'cake_shop_bakery_general_settings',
        'settings'       => 'cake_shop_bakery_sticky_header',
        'type'           => 'checkbox',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting_pro_option', array(
        'sanitize_callback' => 'Cake_Shop_Bakery_sanitize_custom_control'
    ) );
    $wp_customize->add_control( new Cake_Shop_Bakery_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting_pro_option', array(
        'section'     => 'cake_shop_bakery_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cake-shop-bakery' ),
        'description' => esc_url( CAKE_SHOP_BAKERY_LINK ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('cake_shop_bakery_top_slider',array(
        'title' => esc_html__('Slider Option','cake-shop-bakery')
    ));

    $wp_customize->add_setting('cake_shop_bakery_slider_setting', array(
        'default' => 0,
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'cake-shop-bakery' ),
        'section'        => 'cake_shop_bakery_top_slider',
        'settings'       => 'cake_shop_bakery_slider_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cake_shop_bakery_slider_loop', array(
        'default' => 1,
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_slider_loop',array(
        'label'          => __( 'Enable Disable Slider Loop', 'cake-shop-bakery' ),
        'section'        => 'cake_shop_bakery_top_slider',
        'settings'       => 'cake_shop_bakery_slider_loop',
        'type'           => 'checkbox',
    )));

    for ( $cake_shop_bakery_count = 1; $cake_shop_bakery_count <= 3; $cake_shop_bakery_count++ ) {
        $wp_customize->add_setting( 'cake_shop_bakery_top_slider_page' . $cake_shop_bakery_count, array(
            'default'           => '',
            'sanitize_callback' => 'cake_shop_bakery_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'cake_shop_bakery_top_slider_page' . $cake_shop_bakery_count, array(
            'label'    => __( 'Select Slide Page', 'cake-shop-bakery' ),
            'section'  => 'cake_shop_bakery_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting_pro_option', array(
        'sanitize_callback' => 'Cake_Shop_Bakery_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cake_Shop_Bakery_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting_pro_option', array(
        'section'     => 'cake_shop_bakery_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cake-shop-bakery' ),
        'description' => esc_url( CAKE_SHOP_BAKERY_LINK ),
        'priority'    => 100
    )));

    }

    //Product
    $wp_customize->add_section('cake_shop_bakery_new_product',array(
        'title' => esc_html__('Featured Product','cake-shop-bakery'),
        'description' => esc_html__('Here you have to select product category which will display perticular new featured product in the home page.','cake-shop-bakery')
    ));

    $wp_customize->add_setting('cake_shop_bakery_new_product_setting', array(
        'default' => 0,
        'sanitize_callback' => 'cake_shop_bakery_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cake_shop_bakery_new_product_setting',array(
        'label'          => __( 'Enable Disable Product', 'cake-shop-bakery' ),
        'section'        => 'cake_shop_bakery_new_product',
        'settings'       => 'cake_shop_bakery_new_product_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cake_shop_bakery_new_product_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cake_shop_bakery_new_product_title',array(
        'label' => esc_html__('Title','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_new_product',
        'setting' => 'cake_shop_bakery_new_product_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cake_shop_bakery_new_product_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cake_shop_bakery_new_product_text',array(
        'label' => esc_html__('Text','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_new_product',
        'setting' => 'cake_shop_bakery_new_product_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cake_shop_bakery_new_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('cake_shop_bakery_new_product_number',array(
        'label' => esc_html__('No of Product','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_new_product',
        'setting' => 'cake_shop_bakery_new_product_number',
        'type'  => 'number'
    ));

    $cake_shop_bakery_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $cake_shop_bakery_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('cake_shop_bakery_new_product_category',array(
        'sanitize_callback' => 'cake_shop_bakery_sanitize_select',
    ));
    $wp_customize->add_control('cake_shop_bakery_new_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','cake-shop-bakery'),
        'section' => 'cake_shop_bakery_new_product',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_new_product_setting_pro_option', array(
        'sanitize_callback' => 'Cake_Shop_Bakery_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cake_Shop_Bakery_Customize_Pro_Version ( $wp_customize,'pro_version_new_product_setting_pro_option', array(
        'section'     => 'cake_shop_bakery_new_product',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cake-shop-bakery' ),
        'description' => esc_url( CAKE_SHOP_BAKERY_LINK ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('cake_shop_bakery_site_footer_section', array(
        'title' => esc_html__('Footer', 'cake-shop-bakery'),
    ));

    $wp_customize->add_setting('cake_shop_bakery_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cake_shop_bakery_footer_text_setting', array(
        'label' => __('Replace the footer text', 'cake-shop-bakery'),
        'section' => 'cake_shop_bakery_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_pro_option', array(
        'sanitize_callback' => 'Cake_Shop_Bakery_sanitize_custom_control'
    ) );
    $wp_customize->add_control( new Cake_Shop_Bakery_Customize_Pro_Version ( $wp_customize,'pro_version_footer_pro_option', array(
        'section'     => 'cake_shop_bakery_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cake-shop-bakery' ),
        'description' => esc_url( CAKE_SHOP_BAKERY_LINK ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'cake_shop_bakery_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cake_shop_bakery_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cake_shop_bakery_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cake_shop_bakery_customize_preview_js(){
    wp_enqueue_script('cake-shop-bakery-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'cake_shop_bakery_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function cake_shop_bakery_panels_js() {
    wp_enqueue_style( 'cake-shop-bakery-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'cake-shop-bakery-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'cake_shop_bakery_panels_js' );
