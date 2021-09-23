<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "w_studio";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *w-buy-template-link
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $w_studio_args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'W Studio Options', 'w-studio' ),
        'page_title'           => esc_html__( 'W Studio Options', 'w-studio' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAGbLtqnrjAcHaJS5CoT80XwJZDmgeoD3I',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        'disable_google_fonts_link' => false,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        // 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        // 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                		=> array(
            'icon'          			=> 'el el-question-sign',
            'icon_position' 			=> 'right',
            'icon_color'    			=> 'lightgray',
            'icon_size'     			=> 'normal',
            'tip_style'     			=> array(
                'color'   					=> 'red',
                'shadow'  					=> true,
                'rounded' 					=> false,
                'style'   					=> '',
            ),
            'tip_position'  => array(
                'my' 					=> 'top left',
                'at' 					=> 'bottom right',
            ),
            'tip_effect'    			=> array(
                'show' 					=> array(
                    'effect'   				=> 'slide',
                    'duration' 				=> '500',
                    'event'    				=> 'mouseover',
                ),
                'hide' 					=> array(
                    'effect'   				=> 'slide',
                    'duration' 				=> '500',
                    'event'    				=> 'click mouseleave',
                ),
            ),
        )
    );
	
    // Panel Intro text -> before the form
    if ( ! isset( $w_studio_args['global_variable'] ) || $w_studio_args['global_variable'] !== false ) {
        if ( ! empty( $w_studio_args['global_variable'] ) ) {
            $v = $w_studio_args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $w_studio_args['opt_name'] );
        }
        // $w_studio_args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'w-studio' ), $v );
    } else {
        // $w_studio_args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'w-studio' );
    }

    // Add content after the form.
    // $w_studio_args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'w-studio' );

    Redux::setArgs( $opt_name, $w_studio_args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      					=> 'redux-help-tab-1',
            'tiidtle'   				=> esc_html__( 'Theme Information 1', 'w-studio' ),
            'content' 					=> esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'w-studio' )
        ),
        array(
            'id'      					=> 'redux-help-tab-2',
            'title'   					=> esc_html__( 'Theme Information 2', 'w-studio' ),
            'content' 					=> esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'w-studio' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'w-studio' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    
    /* Header Section */
    Redux::setSection( $opt_name, array(
        'title'             			=> esc_html__( 'Header', 'w-studio' ),
        'id'                			=> 'general',
        'desc'              			=> esc_html__( 'These are general options.', 'w-studio' ),
        'customizer_width'  			=> '400px',
        'icon'              			=> 'el el-home',
        'fields'            			=> array(            
            
        )
    ));
    
    /* General Logo Sub Section */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-general-logos',
        'title'             			=> esc_html__( 'Logo', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-logo-option',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Select Logo Style', 'w-studio' ),
                'default'   				=> 'image',
                'options'   				=> array(
                    'image'     				=> esc_html__( 'Use Image Logo', 'w-studio' ),
                    'text'     					=> esc_html__( 'Use Text As Logo', 'w-studio' ),
                )
            ),
            array(
                // Main Logo
                'id'        				=> 'w-logo',
                'type'      				=> 'media',
                'url'       				=> true,
                'title'     				=> esc_html__( 'Main Logo', 'w-studio' ),
                'subtitle'  				=> esc_html__( 'Upload main logo', 'w-studio' ),
                'default'   				=> array( 'url' => W_STUDIO_THEME_ASSETS.'/images/w-logo.png' ),
                'required'  				=> array( 'w-logo-option', '=', 'image' ),
            ),
            array(
                // Sticky Header Logo
                'id'        				=> 'w-sticky-header-logo',
                'type'      				=> 'media',
                'url'       				=> true,
                'title'     				=> esc_html__( 'Sticky Logo', 'w-studio' ),
                'subtitle'  				=> esc_html__( 'Upload sticky logo', 'w-studio' ),
                'default'   				=> array( 'url' => W_STUDIO_THEME_ASSETS.'/images/w-logo.png' ),
            ),
            array(
                // Footer Logo
                'id'        				=> 'w-footer-logo',
                'type'      				=> 'media',
                'url'       				=> true,
                'title'     				=> esc_html__( 'Footer Logo', 'w-studio' ),              
                'subtitle'  				=> esc_html__( 'Upload footer logo', 'w-studio' ),
                'default'   				=> array( 'url' => W_STUDIO_THEME_ASSETS.'/images/w-logo.png' ),
            ),
            array(
                'id'        				=> 'w-logo-text',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Logo Text', 'w-studio' ),
                'required'  				=> array( 'w-logo-option', '=', 'text' ),
            ),
            array(
                'id'        				=> 'w-logo-text-typography',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Logo Text Typography', 'w-studio' ),
                'compiler'  				=>  array( '.wl-header .wl-logo a span.wl-logo-text' ),
                'google'    				=> true,
                'line-height' 				=> false,
                'font-backup' 				=> true,
                'letter-spacing' 			=> true,
                'word-spacing' 				=> true,
                'text-transform' 			=> true,
                'required'  				=> array( 'w-logo-option', '=', 'text' ),
            ),
        )
    ));
	
	/* Menu Style Section */
    Redux::setSection( $opt_name, array(
        'title'             			=> esc_html__( 'Menu', 'w-studio' ),
        'id'                			=> 'header-style',
        'desc'              			=> esc_html__( '', 'w-studio' ),
        'customizer_width'  			=> '400px',
		'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-menu-style',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Main Menu Styles', 'w-studio' ),
                'default'   				=> 'standard',
                'options'   				=> array(
                    'standard'     				=> esc_html__( 'Standard Style', 'w-studio' ),
                    'full'     					=> esc_html__( 'Full Screen Overlay', 'w-studio' ),
                    'left'     					=> esc_html__( 'Left Side', 'w-studio' ),
                    'right'     				=> esc_html__( 'Right Side', 'w-studio' ),
                )
            ),       
			array(
                'id'        				=> 'w-standard-menu-position',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Menu Position', 'w-studio' ),
                'default'   				=> 'right',
                'options'   				=> array(
                    'left'     					=> esc_html__( 'Left', 'w-studio' ),
                    'right'     				=> esc_html__( 'Right', 'w-studio' ),
                ),
				'required'					=> array( 'w-menu-style', '=', array( 'standard' ) ),
            ),
			array(
                'id'        				=> 'w-menu-heading-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Main Menu Typography', 'w-studio' ),
				'compiler' 					=>  array( '.wl-main-nav ul li a' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
            array(
                'id'        				=> 'w-sub-menu-background-color',
                'type'      				=> 'background',
				'compiler'					=>  array( 'nav.wl-main-nav ul li ul.sub-menu' ),
                'title'     				=> esc_html__( 'Sub Menu Background Style', 'w-studio' ),
                'google'    				=> true,
				'transparent'				=> false,
            ),
			array(
                'id'        				=> 'w-sub-menu-border-color',
                'type'      				=> 'border',
				'compiler'					=>  array( 'nav.wl-main-nav ul li .mega-menu, nav.wl-main-nav ul li.mega-menu-2 > .mega-menu, nav.wl-main-nav ul li ul.sub-menu' ),
                'title'     				=> esc_html__( 'Sub Menu Border Style', 'w-studio' ),
                'google'    				=> true,                    
            ),
			array(
                'id'        				=> 'w-sub-menu-heading-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Mega Menu Column Title Typography', 'w-studio' ),
				'compiler' 					=>  array( 'span.mega-menu-heading, .burger-sub .mega-menu-heading' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
            array(
                'id'        				=> 'w-sub-menu-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Sub Menu Typography', 'w-studio' ),
				'compiler' 					=>  array( 'nav.wl-main-nav ul li ul.sub-menu li a, nav.wl-main-nav ul li .mega-menu li a, .side.wl-main-nav ul.burger-sub li a' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),                        
            array(
                // Search form in header
                'id'        				=> 'w-search-form-header',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Enable Search in Menu', 'w-studio' ),
                'default'   				=> false
            ),
			array(
                // Search form in header
                'id'        				=> 'w-sticky-menu-header-on-off',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Sticky Menu Enable/Disable', 'w-studio' ),
                'default'   				=> true
            ),
			array(
                // Sticky Menu text color
                'id'        				=> 'w-sticky-menu-text-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Sticky Menu Color', 'w-studio' ),
                'transparent'				=> false,
            ),
			array(
                // menu icon color
                'id'        				=> 'w-menu-icon-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Menu Icon Color', 'w-studio' ),
                'transparent'				=> false,
				'compiler'					=> array( '.attr-nav > ul > li > a' ),
            ),
        )
    ));
	
	/* Other Header Options Section */
    Redux::setSection( $opt_name, array(
        'title'             			=> esc_html__( 'Other Header Options', 'w-studio' ),
        'id'                			=> 'other-header-options',
        'customizer_width'  			=> '400px',
		'subsection'        			=> true,
        'fields'            			=> array(
			array(
                // Enable header
                'id'        				=> 'w-enable-header',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Enable Header', 'w-studio' ),
                'default'   				=> true
            ),
			array(
                // Header background color
                'id'        				=> 'w-home-top-menu-background-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Header Background Color', 'w-studio' ),
				'transparent'				=> false,
            ),
			array(
                // Sticky Header Background color
                'id'        				=> 'w-sticky-menu-background-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Sticky Header Background Color', 'w-studio' ),
				'transparent'				=> false,
            ),
			array(
                // Below Banner Header Background color
                'id'        				=> 'w-below-menu-background-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Below Banner Header Background Color', 'w-studio' ),
				'transparent'				=> false,
            ),
		)
		) );
	
	
	 /* Appearance Section */
    Redux::setSection( $opt_name, array(
        'title'             				=> esc_html__( 'Appearance', 'w-studio' ),
        'id'                				=> 'w-style-section',
        'customizer_width'  				=> '400px',
        'icon'              				=> 'el el-brush',
        'fields'            				=> array( 
			array(
                // Body background style
                'id'        				=> 'w-background-color',
                'type'      				=> 'background',
                'compiler'    				=> array( 'body' ),
                'title'     				=> esc_html__( 'Body Background Style', 'w-studio' ),
                
            ),      
        )
    ));
	
	/* Page Section */
    Redux::setSection( $opt_name, array(
        'title'             			=> esc_html__( 'Page', 'w-studio' ),
        'id'                			=> 'w-page-section',
        'customizer_width'  			=> '400px',
        'icon'              			=> 'el el-list-alt',
        'fields'            			=> array( 
        )
    ));
	
	/* Page Title Sub Section */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-page-title-section',
        'title'             			=> esc_html__( 'Page Title Section', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
			//Page title show hide
			 array(
                'id'        				=> 'w-page-title-enable-disable',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Page Title Section Enable/Disable', 'w-studio' ),
                'default' 					=> false
            ),
			//Page title alignment
            array(
                'id'        				=> 'w-page-title-alignment',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Page Title Alignment', 'w-studio' ),
                'default'   				=> 'left',
                'options'   				=> array(
                    'left'     					=> esc_html__( 'Left', 'w-studio' ),
                    'center'     				=> esc_html__( 'Center', 'w-studio' ),
                    'right'     				=> esc_html__( 'Right', 'w-studio' ),
                )
            ),
			// Page title seperator
			 array(
                'id'        				=> 'w-page-title-seperator',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Page Title Seperator', 'w-studio' ),
                'default' 					=> false
            ),
			array(
				// Page title background
				'id'        				=> 'w-page-title-background-select',
				'type'      				=> 'select',
				'title'     				=> esc_html__( 'Select Background', 'w-studio' ),
				'default'   				=> 'background-color',
				'options'   				=> array(
					'background-none'     		=> esc_html__( 'Background None', 'w-studio' ),
					'background-image'     		=> esc_html__( 'Background Image', 'w-studio' ),
					'background-color'     		=> esc_html__( 'Background Color', 'w-studio' ),
				)
			),
			array(
				// Page title background image
				'id'        				=> 'w-page-title-background-image',
				'type'      				=> 'background',
				'title'     				=> esc_html__( 'Background Image', 'w-studio' ),
				'background-position'		=> false,
				'background-image'			=> true,
				'background-size'			=> false,
				'transparent'				=> false,
				'background-repeat'			=> false,
				'background-attachment'		=> false,
				'background-color'			=> false,
				'required'  				=> array( 'w-page-title-background-select', '=', array( 'background-image' ) ),
			), 
			array(
				// page title background overlay color
				'id'        				=> 'w-page-title-background-overlay-color',
				'type'      				=> 'color',
				'title'     				=> esc_html__( 'Background Overlay color', 'w-studio' ),
				'transparent'				=> false,
				'required'  				=> array( 'w-page-title-background-select', '=', array( 'background-image' ) ),
			), 
			array(
				// page title background opacity
				'id'            			=> 'w-page-title-background-opacity',
				'type'          			=> 'slider',
				'title'         			=> esc_html__( 'Background Opacity', 'w-studio' ),
				'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
				'default'       			=> .1,
				'min'           			=> 0,
				'step'          			=> .1,
				'max'           			=> 1,
				'resolution'    			=> 0.1,
				'display_value' 			=> 'text',
				'required'  				=> array( 'w-page-title-background-select', '=', array( 'background-image' ) ),
			),
			array(
				// page title background color
				'id'        				=> 'w-page-title-background-color',
				'type'      				=> 'background',
				'compiler'    				=> array( '.wl-page-title-container' ),
				'title'     				=> esc_html__( 'Background color', 'w-studio' ),
				'background-position'		=> false,
				'background-image'			=> false,
				'background-size'			=> false,
				'transparent'				=> false,
				'background-repeat'			=> false,
				'background-attachment'		=> false,
				'preview_height'			=> '50px',
				'required'  				=> array( 'w-page-title-background-select', '=', array( 'background-color' ) ),
			), 
			array(
				// Page title background height
				'id'        				=> 'w-page-title-background-height-select',
				'type'      				=> 'select',
				'title'     				=> esc_html__( 'Select Background Height', 'w-studio' ),
				'default'   				=> 'default',
				'options'   				=> array(
					'default'     			=> esc_html__( 'Default', 'w-studio' ),
					'full-height'     			=> esc_html__( 'Full Height', 'w-studio' ),
					'custom-height'     		=> esc_html__( 'Custom Height', 'w-studio' ),
				)
			),
			array(
				// page title background height
				'id'        				=> 'w-page-title-background-height',
				'type'      				=> 'text',
				'title'     				=> esc_html__( 'Background Custom Height', 'w-studio' ),
				'required'  				=> array( 'w-page-title-background-height-select', '=', array( 'custom-height' ) ),
			), 
			array(
                'id'        				=> 'w-page-content-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Page Title Typography', 'w-studio' ),
                'compiler'					=> array( '.page h1, .wl-banner-button, .wl-page-title' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform'			=> true,
				'text-align' 				=> false,
            ), 
        )
    ));
	
	/* Page Banner Sub Section */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-page-banner-section',
        'title'             			=> esc_html__( 'Page Banner Section', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
             array(
                'id'        				=> 'w-page-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Banner Title', 'w-studio' ),
				'compiler' 					=> array( '.page .wl-home-heading h1, .archive .wl-home-heading h1, .category .wl-home-heading h1' ),
                'google'    				=> true, 
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'text-align'				=> false,
            ),            
            array(
                'id'        				=> 'w-page-sub-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Banner Sub Title', 'w-studio' ),
                'compiler'					=> array( '.page .wl-home-items p, .archive .wl-home-items p, .category .wl-home-items p' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'text-align'				=> false,
            ),
        )
    ));

    /* Typography Section */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-typography-section',
        'title'             			=> esc_html__( 'Typography Section', 'w-studio' ),
        'icon'              			=> 'el el-text-width'
    ));
    
    /* Body Sub Section */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-body-typography',
        'title'             			=> esc_html__( 'General Typography', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-body-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Body Text Typography', 'w-studio' ),
                'compiler'  				=> array( 'body p, .count, body a, body small' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'units'       				=>'px',
            ),
			array(
                'id'        				=> 'w-page-content-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Paragraph Typography', 'w-studio' ),
                'compiler'					=> array( '.page p, .wl-clients-testimonial p' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                // Anchor link color
                'id'        				=> 'w-anchor-link-color',
                'type'      				=> 'color',
                'compiler'  				=> array( 'a, .wl-color1, .wl-team-descript h5, a h5' ),
                'title'     				=> esc_html__( 'Text Link Color', 'w-studio' ),
                
            ),
			array(
                // Anchor Hover link color
                'id'        				=> 'w-anchor-hover-color',
                'type'      				=> 'color',
                'compiler'  				=> array( 'a:hover, .wl-color1:hover, .wl-team-descript:hover h5, a:hover h5, .wl-menu-filter ul li a:hover' ),
                'title'     				=> esc_html__( 'Text Link Hover Color', 'w-studio' ),
                
            ),
			array(
                // Anchor Hover link color
                'id'        				=> 'w-anchor-active-color',
                'type'      				=> 'color',
                'compiler'  				=> array( 'a:active, .wl-color1:active, .wl-team-descript:active h5, a:active h5' ),
                'title'     				=> esc_html__( 'Text Link Active Color', 'w-studio' ),
                
            ),
            array(
                // Content strong tag color
                'id'        				=> 'w-content-strong-tag-color',
                'type'      				=> 'color',
                'compiler'  				=> array( 'strong' ),
                'title'     				=> esc_html__( 'Text Strong Tag Color', 'w-studio' ),
                
            ),
        )
    ));
	
	/* Headers Section Typography */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-h1-typography',
        'title'             			=> esc_html__( 'Headers Typography', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-h1-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'H1 Typography', 'w-studio' ),
                'compiler'					=> array( 'h1' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),                                    
            array(
                'id'        				=> 'w-h2-text-typograpy',
                'type'      				=> 'typography',
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
                'title'     				=> esc_html__( 'H2 Typography', 'w-studio' ),
                'compiler'					=> array( 'h2' ),
                'google'    				=> true,
            ),                                    
            array(
                'id'        				=> 'w-h3-text-typograpy',
                'type'      				=> 'typography',
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
                'title'     				=> esc_html__( 'H3 Typography', 'w-studio' ),
                'compiler'					=> array( 'h3' ),
                'google'    				=> true,
            ),                        
            array(
                'id'        				=> 'w-h4-text-typograpy',
                'type'      				=> 'typography',
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
                'title'     				=> esc_html__( 'H4 Typography', 'w-studio' ),
                'compiler'					=> array( 'h4' ),
                'google'    				=> true,
            ),                        
            array(
                'id'        				=> 'w-h5-text-typograpy',
                'type'      				=> 'typography',
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
                'title'     				=> esc_html__( 'H5 Typography', 'w-studio' ),
                'compiler'					=> array( 'h5' ),
                'google'    				=> true,
            ),                                    
            array(
                'id'        				=> 'w-h6-text-typograpy',
                'type'      				=> 'typography',
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
                'title'     				=> esc_html__( 'H6 Typography', 'w-studio' ),
                'compiler'					=> array( 'h6' ),
                'google'    				=> true,
            ),            
        )
    ));
    
    /* Testimonial Section Typography */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-testimonial-typography',
        'title'             			=> 'Testimonial Typography',
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-testimonial-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Testimonial Content', 'w-studio' ),
                'compiler'					=> array( '.wl-clients-testimonial p' ),                
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),            
			array(
                'id'        				=> 'w-testimonial-name-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Testimonial Name', 'w-studio' ),
                'compiler'					=> array( '.wl-text-slider h5' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-testimonial-designation-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Testimonial Designation', 'w-studio' ),
                'compiler'					=> array( '.wl-client-designation' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),			
		)
    ));
    
    /* Team Title Section Typography */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-team-title-typography',
        'title'             			=> 'Team Typography',
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-team-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Team Member Name', 'w-studio' ),
                'compiler'					=> array( '.wl-bottom-title a h5, .wl-team-descript a h5' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),           
			array(
                'id'        				=> 'w-team-title-name-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Member Details', 'w-studio' ),
                'compiler'					=> array( '.wl-team-descript .wl-color2' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),			
			array(
                'id'        				=> 'w-team-title-designation-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Member Designation', 'w-studio' ),
                'compiler'					=> array( '.wl-bottom-title p, .wl-team-descript span, .wl-bottom-title .wl-standard-marginbottom.show' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),			
			array(
                // Change social network Color
                'id'        				=> 'w-social-team-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Social Media Color', 'w-studio' ),
                'compiler' 					=> array( '.wl-bottom-title a span, .wl-team-descript .wl-media-plot a span' ),
            ),
        )
    ));
    

    /* Sidebar Section Typography */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-sidebar-title-typography',
        'title'             			=> 'Sidebar Typography',
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-sidebar-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Widget Title', 'w-studio' ),
                'compiler' 					=> array( '.wl-blog-sidebar h5' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ) 
        )
    ));
    
   
    /* Portfolio Section */
    Redux::setSection( $opt_name, array(
        'id'                		=> 'w-portfolio-section',
        'title'             		=> esc_html__( 'Portfolio Section', 'w-studio' ),
        'icon'              		=> 'el el-briefcase'
    ));
	
	/* General Portfolio */
    Redux::setSection( $opt_name, array(
        'id'               			=> 'w-portfolio-general-section',
        'title'             		=> esc_html__( 'General Portfolio', 'w-studio' ),
        'subsection'        		=> true,
        'fields'            		=> array(
			array(
                'id'        			=> 'w-portfolio-post-number',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Set Portfolio Number Per Page', 'w-studio' ),
                
            ),
			array(
                'id'        			=> 'w-portfolio-hover-style',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Select Portfolio Hover Style', 'w-studio' ),
                
                'options'   			=> array(
                    '1'     				=> esc_html__( 'Hover Style One', 'w-studio' ),
                    '2'     				=> esc_html__( 'Hover Style Two', 'w-studio' ),
                    '3'     				=> esc_html__( 'Hover Style Three', 'w-studio' ),
                    '4'    	 				=> esc_html__( 'Hover Style Four', 'w-studio' ),
                    '5'     				=> esc_html__( 'Hover Style Five', 'w-studio' ),
                    '6'     				=> esc_html__( 'Hover Style Six', 'w-studio' ),
                    '7'     				=> esc_html__( 'Hover Style Seven', 'w-studio' ),
                    '8'     				=> esc_html__( 'Hover Style Eight', 'w-studio' ),
                    '9'     				=> esc_html__( 'Hover Style Nine', 'w-studio' ),
                ),
				'default'				=> 1,
            ),
            array(
                'id'        			=> 'w-portfolio-page-title-text-typograpy',
                'type'      			=> 'typography',
                'title'     			=> esc_html__( 'Portfolio Title Typography', 'w-studio' ),
                'compiler'				=> array( '.cbp-item-wrapper h5, .cbp-item-wrapper h5 a' ),
                'google'    			=> true,
				'font-backup' 			=> true,
				'letter-spacing' 		=> true,
				'word-spacing' 			=> true,
				'text-transform' 		=> true,
            ),
			array(
                'id'        			=> 'w-portfolio-page-title-hover-typograpy',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Title Hover Color ', 'w-studio' ),
                'compiler'				=> array( '.cbp-item-wrapper h5:hover, .cbp-item-wrapper h5 a:hover' ),
                'google'    			=> true,
            ),
            array(
                'id'     				=> 'w-portfolio-page-title-typography-section-end',
                'type'   				=> 'section',
                'indent' 				=> false,
            ),
            array(
                'id'        			=> 'w-portfolio-filter-typography-section-start',
                'type'      			=> 'section',
                'title'     			=> esc_html__( 'Filter Text Typography', 'w-studio' ),
                'subtitle'  			=> esc_html__( '', 'w-studio' ),
                'indent'    			=> true,
            ),
            
            array(
                'id'        			=> 'w-portfolio-filter-text-typograpy',
                'type'      			=> 'typography',
                'title'     			=> esc_html__( 'Filter Text Typography', 'w-studio' ),
                'compiler'				=> array( '.cbp-l-filters-button .cbp-filter-item' ),
                'google'    			=> true,
				'font-backup' 			=> true,
				'letter-spacing' 		=> true,
				'word-spacing' 			=> true,
				'text-transform' 		=> true,
            ),
			array(
                'id'        			=> 'w-portfolio-page-filter-hover-typograpy',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Filter Hover Text Color ', 'w-studio' ),
                'compiler'				=> array( '.cbp-l-filters-button .cbp-filter-item:hover' ),
                'google'    			=> true,
            ),
			array(
                'id'        			=> 'w-portfolio-page-filter-active-typograpy',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Filter Active Text Color', 'w-studio' ),
                'compiler'				=> array( '.cbp-l-filters-button .cbp-filter-item.cbp-filter-item-active' ),
                'google'    			=> true,
            ),
			array(
                'id'        			=> 'w-portfolio-filter-counter-color',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Filter Number Text Color', 'w-studio' ),
                'compiler'				=> array( '.cbp-l-filters-button .cbp-filter-counter' ),
                'google'    			=> true,
            ),
			array(
                'id'        			=> 'w-portfolio-filter-counter-background',
                'type'      			=> 'background',
                'title'     			=> esc_html__( 'Filter Number Background Style', 'w-studio' ),
                'compiler'				=> array( '.cbp-l-filters-button .cbp-filter-counter' ),
                'google'    			=> true,
            ),
			
			array(
                'id'        			=> 'w-portfolio-filter-counter-border',
                'type'      			=> 'border',
                'title'     			=> esc_html__( 'Filter Number border Color', 'w-studio' ),
                'compiler'				=> array( '.cbp-l-filters-button .cbp-filter-counter::after' ),
                'google'    			=> true,
                'default'  				=> array(
					'border-color'  		=> '#666', 
					'border-style'  		=> 'solid', 
					'border-top'    		=> '4px', 
				)   
            ),
        )
    ));
    
    /* Portfolio single */    
    Redux::setSection( $opt_name, array(
        'id'                		=> 'w-portfolio-banner-section',
        'title'             		=> esc_html__( 'Portfolio Single', 'w-studio' ),
        'subsection'        		=> true,
        'fields'            		=> array(
            array(
                'id'        			=> 'w-portfolio-banner-style',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Banner Style', 'w-studio' ),
                'default'   			=> 2,
                'options'   			=> array(
                    '1'     				=> esc_html__( 'Default', 'w-studio' ),
                    '2'     				=> esc_html__( 'Parallax', 'w-studio' ),
                    '3'     				=> esc_html__( 'Without Parallax', 'w-studio' ),
                )
            ),
            array(
                'id'        			=> 'w-portfolio-banner-img',
                'type'      			=> 'media',
                'url'       			=> true,
                'title'     			=> esc_html__( 'Banner Background Image', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Upload banner image', 'w-studio' ),
                'required'  			=> array( 'w-portfolio-banner-style', '=', array( 2, 3 ) ),
            ),	
			 array(
                // Overlay color
                'id'        			=> 'w-portfolio-banner-overlay-color',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Banner Overlay Color', 'w-studio' ),
                'required'  			=> array( 'w-portfolio-banner-style', '=', array( 2, 3 ) ),
            ),
            array(
                'id'            		=> 'w-portfolio-banner-opacity',
                'type'          		=> 'slider',
                'title'         		=> esc_html__( 'Banner Opacity', 'w-studio' ),
                'desc'          		=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'required'      		=> array( 'w-portfolio-banner-style', '=', array( 2, 3 ) ),
                'default'       		=> .1,
                'min'           		=> 0,
                'step'          		=> .1,
                'max'           		=> 1,
                'resolution'    		=> 0.1,
                'display_value' 		=> 'text'
            ),
            array(
                'id'            		=> 'w-portfolio-banner-transition',
                'type'          		=> 'slider',
                'title'         		=> esc_html__( 'Banner Transition Speed', 'w-studio' ),
                'subtitle'      		=> esc_html__( 'Transition Speed.', 'w-studio' ),
                'desc'          		=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'required'      		=> array( 'w-portfolio-banner-style', '=', 2 ),
                'default'       		=> .1,
                'min'           		=> 0,
                'step'          		=> .1,
                'max'           		=> 1,
                'resolution'    		=> 0.1,
                'display_value' 		=> 'text'
            ),
			array(
                // Title Font Size
                'id'        			=> 'w-portfolio-single-title-font-size',
                'type'      			=> 'typography',
                'title'     			=> esc_html__( 'Title Typography', 'w-studio' ),
                'compiler' 				=> array( '.single-portfolio .wl-regular-text h1, .single-portfolio .wl-section-margintop h1, .single-portfolio .wl-portfolio-title h1' ),
				'default' 				=> array(
					'font-size' 			=> '55px',
					'line-height' 			=> '70px'
				),
				'text-align'			=> false,
			),
			array(
				// Content Font Size
				'id'        			=> 'w-portfolio-single-content-font-size',
				'type'      			=> 'typography',
				'title'     			=> esc_html__( 'Content Typography', 'w-studio' ),
				'compiler' 				=> array( '.single-portfolio .wl-regular-text p, .single-portfolio .wl-section-margintop p, .single-portfolio .wl-portfolio-title p' ),
				'default'   			=> array(
				   'font-size' 				=> '13px',
				   'line-height' 			=> '20px',	
			    ),	
				'text-align'			=> false,
			),
			array(
				// Share text typography
				'id'        			=> 'w-portfolio-single-share-text-typograpy',
				'type'      			=> 'typography',
				'title'     			=> esc_html__( 'Share Text Typography', 'w-studio' ),
				'compiler' 				=> array( '.single-portfolio .wl-regular-text .wl-section-margintop2 h5, .single-portfolio .wl-section-margintop2 h5' ),
				'default'   			=> array(
				   'font-size' 				=> '13px',
				   'line-height' 			=> '20px',	
				),
				'text-align'			=> false,
			),
            array(
                // Overlay color
                'id'        			=> 'w-portfolio-banner-bg-color',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Banner Background Color', 'w-studio' ),
                'required'  			=> array( 'w-portfolio-banner-style', '=', 1 ),
            ),
			array(
                'id'        			=> 'w-portfolio-slug',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Single Portfolio Slug', 'w-studio' ),
            ),
			array(
                'id'        			=> 'w-portfolio-single-layout',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Single Portfolio Layout', 'w-studio' ),
                'options'   			=> array(
                    '1'     				=> esc_html__( 'Style One', 'w-studio' ),
                    '2'     				=> esc_html__( 'Style Two', 'w-studio' ),
                    '3'     				=> esc_html__( 'Style Three', 'w-studio' ),
                    '4'     				=> esc_html__( 'Style Four', 'w-studio' ),
                    '5'     				=> esc_html__( 'Style Five', 'w-studio' ),
                ),
				'default'				=> 1,
            ),
			array(
                // Hide Social Share
                'id'        			=> 'w-portfolio-single-social-media',
                'type'      			=> 'switch',
                'url'       			=> true,
                'title'     			=> esc_html__( 'Show/Hide Single Social Media', 'w-studio' ),
				'default' 				=> true
            ),
			array(
                // Hide Social Share
                'id'        			=> 'w-portfolio-single-meta-section',
                'type'      			=> 'switch',
                'url'       			=> true,
                'title'     			=> esc_html__( 'Show/Hide Single Meta', 'w-studio' ),
				'default' 				=> true
            ),
			array(
                'id'        			=> 'w-portfolio-single-banner-bottom-margin',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Banner Bottom Margin', 'w-studio' ),
				'default'				=> 134,
				'required'  			=> array( 'w-portfolio-single-meta-section', '=', 0 ),
            ),
            array(
                'id'        			=> 'w-portfolio-next-prev-position',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Next Prev Button Position', 'w-studio' ),
                'default'   			=> 'bellow',
                'options'   			=> array(
                    'top'     				=> esc_html__( 'Before Single Content', 'w-studio' ),
                    'bellow'     			=> esc_html__( 'After Single Content', 'w-studio' ),
                )
            ),
        )
    ));
    
    /* Portfolio Sub Section category */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-portfolio-slug-section',
        'title'             			=> esc_html__( 'Portfolio Category', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-portfolio-category-slug',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Portfolio Category Slug', 'w-studio' ),
            ),
			 array(
                'id'        			=> 'w-portfolio-category-style',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Portfolio Category Style', 'w-studio' ),
                'options'   			=> array(
                    '1'     				=> esc_html__( 'Portfolio Style One', 'w-studio' ),
                    '2'     				=> esc_html__( 'Portfolio Style Two', 'w-studio' ),
                    '3'     				=> esc_html__( 'Portfolio Style Three', 'w-studio' ),
                    '4'     				=> esc_html__( 'Portfolio Style Four', 'w-studio' ),
                    '5'     				=> esc_html__( 'Portfolio Masonry One', 'w-studio' ),
                    '6'     				=> esc_html__( 'Portfolio Masonry Two', 'w-studio' ),
                    '7'     				=> esc_html__( 'Portfolio Masonry Three', 'w-studio' ),
                    '8'     				=> esc_html__( 'Portfolio Masonry Four', 'w-studio' ),
                    '9'     				=> esc_html__( 'Portfolio Column One', 'w-studio' ),
                    '10'    				=> esc_html__( 'Portfolio Column Two', 'w-studio' ),
                    '11'    				=> esc_html__( 'Portfolio Column Three', 'w-studio' ),
                ),
				'default'				=> 1,
            ),
        )
    ));	
    
    /* Blog Section */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-blog-options',
        'title'             			=> esc_html__( 'Blog Options', 'w-studio' ),
        'icon'              			=> 'el el-comment'
    ));
	
	/* Blog Sub Section  */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-blog-sub-options',
        'title'             			=> esc_html__( 'Blog Index', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-blog-archive-style',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Blog Index Style', 'w-studio' ),
                'desc'      				=> esc_html__( '', 'w-studio' ),
                'options'   				=> array(
                    '1'     					=> esc_html__( 'Style 1', 'w-studio' ),
                    '2'     					=> esc_html__( 'Style 2', 'w-studio' ),
                ),
				'default'					=> '1'
            ),			
			array(
                'id'        				=> 'w-blog-pagination',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Blog Pagination Show/Hide', 'w-studio' ),
				'default' 					=> true,
            ),
			array(
                'id'        				=> 'w-blog-archive-load-more',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Choose Load More Option', 'w-studio' ),
                'options'   				=> array(
                    '1'     					=> esc_html__( 'Pagination', 'w-studio' ),
                    '3'     					=> esc_html__( 'Load More', 'w-studio' )
                ),
				'default' 					=> 1,
				'required'					=> array( 'w-blog-pagination', '=', array( true ) ),
            ),
            array(
                'id'        				=> 'w-blog-filter',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Blog Filter Show/Hide', 'w-studio' ),
				'default' 					=> true,
            ),
			array(
                'id'        				=> 'w-blog-excertp-length',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Blog Excerpt Length', 'w-studio' ),
                'default'   				=> 30
            ),
			array(
                'id'        				=> 'w-blog-banner-on-off',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Blog Banner Show/Hide', 'w-studio' ),
                'desc'      				=> esc_html__( '', 'w-studio' ),
                'default'   				=> true,
            ),
			array(
                'id'        				=> 'w-blog-banner-height-set',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Banner Height', 'w-studio' ),
                'default'   				=> 300
            ),
			array(
                'id'       					=> 'w-blog-archive-background-select',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Choose Banner Option', 'w-studio' ),
                'desc'      				=> esc_html__( '', 'w-studio' ),
                'options'   				=> array(
                    'bg-color'     				=> esc_html__( 'Background Color', 'w-studio' ),
                    'bg-image'     				=> esc_html__( 'Background Image', 'w-studio' )
                ),
				'default' 					=> 'bg-color',
				'required'					=> array( 'w-blog-banner-on-off', '=', array( true ) ),
            ),
            array(
                // Background color
                'id'        				=> 'w-blog-banner-bg-color',
                'type'      				=> 'background',
                'compiler'    				=> array( '.wl-blog-banner-bg' ),
                'title'     				=> esc_html__( 'Banner Background Color', 'w-studio' ),
				'background-repeat'			=> false,
				'background-attachment'		=> false,
				'background-position'		=> false,
				'background-image'			=> false,
				'background-size'			=> false,
				'transparent'				=> false,
				'required'					=> array( 'w-blog-archive-background-select', '=', array( 'bg-color' ) ),
				'default'					=> array(
					'background-color'			=> '#1e73be',
				),
            ),
			array(
                'id'        				=> 'w-blog-archive-banner-image',
                'type'      				=> 'media',
                'title'     				=> esc_html__( 'Upload Banner Image', 'w-studio' ),
				'required'					=> array( 'w-blog-archive-background-select', '=', array( 'bg-image' ) ),
            ),
            array(
                // Overlay color
                'id'        				=> 'w-blog-banner-overlay-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Banner Overlay Color', 'w-studio' ),
                'default'   				=> '#000000',
				'transparent'				=> false,
				'required'					=> array( 'w-blog-archive-background-select', '=', array( 'bg-image' ) ),
            ),
            array(
                'id'            			=> 'w-blog-banner-opacity',
                'type'          			=> 'slider',
                'title'         			=> esc_html__( 'Banner Opcity', 'w-studio' ),
                'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'default'       			=> .6,
                'min'           			=> 0,
                'step'          			=> .1,
                'max'           			=> 1,
                'resolution'    			=> 0.1,
                'display_value' 			=> 'text',
				'required'					=> array( 'w-blog-archive-background-select', '=', array( 'bg-image' ) ),
            ),
            array(
                'id'            			=> 'w-blog-banner-transition',
                'type'          			=> 'slider',
                'title'         			=> esc_html__( 'Banner Transition Speed', 'w-studio' ),
                'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'default'       			=> .1,
                'min'           			=> 0,
                'step'          			=> .1,
                'max'           			=> 1,
                'resolution'    			=> 0.1,
                'display_value' 			=> 'text',
				'required'					=> array( 'w-blog-archive-background-select', '=', array( 'bg-image' ) ),
            ),
			array(
                'id'        				=> 'w-blog-archive-page-title',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Blog Page Title', 'w-studio' ),
				'required'					=> array( 'w-blog-banner-on-off', '=', array( true ) ),
            ),
			array(
                'id'        				=> 'w-blog-archive-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Blog Page Title Typography', 'w-studio' ),
				'compiler'					=> array( '.wl-blog-banner-bg h1' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'text-align'				=> true,
            ),
			 array(
                'id'        				=> 'w-blog-post-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Blog Post Title', 'w-studio' ),
				'compiler'					=> array( 'h4, h4 a, #blogpostload h4.wl-big-top-margin, #blogpostload h4.wl-big-top-margin a, .wl-blog-sc .wl-overlay-black h4 a' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-blog-post-title-hover-typograpy',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Post Title Hover Color', 'w-studio' ),
				'compiler'					=> array( '#blogpostload h4.wl-big-top-margin.text-uppercase a:hover, .wl-blog-sc .wl-overlay-black h4:hover a' ),
				'transparent'				=> false,
            ),                     
            array(
                'id'        				=> 'w-blog-post-content-typography-section-start',
                'type'      				=> 'section',
                'title'     				=> esc_html__( 'Post Content', 'w-studio' ),
                'indent'    				=> true
            ),
            array(
                'id'        				=> 'w-blog-post-content-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Content Typography', 'w-studio' ),
                'compiler'					=> array( 'p, .wl-blog-sc .wl-blog-overlay-absolute p, #blogpostload p' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-blog-post-category-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Category Typography', 'w-studio' ),
                'compiler'					=> array( '#blogpostload h5, #blogpostload h5 a, .wl-blog-sc .wl-overlay-black h5 a, #blogpostload h5.wl-box-margintop a, #blogpostload .wl-blog-detail-menu ul li a' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-blog-post-category-hover-typograpy',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Post Category Hover Color', 'w-studio' ),
				'compiler'					=> array( 'h5:hover a, .wl-blog-sc .wl-overlay-black h5:hover a, #blogpostload h5.wl-box-margintop a:hover' ),
				'transparent'				=> false,
            ), 
			array(
                'id'        				=> 'w-blog-index-post-meta-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Meta Typography', 'w-studio' ),
                'compiler'					=> array( '#blogpostload .wl-blog-detail-menu ul li a, #blogpostload .wl-blog-overlay-absolute .wl-blog-detail-menu ul li a' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-blog-post-meta-border-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Blog Meta Border Color', 'w-studio' ),
				'transparent'				=> false,
            ),
			array(
                'id'        				=> 'w-blog-post-filter-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Filter Typography', 'w-studio' ),
                'compiler'					=> array( '.wl-menu-filter ul li a, .wl-link-to,.wl-link-to a, .wl-link-to, span.wl-direction-left, span.wl-direction-right, .wl-blog-sc .wl-menu-filter ul li a, .wl-blog-sc span.wl-direction-left, .wl-blog-sc span.wl-direction-right, .wl-blog-sc .wl-link-to a' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-blog-post-filter-hover-typograpy',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Filter Hover Color', 'w-studio' ),
				'compiler'					=> array( '.wl-menu-filter ul li a:hover, .wl-blog-sc .wl-link-to a:hover' ),
				'transparent'				=> false,
            ),
			array(
                'id'        				=> 'w-blog-post-pagination-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Pagination Typography', 'w-studio' ),
                'compiler'					=> array( '.pagination a, .pagination span, .wl-blog-sc-loadmore.wl-link-to a#w-load-more, .wl-blog-sc-loadmore span.wl-direction-left, .wl-blog-sc-loadmore span.wl-direction-right' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ),
			array(
                'id'        				=> 'w-blog-post-pagination-hover-typograpy',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Pagination Hover Color', 'w-studio' ),
				'compiler'					=> array( '.pagination a:hover, .wl-blog-sc-loadmore.wl-link-to a#w-load-more:hover' ), 
				'transparent'				=> false,
            ),
        )
    ));
	
	/* Blog Archive Sub Section  */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-blog-archive-options',
        'title'             			=> esc_html__( 'Blog Archive', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
			array(
                'id'        				=> 'w-blog-category-pagination',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Archive Pagination Show/Hide', 'w-studio' ),
				'default' 					=> true,
            ),
			array(
                'id'        				=> 'w-blog-category-banner-on-off',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Archive Banner Show/Hide', 'w-studio' ),
                'default'   				=> true,
            ),
			array(
                'id'       					=> 'w-blog-category-background-select',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Choose Banner Option', 'w-studio' ),
                'desc'      				=> esc_html__( '', 'w-studio' ),
                'options'   				=> array(
                    'bg-color'     				=> esc_html__( 'Background Color', 'w-studio' ),
                    'bg-image'     				=> esc_html__( 'Background Image', 'w-studio' )
                ),
				'default' 					=> 'bg-color',
				'required'					=> array( 'w-blog-category-banner-on-off', '=', array( true ) ),
            ),
            array(
                // Background color
                'id'        				=> 'w-blog-category-banner-bg-color',
                'type'      				=> 'background',
                'compiler'    				=> array( '.wl-blog-category-banner-bg' ),
                'title'     				=> esc_html__( 'Banner Background Color', 'w-studio' ),
				'background-repeat'			=> false,
				'background-attachment'		=> false,
				'background-position'		=> false,
				'background-image'			=> false,
				'background-size'			=> false,
				'transparent'				=> false,
				'required'					=> array( 'w-blog-category-background-select', '=', array( 'bg-color' ) ),
				'default'					=> array(
					'background-color'			=> '#1e73be',
				),
            ),
			array(
                'id'        				=> 'w-blog-category-banner-image',
                'type'      				=> 'media',
                'title'     				=> esc_html__( 'Upload Banner Image', 'w-studio' ),
				'required'					=> array( 'w-blog-category-background-select', '=', array( 'bg-image' ) ),
            ),
            array(
                // Overlay color
                'id'        				=> 'w-blog-category-banner-overlay-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Banner Overlay Color', 'w-studio' ),
                'default'   				=> '#000000',
				'transparent'				=> false,
				'required'					=> array( 'w-blog-category-background-select', '=', array( 'bg-image' ) ),
            ),
            array(
                'id'            			=> 'w-blog-category-banner-opacity',
                'type'          			=> 'slider',
                'title'         			=> esc_html__( 'Banner Opcity', 'w-studio' ),
                'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'default'       			=> .6,
                'min'           			=> 0,
                'step'          			=> .1,
                'max'           			=> 1,
                'resolution'    			=> 0.1,
                'display_value' 			=> 'text',
				'required'					=> array( 'w-blog-category-background-select', '=', array( 'bg-image' ) ),
            ),
            array(
                'id'            			=> 'w-blog-category-banner-transition',
                'type'          			=> 'slider',
                'title'         			=> esc_html__( 'Banner Transition Speed', 'w-studio' ),
                'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'default'       			=> .1,
                'min'           			=> 0,
                'step'          			=> .1,
                'max'           			=> 1,
                'resolution'    			=> 0.1,
                'display_value' 			=> 'text',
				'required'					=> array( 'w-blog-category-background-select', '=', array( 'bg-image' ) ),
            ),
			array(
                'id'        				=> 'w-blog-category-title-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Archive Page Title Typography', 'w-studio' ),
				'compiler'					=> array( '.wl-blog-category-banner-bg h1' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'text-align'				=> true,
            ),
        )
    ));
	
	/* Blog Single Post */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-blog-single-section',
        'title'             			=> esc_html__( 'Blog Single Post', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-blog-single-banner-container',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Blog Single Page Banner In Container', 'w-studio' ),
                'desc'      				=> esc_html__( '', 'w-studio' ),
                'options'  	 				=> array(
                    'container'     			=> esc_html__( 'In Container', 'w-studio' ),
                    'fullwidth'     			=> esc_html__( 'Full Width', 'w-studio' ),
                ),
				'default' 					=> 'fullwidth',
            ),
            array(
                'id'        				=> 'w-blog-single-title-meta',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Blog Single Page Title And Meta In Banner', 'w-studio' ),
                'desc'      				=> esc_html__( '', 'w-studio' ),
                'options'   				=> array(
                    'on-banner'     			=> esc_html__( 'On Banner', 'w-studio' ),
                    'below-banner'     			=> esc_html__( 'Below Banner', 'w-studio' ),
                ),
				'default' 					=> 'on-banner',
            ),
            array(
                'id'        				=> 'w-single-feature-image-position',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Featured Image Background Size', 'w-studio' ),
                'options'   				=> array(
                    'auto'     					=> esc_html__( 'Auto', 'w-studio' ),
                    'cover'     				=> esc_html__( 'Cover', 'w-studio' ),
                    'contain'     				=> esc_html__( 'Contain', 'w-studio' ),
                ),
				'default' 					=> 'contain',
            ),
			array(
                // Single blog title color
                'id'        				=> 'w-single-blog-title-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Single Blog Title Color', 'w-studio' ),
                'default'   				=> '#ffffff',
				'transparent'				=> false,
            ),
            array(
                // Single blog category color
                'id'        				=> 'w-single-blog-category-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Single Blog Category Color', 'w-studio' ),
                'default'   				=> '#ffffff',
				'transparent'				=> false,
            ),
            array(
                // Single blog meta color
                'id'        				=> 'w-single-blog-meta-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Single Blog Meta Color', 'w-studio' ),
                'default'   				=> '#d7d7d7',
				'transparent'				=> false,
            ),
			//single post title typography
			array(
                'id'        				=> 'w-blog-single-post-title-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Title Typography', 'w-studio' ),
                'compiler'					=> array( '.single-post h2.wl-color4' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'color'						=> false,
            ), 
			//single post content typography
			array(
                'id'        				=> 'w-blog-single-post-content-text-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Content Typography', 'w-studio' ),
                'compiler'					=> array( '.single-post p' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
            ), 
			//single post category typography
			array(
                'id'        				=> 'w-blog-single-post-category-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Category Typography', 'w-studio' ),
                'compiler'					=> array( '.single-post h5 a.wl-blog-single-cat' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'color'						=> false,
            ), 
			//single post meta typography
			array(
                'id'        				=> 'w-blog-single-post-meta-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Meta Typography', 'w-studio' ),
                'compiler'					=> array( '.single-post .wl-blog-detail-menu ul li a' ),
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'color'						=> false,
            ), 
            array(
                'id'        				=> 'w-blog-single-date',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Date', 'w-studio' ),
				'default' 					=> true,
            ),
            array(
                'id'        				=> 'w-blog-single-author',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Author', 'w-studio' ),
				'default' 					=> true,
            ),
            array(
                'id'        				=> 'w-blog-single-comments',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Comments', 'w-studio' ),
				'default' 					=> true,
            ),
            array(
                'id'        				=> 'w-blog-single-category',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Category', 'w-studio' ),
				'default' 					=> true,
            ),
        )
    ));
	
	/* Blog Meta */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-blog-meta-section',
        'title'             			=> esc_html__( 'Blog Meta', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
            array(
                'id'        				=> 'w-blog-archive-meta',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Meta Info Show/Hide', 'w-studio' ),
                'default'  					=> true,
            ),
            array(
                'id'        				=> 'w-blog-archive-date',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Date', 'w-studio' ),
				'default' 					=> true,
            ),
            array(
                'id'        				=> 'w-blog-archive-author',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Author', 'w-studio' ),
				'default' 					=> true,
            ),
            array(
                'id'        				=> 'w-blog-archive-comments',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Comments', 'w-studio' ),
				'default' 					=> true,
            ),
            array(
                'id'        				=> 'w-blog-archive-category',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Display Category', 'w-studio' ),
				'default' 					=> true,
            ),
        )
    ));
	
	 /* Gallery Options */
    Redux::setSection( $opt_name, array(
        'title'             			=> esc_html__( 'Gallery', 'w-studio' ),
        'id'                			=> 'w-gallery-settings',
        'customizer_width'  			=> '400px',
        'icon'              			=> 'el el-camera',
        'fields'            			=> array(
            array(
                // Enable Banner
                'id'        				=> 'w-gallery-banner-enable',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Gallery Banner Enable/Disable', 'w-studio' ),
                'default'   				=> true
            ),
            array(
                // Banner Height
                'id'        				=> 'w-gallery-banner-height',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Banner Height', 'w-studio' ),
                'default'   				=> '',
            ),
			array(
                'id'        				=> 'w-gallery-background-selection',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Gallery Background Style', 'w-studio' ),
                'options'   				=> array(
                    'bg-image'        			=> esc_html__( 'Background Image', 'w-studio' ),
                    'bg-color'        			=> esc_html__( 'Background Color', 'w-studio' ),
                ),
				'default'					=> 'bg-image'
            ),
           array(
                // Gallery banner
                'id'        				=> 'w-galler-banner',
                'type'      				=> 'media',
                'title'     				=> esc_html__( 'Banner Image', 'w-studio' ),
                'subtitle'      			=> esc_html__( 'Upload gallery banner image', 'w-studio' ),
                'default'   				=> true,
				'required' 					=> array('w-gallery-background-selection','=','bg-image')
            ),
			array(
                'id'        				=> 'w-gallery-banner-position',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Gallery Background Size', 'w-studio' ),
                'options'   				=> array(
                    'auto'     					=> esc_html__( 'Auto', 'w-studio' ),
                    'cover'     				=> esc_html__( 'Cover', 'w-studio' ),
                    'contain'     				=> esc_html__( 'Contain', 'w-studio' ),
                ),
				'default' 					=> 'contain',
				'required' 					=> array('w-gallery-background-selection','=','bg-image'),
            ),
			array(
                // Overlay color
                'id'        				=> 'w-gallery-banner-overlay-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Banner Overlay Color', 'w-studio' ),
                'required' 					=> array('w-gallery-background-selection','=','bg-image'),
            ),
            array(
                'id'            			=> 'w-gallery-banner-opacity',
                'type'          			=> 'slider',
                'title'         			=> esc_html__( 'Banner Opacity', 'w-studio' ),
                'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'required' 					=> array('w-gallery-background-selection','=','bg-image'),
                'default'       			=> .1,
                'min'           			=> 0,
                'step'          			=> .1,
                'max'           			=> 1,
                'resolution'    			=> 0.1,
                'display_value' 			=> 'text'
            ),
            array(
                'id'            			=> 'w-gallery-banner-transition',
                'type'          			=> 'slider',
                'title'         			=> esc_html__( 'Banner Transition Speed', 'w-studio' ),
                'desc'          			=> esc_html__( 'Description. Min: 0, max: 1, step: 0.1, default value: 0.1', 'w-studio' ),
                'required' 					=> array('w-gallery-background-selection','=','bg-image'),
                'default'       			=> .1,
                'min'           			=> 0,
                'step'          			=> .1,
                'max'           			=> 1,
                'resolution'    			=> 0.1,
                'display_value' 			=> 'text'
            ),
			array(
                // Background color
                'id'        				=> 'w-gallery-banner-background-color',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Background Color', 'w-studio' ),
                'transparent'				=> false,
                'required' 					=> array('w-gallery-background-selection','=','bg-color'),
            ),
			array(
                'id'        				=> 'w-galler-banner-title-typograpy',
                'type'      				=> 'typography',
                'title'     				=> esc_html__( 'Banner Title Typography', 'w-studio' ),
                'compiler'  				=> array( '.wl-gallery-banner .wl-home-style2.wl-blog-bg1 .wl-blog-bg h2' ),
                'all_styles'				=> true,
                'google'    				=> true,
				'font-backup' 				=> true,
				'letter-spacing' 			=> true,
				'word-spacing' 				=> true,
				'text-transform' 			=> true,
				'units'       				=>'px',
            ),
			array(
                // Enable Gallery Image Title
                'id'        				=> 'w-gallery-image-title-enable',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Lightbox Image Caption Enable/Disable', 'w-studio' ),
                'default'   				=> true,
            ),
			array(
                // Enable Navigation option
                'id'        				=> 'w-gallery-nav-enable',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Gallery Pagination Enable', 'w-studio' ),
                'default'   				=> true
            ),
			array(
                // Album Custom Slug
                'id'        				=> 'w-album-slug',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Album Custom Slug', 'w-studio' ),
                'default'   				=> 'w-album',
            ),
			array(
                // Album Category custom slug
                'id'        				=> 'w-album-category-slug',
                'type'      				=> 'text',
                'title'     				=> esc_html__( 'Album Category Custom Slug', 'w-studio' ),
                'default'   				=> 'w-album-category',
            ),
        )
    ));    
	
	 /* Social Media */
    Redux::setSection( $opt_name, array(
        'title'             			=> esc_html__( 'Social Media', 'w-studio' ),
        'id'                			=> 'social-network',
        'customizer_width'  			=> '400px',
        'icon'              			=> 'el el-user',
        'fields'            			=> array(
            array(
                // Enable social network in header
                'id'        				=> 'w-social-network-header',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Blog Social Media Show/Hide', 'w-studio' ),
                'default'   				=> true
            ),
			array(
                // Hide Social Share
                'id'        				=> 'w-portfolio-social',
                'type'      				=> 'switch',
                'url'       				=> true,
                'title'     				=> esc_html__( 'Portfolio Social Media Show/Hide', 'w-studio' ),
				'default'  					=> true
            ),
			array(
                // Change social network Color
                'id'        				=> 'w-social-network-color-blog',
                'type'      				=> 'color',
                'title'     				=> esc_html__( 'Social Media Color', 'w-studio' ),
                'compiler' 					=> array( '.wl-blog-overlay-absolute .wl-blog-media .wl-media-plot a, .wl-media-plot .wl-media-share a' ),
            ),
            array(
                // Facebook link
                'id'        				=> 'w-social-share-facebook',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Facebook', 'w-studio' ),
            ),
            array(
                // Twitter link
                'id'        				=> 'w-social-share-twitter',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Twitter', 'w-studio' ),
            ),
			array(
                // Google Plus link
                'id'        				=> 'w-social-share-google-plus',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Google Plus', 'w-studio' ),
            ),
			array(
                // Pinterest link
                'id'        				=> 'w-social-share-pinterest',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Pinterest', 'w-studio' ),
            ),
			array(
                // Tumblr link
                'id'        				=> 'w-social-share-tumblr',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Tumblr', 'w-studio' ),
            ),
			array(
                // Delicious link
                'id'        				=> 'w-social-share-delicious',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Delicious', 'w-studio' ),
            ),
			array(
                // RSS link
                'id'        				=> 'w-social-share-rss',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'RSS', 'w-studio' ),
            ),
        )
    ));
    
    /* Sidebar Section */
    Redux::setSection( $opt_name, array(
        // Sidebar Section
        'id'                			=> 'w-sidebar-section',
        'title'             			=> esc_html__( 'Sidebar Section', 'w-studio' ),
        'customizer_width'  			=> '400px',
        'icon'              			=> 'el el-align-left',
        'fields'            			=> array(
            
        )
    )); 
	
	/* Create Sidebar */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-create-sidebar-section',
        'title'             			=> esc_html__( 'Create Sidebar', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(            
            array(
                // Creating Sidebar
                'id'        				=> 'w-register-sidebar',
                'type'      				=> 'multi_text',
                'title'     				=> esc_html__( 'Create Sidebar', 'w-studio' ),
                'desc'      				=> esc_html__( 'Name your sidebar and save changes', 'w-studio' ),
            ),
        )
    ));
	
	/* Sidebar Options */
    Redux::setSection( $opt_name, array(
        'id'                			=> 'w-sidebar-options-section',
        'title'             			=> esc_html__( 'Sidebar Options', 'w-studio' ),
        'subsection'        			=> true,
        'fields'            			=> array(
			 array(
                'id'        				=> 'w-page-sidebar-section',
                'type'      				=> 'section',
                'title'     				=> esc_html__( 'Page Sidebar', 'w-studio' ),
                'indent'    				=> true,
            ),
            array(
                'id'        				=> 'w-page-sidebar-style',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Page Sidebar Position', 'w-studio' ),
                'options'   				=> array(
                    'no-sidebar'        		=> esc_html__( 'No Sidebar', 'w-studio' ),
                    'left'              		=> esc_html__( 'Left Sidebar', 'w-studio' ),
                    'right'             		=> esc_html__( 'Right Sidebar', 'w-studio' ),
                ),
				'default'					=> '1'
            ),
            array(
                'id'        				=> 'w-pages-sidebar',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Select Page Sidebar', 'w-studio' ),
                'options'   				=> getSidebars(),
                'default'   				=> 'right_sidebar'
            ),
			array(
                'id'        				=> 'w-blog-archive-sidebar-section',
                'type'      				=> 'section',
                'title'     				=> esc_html__( 'Blog Archive Sidebar', 'w-studio' ),
                'indent'    				=> true,
            ),
            array(
                'id'        				=> 'w-blog-sidebar-style',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Blog Sidebar Position', 'w-studio' ),
                'options'   				=> array(
                    '1'     					=> esc_html__( 'No Sidebar', 'w-studio' ),
                    '2'     					=> esc_html__( 'Left Sidebar', 'w-studio' ),
                    '3'     					=> esc_html__( 'Right Sidebar', 'w-studio' ),
                ),
				'default'					=> '1'
            ),
            array(
                'id'        				=> 'w-blog-pages-sidebar',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Select Blog Archive Sidebar', 'w-studio' ),
                'options'   				=> getSidebars(),
                'default'   				=> 'right_sidebar'
            ),
			array(
                'id'        				=> 'w-blog-single-sidebar-section',
                'type'      				=> 'section',
                'title'     				=> esc_html__( 'Blog Single Post Sidebar', 'w-studio' ),
                'indent'    				=> true,
            ),
			array(
                'id'        				=> 'w-blog-single-page-sidebar',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Blog Single Post Sidebar Position', 'w-studio' ),
                'options'   				=> array(
                    '1'     					=> esc_html__( 'No Sidebar', 'w-studio' ),
                    '2'     					=> esc_html__( 'Left Sidebar', 'w-studio' ),
                    '3'     					=> esc_html__( 'Right Sidebar', 'w-studio' ),
                ),
				'default'					=> '1'
            ),
            array(
                'id'        				=> 'w-blog-single-page-sidebar-load',
                'type'      				=> 'select',
                'title'     				=> esc_html__( 'Select Blog SIngle Post Sidebar', 'w-studio' ),
                'options'   				=> getSidebars(),
                'default'   				=> 'right_sidebar'
            ),
        )
    ));
    
    /* Footer subsection general */
    Redux::setSection( $opt_name, array(
        // Footer Section
        'id'                			=> 'w-footer-section',
        'title'             			=> esc_html__( 'Footer Section', 'w-studio' ),
        'icon'              			=> 'el el-download-alt',
        'fields'            			=> array(
            array(
                // Enable footer
                'id'        				=> 'w-enable-footer',
                'type'      				=> 'switch',
                'title'     				=> esc_html__( 'Enable Footer', 'w-studio' ),
                'default'   				=> true
            ),  
			array(
                'id'        			=> 'w-footer-column-num',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Set Footer Top Column', 'w-studio' ),
                'options'   			=> array(
                    '1'        				=> esc_html__( 'Column One', 'w-studio' ),
                    '2'        				=> esc_html__( 'Column Two', 'w-studio' ),
                    '3'              		=> esc_html__( 'Column Three', 'w-studio' ),
                    '4'             		=> esc_html__( 'Column Four', 'w-studio' ),
                ),
				'default'				=> '4',
				'required' 				=> array( 'w-enable-footer','=',true ),
            ),
			array(
                // Footer background Style
                'id'        			=> 'w-footer-bg-color',
                'type'      			=> 'background',
                'compiler' 				=> array('footer'),
                'title'     			=> esc_html__( 'Footer Background Style', 'w-studio' ),
				'transparent'			=> false,
				'required' 				=> array( 'w-enable-footer','=',true ),
            ),
			array(
                // Enable footer top
                'id'        			=> 'w-enable-footer-top',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Enable Footer Top', 'w-studio' ),
                'default'   			=> true,
				'required' 				=> array( 'w-enable-footer','=',true ),
            ),
			array(
                // Footer Top background Style
                'id'        			=> 'w-footer-top-bg-color',
                'type'      			=> 'background',
                'compiler' 				=> array('.footer_top'),
                'title'     			=> esc_html__( 'Footer Top Background Style', 'w-studio' ),
				'transparent'			=> false,
				'required' 				=> array( 'w-enable-footer-top','=',true ),
            ),
			array(
                // Footer widget text color
                'id'        			=> 'w-footer-top-widget-text-color',
                'type'      			=> 'color',
                'compiler' 				=> array('.footer_top ul li, .footer_top ul li a, .footer_top a, .footer_top h5, .footer_top h5 a, .footer_top ul li span, .footer_top label'),
                'title'     			=> esc_html__( 'Footer Widget Text Color', 'w-studio' ),
				'transparent'			=> false,
				'required' 				=> array( 'w-enable-footer-top','=',true ),
            ),
			array(
                // Enable footer bottom
                'id'        			=> 'w-enable-footer-bottom',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Enable Footer Bottom', 'w-studio' ),
                'default'   			=> true,
				'required' 				=> array( 'w-enable-footer','=',true ),
            ),
			array(
                // Footer Bottom background Style
                'id'        			=> 'w-footer-bottom-bg-color',
                'type'      			=> 'background',
                'compiler'  			=> array('.footer_bottom'),
                'title'     			=> esc_html__( 'Footer Bottom Background Style', 'w-studio' ),
				'transparent'			=> false,
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
            array(
                // footer copyright text
                'id'        			=> 'w-sub-footer-copyright',
                'type'      			=> 'textarea',
                'title'     			=> esc_html__( 'Copyright Text', 'w-studio' ),
		        'default' 				=> __( "Copyright &copy; 2017. WilyLab", 'w-studio' ),
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
			array(
                'id'        			=> 'w-copy-right-text-align',
                'type'      			=> 'select',
                'title'     			=> esc_html__( 'Copyright Text Position', 'w-studio' ),
                'options'   			=> array(
                    'left'     				=> esc_html__( 'Left', 'w-studio' ),
                    'center'     			=> esc_html__( 'Center', 'w-studio' ),
                    'right'     			=> esc_html__( 'Right', 'w-studio' ),
                ),
				'default'				=> 'center',
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
			array(
                'id'        			=> 'w-copyright-typograpy',
                'type'      			=> 'typography',
                'title'     			=> esc_html__( 'Copyright Typography', 'w-studio' ),
                'compiler'  			=> array( '.wl-copy-right p' ),
                'all_styles'			=> true,
                'google'    			=> true,
				'font-backup' 			=> true,
				'letter-spacing' 		=> true,
				'word-spacing' 			=> true,
				'text-transform' 		=> true,
				'units'       				=>'px',
				'color'						=> false,
				'text-align'				=> false,
				'line-height'				=> false,
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
            array(
                // Footer copyright text color
                'id'        			=> 'w-copyright-text-color',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Copyright Text Color', 'w-studio' ),
				'transparent'			=> false,
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
			array(
                // Sub footer Logo enable/disable
                'id'        			=> 'w-sub-footer-logo-ED',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Enable Footer Logo', 'w-studio' ),
                'default'   			=> true,
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
            array(
                // Sub footer social network
                'id'        			=> 'w-sub-footer-social',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Enable Social Media', 'w-studio' ),
                'default'   			=> true,
				'required' 				=> array( 'w-enable-footer-bottom','=',true ),
            ),
			array(
                // Social media Color
                'id'        			=> 'w-social-footer-color-blog',
                'type'      			=> 'color',
                'title'     			=> esc_html__( 'Social media Color', 'w-studio' ),
                'compiler'  			=> array( 'footer .wl-media-plot a, .sidebar-social .wl-media-plot a' ),
				'transparent'			=> false,
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
            array(
                // Facebook link
                'id'        			=> 'w-social-facebook',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Facebook URL', 'w-studio' ),
				'default'				=> '#',
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
            array(
                // Twitter link
                'id'        			=> 'w-social-twitter',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Twitter URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set twitter url', 'w-studio' ),
				'default'				=> '#',
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
            array(
                // google plus link
                'id'        			=> 'w-social-google-plus',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Google Plus URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set google plus url', 'w-studio' ),
				'default'				=> '#',
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Instagram link
                'id'        			=> 'w-social-youtube',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Youtube URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set youtube url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
            array(
                // pinterest link
                'id'        			=> 'w-social-pinterest',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Pinterest URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set pinterest url', 'w-studio' ),
				'default'				=> '#',
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // LinkedIn link
                'id'        			=> 'w-social-linkedin',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'LinkedIn URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set linkedin url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Tumblr link
                'id'        			=> 'w-social-tumblr',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Tumblr URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set tumblr url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Vimeo link
                'id'        			=> 'w-social-vimeo',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Vimeo URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set vimeo url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Skype link
                'id'        			=> 'w-social-skype',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Skype URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set skype url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // google drive link
                'id'        			=> 'w-social-google-drive',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Google Drive URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set google drive url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Wordpress link
                'id'        			=> 'w-social-wordpress',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Wordpress URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set wordpress url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Stumble Upon link
                'id'        			=> 'w-social-stumble-upon',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Stumble Upon URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set stumble upon url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Dribbble Upon link
                'id'        			=> 'w-social-dribbble',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Dribbble URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set dribbble url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
			array(
                // Instagram link
                'id'        			=> 'w-social-instagram',
                'type'      			=> 'text',
                'title'     			=> esc_html__( 'Instagram URL', 'w-studio' ),
                'subtitle'  			=> esc_html__( 'Set instagram url', 'w-studio' ),
				'required' 				=> array( 'w-sub-footer-social','=',true ),
            ),
        )
    ));
	
	 /* General Other Sub Section */
    Redux::setSection( $opt_name, array(
        'id'                		=> 'w-general-other',
        'title'             		=> esc_html__( 'Extra Options', 'w-studio' ),
        'desc'              		=> esc_html__( '', 'w-studio' ),
        'fields'            		=> array(
			array(
                // Off All Settings
                'id'        			=> 'w-off-redux-settings',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Overall Dynamic CSS Enable/Disable', 'w-studio' ),
				'default' 				=> true
            ),
            array(
                // Breadcrumbs
                'id'        			=> 'w-breadcrumbs',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Breadcrumbs Show/Hide', 'w-studio' ),
                'default'   			=> false
            ),    
            array(
                // disable page comment option
                'id'        			=> 'w-page-comment-disable',
                'type'      			=> 'switch',
                'title'     			=> esc_html__( 'Page Comment Show/Hide', 'w-studio' ),
                'default'   			=> false
            ),         
           array(
                // Hide goto top
                'id'        			=> 'w-goto-top',
                'type'      			=> 'switch',
                'url'       			=> true,
                'title'     			=> esc_html__( 'Go to Top Show/Hide', 'w-studio' ),
				'default' 				=> true
            ),
			array(
                // Hide goto top in mobile
                'id'        			=> 'w-goto-top-mobile',
                'type'      			=> 'switch',
                'url'       			=> true,
                'title'     			=> esc_html__( 'Disable Go to Top in Mobile Show/Hide', 'w-studio' ),
				'default' 				=> true
            ),
        )
    ));


    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   				=> 'el el-list-alt',
            'title'  				=> esc_html__( 'Documentation', 'w-studio' ),
            'fields' 				=> array(
                array(
                    'id'       			=> '17',
                    'type'     			=> 'raw',
                    'markdown' 			=> true,
                    'content_path' 		=> dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' 		=> 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            global $wp_filesystem;
           $filename = dirname(__FILE__) . '/dynamic.css';
 
            if( empty( $wp_filesystem ) ) {
                get_template_part( ABSPATH .'/wp-admin/includes/file.php' );
                WP_Filesystem();
            }
         
            if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
            }            
        }
    }
    

    /**
     * Custom function for the callback validation referenced above
     **/
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = esc_html__( 'your custom error message', 'w-studio' );
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = esc_html__( 'your custom warning message', 'w-studio' );
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'w-studio' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'w-studio' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $w_studio_args ) {
            //$w_studio_args['dev_mode'] = true;

            return $w_studio_args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $w_studio_defaults ) {
            $w_studio_defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'w-studio' );

            return $w_studio_defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
    
    add_action( 'redux/options/w_studio/settings/change', 'testingReduxAction' );

	function testingReduxAction(){
		flush_rewrite_rules();
	}
	
	// Function To Get All Registered Sidebars
    function getSidebars(){
        $registeredSidebars   = get_option( 'w_studio' );
        $w_studio_sidebar    = array();
        $w_studio_sidebar['right_sidebar']   = esc_html__( 'Right Sidebar', 'w-studio' );
        $w_studio_sidebar['left_sidebar']    = esc_html__( 'Left Sidebar', 'w-studio' );
        if( isset( $registeredSidebars['w-register-sidebar'] ) ){
        	if( !empty( $registeredSidebars['w-register-sidebar'] ) ) {
		        foreach( $registeredSidebars['w-register-sidebar'] as $w_studio_sidebars ){
		            $w_studio_sidebar[str_replace( 'No Sidebar', '_', strtolower( $w_studio_sidebars ) )]   = $w_studio_sidebars;
		        }
	        }
        }
        
        return $w_studio_sidebar;
    }