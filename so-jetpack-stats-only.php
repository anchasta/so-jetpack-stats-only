<?php
/*
 * Plugin Name: SO Jetpack Stats Only
 * Plugin URI: http://so-wp.com/?p=71
 * Description:The SO Jetpack Stats Only plugin is a fork of Jetpack Lite 2.3.4.1 and continues to have a minimal footprint without the need to install Jetpack.
 * Version: 2014.01.12
 * Author: Piet Bos
 * Author URI: http://senlinonline.com
 * Text Domain: so-jetpack-stats-only
 * Domain Path: /languages
 */

defined( 'JETPACK__API_BASE' ) or define( 'JETPACK__API_BASE', 'https://jetpack.wordpress.com/jetpack.' );
define( 'JETPACK__API_VERSION', 1 );
define( 'JETPACK__MINIMUM_WP_VERSION', '3.6' );
defined( 'JETPACK_CLIENT__AUTH_LOCATION' ) or define( 'JETPACK_CLIENT__AUTH_LOCATION', 'header' );
defined( 'JETPACK_CLIENT__HTTPS' ) or define( 'JETPACK_CLIENT__HTTPS', 'AUTO' );
define( 'JETPACK__VERSION', '2014.01.12' );
define( 'JETPACK__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'JETPACK__GLOTPRESS_LOCALES_PATH' ) or define( 'JETPACK__GLOTPRESS_LOCALES_PATH', JETPACK__PLUGIN_DIR . 'locales.php' );

define( 'JETPACK_MASTER_USER', true );

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
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-client.php'        );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-data.php'          );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-client-server.php' );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-sync.php'          );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-options.php'       );
// SAR: Removed call to class.jetpack-user-agent.php (used for mobile stuff)
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-post-images.php'   ); // SAR: Dont remove it! needed for stats widget
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-error.php'         );
//require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-debugger.php'      );
require_once( JETPACK__PLUGIN_DIR . 'class.jetpack-heartbeat.php'     );
// SAR: Removed call to class.photon.php
// SAR: Removed call to functions.photon.php
require_once( JETPACK__PLUGIN_DIR . 'functions.compat.php'            );
// SAR: Removed call to functions.gallery.php

register_activation_hook( __FILE__, array( 'Jetpack', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Jetpack', 'plugin_deactivation' ) );

add_action( 'init', array( 'Jetpack', 'init' ) );
add_action( 'plugins_loaded', array( 'Jetpack', 'load_modules' ), 100 );
//add_filter( 'jetpack_static_url', array( 'Jetpack', 'staticize_subdomain' ) );

/*
if ( is_admin() && ! Jetpack::check_identity_crisis() ) {
	Jetpack_Sync::sync_options( __FILE__, 'db_version', 'jetpack_active_modules', 'active_plugins' );
}
*/


// SAR: Removed sync_optios for widget_twitter
