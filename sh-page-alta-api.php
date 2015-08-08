<?php
/**
 * Template Name: Alta API
 * Description: A Page Template that adds a contact data via OT
 */

get_header(); ?>

<section class="content-small">
	
    <?php while ( have_posts() ) : the_post(); ?>
            
            <h1 class="title"><?php the_title(); ?></h1>
            
            <?php the_content(); ?>                      

    <?php endwhile; // end of the loop. ?>


</section>

<?php get_footer(); ?>