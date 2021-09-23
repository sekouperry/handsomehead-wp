<?php
/**
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-wbc907-tgm-plugin-activation.php';

add_action( 'wbc907_tgmpa_register', 'wbc907_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 */
function wbc907_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'         => 'WBC907 Core', // The plugin name
			'slug'         => 'wbc907-core', // The plugin slug (typically the folder name)
			'source'       => 'http://assets.webcreations907.com/api-nzs/wbc907-core-plugin.zip', // The plugin source
			'required'     => true, // If false, the plugin is only 'recommended' instead of required
			'version'      => '3.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'external_url' => '', // If set, overrides default API URL and points to an external URL
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/wbc907-core-image.jpg',
		),
		array(
			'name'         => 'Revolution Slider', // The plugin name
			'slug'         => 'revslider', // The plugin slug (typically the folder name)
			'source'       => 'premium', // The plugin source
			'required'     => false, // If false, the plugin is only 'recommended' instead of required
			'version'      => '6.4.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'external_url' => '', // If set, overrides default API URL and points to an external URL
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/slider-revolution-image.jpg',
		),
		array(
			'name'         => 'WPBakery Builder', // The plugin name
			'slug'         => 'js_composer', // The plugin slug (typically the folder name)
			'source'       => 'premium', // The plugin source
			'required'     => false, // If false, the plugin is only 'recommended' instead of required
			'version'      => '6.6.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'external_url' => '', // If set, overrides default API URL and points to an external URL
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/wpbakery-builder-image.jpg',
		),
		array(
			'name'         => 'Elementor', // The plugin name
			'slug'         => 'elementor', // The plugin slug (typically the folder name)
			'required'     => false,
			'version'      => '',
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/elementor-pagebuilder-img.jpg',
		),
		array(
			'name'         => 'Envato Market',
			'slug'         => 'envato-market',
			'source'       => 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/envato-market-image.jpg',
		),
		array(
			'name'         => 'Contact Form 7', // The plugin name
			'slug'         => 'contact-form-7', // The plugin slug (typically the folder name)
			'required'     => false,
			'version'      => '',
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/cf7-plugin-image.jpg',
		),
		array(
			'name'         => 'WooCommerce', // The plugin name
			'slug'         => 'woocommerce', // The plugin slug (typically the folder name)
			'required'     => false,
			'version'      => '',
			'screen-image' => trailingslashit(get_template_directory_uri()).'includes/admin/assets/img/woo-plugin-image.jpg',
		),
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'ninezeroseven-plugins', // Menu slug.
		'parent_slug'  => 'ninezeroseven',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	$plugins = apply_filters( 'wbc907_theme_plugins_filter', $plugins );

	wbc907_tgmpa( $plugins, $config );

}

if(!function_exists('wbc907_plugin_update_check')){
	function wbc907_plugin_update_check() {
		global $pagenow;
		if ( false === get_transient( 'wbc907_plugin_versions' ) || $pagenow == 'update-core.php' && current_user_can( 'update_themes' ) ) {
			$check_update = wp_remote_get( 'http://assets.webcreations907.com/api-nzs/wbc907-plugins-versions.json' );
			if ( !is_wp_error( $check_update ) && is_array( $check_update ) && !empty( $check_update['body'] ) ) {
				$plugin_versions = (array) json_decode( $check_update['body'], true );
				set_transient( 'wbc907_plugin_versions', $plugin_versions, 7 * DAY_IN_SECONDS );
			}
		}
	}
	add_action( 'after_setup_theme', 'wbc907_plugin_update_check' );
}

if(!function_exists('wbc907_theme_plugins_version')){
	function wbc907_theme_plugins_version( $plugins ) {
		if ( false !== get_transient( 'wbc907_plugin_versions' ) ) {
			$plugin_version  = (array) get_transient( 'wbc907_plugin_versions' );
			foreach ( $plugins as $key => $plugin ) {
				if ( isset( $plugin['slug'] ) && isset( $plugin['source'] ) && isset( $plugin['version'] ) && array_key_exists( $plugin['slug'], $plugin_version ) ) {
					if ( version_compare( $plugin['version'], $plugin_version[$plugin['slug']], '<' ) ) {
						$plugins[$key]['version'] = $plugin_version[$plugin['slug']];
						// if( $plugin['slug'] == 'wbc907-core' && defined('WBC907_CORE_PLUGIN_VERSION') && version_compare( WBC907_CORE_PLUGIN_VERSION, $plugin_version[$plugin['slug']], '<' )){
						// 	delete_metadata( 'user', null, 'tgmpa_dismissed_notice_tgmpa', null, true );
						// }
					}

				}

			}
		}


		return $plugins;
	}
	add_filter( 'wbc907_theme_plugins_filter', 'wbc907_theme_plugins_version', 20 );
}