<?php get_header(); 
if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
<div class="postI"> 
  	<?php the_content(); ?> 

  <?php do_shortcode('[calculadora_melhor_envio product_id="14"]'); ?>
  <div class="clear"></div>
</div>
<?php }}  get_footer(); ?>