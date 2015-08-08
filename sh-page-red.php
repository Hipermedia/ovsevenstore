<?php
/**
 * Template Name: Red
 */

soloUsuarioRegistrado(); 
get_header(); ?>

<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  

<!-- CONTENIDO -->
<section class="content">

    <?php while ( have_posts() ) : the_post(); ?>
            
            <h1 class="title"><?php the_title(); ?></h1>
            
            <?php the_content(); ?>                      

    <?php endwhile; // end of the loop. ?>


</section>

<?php get_footer(); ?>