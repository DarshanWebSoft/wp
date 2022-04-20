<?php 

	 register_nav_menus(
				
				array(
				  'header-menu' => __( 'Header Menu' ),
				  'extra-menu' => __( 'Extra Menu' )
				 )
			   );

	 add_theme_support('post-thumbnails');

	 add_theme_support('custom-header');

	 add_theme_support( 'custom-logo' );

	$args = array(
		'name'          => __( 'Sidebar name', 'text-domain' ),
		'id'            => 'unique-sidebar-id',
	);
	
		register_sidebar($args);

		add_shortcode('myshortcode', 'your_function_name');

		function your_function_name(){

			echo plugins_url();
		//	echo "<br>".admin_url();
		//	echo "<br>".get_theme_file_uri();
			echo "<br>".get_template_directory_uri();
			echo "<br>".the_ID();
			echo "<br>".esc_url("jhkb","fsudkb");
			echo "<br>".get_post_type();
			echo "<br>".get_permalink();
			echo get_option("kjnl");
		}


		add_action('customize_register','my_customize_register');
	function my_customize_register( $wp_customize )
	{
		$wp_customize->add_setting('setting', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '', // Basically to_json.
		));

		$wp_customize->add_control('setting', array(
			'type' => 'date',
			'priority' => 10, // Within the section.
			'section' => 'colors', // Required, core or custom.
			'label' => __('Date'),
			'description' => __('This is a date control with a red border.'),
			'input_attrs' => array(
				'class' => 'my-custom-class-for-js',
				'style' => 'border: 1px solid #900',
				'placeholder' => __('mm/dd/yyyy'),
			),
			'active_callback' => 'is_front_page',
		));

		$wp_customize->add_control('setting', array(
			'type' => 'range',
			'section' => 'title_tagline',
			'label' => __('Range'),
			'description' => __('This is the range control description.'),
			'input_attrs' => array(
				'min' => 0,
				'max' => 10,
				'step' => 2,
			),
		));

		$wp_customize->add_section('background_image', array(
			'title' => __('Background image'),
			'description' => __('Background image'),
			'panel' => '', // Not typically needed.
			'priority' => 160,
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
		));
	}
	/*end*/

//create a custom taxonomy name it topics for your posts

function my_enqueue() {
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

function ajaxcall(){

	$data['message'] = $_POST['message'];
	//echo json_encode($data);

	extract($data);

	//$data['message'] = $message;
	echo json_encode($data);

	//echo get_template_part('demo.php');
	//include(locate_template('demo.php'));

}
add_action('wp_ajax_ajaxcall','ajaxcall');
add_action( 'wp_ajax_nopriv_ajaxcall', 'ajaxcall' );


add_action('init', function() {
	register_post_type('book', [
		'label' => __('Books', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-book',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'book'],
		'labels' => [
			'singular_name' => __('Book', 'txtdomain'),
			'add_new_item' => __('Add new book', 'txtdomain'),
			'new_item' => __('New book', 'txtdomain'),
			'view_item' => __('View book', 'txtdomain'),
			'not_found' => __('No books found', 'txtdomain'),
			'not_found_in_trash' => __('No books found in trash', 'txtdomain'),
			'all_items' => __('All books', 'txtdomain'),
			'insert_into_item' => __('Insert into book', 'txtdomain')
		],
	]);
});


add_action('init', function() {
	register_taxonomy('book_author', ['book'], [
		'label' => __('Authors', 'txtdomain'),
		'hierarchical' => false,
		'rewrite' => ['slug' => 'book-author'],
		'show_admin_column' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => __('Author', 'txtdomain'),
			'all_items' => __('All Authors', 'txtdomain'),
			'edit_item' => __('Edit Author', 'txtdomain'),
			'view_item' => __('View Author', 'txtdomain'),
			'update_item' => __('Update Author', 'txtdomain'),
			'add_new_item' => __('Add New Author', 'txtdomain'),
			'new_item_name' => __('New Author Name', 'txtdomain'),
			'search_items' => __('Search Authors', 'txtdomain'),
			'popular_items' => __('Popular Authors', 'txtdomain'),
			'separate_items_with_commas' => __('Separate authors with comma', 'txtdomain'),
			'choose_from_most_used' => __('Choose from most used authors', 'txtdomain'),
			'not_found' => __('No Authors found', 'txtdomain'),
		]
	]);
});

?>
