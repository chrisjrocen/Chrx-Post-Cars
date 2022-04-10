<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ocenchris.com
 * @since             1.0.0
 * @package           Chrx_Post_Cars
 *
 * @wordpress-plugin
 * Plugin Name:       CHRX POST CARS
 * Plugin URI:        http://ocenchris.com/chrx-post-cars-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ocen Chris
 * Author URI:        http://ocenchris.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chrx-post-cars
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chrx-post-cars-activator.php
 */
function activate_chrx_post_cars() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chrx-post-cars-activator.php';
	Chrx_Post_Cars_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chrx-post-cars-deactivator.php
 */
function deactivate_chrx_post_cars() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chrx-post-cars-deactivator.php';
	Chrx_Post_Cars_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_chrx_post_cars' );
register_deactivation_hook( __FILE__, 'deactivate_chrx_post_cars' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chrx-post-cars.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_chrx_post_cars() {

	$plugin = new Chrx_Post_Cars();
	$plugin->run();

}
run_chrx_post_cars();
