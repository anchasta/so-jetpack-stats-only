<?php
/*
 * Plugin Name: SO Jetpack Stats Only
 * Plugin URI: http://so-wp.com/?p=71
 * Description: The SO Jetpack Stats Only plugin is a fork of Jetpack 2.9.3, but with a minimal footprint, and shows the Stats dashboard widget only.
 * Version: 2014.04.16a
 * Author: Piet Bos
 * Author URI: http://senlinonline.com
 * Text Domain: so-jetpack-stats-only
 * Domain Path: /languages/
 */

/**
 * This function checks whether the Jetpack plugin is active (should not be active)
 * if it is it disables Jetpack and activates SO Jetpack Stats Only.
 *
 * modified using http://wpengineer.com/1657/check-if-required-plugin-is-active/ and the _no_wpml_warning function (of WPML)
 *
 * @since 2014.04.18
 */

$plugins = get_option( 'active_plugins' );

$redundant_plugin = 'jetpack/jetpack.php';

// multisite throws the error message by default, because the plugin is installed on the network site, therefore check for multisite
if ( in_array( $redundant_plugin , $plugins ) && ! is_multisite() ) {

	add_action( 'admin_init', 'sojpso_disable_jetpack', 1 );
	add_action( 'admin_notices', 'sojpso_disable_jetpack_notice', 1 );

} else {

	define( 'JETPACK__MINIMUM_WP_VERSION', '3.7' );
	define( 'JETPACK__VERSION',            '2.9.3' ); // 2014.04.16 adjusted Jetpack version definition to get rid of Jetpack warning emails
	define( 'JETPACK_MASTER_USER',         true );
	define( 'JETPACK__API_VERSION',        1 );
	define( 'JETPACK__PLUGIN_DIR',         plugin_dir_path( __FILE__ ) );
	
}

// Based on Better Solution of http://stephenharris.info/deactivate-other-plug-ins-on-deactivation/
function sojpso_disable_jetpack() {
	$redundant = 'jetpack/jetpack.php';
	deactivate_plugins( $redundant );
}

function sojpso_disable_jetpack_notice() {

	// display the warning message
	echo '<div class="message error"><p>';

	_e( 'The <strong>SO Jetpack Stats Only plugin</strong> cannot function if you also have the original Jetpack plugin installed. We have therefore deactivated the latter.', 'so-related-posts' );

	echo '</p></div>';

}
 

defined( 'JETPACK_CLIENT__AUTH_LOCATION' )   or define( 'JETPACK_CLIENT__AUTH_LOCATION', 'header' );
defined( 'JETPACK_CLIENT__HTTPS' )           or define( 'JETPACK_CLIENT__HTTPS', 'AUTO' );
defined( 'JETPACK__API_BASE' )               or define( 'JETPACK__API_BASE', 'https://jetpack.wordpress.com/jetpack.' );

// Constants for expressing human-readable intervals
// in their respective number of seconds.
// Introduced in WordPress 3.5, specified here for backward compatability.
defined( 'MINUTE_IN_SECONDS' ) or define( 'MINUTE_IN_SECONDS', 60 );
defined( 'HOUR_IN_SECONDS' )   or define( 'HOUR_IN_SECONDS',   60 * MINUTE_IN_SECONDS );
defined( 'DAY_IN_SECONDS' )    or define( 'DAY_IN_SECONDS',    24 * HOUR_IN_SECONDS   );
defined( 'WEEK_IN_SECONDS' )   or define( 'WEEK_IN_SECONDS',    7 * DAY_IN_SECONDS    );
defined( 'YEAR_IN_SECONDS' )   or define( 'YEAR_IN_SECONDS',  365 * DAY_IN_SECONDS    );

// @todo: Abstract out the admin functions, and only include them if is_admin()
// @todo: Only include things like class.jetpack-sync.php if we're connected.
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack.php'               );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-network.php'       );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-client.php'        );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-data.php'          );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-client-server.php' );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-sync.php'          );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-options.php'       );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-user-agent.php'    );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-error.php'         );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-heartbeat.php'     );
require_once( JETPACK__PLUGIN_DIR . 'functions.compat.php'            );

// Play nice with http://wp-cli.org/
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-cli.php'       );
}

register_activation_hook( __FILE__, array( 'Jetpack', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Jetpack', 'plugin_deactivation' ) );

add_action( 'init', array( 'Jetpack', 'init' ) );
add_action( 'plugins_loaded', array( 'Jetpack', 'load_modules' ), 100 );
// SO refers to line 2991 of class.jetpack.php not sure whether we need this or not, leave it in for now
add_filter( 'jetpack_static_url', array( 'Jetpack', 'staticize_subdomain' ) );
