<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://ocenchris.com
 * @since      1.0.0
 *
 * @package    Chrx_Post_Cars
 * @subpackage Chrx_Post_Cars/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Chrx_Post_Cars
 * @subpackage Chrx_Post_Cars/public
 * @author     Ocen Chris <email@ocenchris.com>
 */
class Chrx_Post_Cars_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $chrx_post_cars    The ID of this plugin.
	 */
	private $chrx_post_cars;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $chrx_post_cars       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $chrx_post_cars, $version ) {

		$this->chrx_post_cars = $chrx_post_cars;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chrx_Post_Cars_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chrx_Post_Cars_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->chrx_post_cars, plugin_dir_url( __FILE__ ) . 'css/chrx-post-cars-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chrx_Post_Cars_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chrx_Post_Cars_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->chrx_post_cars, plugin_dir_url( __FILE__ ) . 'js/chrx-post-cars-public.js', array( 'jquery' ), $this->version, false );

	}

}
