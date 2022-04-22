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

function chrx_cars_custom_meta_box()
{
    

wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-car-model">Car Model</label>
            <input name="meta-box-car-model" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-car-model", true); ?>">

            <br>

            <label for="meta-box-car-color">Color</label>
            <input name="meta-box-car-color" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-car-color", true); ?>">
            
            <br>
        </div>
    <?php  
}



function chrx_save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_car_model_value = "";
    $meta_box_car_color_value = "";

    if(isset($_POST["meta-box-car-model"]))
    {
        $meta_box_text_value = $_POST["meta-box-car-model"];
    }   
    update_post_meta($post_id, "meta-box-car-model", $meta_box_car_model_value);

    if(isset($_POST["meta-box-car-color"]))
    {
        $meta_box_car_color_value = $_POST["meta-box-car-color"];
    }   
    update_post_meta($post_id, "meta-box-car-color", $meta_box_car_color_value);

}

add_action("save_post", "chrx_save_custom_meta_box", 10, 3);







function chrx_add_custom_meta_box()
{
    add_meta_box("chrx_cars_custom_ID", //unique ID
                "Car",                          //title
                "chrx_cars_custom_meta_box", //callback
                "post", //screeen
                "side", //position
                "high", //priority
                null//callback_args
            );
}

add_action("add_meta_boxes", "chrx_add_custom_meta_box");




/**
 * Register a custom menu page to view the information queried.
 */
function chrx_cars_custom_menu_page() {
    add_menu_page(
        __( 'Chrx Post Cars', 'chrx-post-cars' ),
        'Post Cars',
        'manage_options',
        'chrx-post-cars.php',
        'chrx_get_send_data',
        'dashicons-admin-post',
        16
    );
}

add_action( 'admin_menu', 'chrx_cars_custom_menu_page' );
