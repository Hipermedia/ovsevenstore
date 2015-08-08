<?php
/**
 * Template Name: Red
 */

soloUsuarioRegistrado(); 
get_header(); ?>

<!-- SIDENAV -->
<?php get_template_part( 'content', 'sidenav' ); ?>  

<!-- CONTENIDO -->
<section class="Red content">

    <?php while ( have_posts() ) : the_post(); ?>
            
        <h1 class="title"><?php the_title(); ?></h1>

		<!-- TABS Header -->
		<ul class="nav nav-tabs Red-tabHeader" role="tablist">
		    <li role="presentation" class="active"><a href="#basico" aria-controls="basico" role="tab" data-toggle="tab">Básico</a></li>
		    <li role="presentation"><a href="#premier" aria-controls="premier" role="tab" data-toggle="tab">Premier</a></li>
		    <li role="presentation"><a href="#plus" aria-controls="plus" role="tab" data-toggle="tab">Plus</a></li>
		    <li role="presentation"><a href="#ultra" aria-controls="ultra" role="tab" data-toggle="tab">Ultra</a></li>
		    <li role="presentation"><a href="#supremo" aria-controls="supremo" role="tab" data-toggle="tab">Supremo</a></li>
		    <li role="presentation"><a href="#master" aria-controls="master" role="tab" data-toggle="tab">Master</a></li>
		    <li role="presentation"><a href="#emaster" aria-controls="emaster" role="tab" data-toggle="tab">eMaster</a></li>
		</ul>

		<!-- TABS Body -->
		<div class="tab-content Red-tabBody">
			<div role="tabpanel" class="tab-pane active Red-tabBodyPanel" id="basico">
				<div class="Red-plan">
					<!-- Fecha de activación -->
					<div class="Red-planActivacion">
						<i class="fa fa-calendar"></i> Fecha de tu activación: <span>12 de junio de 2015</span>
					</div>
					<!-- Comisiones del plan -->
					<div class="Red-planComisiones">
						<i class="fa fa-money"></i> Comisiones: <span>$1800</span>
					</div>
					<!-- Arbol de red -->
					<div class="Red-planArbol">
						
						<div class="nivel nivel-0">
							
							<?php redBloque(); ?>

							<div class="nivel nivel-1">
								
								<?php redBloque(); ?>
									<div class="nivel nivel-2">
										
										<?php redBloque(); ?>
											<div class="nivel nivel-3">
												<?php redBloque(); ?>
													<div class="nivel nivel-4">
														<?php redBloque(); ?>
															<div class="nivel nivel-5">
																<?php redBloque(); ?>
																	<div class="nivel nivel-6">
																		<?php redBloque(); ?>
																			<div class="nivel nivel-7">
																				<?php redBloque(); ?>

																				<?php redBloque(); ?>

																				<?php redBloque(); ?>
																			</div>

																		<?php redBloque(); ?>

																		<?php redBloque(); ?>
																	</div>

																<?php redBloque(); ?>

																<?php redBloque(); ?>
															</div>

														<?php redBloque(); ?>

														<?php redBloque(); ?>
													</div>

												<?php redBloque(); ?>
													<div class="nivel nivel-4">
														<?php redBloque(); ?>

														<?php redBloque(); ?>

														<?php redBloque(); ?>
													</div>

												<?php redBloque(); ?>
											</div>
										
										<?php redBloque(); ?>
											<div class="nivel nivel-3">
												<?php redBloque(); ?>

												<?php redBloque(); ?>

												<?php redBloque(); ?>
											</div>

										<?php redBloque(); ?>
											<div class="nivel nivel-3">
												
												<?php redBloque(); ?>

												<?php redBloque(); ?>

											</div>

										<?php redBloque(); ?>
											
									</div>
								
								<?php redBloque(); ?>
									<div class="nivel nivel-2">
										<?php redBloque(); ?>
									</div>

								<?php redBloque(); ?>
									<div class="nivel nivel-2">
										<?php redBloque(); ?>
									</div>

								<?php redBloque(); ?>
									<div class="nivel nivel-2">
										<?php redBloque(); ?>
									</div>

							</div>

						</div>

						


					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="premier">Premier</div>
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="plus">Plus</div>
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="ultra">Ultra</div>
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="supremo">Supremo</div>
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="master">Master</div>
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="emaster">eMaster</div>
		</div>



    <?php endwhile; // end of the loop. ?>


</section>

<?php get_footer(); ?>