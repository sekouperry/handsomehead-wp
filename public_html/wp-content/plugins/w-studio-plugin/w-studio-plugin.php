<?php
/*
Plugin Name: W Studio Plugin
Plugin URI:  https://wilylab.com/
Description: Plugin For W Studio Theme To Add Additional Functionality
Version:     1.0.3
Author:      Wilylab
Author URI:  https://wilylab.com/
License:     GPLv2 or later
License URI: https://wilylab.com/
Text Domain: w-studio-plugin
Domain Path: /languages
*/

if( !defined( 'ABSPATH' ) ) {
    die;
}

// Defining WCP Path
if ( !defined( 'W_STUDIO_PLUGIN' ) )
    define( 'W_STUDIO_PLUGIN', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );

// Defining WCP Directory
if ( !defined( 'W_STUDIO_PLUGIN_DIR' ) )
    define( 'W_STUDIO_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . W_STUDIO_PLUGIN );

// Defining WCP URL
if ( !defined( 'W_STUDIO_PLUGIN_URL' ) )
    define( 'W_STUDIO_PLUGIN_URL', WP_PLUGIN_URL . '/' . W_STUDIO_PLUGIN );

// Defining WCP Version Key
if ( !defined( 'W_STUDIO_PLUGIN_KEY' ) )
    define( 'W_STUDIO_PLUGIN_KEY', 'w_studio_plugin' );

// Defining WCP Version Number
if ( !defined( 'W_STUDIO_PLUGIN_VERSION_NUM' ) )
    define( 'W_STUDIO_PLUGIN_VERSION_NUM', '0.0.1' );

// Registering Text Domain For The Plugin
add_action( 'plugins_loaded', 'w_studio_plugin_load_textdomain' );

register_activation_hook( __FILE__, 'w_studio_plugin_activation' );

register_deactivation_hook( __FILE__, 'w_studio_plugin_deactivation' );

add_action( 'init', 'w_studio_plugin_init' );

/*
 * Text Domain Loader 
 * 
 */
function w_studio_plugin_load_textdomain() {
    
    load_plugin_textdomain( 'w-studio-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

/*
 * Things to do when plugin is activated 
 * 
 * @param
 * @return
 */
if( !function_exists( 'w_studio_plugin_activation' ) ) {
    
    function w_studio_plugin_activation() {
        // Adding Plugin Version Info Into DB
        if( !get_option( W_STUDIO_PLUGIN_KEY, false ) )
            add_option( W_STUDIO_PLUGIN_KEY, W_STUDIO_PLUGIN_VERSION_NUM );
    }
}

/*
 * Things to do when plugin is deactivated
 *
 * @param
 * @return
 */
if( !function_exists( 'w_studio_plugin_deactivation' ) ) {
    function w_studio_plugin_deactivation(){
        // Deleting Plugin Version Info From DB
        if( get_option( W_STUDIO_PLUGIN_KEY, false ) )
            delete_option( W_STUDIO_PLUGIN_KEY );
    }
}

/*
 * Things To Perform With Init Hook
 * 
 * @param
 * @return
 */
if( !function_exists( 'w_studio_plugin_init' ) ) {
    function w_studio_plugin_init() {

        // Load Post Types
        require_once W_STUDIO_PLUGIN_DIR . '/cpt/cpt-loader.php';
        
        if( is_admin() ){
            // Load Metaboxes
            require_once W_STUDIO_PLUGIN_DIR . '/cpt/metabox-loader.php';
        }

        // Load Shortcodes
        require_once W_STUDIO_PLUGIN_DIR . '/shortcodes/shortcodes-loader.php';
    }
}

// Load Widgets
require_once W_STUDIO_PLUGIN_DIR . '/widgets/widgets-loader.php';

if( is_admin() ) {
    // Load Necessary Scripts For Metaboxes
    require_once W_STUDIO_PLUGIN_DIR . '/load-scripts.php';
    
    // Check if Visual Composer is installed
    if ( ! defined( 'WPB_VC_VERSION' ) ) {
        // Things To Do When Visual Compoer Is Not Installed
    } else {
        /* Load VC Addon  */
        require_once W_STUDIO_PLUGIN_DIR . '/shortcodes/vc-addon.php';
    }
}

if ( class_exists( 'Redux' ) ) {
	/* Load redux demo importer file */
	require_once W_STUDIO_PLUGIN_DIR . '/loader.php';
}