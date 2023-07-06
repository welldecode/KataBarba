 <?php get_header(); ?> 
 <?php global $post, $woocommerce; ?>
 <div id="wrapper">
     <div class="container">
         <div class="row">
 

             <div id="main" class="<?php echo 'full_width_layout' == $presentation_options['layout'] || get_post_meta(get_the_ID(), 'standard_seo_post_level_layout', true) ? 'span12 fullwidth' : 'span8'; ?> clearfix" role="main">
 

                 <?php woocommerce_single_product_content(); ?>
 
             </div><!-- /#main -->
 

         </div> <!-- /row -->
     </div><!-- /container -->
 </div> <!-- /#wrapper -->
 <?php get_footer(); ?>