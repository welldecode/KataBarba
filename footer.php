 <script>
     const base_url = '<?php echo get_site_url(); ?>';
 </script>

 <?php
    if (is_home() || is_front_page()) { ?>
     <footer>
         <div class="footer container">
             <div class="footer_row">
                 <div class="image_footer">
                     <img src="<?= THEME_URI ?>/assets/img/icons/bear.svg" alt="bear katabarba">
                     <span>Otimizando tempo, acabando com a sujeira e salvando casamentos em todo o Brasil.</span>
                 </div>
                 <p>Katabarba © Copyright 2023 Todos os direitos reservados.</p>
             </div>
             <div class="footer_row">
                 <ul>
                     <li><a href="#">Sobre o Katabarba</a></li>
                     <li><a href="#">Sobre o Katabarba</a></li>
                     <li><a href="#">Sobre o Katabarba</a></li>
                     <li><a href="#">Sobre o Katabarba</a></li>
                     <li><a href="#">Sobre o Katabarba</a></li>
                 </ul>
             </div>
             <div class="footer_row" style="<?php echo wp_is_mobile() ? 'display: none' : 'display: block'; ?>">
                 <h1>Instagram</h1>
                 <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
             </div>

             <div class="footer_row">
                 <h2>Siga nas redes sociais</h2>
                 <ul class="icons_social">
                     <li><a href="#"><img src="<?= THEME_URI ?>/assets/img/icons/icon_facebook.svg" alt="facebook"></a></li>
                     <li><a href="#"><img src="<?= THEME_URI ?>/assets/img/icons/icon_instagram.svg" alt="instagram"></a></li>
                     <li><a href="#"><img src="<?= THEME_URI ?>/assets/img/icons/icon_tiktok.svg" alt="tiktok"></a></li>
                 </ul>
                 <div class="email_link">
                     <h2>E-mail</h2>
                     <a href="#">oi@katabarba.com.br</a> 
                 </div>
             </div>
         </div>
     </footer>
 <?php } ?>

 <?php 
 if(!is_page(66)) { get_template_part('core/woocommerce/templates/cart'); }?>

<div class="cursor"></div>
<div class="cursor2"></div>
 <?php wp_footer(); ?>
 </body>

 </html>