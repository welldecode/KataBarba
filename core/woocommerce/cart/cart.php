<?php



function woocommerce_ajax_add_to_cart()
{

    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $data = [];

    if (is_null(WC()->cart)) {
        wc_load_cart();
    }
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
            if (WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id($product_id))) {

                foreach (WC()->cart->get_cart() as $cart_item) {
                    WC()->cart->set_quantity($cart_item['key'], $quantity);

                    $data['codigo'] = 1;
                    $data['ID'] = $product_id;
                    $data['quantity'] = $quantity;
                    $data['count_itens'] = WC()->cart->get_cart_contents_count();
                    $data['type'] = WC()->cart->get_cart_total();

                    wp_send_json($data);
                    return;
                }
            }
            if (WC()->cart->add_to_cart($product_id, $quantity)) {

                $data['codigo'] = 1;
                $data['ID'] = $product_id;
                $data['quantity'] = $quantity;
                $data['count_itens'] = WC()->cart->get_cart_contents_count();
                $data['type'] = WC()->cart->get_cart_total();

                wp_send_json($data);
            } else {
                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
                );
                wp_send_json($data);
            }
        }
    }

    wp_die();
}
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');


function woocommerce_ajax_get_cart()
{
    global $woocommerce;
    $data = [];

    if (is_null($woocommerce->cart)) {
        wc_load_cart();
    }

    if (sizeof($woocommerce->cart->get_cart()) == 0) {
        $data['empty'] = "Email incorreto ou não existe!";
        wp_send_json($data);
        return;
    }

    foreach ($woocommerce->cart->get_cart() as $item => $values) {
        $_product = apply_filters('woocommerce_cart_item_product', $values['data'], $values, $item);

        $data['cart'][] = [
            'id' => $_product->get_id(),
            'product_id' => $item,
            'name' => $_product->get_title(),
            'description' => $_product->get_description(),
            'image' => $_product->get_image(),
            'quantity' => $values['quantity'],
            'price' => WC()->cart->get_cart_total(),
            'date' => get_the_date('d/m/Y', $values['product_id']),

        ];
        $data['btn_remove'] =  apply_filters('woocommerce_cart_item_remove_link', sprintf(
            '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">Remover</a>',
            esc_url(wc_get_cart_remove_url($item)),
            __('Remove this item', 'woocommerce'),
            esc_attr($_product->get_id()),
            esc_attr($_product->get_sku())
        ), $item);
        if ($_product->is_sold_individually()) {
            $product_quantity = sprintf('1x', $item);
        } else {
            $product_quantity = woocommerce_quantity_input(array(
                'input_name'  => "cart[{$item}][qty]",
                'input_value' => $values['quantity'],
                'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                'min_value'   => '0'
            ), $_product, false);
        }
        $data['btn_quantity'] = $values['quantity'];
        wp_send_json($data);
    }
}
add_action('wp_ajax_woocommerce_ajax_get_cart', 'woocommerce_ajax_get_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_get_cart', 'woocommerce_ajax_get_cart');

function woocommerce_ajax_get_coupon()
{
    global $woocommerce;

    $data = [];

    if (is_null($woocommerce->cart)) {
        wc_load_cart();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST;
    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $type = $_GET;
    }
    $couponcode = setConfig($type, 'coupon_code');

    // Initializing variables 
    $applied_coupons  = $woocommerce->cart->get_applied_coupons();

    if (!wc_get_coupon_id_by_code($couponcode)) {
        $data['msg'] = 'Esse cupom não existe.';
        wp_send_json($data);
        return;
    }

    if ($woocommerce->cart->has_discount(sanitize_text_field($couponcode))) {
        $woocommerce->cart->remove_coupons(sanitize_text_field($couponcode));
    }

    if ($woocommerce->cart->add_discount(sanitize_text_field($couponcode))) {
        $woocommerce->cart->calculate_totals();
        $data['msg'] = 'Seu cupom foi aplicado com sucesso!';
        wp_send_json($data);
    } else {
        $woocommerce->cart->calculate_totals();
        $data['msg'] = 'Seu cupom foi aplicado automaticamente.';
        wp_send_json($data);
    }
}

add_action('wp_ajax_woocommerce_ajax_get_coupon', 'woocommerce_ajax_get_coupon');
add_action('wp_ajax_nopriv_woocommerce_ajax_get_coupon', 'woocommerce_ajax_get_coupon');

function woocommerce_ajax_remove_coupon()
{
    global $woocommerce;

    $data = [];

    if (is_null($woocommerce->cart)) {
        wc_load_cart();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST;
    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $type = $_GET;
    }
    $couponcode = setConfig($type, 'coupon_code');

    // Initializing variables 
    $applied_coupons  = $woocommerce->cart->get_applied_coupons();
    $woocommerce->cart->add_discount($couponcode);

    if ($woocommerce->cart->has_discount(sanitize_text_field($couponcode))) {
        $woocommerce->cart->remove_coupons(sanitize_text_field($couponcode));
        $woocommerce->cart->calculate_totals();
        $data['msg'] = 'Seu cupom foi removido com sucesso!';
        wp_send_json($data);
    }
}


add_action('wp_ajax_woocommerce_ajax_remove_coupon', 'woocommerce_ajax_remove_coupon');
add_action('wp_ajax_nopriv_woocommerce_ajax_remove_coupon', 'woocommerce_ajax_remove_coupon');



function woocommerce_ajax_quantity_to_cart()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    global $woocommerce;
    global $product;

    $quantity = $_POST['quantity'];
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
            $product = wc_get_product($p->ID);

            $product_p = $product->get_price();
            $price_quantity = $product_p * $quantity;

            $data['codigo'] = 1;
            $data['quantity'] = $quantity;
            $data['type'] = 'R$ ' . number_format($price_quantity, 2, ',', '.');
            wp_send_json($data);
            return;
        }
    }
}


add_action('wp_ajax_woocommerce_ajax_quantity_to_cart', 'woocommerce_ajax_quantity_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_quantity_to_cart', 'woocommerce_ajax_quantity_to_cart');
