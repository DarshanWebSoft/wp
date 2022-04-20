<?php 

/* Plugin Name: First Custom plugin */

define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
//echo PLUGIN_DIR_PATH;
define("PLUGIN_URL",plugins_url());
///echo PLUGIN_URL;

function add_custom_plugin(){

	add_menu_page('page title', 
				  'menu title', 
				  'manage_options', 
				  'menu slug',
				  'custom_plugin_fun', 
				  'dashicons-share-alt', 
				  9 
	);
	add_submenu_page( 'menu slug', 'Settings page title', 'Settings menu label', 'manage_options', 'theme-op-settings', 'cp1');
}
add_action('admin_menu','add_custom_plugin');

function cp1(){
	?>
	<form action="" method="post">

		<div>
			<label for="">Label:</label>
			<input type="text">
		</div>

		<div>
			<input type="submit">
		</div>

	</form>
<?php
}

function custom_plugin_fun(){

	echo "custom plugin page";
}

function theme_options_panel(){
	add_menu_page('Theme page title', 'Theme menu label', 'manage_options', 'theme-options', 'wps_theme_func');
	add_submenu_page( 'theme-options', 'add New', 'add new', 'manage_options', 'add-new', 'add_new');
    add_submenu_page( 'theme-options', 'All Page', 'all page', 'manage_options', 'all-page', 'all_page');
}
add_action('admin_menu', 'theme_options_panel');

    function wps_theme_func(){

        echo "admin menu";
    }

    function add_new(){

        include_once PLUGIN_DIR_PATH.'/view/add-new.php';
    }

    function all_page(){

        include_once PLUGIN_DIR_PATH.'/view/all-page.php';
    }

    function custom_plugin_assets(){

        wp_enqueue_style('style',PLUGIN_DIR_PATH."/assets/css/style.css",'',1.0);
    }

    add_action('admin_enqueue_script','custom_plugin_assets');

?>

