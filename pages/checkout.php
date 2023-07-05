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

<form id="order_review" method="post">
 

	<div id="payment"> 
		<ul class="payment_methods methods">
			<?php
				if ( $available_gateways = WC()->payment_gateways->get_available_payment_gateways() ) {
					// Chosen Method
					if ( sizeof( $available_gateways ) ) {
						current( $available_gateways )->set_current();
					}

					foreach ( $available_gateways as $gateway ) {
						?>
						<li class="payment_method_<?php echo $gateway->id; ?>">
							<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
							<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
							<?php
								if ( $gateway->has_fields() || $gateway->get_description() ) {
									echo '<div class="payment_box payment_method_' . $gateway->id . '" style="display:none;">';
									$gateway->payment_fields();
									echo '</div>';
								}
							?>
						</li>
						<?php
					}
				} else {

					echo '<p>' . __( 'Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) . '</p>';

				}
			?>
		</ul> 
		<div class="form-row">
			<?php wp_nonce_field( 'woocommerce-pay' ); ?>
			<?php
				$pay_order_button_text = apply_filters( 'woocommerce_pay_order_button_text', __( 'Pay for order', 'woocommerce' ) );

				echo apply_filters( 'woocommerce_pay_order_button_html', '<input type="submit" class="button alt" id="place_order" value="' . esc_attr( $pay_order_button_text ) . '" data-value="' . esc_attr( $pay_order_button_text ) . '" />' );
			?>
			<input type="hidden" name="woocommerce_pay" value="1" />
		</div>

	</div>
    <li class="payment_method_<?php echo $gateway->id; ?>">
	<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />

	<label for="payment_method_<?php echo $gateway->id; ?>">
		<?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?>
	</label>
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo $gateway->id; ?>" <?php if ( ! $gateway->chosen ) : ?>style="display:none;"<?php endif; ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>
</form>
<script>
    const base_url = '<?php echo get_site_url(); ?>';
</script>

<?php wp_footer(); ?>

</body>

</html>