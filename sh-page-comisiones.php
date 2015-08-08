<?php
/**
 * Template Name: Comisiones
 */

soloUsuarioRegistrado(); 
get_header(); 
$api = datosApi();
//echo '<pre style="display:block;">'; print_r($api); echo '</pre>'; 
?>

<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  

<!-- CONTENIDO -->
<section class="content comisiones">

    <?php while ( have_posts() ) : the_post(); ?>
            
        <h1 class="title"><?php the_title(); ?></h1>
            
        <?php the_content(); ?>                      
		
		<section class="datos-comisiones">
			<h2 class="subtitulo col-md-12">Ganancias</h2>	
			<div class="bloque-info row">   
                <p class="col-md-4"><strong>Básico:</strong> $<?php echo $api[cbasico]; ?></p>
                <p class="col-md-4"><strong>Premier:</strong> $<?php echo $api[cpremier]; ?></p>
                <p class="col-md-4"><strong>Plus:</strong> $<?php echo $api[cplus]; ?></p>
                <p class="col-md-4"><strong>Ultra:</strong> $<?php echo $api[cultra]; ?></p>
                <p class="col-md-4"><strong>Supremo:</strong> $<?php echo $api[csupremo]; ?></p>
                <p class="col-md-4"><strong>Master:</strong> $<?php echo $api[cmaster]; ?></p>
			</div>

            
		</section>

    <?php endwhile; // end of the loop. ?>


</section>

<?php get_footer(); ?>