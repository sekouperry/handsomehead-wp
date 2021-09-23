<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

$theme  = new w_studio_Studio();
$theme->w_studio_init();

Class w_studio_Studio {
    
    /**
     * Defining Necessary Constants
     * 
     */
    function w_studio_loadConstants() {
        
        /* Define Constants */
        define( "W_STUDIO_THEME_DIR", get_template_directory() );
        define( "W_STUDIO_THEME_DIR_URI", get_template_directory_uri() );
        define( "W_STUDIO_THEME_ASSETS", W_STUDIO_THEME_DIR_URI . "/assets" );
        define( "W_STUDIO_THEME_ASSETS_CSS", W_STUDIO_THEME_ASSETS . "/css" );
        define( "W_STUDIO_THEME_ASSETS_JS", W_STUDIO_THEME_ASSETS . "/js");
    }
    
    /**
     * Loading Necessary Scripts & Style Sheets
     * 
     */
    function w_studio_loadScripts() {
        
        /* Enqueue Style Sheets & Scripts */
        require_once W_STUDIO_THEME_DIR . '/base/load-scripts.php';
    }
    
    /**
     * Loading Menu For Front End & For Back End Menu Page
     * 
     */
    function w_studio_loadMenus() {
        
        /* Register Nav Menu */
        if( is_admin() ) {
            // Load Meaga Menu Option
            require_once W_STUDIO_THEME_DIR . '/base/menu/mega-menu.php';
        } else {
            require_once W_STUDIO_THEME_DIR . '/base/menu/display-menu.php';
            require_once W_STUDIO_THEME_DIR . '/base/menu/burger-menu.php';
        }
        
        // Registering Menus
        register_nav_menu( 'main-menu', esc_html__( 'Main Menu', 'w-studio' ) );
        //register_nav_menu( 'one-page-menu', esc_html__( 'One Page Menu', 'w-studio' ) );
    }
    
    /**
     * Function For Registering Sidebars
     * 
     */
    function w_studio_loadSidebars() {
		
        /* Registering Sidebar */
        require_once W_STUDIO_THEME_DIR . '/base/sidebars.php';
    }
    
    /**
     * Loading Widgets
     * 
     */
    function w_studio_loadWidgets() {
		
        /* Loading widgets now */
        require_once W_STUDIO_THEME_DIR . '/base/widgets/ws-widget-recent-posts.php';
        require_once W_STUDIO_THEME_DIR . '/base/widgets/ws-widget-search.php';
    }
    
    /**
     * Loading Necessary Templates Used
     * 
     */
    function w_studio_loadTemplates() {
        
        require_once W_STUDIO_THEME_DIR . '/base/views/w-page-header.php';
        require_once W_STUDIO_THEME_DIR . '/base/views/w-page-team-icons.php';
    }
    
    /**
     * Loading Theme Options Config File For Redux
     * 
     */
    function w_studio_loadThemeOptions() {
        
        /* Load Redux Config */
        require_once W_STUDIO_THEME_DIR . '/base/redux/config.php';
    }
    
    /**
     * Loading Custom Metaboxes Necessary For Out Theme
     * 
     */
    function w_studio_loadMetaboxes() {
        
        /* Load Metaboxes For Pages */
        require_once W_STUDIO_THEME_DIR . '/base/metaboxes/page-metabox.php';
        
        /* Load Metabox For Post */
        require_once W_STUDIO_THEME_DIR . '/base/metaboxes/post-metabox.php';
    }
    
    /**
     * Setting Theme Necessary Components
     * 
     */
    function w_studio_afterThemeSetup() {
        
        if ( ! isset( $content_width ) ) $content_width = 900;

        /* Things to do after theme setup */
        // Make sure featured images are enabled
        add_theme_support( 'post-thumbnails');
        add_theme_support( 'custom-background' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'menus' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'editor-style' );
        add_theme_support( 'post-formats' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'html5' );
        add_theme_support( 'title-tag' );
		
        /* Post Format Support */
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

        /* Custom Logo Support */
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

		// Add featured image sizes
		add_image_size( 'w_studio_image_70x70', 70, 70, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_78x48', 78, 48, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_100x100', 100, 100, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_147x130', 147, 130, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_270x270', 270, 270, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_295x260', 295, 260, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_270x370', 270, 370, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_270x570', 270, 570, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_300x225', 300, 225, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_370x370', 370, 370, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_370x470', 370, 470, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_370x270', 370, 270, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_370x570', 370, 570, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_390x345', 390, 345, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_400x470', 400, 470, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_470x570', 470, 570, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_550x550', 550, 550, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_570x370', 570, 370, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_585x520', 585, 520, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_570x570', 570, 570, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_570x420', 570, 420, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_570x730', 570, 730, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_770x470', 770, 470, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_770x570', 770, 570, array( 'center', 'top' ) );
		add_image_size( 'w_studio_image_1170x570', 1170, 570, array( 'center', 'top' ) );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'assets/css/editor-style.css', '' ) );
		
		
		add_filter( 'wp_generate_attachment_metadata', 'w_studio_retina_support_attachment_meta', 10, 2 );
		/**
		 * Retina images
		 *
		 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
		 */
		function w_studio_retina_support_attachment_meta( $metadata, $attachment_id ) {
			foreach ( $metadata as $key => $value ) {
				if ( is_array( $value ) ) {
					foreach ( $value as $image => $attr ) {
						if ( is_array( $attr ) )
							w_studio_retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
					}
				}
			}
		 
			return $metadata;
		}
		
		/**
		 * Create retina-ready images
		 *
		 * Referenced via retina_support_attachment_meta().
		 */
		function w_studio_retina_support_create_images( $file, $width, $height, $crop = false ) {
			if ( $width || $height ) {
				$resized_file = wp_get_image_editor( $file );
				if ( ! is_wp_error( $resized_file ) ) {
					$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
		 
					$resized_file->resize( $width * 2, $height * 2, $crop );
					$resized_file->save( $filename );
		 
					$info = $resized_file->get_size();
		 
					return array(
						'file' => wp_basename( $filename ),
						'width' => $info['width'],
						'height' => $info['height'],
					);
				}
			}
			return false;
		}
		
		add_filter( 'delete_attachment', 'w_studio_delete_retina_support_images' );
		/**
		 * Delete retina-ready images
		 *
		 * This function is attached to the 'delete_attachment' filter hook.
		 */
		function w_studio_delete_retina_support_images( $attachment_id ) {
			$meta = wp_get_attachment_metadata( $attachment_id );
			if( $meta != '' ) {
				$upload_dir = wp_upload_dir();
				$path = pathinfo( $meta['file'] );
				foreach ( $meta as $key => $value ) {
					if ( 'sizes' === $key ) {
						foreach ( $value as $sizes => $size ) {
							$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
							$retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
							if ( file_exists( $retina_filename ) )
								unlink( $retina_filename );
						}
					}
				}
			}
		}
			
	}
    
    /**
     * Function To Load Language Contents
     *  
     */
    function w_studio_loadLanguages() {
        
        /* Loading Text Domain For Languages */
        load_theme_textdomain( 'w-studio', get_stylesheet_directory() . '/languages' );
    }
    
    /**
     * Function To Load TGMPA
     * 
     */
    public function w_studio_loadTgmpa() {
        
        require_once W_STUDIO_THEME_DIR . '/base/tgmpa/config.php';
    }
    
   /** 
    * Adding Hooks For TinyMCE Button
    * 
    */
    /*function w_studio_shortcodeTinyMCE() {
        
        global $typenow;
        // check user permissions
        if ( !current_user_can('edit_posts') && !current_user_can( 'edit_pages' ) ) {
            return;
        }
        // verify the post type
        if( ! in_array( $typenow, array( 'post', 'page' ) ) )
            return;
        // check if WYSIWYG is enabled
        if ( get_user_option( 'rich_editing' ) == 'true' ) {
            add_filter( 'mce_external_plugins', array( &$this, 'w_studio_shortcodeButtonJs' ) );
            add_filter( 'mce_buttons', array( &$this, 'w_studio_shortcodeButton' ) );
        }
    }*/
    
    /**
     * Including JS For Shortcode Button 
     * 
     * @param   array - $w_studio_plugin_array
     * 
     * @return  array - $w_studio_plugin_array
     */
    function w_studio_shortcodeButtonJs( $w_studio_plugin_array ) {
        
        $w_studio_plugin_array[ 'w_studio_shortcode' ] = W_STUDIO_THEME_ASSETS_JS . '/tinyMCE/shortcode.js';
        
        return $w_studio_plugin_array;
    }
    
    /**
     * Adding Button 
     * 
     * @param   array - $w_studio_buttons
     * 
     * @return  array - $w_studio_buttons
     */
    function w_studio_shortcodeButton( $w_studio_buttons ) {
        
        array_push( $w_studio_buttons, 'w-studio-shortcode' );
        
        return $w_studio_buttons;
    }
    
    /**
     * Loading Ajax Responder
     * 
     * 
     */
    function w_studio_loadAjaxResponder() {
        
        require_once W_STUDIO_THEME_DIR . '/base/ajax/ajax-responder.php';
    }
    
    /*******************************************************
     * Initializer Method Runs When Theme Is Loaded 
     * 
     *******************************************************/
    public function w_studio_init() {
         
        $this->w_studio_loadConstants();
        $this->w_studio_loadTgmpa();
        $this->w_studio_loadScripts();
        
        if( !is_admin() ){
            $this->w_studio_loadTemplates();
        }
        
        $this->w_studio_loadMenus();

        $this->w_studio_loadWidgets();
        
        $this->w_studio_loadThemeOptions();
        
        if( is_admin() ) {
            /* Loading Metaboxes */
            add_action( 'init', array( &$this, 'w_studio_loadMetaboxes' ) );
            
            /* Adding TinyMCE Button */
            //add_action( 'admin_head', array( &$this, 'w_studio_shortcodeTinyMCE' ) );
        } else {          

            /* Set blog excerpt w_studio_length */
            add_filter( 'excerpt_length', array( &$this, 'w_studio_customExcerptLength') );
        }
        
        /* Loading Languages */
        add_action( 'init', array( &$this, 'w_studio_loadLanguages' ) );
        
        /* Loading Functionalities After Theme Setup */
        add_action( 'after_setup_theme', array( &$this, 'w_studio_afterThemeSetup' ) );
        
        /* Loading Widgets */
        add_action( 'widgets_init', array( &$this, 'w_studio_loadSidebars' ) );
    }
    
     /**
     * Filter the except w_studio_length to 20 characters.
     *
     * @param int $w_studio_length Excerpt w_studio_length.
     * @return int (Maybe) modified excerpt w_studio_length.
     */
    function w_studio_customExcerptLength( $w_studio_length ) {
        
        $w_studio_optionValues   = get_option( 'w_studio' );
        
        if( isset ( $w_studio_optionValues[ 'w-blog-excertp-length' ] ) ) {
            $w_studio_length = $w_studio_optionValues[ 'w-blog-excertp-length' ];
        } else {
            $w_studio_length = 20;
        }
        
        return $w_studio_length;
    }
}
$w_studio_limit = get_option( 'posts_per_page' );

/* Loading Ajax Responder */
require_once W_STUDIO_THEME_DIR . '/base/ajax/ajax-loader.php';

/**
 * Comments form return
 */
function w_studio_comments_form( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'w_studio_comments_form' );

add_action( 'vc_before_init', 'w_studio_vcSetAsTheme' );
function w_studio_vcSetAsTheme() {
    vc_set_as_theme();
}

/* Load Metabox For Slider */
require_once W_STUDIO_THEME_DIR . '/base/metaboxes/slider-metabox.php';

/**
 * Redux Active demo mode disable
 */
function w_studio_removeDemoModeLink() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'w_studio_removeDemoModeLink');