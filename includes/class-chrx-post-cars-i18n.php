<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://ocenchris.com
 * @since      1.0.0
 *
 * @package    Chrx_Post_Cars
 * @subpackage Chrx_Post_Cars/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Chrx_Post_Cars
 * @subpackage Chrx_Post_Cars/includes
 * @author     Ocen Chris <email@ocenchris.com>
 */
class Chrx_Post_Cars_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'chrx-post-cars',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
