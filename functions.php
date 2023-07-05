<?php


if (!function_exists('devstep_setup')) {
 
	function devstep_setup()
	{

		define('THEME_URI', get_template_directory_uri());
		define('THEME_DIR', get_template_directory());

		add_theme_support('automatic-feed-links');
 
		add_theme_support('post-thumbnails');
		add_theme_support('menus');

		set_post_thumbnail_size(1568, 9999);
		remove_action('template_redirect', 'rest_output_link_header', 11);
		
		// Imports Admin Init.  
		require get_parent_theme_file_path('core/theme.php');
		/* ADMIN */
		require get_parent_theme_file_path('core/admin/init.php');

		/* LIBRARY POST TYPE */
		require get_parent_theme_file_path('core/library/meta_boxs.php');
		require get_parent_theme_file_path('core/library/config_types.php');
		require get_parent_theme_file_path('core/library/post_types.php');

		/*  WOOCOMMERCE */
		require get_parent_theme_file_path('core/woocommerce/init.php');  

		/*  PLUGINS */
		require get_parent_theme_file_path('lib/tgm-plugin/class-tgm-plugin-activation.php');
		require get_parent_theme_file_path('core/plugins/init.php');
	}
	 
	function style_scripts()
	{ 
		wp_dequeue_style('classic-theme-styles');
		wp_dequeue_style('wp-block-library'); // WordPress core
		wp_dequeue_style('wp-block-library-theme'); // WordPress core 
		wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
 
		wp_register_script('libs-js', get_template_directory_uri() . '/assets/js/libs.js', array(), true, true);
		wp_register_script('main-js', get_template_directory_uri() . '/assets/js/all.min.js', array(), true, true); 
 
		wp_enqueue_script('libs-js');
		wp_enqueue_script('main-js');		 
	}
	add_action('wp_enqueue_scripts', 'style_scripts');

	function style_css()
	{
		wp_register_style('libs-css', get_template_directory_uri() . '/assets/css/libs.css', array(), false, false);
		wp_enqueue_style('libs-css');
		wp_register_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), false, false);
		wp_enqueue_style('main-style');
	}
	add_action('wp_enqueue_scripts', 'style_css');
}

add_action('after_setup_theme', 'devstep_setup');
