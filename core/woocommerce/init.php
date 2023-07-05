<?php
 
if (class_exists('WooCommerce')) {

    function woocommerce_support()
    {
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'woocommerce_support');
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
 
    // Remove Shop Title 
    add_filter('woocommerce_show_page_title', '__return_false'); 
}

function woocommerce_block_styles()
{
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('wp-block-library'); // WordPress core
    wp_dequeue_style('wp-block-library-theme'); // WordPress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme 
}
add_action('wp_enqueue_scripts', 'woocommerce_block_styles');

function cart_script()
{
    wp_register_script('js',  get_stylesheet_directory_uri() . '/assets/js/cart_script.js', array('jquery'), '1.0', true);
    wp_localize_script('js', 'cart_obj', array(
        'ajax_url' => admin_url("admin-ajax.php"),
        'home_url' => home_url('/'),
    ));wp_enqueue_script('js');
}

add_action('wp_enqueue_scripts', 'cart_script',  99); 


require get_parent_theme_file_path('core/woocommerce/cart/cart.php');
 