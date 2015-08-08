<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage SH_Base
 */

soloUsuarioRegistrado(); 
get_header(); ?>

        <section class="login-home content-medium">
                <?php $args = array(
                    'echo'           => true,
                    'redirect'       => site_url( '/escritorio' ), 
                    'form_id'        => 'loginform',
                    'label_username' => __( 'Email' ),
                    'label_password' => __( 'Password' ),
                    'label_remember' => __( 'Remember Me' ),
                    'label_log_in'   => __( 'Log In' ),
                    'id_username'    => 'user_login',
                    'id_password'    => 'user_pass',
                    'id_remember'    => 'rememberme',
                    'id_submit'      => 'wp-submit',
                    
                    'remember'       => false,
                    'value_username' => NULL,
                    'value_remember' => false
                ); ?>

                    <h2>Oficina Virtual</h2>
                    <?php 
                        $args = array(
                                    'form_id'        => 'loginform-home',
                                    'label_username' => __( 'Número de teléfono' ),
                                    'label_password' => __( 'Contraseña' ),
                                    'label_remember' => __( 'Recuérdame' ),
                                    'label_log_in'   => __( 'Ingresar' )
                            );
                    wp_login_form( $args ); ?>
                    <h4>Si aún no tienes cuenta de usuario <a href="<?php bloginfo( 'url' ); ?>/alta-api/"><strong>regístrate aquí</strong></a></h4>
                    <h4 class="recuperar-password"><a href="<?php echo wp_lostpassword_url(); ?>">¿perdiste tu contraseña?</a></h4>
        </section>

</section>


<?php get_footer(); ?>