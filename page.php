<?php
get_header(); ?>

<?php

if(have_posts(  )) {
    while(have_posts()) : the_post();

?> <br>
<br><br><br><br><br><br><br><br><br><br><br>
<div class="container"> 

<?php the_content(); ?>
</div>

<?php endwhile; } ?>


<?php get_footer(); ?>