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

            foreach ($items as $item => $values) {
                $_product = wc_get_product($values['data']->get_id());
            ?>

                <div class="cart_block_item">
                    <a href="#">
                        <div class="info_item">
                            <figure>
                                <?php
                                $getProductDetail = wc_get_product($values['product_id']);
                                echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
                                ?>
                            </figure>
                            <div class="info">
                                <div class="info_title">
                                    <h2><?php echo $_product->get_title(); ?></h2>
                                    <span>Descrição</span>
                                </div>
                                <div class="info_price_item">
                                    <?php echo get_post_meta($values['product_id'], '_price', true); ?>
                                    <div class="quantity">

                                        <span>-</span>
                                        <span>1</span>
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </a>
                </div>

            <?php
            }
            ?>
        </div>
        <div class="cart-price">
            <div class="cart-subtotal">
                <span>Total:</span>
                <div class="value_total">asd</div>
            </div>
            <div class="cart-cupom">
                <input type="text">
                <span>Digite seu Cupom</span>
            </div>

        </div>
        <div class="footer_cart">

            <a href="#" class="btn_continue">Continuar Comprando</a>
            <a href="#" class="btn_cancel">Cancelar compra</a>
        </div>
    </div>
</section>