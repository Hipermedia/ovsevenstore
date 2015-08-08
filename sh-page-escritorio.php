<?php
/**
 * Template Name: Escritorio
 */

soloUsuarioRegistrado(); 
get_header(); 

$api = datosApi();
//echo '<pre style="display:block;">'; print_r($api); echo '</pre>'; 
?>

<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  

<!-- CONTENIDO -->
<section class="content escritorio">
	
    <?php while ( have_posts() ) : the_post(); ?>
            
            <h1 class="title"><?php the_title(); ?></h1>
            
            <?php the_content(); ?>    

    <?php endwhile; // end of the loop. ?>
	
	<!-- Artículos en portada -->
    <?php 
        $catid = get_ot('categoria_portada', ''); 
        $post_per_page = 2; 
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
                <?php print_ot('titulo_categoria_portada', ''); ?>
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