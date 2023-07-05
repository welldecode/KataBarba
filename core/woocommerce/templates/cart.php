<section class="cart_block_container">
    <div class="cart_block_content">
        <div class="title_block_cart" data-secury="<?= criarNonce('tokenCart-nonce'); ?>">
            <div class="title_header">
                <h1>Carrinho de Compras</h1>
                <div class="close-cart"> <img src="<?= THEME_URI ?>/assets/img/woocommerce/close-circle-line.svg" alt="close_cart"></div>
            </div>

        </div>

        <div class="msg_cart"></div>
        <?php

        global $woocommerce;
        $items = $woocommerce->cart->get_cart();

        ?>

        <div class="item_lists"></div>

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
            <?php if (wc_coupons_enabled()) { ?>
                <form action="#">
                    <div class="cart-cupom">
                        <div class="inputs">
                            <span>Digite seu Cupom</span>
                            <div class="input_group">
                                <?php
                                $applied_coupons = WC()->cart->get_applied_coupons(); 
                                if (sizeof($applied_coupons) > 0) { 
                                    foreach ($applied_coupons as $coupon_code) {
                                ?>
                                        <input type="text" id="coupon_code_valid" value="<?php echo $coupon_code ?>" placeholder="Digite seu cupom.">
                                        <div class="remove_coupon"> <img src="<?= THEME_URI ?>/assets/img/icons/close-circle-line.svg" alt=""></div>
                                    <?php
                                    }
                                } else { ?>
                                    <input type="text" id="coupon_code" placeholder="Digite seu cupom.">
                                    <div class="remove_coupon" style="display: none"> <img src="<?= THEME_URI ?>/assets/img/icons/close-circle-line.svg" alt=""></div> 
                                <?php } ?>
                                <div class="apply_cupom" type="submit" id="apply_coupon">Aplicar</div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
        <div class="footer_cart">

            <a href="<?php echo wc_get_checkout_url(); ?>" class="btn_continue">Finalizar Compra > <?= $woocommerce->cart->get_cart_total()  ?> BLR</a>

            <a href="#" class="btn_cancel close-cart">Cancelar compra</a>

            <p>Taxas e envio calculados no final</p>
        </div>

    </div>
</section>