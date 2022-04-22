<?php

/**
 *
 * @link              http://ocenchris.com
 * @since             1.0.0
 * @package           Chrx_Post_Cars
 *
 * @wordpress-plugin
 * Plugin Name:       CHRX POST CARS
 * Plugin URI:        http://ocenchris.com/
 * Description:       A plugin with a custom post type called Cars. The Custom post type will be storing data about cars
 * Version:           1.0.0
 * Author:            Ocen Chris
 * Author URI:        http://ocenchris.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chrx-post-cars
 * Domain Path:       /languages
 */

// If this file is access directly, abort!!!
defined( 'ABSPATH' ) or die( 'Unauthorized Access' );

//function to create a post type and add it to the admin menu
function chrx_custom_car() {
  $labels = array(
    'name'               => _x( 'Cars', 'post type general name' ),
    'singular_name'      => _x( 'Car', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'car' ),
    'add_new_item'       => __( 'Add New Car' ),
    'edit_item'          => __( 'Edit Car' ),
    'new_item'           => __( 'New Car' ),
    'all_items'          => __( 'All Car' ),
    'view_item'          => __( 'View Car' ),
    'search_items'       => __( 'Search Cars' ),
    'not_found'          => __( 'No cars found' ),
    'not_found_in_trash' => __( 'No cars found in the Trash' ),
   // 'parent_item_colon'  => ’,
    'menu_name'          => 'Post Cars' //how it appears on the admin menu
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds data about cars',
    'public'        => true,
    'menu_position' => 15,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'car', $args ); 
}
add_action( 'init', 'chrx_custom_car' );


//adding custom meta box for color
add_action( 'add_meta_boxes', 'chrx_save_custom_color' );
function chrx_save_custom_color() {
    add_meta_box( 
        'chrx_save_custom_color',
        __( 'Car Color', 'chrx-post-cars' ),
        'chrx_custom_car_content',
        'car',
        'side',
        'high'
    );
}

function chrx_custom_car_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'chrx_custom_car_content_nonce' );
  echo '<label for="car_color">Car Color</label>';
  echo '<input type="text" id="car_color" name="car_color" placeholder="Enter car color" />';
  echo '<label for="car_model">Car Model</label>';
  echo '<input type="text" id="car_model" name="car_model" placeholder="Enter car Model" />';
}




add_action( 'save_post', 'chrx_custom_car_save' );
function chrx_custom_car_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['chrx_custom_car_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $car_color = $_POST['car_color'];
  $car_model = $_POST['car_model'];
  update_post_meta( $post_id, 'car_color', $car_color );
  update_post_meta( $post_id, 'car_model', $car_model );

}

?>