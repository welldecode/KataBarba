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
    <section class="checkout container">
        <div class="checkout_content"></div>
        <?php
        the_content(); ?>
        </section>
</main>

<script>
    const base_url = '<?php echo get_site_url(); ?>';
</script>

<?php get_template_part('template-parts/woocommerce/component', 'cart'); ?>
<?php wp_footer(); ?>

</body>

</html>