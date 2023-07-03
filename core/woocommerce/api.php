<?php


function add_to_cart_product()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header('Content-Type: application/json;charset=utf-8');

    global $woocommerce;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST;
    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $type = $_GET;
    }
    $quantity = setConfig($type, 'quantity');
    $nonce = setConfig($type, 'token');

    if (!verificarNonce('tokenLista-nonce', $nonce)) {
        $data = ['code' => 'no_verify_nonce', 'message' => 'Nonce não corresponde.', 'data' => array('status' => '200')];
    } else {

        $results = new WP_Query(
            [
                'post_type'       => 'product',
                'posts_per_page'  => -1,
                'post_status'     => 'publish',
                'order'           => 'DESC',
            ]
        );

        if (!empty($results->posts)) {
            $data = [];

            foreach ($results->posts as $p) {

                $product_id = $p->ID;

                $found = false;
                if (is_null($woocommerce->cart)) {
                    wc_load_cart();
                }

                WC()->cart->generate_cart_id($product_id);
                if (sizeof(WC()->cart->get_cart()) > 0) {
                    foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
                        $_product = $values['data'];
                        if ($_product->get_id() == $product_id)
                            $found = true;
                    }

                    if (!$found)
                        WC()->cart->generate_cart_id($product_id);
                    WC()->cart->add_to_cart($product_id, $quantity);
                    $data['codigo'] = 1;
                    $data['ID'] = $product_id;
                    $data['quantity'] = $quantity;
                    $data['count_itens'] = WC()->cart->get_cart_contents_count();
                    $data['type'] = $woocommerce->cart->get_cart_total();
                } else {

                    WC()->cart->add_to_cart($product_id, $quantity);

                    $data['codigo'] = 2;
                    $data['ID'] = $product_id;
                    $data['quantity'] = $quantity;
                    $data['count_itens'] = WC()->cart->get_cart_contents_count();
                    $data['type'] = $woocommerce->cart->get_cart_total();
                }
            }
        }
    }
    return $data;
    exit;
}

// Remove the REST API lines from the HTML Header
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

remove_action('rest_api_init', 'wp_oembed_register_route');

add_filter('embed_oembed_discover', '__return_false');

remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

add_action('rest_api_init', function () {
    /* Add to cart product api */
    register_rest_route('v1', 'add_to_cart_product/', [
        'methods' => 'POST',
        'callback' => 'add_to_cart_product',

        'permission_callback' => '__return_true',
    ]);
});
