<?php
/**
 * Template Name: Perfil
 */

soloUsuarioRegistrado(); 
get_header(); 
$api = datosApi();
//echo '<pre style="display:block;">'; print_r($api); echo '</pre>'; 
?>

<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  

<!-- CONTENIDO -->
<section class="content perfil">

    <?php while ( have_posts() ) : the_post(); ?>
            
        <h1 class="title"><?php the_title(); ?></h1>
            
        <?php the_content(); ?>    

		<section class="datos-api">
			<h2 class="subtitulo col-md-12">Datos personales</h2>	
			<div class="bloque-info row">   
                <p class="col-md-12"><strong>Nombre:</strong> <?php echo $api[nombre] . ' ' . $api[apellido]; ?></p>
				<p class="col-md-4"><strong>Usuario:</strong> <?php echo $api[usuario]; ?></p>
                <p class="col-md-4"><strong>Correo Electrónico:</strong> <?php echo $api[email]; ?></p>
                <p class="col-md-4"><strong>Whatsapp:</strong> <?php echo $api[whatsapp]; ?></p>
                <p class="col-md-4"><strong>Calle y número:</strong> <?php echo $api[calle]; ?></p>
                <p class="col-md-4"><strong>Colonia:</strong> <?php echo $api[colonia]; ?></p>
                <p class="col-md-4"><strong>Ciudad:</strong> <?php echo $api[ciudad]; ?></p>
                <p class="col-md-4"><strong>Código postal:</strong> <?php echo $api[cp]; ?></p>
                <p class="col-md-4"><strong>Estado:</strong> <?php echo $api[estado]; ?></p>
                <p class="col-md-4"><strong>País:</strong> <?php echo $api[pais]; ?></p>
			</div>

            <h2 class="subtitulo col-md-12">Datos bancarios</h2>	
			<div class="bloque-info row">
                <p class="col-md-4"><strong>Banco:</strong> <?php echo $api[banco]; ?></p>
                <p class="col-md-4"><strong>CLABE:</strong> <?php echo $api[clabe]; ?></p>
                <p class="col-md-4"><strong>Paypal:</strong> <?php echo $api[paypal]; ?></p>
                <p class="col-md-4"><strong>RFC:</strong> <?php echo $api[rfc]; ?></p>
            </div>	

		</section>


    <?php endwhile; // end of the loop. ?>


</section>

<?php get_footer(); ?>