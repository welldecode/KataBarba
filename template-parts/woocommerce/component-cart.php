<section class="cart_block_container">
    <div class="cart_block_content">
        <div class="topo_block_content">
            <div class="title_block_cart">
                <h1>Carrinho de Compras</h1> 
                <img src="<?= THEME_URI ?>/assets/img/woocommerce/close-circle-line.svg" alt="">
            </div>
            <?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

        foreach($items as $item => $values) { 
            $_product =  wc_get_product( $values['data']->get_id() );
            //product image
            $getProductDetail = wc_get_product( $values['product_id'] );
            echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )

            echo "<b>".$_product->get_title() .'</b>  <br> Quantity: '.$values['quantity'].'<br>'; 
            $price = get_post_meta($values['product_id'] , '_price', true);
            echo "  Price: ".$price."<br>";
            /*Regular Price and Sale Price*/
            echo "Regular Price: ".get_post_meta($values['product_id'] , '_regular_price', true)."<br>";
            echo "Sale Price: ".get_post_meta($values['product_id'] , '_sale_price', true)."<br>";
        }
?>
            <div class="cart_block_item">
                <a href="#">
                    <div class="info_item">
                        <h2>Item</h2>
                        <span>Descrição</span>
                    </div>
                    <div class="info_price_item">
                        R$ 00,00
                    </div>
                </a>
            </div>
        </div>
        <div class="footer_cart">
            <a href="#" class="btn_continue">Continuar Comprando</a>
            <a href="#" class="btn_cancel">Cancelar compra</a>
        </div>
    </div>
</section>