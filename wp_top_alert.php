<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://novintech.info
 * @since             1.2
 * @package           Wp_top_alert
 *
 * @wordpress-plugin
 * Plugin Name:       wp top alert bar
 * Plugin URI:        https://biawp.ir
 * Description:       This plugin show an beautiful alert bar in top of your website.
 * Version:           1.2
 * Author:            Biawp
 * Author URI:        https://biawp.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_top_alert
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WP_TOP_ALERT_VERSION', '1.2' );

/**
 * Basename constant.
 */
define( 'WP_TOP_ALERT_BASENAME', plugin_basename(__FILE__) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp_top_alert-activator.php
 */
function activate_wp_top_alert() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_top_alert-activator.php';
	Wp_top_alert_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp_top_alert-deactivator.php
 */
function deactivate_wp_top_alert() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_top_alert-deactivator.php';
	Wp_top_alert_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_top_alert' );
register_deactivation_hook( __FILE__, 'deactivate_wp_top_alert' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp_top_alert.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_top_alert() {

	$plugin = new Wp_top_alert();
	$plugin->run();

}
run_wp_top_alert();
