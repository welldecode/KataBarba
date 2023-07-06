 <?php get_header(); ?> 
 <?php global $post, $woocommerce; ?>
 <div id="wrapper">
     <div class="container">
         <div class="row">
 
 

                 <?php woocommerce_single_product_content(); ?>
  

         </div> <!-- /row -->
     </div><!-- /container -->
 </div> <!-- /#wrapper -->
 <?php get_footer(); ?>