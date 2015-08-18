<?php
/**
 * Template Name: Capacitación
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

    	<!-- Artículos en portada -->
        <?php 
            $catid = 10; 
            $post_per_page = 8; 
            //Consulta
            $args = array( 
                'cat' => $catid, 
                'posts_per_page' => $post_per_page, 
                'paged' => get_query_var('paged'), 
                );
            $consulta = new WP_Query( $args );
        ?> 
        <?php if ( $consulta ->have_posts() ) :   ?>
            <section class="articulos">
                
                <h2 class="subtitulo">
                    Últimas noticias
                </h2>
                
                <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>                         
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>                

                <?php the_numbered_nav(); ?>        

            </section>

        <?php endif; ?>
    	<?php wp_reset_query(); ?>


</section>
<?php get_footer(); ?>