<?php

if (class_exists('WooCommerce')) {

    function woocommerce_support()
    {
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'woocommerce_support');
    // Remove Shop Title 
    add_filter('woocommerce_cart_item_removed_notice_type', '__return_false');
    add_filter('woocommerce_show_page_title', '__return_false');
  
    remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
    add_action('woocommerce_checkout_before_customer_details', 'woocommerce_checkout_payment', 10);
}

function woocommerce_block_styles()
{
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('wp-block-library'); // WordPress core
    wp_dequeue_style('wp-block-library-theme'); // WordPress core 
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme 
}
add_action('wp_enqueue_scripts', 'woocommerce_block_styles');

function cart_script()
{
    if (is_home() || is_front_page(  )) {
        wp_register_script('js',  get_stylesheet_directory_uri() . '/assets/js/woocommerce/cart.js', array('jquery'), '1.0', true);
        wp_localize_script('js', 'cart_obj', array(
            'ajax_url' => admin_url("admin-ajax.php"),
        ));
        wp_enqueue_script('js');
    }
}
add_action('wp_enqueue_scripts', 'cart_script',  99);

function checkout_script()
{
    if (!is_front_page()) {
        wp_register_script('checkout',  get_stylesheet_directory_uri() . '/assets/js/woocommerce/checkout.js', array('jquery'), '1.0', true);
        wp_localize_script('checkout', 'checkout_obj', array(
            'ajax_url' => admin_url("admin-ajax.php"),
        ));
        wp_enqueue_script('checkout');
    }
}
add_action('wp_enqueue_scripts', 'checkout_script',  99);

add_action('wp_head', 'custom_ajax_spinner', 1000);
function custom_ajax_spinner()
{
?>
    <style>
        .woocommerce .blockUI.blockOverlay:before,
        .woocommerce .loader:before {
            height: 3em;
            width: 3em;
            transform: translateY(-250%);
            position: absolute;
            top: -50%;
            left: 50%;
            margin-left: -.5em;
            margin-top: -.5em;
            display: block;
            content: "";
            -webkit-animation: none;
            -moz-animation: none;
            animation: none;
            background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/img/icons/my_spinner.gif"; ?>') !important;
            background-position: center center;
            background-size: cover;
            line-height: 1;
            text-align: center;
            font-size: 2em;
        }
    </style>
<?php
}

require get_parent_theme_file_path('core/woocommerce/cart/cart.php');
