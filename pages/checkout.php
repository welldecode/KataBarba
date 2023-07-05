<?php
/* Template Name: Finalizar Compra */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= site_title(); ?></title>

    <!--- WP HEAD --->
    <?php wp_head(); ?>

</head>

<main>
    <section class="checkout">
        <div class="checkout_content container">
            <div class="checkout_woocommerce">
                <div class="checkout_logo"><img src="<?= THEME_URI ?>/assets/img/icons/kata_logo.svg" alt=""></div>

                <ul class="breadcrumb">
                    <li>Carrinho</li>
                    <li>Informações & Frete</li>
                    <li>Pagamento</li>
                </ul>

                <span class="title_order">Informações</span>
                <form action="#">
                    <div class="input_group">
                        <input type="email" placeholder="Seu E-mail">
                    </div>
                    <div class="input_list_group">
                        <div class="input_group">
                            <input type="text" placeholder="Nome">
                        </div>
                        <div class="input_group">
                            <input type="email" placeholder="Sobrenome">
                        </div>

                        <div class="input_group">
                            <input type="email" placeholder="CPF">
                        </div>

                        <div class="input_group">
                            <input type="number" placeholder="Telefone">
                        </div>
                    </div> <br>

                    <span class="title_order">Endereço de entrega</span>
                    
                    <div class="input_group">
                        <input type="number" placeholder="CEP">
                    </div>
                    <div class="input_list_group">
                        <div class="input_group" style="width: 67%;">
                            <input type="text" placeholder="Endereço">
                        </div>
                        <div class="input_group" style="width: 30%;">
                            <input type="number" placeholder="Numero">
                        </div>

                        <div class="input_group" style="width: 52%;">
                            <input type="text" placeholder="Bairro">
                        </div>

                        <div class="input_group" style="width: 45%;">
                            <input type="text" placeholder="Complemento">
                        </div>
                        <div class="input_group">
                            <input type="text" placeholder="Cidade">
                        </div>

                        <div class="input_group">
                            <input type="text" placeholder="Estado">
                        </div>
                    </div>
                    <div class="footer_button">
                        <a href="#">Voltar ao Carrinho</a>
                        <a href="#">Ir para Pagamento</a>
                    </div>
                </form>
            </div>
            <div class="checkout_items">
                <div class="checkout_items_content">

                    <?php
                    global $woocommerce;
                    $items = $woocommerce->cart->get_cart();

                    foreach ($items as $item => $values) {
                        $_product = wc_get_product($values['data']->get_id());
                    ?>

                        <div class="info_item">
                            <figure>
                                <?php
                                $getProductDetail = wc_get_product($values['product_id']);
                                echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
                                ?>
                                <div class="quantity">3</div>
                            </figure>
                            <div class="info">
                                <div class="info_title">
                                    <h2><?php echo $_product->get_title(); ?></h2>
                                    <span>Descrição</span>
                                </div>
                                <div class="sub_total">
                                    <span> R$ <?php echo WC()->cart->get_subtotal(); ?> </span>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <hr>

                    <div class="cupom_content">
                        <h1>Tem um cupom de desconto?</h1>
                        <div class="input_cupom">
                            <input type="text" placeholder="cartão-presente ou código de desconto">
                            <a href="#">Aplicar</a>
                        </div>
                    </div>

                    <hr>
                    <div class="price_total">
                        <div class="left_price">
                            <div class="col-1">
                                <span>SubTotal</span>
                                <span>R$ <?php echo WC()->cart->get_subtotal(); ?></span>
                            </div>
                            <div class="col-1">
                                <span>Frete</span>
                                <span>R$ <?php echo WC()->cart->get_subtotal_tax(); ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="total_order">
                        <?php echo WC()->cart->get_cart_subtotal(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="woocommerce-billing-fields">
	<?php if ( WC()->cart->ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3><?php _e( 'Billing Details', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<?php foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>

		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

	<?php endforeach; ?>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

	<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

		<?php if ( $checkout->enable_guest_checkout ) : ?>

			<p class="form-row form-row-wide create-account">
				<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce' ); ?></label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

			<div class="create-account">

				<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce' ); ?></p>

				<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

				<?php endforeach; ?>

				<div class="clear"></div>

			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

	<?php endif; ?>
</div>
<script>
    const base_url = '<?php echo get_site_url(); ?>';
</script>

<?php wp_footer(); ?>

</body>

</html>