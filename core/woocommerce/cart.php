<?php


function list_item_cart()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    header('Content-Type: application/json;charset=utf-8');

    $data = [];

    if (!verificarNonce('tokenCart-nonce', setConfig($_GET, 'token'))) {
        $data = ['code' => 'no_verify_nonce', 'message' => 'Nonce não corresponde.', 'data' => array('status' => '200')];
    } else {

        global $woocommerce;

        if (is_null($woocommerce->cart))  wc_load_cart(); 
     

        foreach ($woocommerce->cart->get_cart() as $item => $values) {

            WC()->cart->generate_cart_id($item);
            $_product = wc_get_product($values['data']->get_id());
  
            $data['codigo'] = 2;
            $data['cart'][] = [
                'id' => $_product->get_id(),
                'product_id' => $item,
                'name' => $_product->get_title(),
                'description' => $_product->get_description(),
                'image' => $_product->get_image(),
                'quantity' => $values['quantity'],
                'price' => $woocommerce->cart->get_cart_total(),
                'remove_btn' =>  apply_filters('woocommerce_cart_item_remove_link', sprintf(
                    '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">Remover</a>',
                    esc_url(wc_get_cart_remove_url($item)),
                    __('Remove this item', 'woocommerce'),
                    esc_attr($product_id),
                    esc_attr($_product->get_sku())
                ), $item),
                'date' => get_the_date('d/m/Y', $values['product_id'])
            ];
        }
    } 
    return $data; 
}
