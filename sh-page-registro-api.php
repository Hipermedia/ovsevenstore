<?php
/**
 * Template Name: Registro API
 */

soloUsuarioRegistrado(); 
acf_form_head();
$user_ID = get_current_user_id();

get_header(); 
?>

<!-- CONTENIDO -->
<section class="content registro-api">
	
    <?php while ( have_posts() ) : the_post(); ?>
            
        <h1 class="title"><?php the_title(); ?></h1>
            
        <?php the_content(); ?>   

    	<?php // Formulario ACF
    		$options = array(
			'post_id'		=> 'user_' . $user_ID,
			'post_title'	=> true,
			'field_groups'	=> array(
									1895,
									),
			'updated_message' => 'Información actualizada',
			'submit_value'	=> 'Finalizar',
			);
		?>		
		<?php acf_form($options); ?>                

    <?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>