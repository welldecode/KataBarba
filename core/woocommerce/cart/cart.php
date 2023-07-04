<?php



function woocommerce_ajax_add_to_cart()
{

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX::get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        wp_send_json($data);
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
         if ( $_product->is_sold_individually() ) {
            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $item );
        } else {
            $product_quantity = woocommerce_quantity_input( array(
                'input_name'  => "cart[{$item}][qty]",
                'input_value' => $values['quantity'],
                'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                'min_value'   => '0'
            ), $_product, false );
        }
        $data['btn_quantity']  = apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $item, $values );
        wp_send_json($data);
    }
}
add_action('wp_ajax_woocommerce_ajax_get_cart', 'woocommerce_ajax_get_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_get_cart', 'woocommerce_ajax_get_cart');
