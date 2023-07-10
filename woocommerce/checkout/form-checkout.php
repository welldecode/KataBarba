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

echo '<div class="row">';
do_action('woocommerce_before_checkout_form', $checkout);
echo '</div>';

// If checkout registration is disabled and not logged in, the user cannot checkout
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo apply_filters('woocommerce_checkout_must_be_logged_in_message', esc_html__('You must be logged in to checkout.', 'martfury'));

    return;
}

?>asdadds
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Sign Up Your User Account</h2>
                <p>Fill all form field to go to next step</p>

                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                        <!-- progressbar -->
                        <ul id="progressbar">
                        <li class="active" id="billing"><strong>Cobrança Envio</strong></li>
                        <li id="payment"><strong>Pagamento</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-woo-checkout-details">
                            <?php if ($checkout->get_checkout_fields()) : ?>

                                <?php do_action('woocommerce_checkout_before_customer_details'); ?>

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
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                    <div class="col-xs-12 col-sm-12 col-md-5">
                            <h3 id="order_review_heading"><?php esc_html_e('Your order', 'martfury'); ?></h3>

                            <?php do_action('woocommerce_checkout_before_order_review'); ?>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <?php do_action('woocommerce_checkout_order_review'); ?>
                            </div>

                            <?php do_action('woocommerce_checkout_after_order_review'); ?>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div>

                        </div>
                    </fieldset>  

                </form>
                 
            </div>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>