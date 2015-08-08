<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */

get_header(); ?>

	<!-- SIDENAV -->
	<?php get_template_part( 'content', 'sidenav' ); ?>  

	<section class="content">

		    <article class="single">
				
				<h1><?php _e( 'Parece que no podemos encontrar lo que estás buscando.', 'shbase' ); ?></h1>
				
			</article><!-- .single ?> -->

	</section><!-- .content -->

<?php get_footer(); ?>