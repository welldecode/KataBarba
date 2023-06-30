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
                    <li>Carrinho</li>
                    <li>Carrinho</li>
                </ul>
                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="http://localhost/temas_wordpress/katabarba/index.php/checkout/" enctype="multipart/form-data">
                    <div id="wc-stripe-payment-request-wrapper" style="clear:both;padding-top:1.5em;display:none;">
                        <div id="wc-stripe-payment-request-button"></div>
                    </div>
                    <div class="col2-set" id="customer_details">
<div class="col-1">
<div class="woocommerce-billing-fields">
<h3>Detalhes de faturamento</h3>
<div class="woocommerce-billing-fields__field-wrapper">
</div>
</div>
</div>
<div class="col-2">
<div class="woocommerce-shipping-fields">
</div>
<div class="woocommerce-additional-fields">
<h3>Informação adicional</h3>
<div class="woocommerce-additional-fields__field-wrapper">
</div>
</div>
</div>
</div>
                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Finalizar pedido" data-value="Finalizar pedido">Finalizar pedido</button>

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

                </div>

            <?php
                    }
            ?>
            </div>
        </div>
        </div>
    </section>
</main>

<script>
    const base_url = '<?php echo get_site_url(); ?>';
</script>

<?php get_template_part('template-parts/woocommerce/component', 'cart'); ?>
<?php wp_footer(); ?>

</body>

</html>