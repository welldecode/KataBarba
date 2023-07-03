<?php


function add_to_cart_product()
{ 

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

        $data = [];
    }
    return $data;
    exit;
}
