<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<main>
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
        <section class="checkout">
            <div class="checkout_content container">
                <div class="checkout_woocommerce">
                    <a href="<?php echo get_home_url() ?>" class="logo_top"> <img class="logo_kata" src="<?= THEME_URI ?>/assets/img/icons/kata_logo.svg"></a>

                    <!-- progressbar -->
                    <div class="progress">
                        <div class="checkout_info_mobile_container">
                            <div class="checkout_info_mobile">
                                <div class="item_left">
                                    <div class="icon_cart"><img src="<?= THEME_URI ?>/assets/img/icons/cart-icon.svg" alt="cart"></div> Exibir resumo da compra
                                </div>
                                <div class="price_info_m"><?= WC()->cart->get_cart_total(); ?></div>

                            </div>

                        </div>
                        <ul id="progressbar">
                            <a href="<?php echo get_home_url() ?>"> <img class="logo_kata" src="<?= THEME_URI ?>/assets/img/icons/kata_logo.svg"></a>
                            <li class="active" id="billing">Informações & Frete</li>
                            <li id="payment">Pagamento</li>
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">

                                    <fieldset>
                                        <div class="col-xs-12 col-sm-12 col-md-7 col-woo-checkout-details">
                                            <?php if ($checkout->get_checkout_fields()) : ?>
                                                <div id="customer_details">
                                                    <div class="checkout-billing">
                                                        <?php do_action('woocommerce_checkout_billing'); ?>
                                                    </div>

                                                    <div class="checkout-shipping">
                                                        <?php do_action('woocommerce_checkout_shipping'); ?>
                                                    </div>
                                                </div>

                                                <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                                            <?php endif; ?>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Ir para pagamento" />
                                        <div class="checkout_info_mobile_content">
                                            <?php do_action('woocommerce_checkout_order_review'); ?>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="col-xs-12 col-sm-12 col-md-5">
                                            <?php do_action('woocommerce_checkout_before_order_review'); ?>

                                            <?php do_action('woocommerce_checkout_before_customer_details'); ?>


                                            <?php do_action('woocommerce_checkout_after_order_review'); ?>
                                        </div>
                                        <input type="button" name="Voltar para informações" class="previous action-button-previous" value="Voltar para informações" />
                                    </fieldset>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms_content">
                        <div class="left_items">
                            <a href="#">Política de reembolso</a>
                            <a href="#">Política de privacidade</a>
                        </div>
                        <div class="right_items">
                            <ul>
                                <li><img src="<?= THEME_URI ?>/assets/img/woocommerce/mercado-pago.svg" alt="mercadopago"></li>
                                <li><img src="<?= THEME_URI ?>/assets/img/woocommerce/certificate.svg" alt="certificate"></li>
                                <li><img src="<?= THEME_URI ?>/assets/img/woocommerce/payment.svg" alt="payment"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="checkout_items">
                    <div class="checkout_items_content">
                        <?php do_action('woocommerce_checkout_order_review'); ?>
                    </div>
                </div>

            </div>
        </section>
    </form>
</main>


<?php do_action('woocommerce_after_checkout_form', $checkout); ?>