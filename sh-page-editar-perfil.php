<?php
/**
 * Template Name: Editar Perfil
 */


soloUsuarioRegistrado();
$api = datosApi(); 

if ( !empty( $_POST['first-name'] ) ) {

    wp_update_user( array( 'ID' => $api[id], 'first_name' => $_POST['first-name'] ) );
}

if ( !empty( $_POST['last-name'] ) ) {

    wp_update_user( array( 'ID' => $api[id], 'last_name' => $_POST['last-name'] ) );
}

if ( !empty( $_POST['email'] ) ) {

    wp_update_user( array( 'ID' => $api[id], 'user_email' => $_POST['email'] ) );
}

if ( !empty( $_POST['whatsapp'] ) ) {

    update_user_meta( $api[id], 'whatsappApi', $_POST['whatsapp'] );
}

if ( !empty( $_POST['calle'] ) ) {

    update_user_meta( $api[id], 'calleApi', $_POST['calle'] );
}

if ( !empty( $_POST['colonia'] ) ) {

    update_user_meta( $api[id], 'coloniaApi', $_POST['colonia'] );
}

if ( !empty( $_POST['ciudad'] ) ) {

    update_user_meta( $api[id], 'ciudadApi', $_POST['ciudad'] );
}

if ( !empty( $_POST['cp'] ) ) {

    update_user_meta( $api[id], 'cpApi', $_POST['cp'] );
}

if ( !empty( $_POST['estado'] ) ) {

    update_user_meta( $api[id], 'estadoApi', $_POST['estado'] );
}

if ( !empty( $_POST['pais'] ) ) {

    update_user_meta( $api[id], 'paisApi', $_POST['pais'] );
}

if ( !empty( $_POST['banco'] ) ) {

    update_user_meta( $api[id], 'bancoApi', $_POST['banco'] );
}

if ( !empty( $_POST['clabe'] ) ) {

    update_user_meta( $api[id], 'clabeApi', $_POST['clabe'] );
}

if ( !empty( $_POST['paypal'] ) ) {

    update_user_meta( $api[id], 'paypalApi', $_POST['paypal'] );
}

if ( !empty( $_POST['rfc'] ) ) {

    update_user_meta( $api[id], 'rfcApi', $_POST['rfc'] );
}

if ( !empty($_POST['password'] ) ) {

    wp_update_user( array( 'ID' => $api[id], 'user_pass' => $_POST['password'] ) );
}

if(isset($_POST['submit'])) {

    $mensaje = "<h3 class='subtitulo col-md-12'>Datos actualizados correctamente</h3>'";
}

get_header(); 

?>
<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  
<!-- CONTENIDO -->
<section class="content perfil">

    <?php //var_dump($api); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <h1 class="title"><?php the_title(); ?></h1>

        <?php the_content(); ?>    
        <section class="datos-api">
            <form action="" method="post">
                <?php echo $mensaje; ?>
                <h2 class="subtitulo col-md-12">Datos personales</h2>
                <div class="bloque-info row">
                <!-- <p class="col-md-3"><strong>Número de teléfono del referido:</strong> <?php //echo $api[upline]; ?></p>    -->
                
                    <p class="col-md-3">
                        <strong>Nombre(s):</strong> 
                        <input type="text" name="first-name" value="<?php echo $api[nombre]; ?>"> 
                    </p>
                    <p class="col-md-3">
                        <strong>Apellido(s):</strong> 
                        <input type="text" name="last-name" value="<?php echo $api[apellido]; ?>"> 
                    </p>
                    <p class="col-md-3">
                        <strong>Nueva Contraseña:</strong>
                        <input type="text" name="password">
                    </p>
                    <p class="col-md-3">
                        <strong>Correo Electrónico:</strong> 
                        <input type="text" name="email" value="<?php echo $api[email]; ?>">
                    </p>
                    <p class="col-md-3">
                        <strong>Whatsapp:</strong>
                        <input type="text" name="whatsapp" value="<?php echo $api[whatsapp]; ?>">
                    </p>
                    <p class="col-md-3">
                        <strong>Calle y número:</strong>
                        <input type="text" name="calle" value="<?php echo $api[calle]; ?>">
                    </p>
                    <p class="col-md-3">
                        <strong>Colonia:</strong>
                        <input type="text" name="colonia" value="<?php echo $api[colonia]; ?>">
                    </p>
                    <p class="col-md-3">
                        <strong>Ciudad:</strong>
                        <input type="text" name="ciudad" value="<?php echo $api[ciudad]; ?>">
                    </p>
                    
                    <p class="col-md-3">
                        <strong>Código postal:</strong>
                        <input type="text" name="cp" value="<?php echo $api[cp]; ?>">
                    </p>
                    
                    <p class="col-md-3">
                        <strong>Estado:</strong>
                        <input type="text" name="estado" value="<?php echo $api[estado]; ?>">
                    </p>
                    
                    <p class="col-md-3">
                        <strong>País:</strong>
                        <input type="text" name="pais" value="<?php echo $api[pais]; ?>">
                    </p>

                </div>

                <h2 class="subtitulo col-md-12">Datos bancarios</h2>    
                <div class="bloque-info row">
                    <p class="col-md-3">
                        <strong>Banco:</strong>
                        <input type="text" name="banco" value="<?php echo $api[banco]; ?>">
                    </p>
                    
                    <p class="col-md-3">
                        <strong>CLABE:</strong>
                        <input type="text" name="clabe" value="<?php echo $api[clabe]; ?>">
                    </p>
                    <p class="col-md-3">
                        <strong>Paypal:</strong>
                        <input type="text" name="paypal" value="<?php echo $api[paypal]; ?>">
                    </p>
                    <p class="col-md-3">
                        <strong>RFC:</strong>
                        <input type="text" name="rfc" value="<?php echo $api[rfc]; ?>">
                    </p>

                    <p class="col-md-5">
                        <input type="submit" name="submit" value="Actualizar Datos" class="btn btn-primary btn-round"/>
                    </p>
                </div>
            </form>
            <?php

            ?>
        </section>
    <?php endwhile; // end of the loop. ?>
</section>
<?php get_footer(); ?>
