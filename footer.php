 <script>
     const base_url = '<?php echo get_site_url(); ?>';
 </script>

 <footer>
     <div class="footer container">
         <div class="footer_row">
             <img src="<?= THEME_URI ?>/assets/img/icons/bear.svg" alt="">
             <span>Otimizando tempo, acabando com a sujeira e salvando casamentos em todo o Brasil.</span>
             <p>Katabarba © Copyright 2023 Todos os direitos reservados.</p>
         </div>
         <div class="footer_row">
             <ul>
                 <li><a href="#">Sobre o Katabarba</a></li>
                 <li><a href="#">Sobre o Katabarba</a></li>
                 <li><a href="#">Sobre o Katabarba</a></li>
                 <li><a href="#">Sobre o Katabarba</a></li>
             </ul>
         </div>
         <div class="footer_row">
             <h1>Instagram</h1>
         </div>

         <div class="footer_row">

             <h2>Siga nas redes sociais</h2>
             <ul class="icons_social">
                 <li><a href="#"><img src="<?= THEME_URI ?>/assets/img/icons/icon_facebook.svg" alt=""></a></li>
                 <li><a href="#"><img src="<?= THEME_URI ?>/assets/img/icons/icon_instagram.svg" alt=""></a></li>
                 <li><a href="#"><img src="<?= THEME_URI ?>/assets/img/icons/icon_tiktok.svg" alt=""></a></li>
             </ul>
             
             <h2>E-mail</h2>
             <ul  >
                 <li><a href="#">oi@katabarba.com.br</a></li> 
             </ul>  
         </div>
     </div>
 </footer>


 <?php get_template_part('core/woocommerce/templates/cart'); ?>

 <?php wp_footer(); ?>

 </body>

 </html>