<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  

<section class="content">

	<?php while ( have_posts() ) : the_post(); ?>
	     	<article class="single">
				
				<h1 class="title"><?php the_title(); ?></h1>
			
				<?php the_content(); ?>	
			    
				<?php the_social_share(); ?>
	   
		</article><!-- .single ?> -->
	<?php endwhile; // end of the loop. ?>
	

</section><!-- .content -->

<?php get_footer(); ?>