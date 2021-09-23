<?php
// Adding Scripts To Admin Pages
add_action( 'admin_enqueue_scripts', 'w_studio_plugin_load_scripts', 10 );

function w_studio_plugin_load_scripts(){
    
    $w_studio_screen = get_current_screen();
    
    if( $w_studio_screen->post_type == 'portfolio' ){
        // Adding Color Picker Stylesheet
        wp_enqueue_style( 'wp-color-picker' );

        // Including Scripts To Page Editor Page
        wp_register_style( 'w-page-custom-css', W_STUDIO_PLUGIN_URL . '/cpt/assets/css/page.css' , array(), '1.0.0', 'all' );
        
        wp_enqueue_style( 'w-page-custom-css' );
        
        wp_register_script( 'w-portfolio-custom-js', W_STUDIO_PLUGIN_URL . '/cpt/assets/js/portfolio.js' , array(), '1.0.0', true );
        wp_enqueue_script( 'jquery-ui-datepicker' );
        
        wp_register_style( 'jquery-ui', W_STUDIO_PLUGIN_URL . '/cpt/assets/css/jquery-ui.css' , array(), '1.11.4', 'all' );
        wp_enqueue_style( 'jquery-ui' );
        
        // Localizing Scripts
        wp_localize_script( 'w-portfolio-custom-js', 'w_header_image', array(
            'title'     => esc_html__( 'Choose or Upload an Image', 'w-studio-plugin' ),
            'button'    => esc_html__( 'Use This Image', 'w-studio-plugin' )
        ));
        
        wp_enqueue_script( 'w-portfolio-custom-js' );
    }else if( $w_studio_screen->post_type == 'page' ){
        wp_register_style( 'w-plugin-shortcode-custom-css', W_STUDIO_PLUGIN_URL . '/shortcodes/assets/css/ws-vc.css' , array(), '1.0.0', 'all' );
        wp_enqueue_style( 'w-plugin-shortcode-custom-css' );
        
        // Including Scripts To Page Editor Page
        wp_register_style( 'w-page-custom-css', W_STUDIO_PLUGIN_URL . '/cpt/assets/css/page.css' , array(), '1.0.0', 'all' );        
        wp_enqueue_style( 'w-page-custom-css' );
        
    } else if( $w_studio_screen->post_type == 'album' ) { 
        wp_register_script( 'w-album-custom-js', W_STUDIO_PLUGIN_URL . '/cpt/assets/js/album.js' , array(), '1.0.0', true );
        // Localizing Scripts
        wp_localize_script( 'w-album-custom-js', 'w_header_image', array(
            'title'     => esc_html__( 'Choose or Upload an Image', 'w-studio-plugin' ),
            'button'    => esc_html__( 'Use This Image', 'w-studio-plugin' )
        ));
        wp_enqueue_script( 'w-album-custom-js' );
        // Including Scripts To Page Editor Page
        wp_register_style( 'w-page-custom-css', W_STUDIO_PLUGIN_URL . '/cpt/assets/css/page.css' , array(), '1.0.0', 'all' );        
        wp_enqueue_style( 'w-page-custom-css' );
    }
}