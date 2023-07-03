<?php



if (class_exists('WooCommerce')) {

    function woocommerce_support()
    {
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'woocommerce_support');
 

    // Remove Shop Title 
    add_filter('woocommerce_show_page_title', '__return_false');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
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
    wp_register_script('cart_script',  get_stylesheet_directory_uri() . '/assets/js/cart_script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'cart_script');
 
