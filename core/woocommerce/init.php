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
    wp_deregister_script('jquery');
}
add_action('wp_enqueue_scripts', 'woocommerce_block_styles');

function cart_script()
{
    wp_register_script('cart_script',  get_stylesheet_directory_uri() . '/assets/js/cart_script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'cart_script');
 

add_filter( 'woocommerce_checkout_fields' , 'custom_remove_woo_checkout_fields' );
 
function custom_remove_woo_checkout_fields( $fields ) {

    // remove billing fields
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_email']);
   
    // remove shipping fields 
    unset($fields['shipping']['shipping_first_name']);    
    unset($fields['shipping']['shipping_last_name']);  
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    
    // remove order comment fields
    unset($fields['order']['order_comments']);
    
    return $fields;
}