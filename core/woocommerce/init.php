<?php

if (class_exists('WooCommerce')) {

    function woocommerce_support()
    {
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'woocommerce_support');
    remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
    // Remove Shop Title 
    add_filter('woocommerce_show_page_title', '__return_false');
}

function woocommerce_block_styles()
{
}
add_action('wp_enqueue_scripts', 'woocommerce_block_styles');

function cart_script()
{
    wp_register_script('js',  get_stylesheet_directory_uri() . '/assets/js/cart_script.js', array('jquery'), '1.0', true);
    wp_localize_script('js', 'cart_obj', array(
        'ajax_url' => admin_url("admin-ajax.php"),
        'home_url' => home_url('/'),
    ));
    wp_enqueue_script('js');
}

add_action('wp_enqueue_scripts', 'cart_script',  99);


function checkout_script()
{
    wp_register_script('checkout',  get_stylesheet_directory_uri() . '/assets/js/woocommerce/checkout.js', array('jquery'), '1.0', true);
    wp_localize_script('checkout', 'checkout_obj', array(
        'ajax_url' => admin_url("admin-ajax.php"),
        'home_url' => home_url('/'),
    ));
    wp_enqueue_script('checkout');
}

add_action('wp_enqueue_scripts', 'checkout_script',  99);
// put this in functions.php, it will produce code before the form
add_action('woocommerce_before_checkout_form', 'show_cart_summary', 9);

// gets the cart template and outputs it before the form
function show_cart_summary()
{
    wc_get_template_part('cart/cart');
}
require get_parent_theme_file_path('core/woocommerce/cart/cart.php');
