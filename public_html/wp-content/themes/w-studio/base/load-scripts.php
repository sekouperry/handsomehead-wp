<?php

// Adding Scripts To Front End
add_action( 'wp_enqueue_scripts' , 'w_studio_enqueueScripts' , 10 );

// Adding Scripts To Admin Pages
add_action( 'admin_enqueue_scripts' , 'w_studio_enqueueScriptsPageMetaBox' , 10 );

function w_studio_enqueueScripts() {	

	$w_studio_optionValues = get_option( 'w_studio' );
	

    // Registering Style Sheets
    wp_register_style( 'raleway-fonts' , 'https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,700,800,900' , '' , '1.0.0' , 'all' );    	wp_register_style( 'w_studio_editor_style' , W_STUDIO_THEME_ASSETS_CSS . '/editor-style.css' , '' , '1.0.0' , 'all' );
    wp_register_style( 'animate' , W_STUDIO_THEME_ASSETS_CSS . '/animate.css' , '' , '1.0.0' , 'all' );
    wp_register_style( 'bootstrap' , W_STUDIO_THEME_ASSETS_CSS . '/bootstrap.min.css' , '' , '3.2.0' , 'all' );
    wp_register_style( 'cubeportfolio' , W_STUDIO_THEME_ASSETS_CSS . '/cubeportfolio.min.css' , '' , '3.4.0' , 'all' );
    wp_register_style( 'elegent' , W_STUDIO_THEME_ASSETS_CSS . '/elegant.css' , '' , '1.0.0' , 'all' );
    wp_register_style( 'meanmenu' , W_STUDIO_THEME_ASSETS_CSS . '/meanmenu.min.css' , '' , '2.0.7' , 'all' );
    wp_register_style( 'flexslider' , W_STUDIO_THEME_ASSETS_CSS . '/flexslider.css' , '' , '1.3.3' , 'all' );
    wp_register_style( 'owl-carousel' , W_STUDIO_THEME_ASSETS_CSS . '/owl.carousel.css' , '' , '1.3.3' , 'all' );
    wp_register_style( 'bootsnav' , W_STUDIO_THEME_ASSETS_CSS . '/bootsnav.css' , '' , '1.3.3' , 'all' );
    wp_register_style( 'YTPlayer' , W_STUDIO_THEME_ASSETS_CSS . '/mb.YTPlayer.css' , '' , '1.0.0' , 'all' );
    wp_register_style( 'prettyPhotoCss' , W_STUDIO_THEME_ASSETS_CSS . '/prettyPhoto.css' , '' , '3.1.6' , 'all' );
    wp_register_style( 'w_studio_style' , W_STUDIO_THEME_DIR_URI . '/style.css' , '' , '1.0.0' , 'all' );

    // Enqueue Style Sheets
    wp_enqueue_style( 'raleway-fonts' );	    
	wp_enqueue_style( 'w_studio_editor_style' );
    wp_enqueue_style( 'animate' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'cubeportfolio' );
    wp_enqueue_style( 'elegent' );
    wp_enqueue_style( 'meanmenu' );
    wp_enqueue_style( 'flexslider' );
    wp_enqueue_style( 'owl-carousel' );
    wp_enqueue_style( 'bootsnav' );
    wp_enqueue_style( 'YTPlayer' );
    wp_enqueue_style( 'prettyPhotoCss' );
    wp_enqueue_style( 'w_studio_style' );

    if( isset( $w_studio_optionValues[ 'w-off-redux-settings' ] ) ):
        if( $w_studio_optionValues[ 'w-off-redux-settings' ] ) {
            wp_register_style( 'w_studio_dynamic-style' , W_STUDIO_THEME_DIR_URI . '/base/redux/dynamic.css' , '' , '1.0.0' , 'all' );
            wp_enqueue_style( 'w_studio_dynamic-style' );
        }
    endif;

    wp_register_style( 'responsive' , W_STUDIO_THEME_ASSETS_CSS . '/responsive.css' , '' , '1.0.0' , 'all' );
    wp_enqueue_style( 'responsive' );

    // Registering Scripts
    wp_register_script( 'bootstrapjs' , W_STUDIO_THEME_ASSETS_JS . '/bootstrap.min.js' , array( 'jquery' ) , '3.2.0' , true );
    wp_register_script( 'appear' , W_STUDIO_THEME_ASSETS_JS . '/jquery.appear.js' , array( 'jquery' ) , '0.3.3' , true );
    wp_register_script( 'countTo' , W_STUDIO_THEME_ASSETS_JS . '/jquery.countTo.js' , array( 'jquery' ) , '1.0.0' , true );
    wp_register_script( 'cubeportfolio' , W_STUDIO_THEME_ASSETS_JS . '/jquery.cubeportfolio.min.js' , array( 'jquery' ) , '3.4.0' , false );
    wp_register_script( 'easing' , W_STUDIO_THEME_ASSETS_JS . '/jquery.easing.1.3.min.js' , array( 'jquery' ) , '1.3.0' , true );
    wp_register_script( 'meanmenu' , W_STUDIO_THEME_ASSETS_JS . '/jquery.meanmenu.min.js' , array( 'jquery' ) , '2.0.7' , true );
    wp_register_script( 'nav' , W_STUDIO_THEME_ASSETS_JS . '/jquery.nav.js' , array( 'jquery' ) , '3.0.0' , true );
    wp_register_script( 'parallax' , W_STUDIO_THEME_ASSETS_JS . '/jquery.parallax-1.1.3.js' , array( 'jquery' ) , '1.1.3' , true );
    wp_register_script( 'masonry' , W_STUDIO_THEME_ASSETS_JS . '/masonry.pkgd.min.js' , array( 'jquery' ) , '3.3.2' , true );
    wp_register_script( 'owl-carousel' , W_STUDIO_THEME_ASSETS_JS . '/owl.carousel.js' , array( 'jquery' ) , '1.3.3' , true );
    wp_register_script( 'respond' , W_STUDIO_THEME_ASSETS_JS . '/respond.js' , array( 'jquery' ) , '1.0.0' , true );
    wp_register_script( 'wow' , W_STUDIO_THEME_ASSETS_JS . '/wow.min.js' , array( 'jquery' ) , '0.1.9' , true );
    wp_register_script( 'flexslider' , W_STUDIO_THEME_ASSETS_JS . '/jquery.flexslider-min.js' , array( 'jquery' ) , '0.1.9' , true );
    wp_register_script( 'flexslider_custom' , W_STUDIO_THEME_ASSETS_JS . '/flexslider.js' , array( 'jquery', 'flexslider' ) , '0.1.9' , true );
    wp_register_script( 'viewport' , W_STUDIO_THEME_ASSETS_JS . '/viewport.js' , array( 'jquery' ) , '1.0.0' , true );
    wp_register_script( 'w_studio_customjs' , W_STUDIO_THEME_ASSETS_JS . '/custom.js' , array( 'jquery' ) , '1.0.1' , true );
    wp_register_script( 'retinajs' , W_STUDIO_THEME_ASSETS_JS . '/retina.min.js' , array( 'jquery' ) , '1.0.1' , true );
    wp_register_script( 'bootsnav' , W_STUDIO_THEME_ASSETS_JS . '/bootsnav.js' , array( 'jquery' ) , '1.0.1' , true );
    wp_register_script( 'YTPlayer' , W_STUDIO_THEME_ASSETS_JS . '/jquery.mb.YTPlayer.min.js' , array( 'jquery' ) , '1.0.1' , true );

    // Enqueue Scripts
    wp_enqueue_script( 'bootstrapjs' );
    wp_enqueue_script( 'appear' );
    wp_enqueue_script( 'countTo' );
    wp_enqueue_script( 'cubeportfolio' );
    wp_enqueue_script( 'easing' );
    wp_enqueue_script( 'meanmenu' );
    wp_enqueue_script( 'nav' );
    wp_enqueue_script( 'parallax' );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'owl-carousel' );
    wp_enqueue_script( 'respond' );
    wp_enqueue_script( 'viewport' );
    wp_enqueue_script( 'wow' );
    wp_enqueue_script( 'flexslider' );
    wp_enqueue_script( 'flexslider_custom' );
    wp_enqueue_script( 'w_studio_customjs' );
    wp_enqueue_script( 'retinajs' );
    wp_enqueue_script( 'bootsnav' );
    wp_enqueue_script( 'YTPlayer' );
    
    if( is_home() ) {
        if( $w_studio_optionValues[ 'w-blog-archive-load-more' ] == 2 ) {
            wp_register_script( 'w_studio_loadmorescrolljs' , W_STUDIO_THEME_ASSETS_JS . '/load.more-scroll.js' , array( 'jquery' ) , '1.0.0' , true );
            wp_enqueue_script( 'w_studio_loadmorescrolljs' );
            wp_localize_script( 'w_studio_loadmorescrolljs' , 'w_studio_loadmorepost' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        } else if( $w_studio_optionValues[ 'w-blog-archive-load-more' ] == 3 ) {
            wp_register_script( 'w_studio_loadmoreclickjs' , W_STUDIO_THEME_ASSETS_JS . '/load.more-click.js' , array( 'masonry' ) , '1.0.0' , true );
            wp_enqueue_script( 'w_studio_loadmoreclickjs' );
            wp_localize_script( 'w_studio_loadmoreclickjs' , 'w_studio_loadmorepost' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        }
    }

    if( is_singular( 'portfolio' ) ) {

        global $post;
        $w_studio_portfolioStyle = get_post_meta( $post->ID , 'w-single-portfolio-style' , true );

        if( !empty( $w_studio_portfolioStyle ) ) {
            if( $w_studio_portfolioStyle == 4 || $w_studio_portfolioStyle == 1 || $w_studio_portfolioStyle == 2 ) {
                wp_register_script( 'cbp-methods' , W_STUDIO_THEME_ASSETS_JS . '/cbp-methods.js' , array( 'jquery' ) , '1.0.0' , true );
                wp_enqueue_script( 'cbp-methods' );
            } else if( $w_studio_portfolioStyle == 3 ) {
                wp_register_script( 'cbp-methods2' , W_STUDIO_THEME_ASSETS_JS . '/cbp-methods2.js' , array( 'jquery' ) , '1.0.0' , true );
                wp_enqueue_script( 'cbp-methods2' );
            }
        }
    } else {
        $w_studio_portfolioStyle = '';
    }

    global $post;
	if( is_page() ) {
		$w_studio_headerType = esc_attr( get_post_meta( $post->ID , 'w-header-type' , true ) );
		$w_studio_video_url = get_post_meta( $post->ID , 'w-youtube-url' , true );
		if($w_studio_headerType == '4' && $w_studio_video_url != '') {
			wp_register_script( 'bg-video' , W_STUDIO_THEME_ASSETS_JS . '/bg-video.js' , array( 'jquery', 'YTPlayer' ) , '1.0.0' , true );
			wp_enqueue_script( 'bg-video' );
		}
	}

	wp_register_script( 'prettyPhoto' , W_STUDIO_THEME_ASSETS_JS . '/jquery.prettyPhoto.js' , array( 'jquery' ) , '3.1.6' , true );
	wp_enqueue_script( 'prettyPhoto' );

    // Checking for one page option
    $w_studio_isOnePage = w_studio_studioPageMetaData();
    if( $w_studio_isOnePage == 'on' ) {
        wp_register_script( 'w_studio_onepagejs' , W_STUDIO_THEME_ASSETS_JS . '/onepagejs.js' , array( 'jquery' ) , '1.0.0' , true );

        wp_enqueue_script( 'w_studio_onepagejs' );
    }

    if( is_singular() ) wp_enqueue_script( "comment-reply" );

    wp_localize_script( 'w_studio_loadmorejs' , 'w_studio_loadmorepost' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

    wp_localize_script( 'w_studio_loadmorejs' , 'w_studio_loadmorepost' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

    // If Portfolio Custom Templates are loaded then load this script with it
    if( is_page_template( 'template-portfolio-col-1.php' ) || is_page_template( 'template-portfolio-col-2.php' ) || is_page_template( 'template-portfolio-col-3.php' ) || is_page_template( 'template-portfolio-masonary-1.php' ) || is_page_template( 'template-portfolio-masonary-2.php' ) || is_page_template( 'template-portfolio-masonary-3.php' ) || is_page_template( 'template-portfolio-masonary-4.php' ) || is_page_template( 'template-portfolio-style-1.php' ) || is_page_template( 'template-portfolio-style-2.php' ) || is_page_template( 'template-portfolio-style-3.php' ) || is_page_template( 'template-portfolio-style-4.php' ) ) {

        wp_register_script( 'w_studio_portfolioloadmoretemplate' , W_STUDIO_THEME_ASSETS_JS . '/portfolio-load-more-template.js' , array( 'jquery' ) , '1.0.0' , true );

        wp_enqueue_script( 'w_studio_portfolioloadmoretemplate' );

        wp_localize_script( 'w_studio_portfolioloadmoretemplate' , 'w_studio_loadmoreportfolio' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

    // Load Page Front End JS
    if( is_page() ) {
        wp_register_script( 'w_studio_page-front-end' , W_STUDIO_THEME_ASSETS_JS . '/page-front-end.js' , array( 'jquery' ) , '1.0.0' , 'all' );
        wp_enqueue_script( 'w_studio_page-front-end' );
    }

    if( is_tax( 'portfolio-category' ) ) {

        wp_register_script( 'w_studio_portfolioloadmoretemplate' , W_STUDIO_THEME_ASSETS_JS . '/portfolio-load-more-template.js' , array( 'jquery' ) , '1.0.0' , true );
        wp_enqueue_script( 'w_studio_portfolioloadmoretemplate' );
    }
}

/**
 * Function to load scripts and style sheet on admin pages
 *
 * @param   $hook
 *
 * @return
 */

function w_studio_enqueueScriptsPageMetaBox( $hook ) {

    /* Loading Widget Scripts */
    if( is_admin() ) {
        $w_studio_screen = get_current_screen();

        wp_register_style( 'select2.min', W_STUDIO_THEME_ASSETS_CSS . '/select2.min.css', '', '', 'all' );
        wp_enqueue_style( 'select2.min' );
        wp_register_script( 'select2.min', W_STUDIO_THEME_ASSETS_JS . '/select2.min.js', '', '3.2.0', true );
        wp_enqueue_script( 'select2.min' );

        if( $w_studio_screen->base == 'widgets' ) {

            wp_register_script( 'w_studio_widget-custom-js' , W_STUDIO_THEME_ASSETS . '/js/widgets.js' );
            wp_enqueue_script( 'w_studio_widget-custom-js' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker' );
        }
    }


    if( 'nav-menus.php' == $hook ) {
        // Including Scripts To Menu Page
        wp_register_style( 'w_studio_nav-menu-css' , W_STUDIO_THEME_ASSETS . '/css/nav-menu.css' , array() , '1.0.0' , false );
        wp_register_script( 'w_studio_nav-menu-js' , W_STUDIO_THEME_ASSETS . '/js/nav-menu.js' , array( 'jquery' ) , '1.0.0' , true );

        wp_enqueue_style( 'w_studio_nav-menu-css' );
        wp_enqueue_script( 'w_studio_nav-menu-js' );
    } else {
        // Loading Default Style Sheets For Metaboxes
        // Adding Color Picker Stylesheet
        wp_enqueue_style( 'wp-color-picker' );

        // Including Scripts To Page Editor Page
        wp_register_style( 'w_studio_page-custom-css' , W_STUDIO_THEME_ASSETS . '/css/page.css' , array() , '1.0.0' , 'all' );
        wp_enqueue_style( 'w_studio_page-custom-css' );

        $w_studio_screen = get_current_screen();
        if( $w_studio_screen->post_type == 'page' ) {
            wp_register_script( 'w_studio_page-custom-js' , W_STUDIO_THEME_ASSETS . '/js/page.js' , array( 'wp-color-picker' ) , '1.0.0' , true );

            // Localizing Scripts
            wp_localize_script( 'w_studio_page-custom-js' , 'w_header_image' , array( 'title' => esc_html__( 'Choose or Upload an Image' , 'w-studio' ) , 'button' => esc_html__( 'Use This Image' , 'w-studio' ) ) );

            wp_enqueue_script( 'w_studio_page-custom-js' );
        } else if( $w_studio_screen->post_type == 'post' || $w_studio_screen->post_type == 'slider' ) {
            wp_register_script( 'w_studio_post-custom-js' , W_STUDIO_THEME_ASSETS . '/js/post.js' , array( 'wp-color-picker' ) , '1.0.0' , true );

            wp_enqueue_script( 'w_studio_post-custom-js' );
        }
    }
}

/*
 * Function to check for one page 
 * 
 */

function w_studio_studioPageMetaData() {
    global $post;
    if( isset( $post ) ) {
        $w_studio_isOnePage = get_post_meta( $post->ID , 'w-is-one-page' , true );
    } else {
        $w_studio_isOnePage = 'off';
    }

    return $w_studio_isOnePage;
}