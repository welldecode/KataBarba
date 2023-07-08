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
                 <?php echo do_shortcode('[woocommerce_checkout]'); ?>
             </div>
             <div class="checkout_items">
                 <div class="checkout_items_content">
                     <table class="shop_table woocommerce-checkout-review-order-table"></table>
                 </div>
             </div>
         </div>
     </section>
 </main>

 <script>
     const base_url = '<?php echo get_site_url(); ?>';
 </script>

 <?php wp_footer(); ?>

 </body>

 </html>