 <?php get_header(); ?> 
 <?php global $post, $woocommerce; ?>
 <?php while ( have_posts() ) : the_post(); 
 the_content( );
 
 
 ?>
 	<?php woocommerce_single_product_content(); ?>	
	

<?php endwhile; // end of the loop. ?>
 <?php get_footer(); ?>