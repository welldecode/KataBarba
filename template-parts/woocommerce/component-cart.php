<section class="cart_block_container">
    <div class="cart_block_content">
        <div class="title_block_cart">
            <div class="title_header">
                <h1>Carrinho de Compras</h1>
                <div class="close-cart"> <img src="<?= THEME_URI ?>/assets/img/woocommerce/close-circle-line.svg" alt=""></div>
            </div>
            <span>(2 Itens)</span>
        </div>
        <?php
        global $woocommerce;
        $items = $woocommerce->cart->get_cart();

        ?>

        <?php

        foreach ($items as $item => $values) {
            $_product = wc_get_product($values['data']->get_id());
            $product_id   = apply_filters('woocommerce_cart_item_product_id', $values['product_id'], $values, $item);

        ?>

            <div class="cart_block_item">
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
                            <span><?php echo $getProductDetail->get_description(); ?></span>
                        </div>
                        <div class="quantiy_item">
                            <?php
                            if ($_product->is_sold_individually()) {
                                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $item);
                            } else {
                                $product_quantity = woocommerce_quantity_input(array(
                                    'input_name'  => "cart[{$item}][qty]",
                                    'input_value' => $values['quantity'],
                                    'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                    'min_value'   => '0'
                                ), $_product, false);
                            }

                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $item, $values);
                            ?>
                            <?php
                            echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">Remover</a>',
                                esc_url(WC()->cart->get_remove_url($item)),
                                __('Remove this item', 'woocommerce'),
                                esc_attr($product_id),
                                esc_attr($_product->get_sku())
                            ), $item);
                            ?></div>
                        <div class="info_price_item">
                            R$ <?php echo get_post_meta($values['product_id'], '_price', true); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

        <div class="depoiments_clients">
            <section class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="item_slide">
                                <div class="info_title">
                                    <figure>
                                        <img src="<?= THEME_URI ?>/assets/img/icons/user_kata.svg" alt="user_kata">
                                    </figure>
                                    <span>Lorraine</span>
                                </div>
                                <p class="info_description">
                                    Mussum Ipsum, cacilds vidis litro abertis. Per aumento de cachacis, eu reclamis.Viva Forevis aptent taciti sociosqu ad litora torquent.Tá deprimidi.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <div class="cart-price">
            <?php if (WC()->cart->wc_coupons_enabled()) { ?>
                <div class="cart-cupom">
                    <span>Digite seu Cupom</span>
                    <input type="text">
                </div>
            <?php } ?>
        </div>
        <div class="footer_cart">
            <a href="#" class="btn_continue">Finalizar Compra > <?= $woocommerce->cart->get_cart_total()  ?> BLR</a>
            <a href="#" class="btn_cancel">Cancelar compra</a>
            <p>Taxas e envio calculados no final</p>
        </div>
    </div>
</section>