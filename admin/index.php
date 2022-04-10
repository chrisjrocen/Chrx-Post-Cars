<?php // Silence is golden

//adding toplevel menu to the admin dahsboard

function chrx_custom_box_top_level_menu_html(){
	?>
	<div class="wrap">
		<h1><?php echo esc_html(get admin_page_title() ); ?></h1>
		<form accept="options.php" method="post">
			<?php
			//output security fileds for the registered setting
			settings_fields('chrx_custom_meta_box');
			do_settings_sections('custom meta box');
			submit_button(__('Save Settings','textdomain'));
			?>
		</form>
	</div>
	<?php
}


<?php
add_action('admin_menu','chrx_custom_box_top_level_menu_html');



function chrx_custom_box_top_level_menu(){
	add_menu_page(
		'Custom Post', //string $page title
		'Custom Post Cars',	//string $menu title
		'manage_options', //string $capability
		'chrx-custom-cars'//string $menu_slug
		'chrx_custom_box_top_level_menu_html'	//callable $function =''
			plugin_dir_url(__FILE__).'admin/image.png'//string $icon_url=''
			20//int $position =null
		)
}



//function to add a custom post type
function chrx_post_cars_custom(){
	register_post_type('chrx_post_cars',//saved in the db as chrx_post_cars
		array(
			'labels' => array(
				'name' => __('Cars','textdomain'),
				'singular name' => __('Car','textdomain'),
			),
				'public' => true,
				'has_archive' => true,
		)
	);
}
add_action('init','chrx_post_cars_custom');


//function to add custom metabox
function chrx_add_custom_box(){
	$screens = ['post'];
	foreach ($screens as $screen) {
		add_meta_box(
			'custom_box_one'	//unique ID
			'Car Title'			//Box title
			'custom_box_callback'	//content callback
			$screen 			//post type
		);	
	}
}
add_action('add_meta_boxes','chrx_add_custom_box');



//function to add elements

function custom_box_callback($post) {
	?>
	<label for="model_field">Description for car model</label>
	<select name="model_field" id="model_field" class="postbox">
	<option value="model1">Model1</option>
	<option value="model2">Model2</option>
	<option value="model3">Model3</option>
	</select>
	<?php
}

?>