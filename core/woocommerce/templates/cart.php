<?php $editables = get_itens('editables'); ?>

<section class="cart_block_container">
    <div class="cart_block_content">
        <div class="title_block_cart" data-secury="<?= criarNonce('tokenCart-nonce'); ?>">
            <div class="title_header">
                <h1>Carrinho de Compras</h1>
                <div class="close-cart"><img src="<?= THEME_URI ?>/assets/img/woocommerce/close-circle-line.svg" alt="close_cart"></div>
            </div>
        </div>

        <div class="item_lists"></div>

        <section class="depoiments_clients">
            <div class="depoiments_cart">
                <div class="swiper depoiments_cart_slide">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($editables['depoiments']['itens'] as $depoiments) :
                        ?>
                            <div class="swiper-slide">
                                <div class="item_slide">
                                    <div class="info_title">
                                        <figure>
                                            <img src="<?= THEME_URI ?>/assets/img/icons/user_kata.svg" alt="user_kata" width="60px" height="60px">
                                        </figure>
                                        <span><?= $depoiments['title'] ?></span>
                                    </div>
                                    <p class="info_description">
                                        <?= $depoiments['subtitle'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
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
                                        <input type="text" id="coupon_code_valid" value="<?php echo $coupon_code ?>" placeholder="Insira aqui.">
                                        <div class="remove_coupon"> <img src="<?= THEME_URI ?>/assets/img/icons/close-circle-line.svg" alt=""></div>
                                    <?php
                                    }
                                } else { ?>
                                    <input type="text" id="coupon_code" placeholder="Insira aqui.">
                                    <div class="remove_coupon" style="display: none"> <img src="<?= THEME_URI ?>/assets/img/icons/close-circle-line.svg" alt=""></div>
                                <?php } ?>
                                <div class="apply_cupom" type="submit" id="apply_coupon">Aplicar</div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
            <div class="msg_cart"></div>
        </div>
        <div class="footer_cart">
            <a href="<?php echo wc_get_checkout_url(); ?>" class="btn_continue">Finalizar Compra > <?= WC()->cart->get_cart_total()  ?> BLR</a>
            <div href="#" class="btn_cancel close-cart">Cancelar compra</div>
            <p>Taxas e envio calculados no final</p>
        </div>
</section>
</section>