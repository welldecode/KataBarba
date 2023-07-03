<?php


function list_item_cart()
{

    header('Content-Type: application/json;charset=utf-8');
    $data = [];

    if (!verificarNonce('tokenCart-nonce', setConfig($_GET, 'token'))) {
        $data = ['code' => 'no_verify_nonce', 'message' => 'Nonce não corresponde.', 'data' => array('status' => '200')];
    } else {

        global $woocommerce;

        if (is_null($woocommerce->cart))  wc_load_cart();
        if ( $woocommerce->cart->get_cart_contents_count() == 0 ) { 
            $data['codigo'] = 1;
            $data['empty'] = 'Carrinho vazio!'; 
        } else { 
        foreach ($woocommerce->cart->get_cart() as $item => $values) {

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
    }}
    return $data;
    exit;
}
