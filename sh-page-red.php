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
	
	<?php 
		$red = redApi(); 
		$user_ID = get_current_user_id();
		$userACF = 'user_' . $user_ID;
		//var_dump($red);
	?>

    <?php while ( have_posts() ) : the_post(); ?>
            
        <h1 class="title"><?php the_title(); ?> </h1>
		<p></p>
		<!-- TABS Header -->
		<ul class="nav nav-tabs Red-tabHeader" role="tablist">
		    <li role="presentation"><a href="#registrado" aria-controls="registrado" role="tab" data-toggle="tab">Registrados</a></li>
		    <li role="presentation" class="active"><a href="#basico" aria-controls="basico" role="tab" data-toggle="tab">Básico</a></li>
		    <li role="presentation"><a href="#premier" aria-controls="premier" role="tab" data-toggle="tab">Premier</a></li>
		    <li role="presentation"><a href="#plus" aria-controls="plus" role="tab" data-toggle="tab">Plus</a></li>
		    <li role="presentation"><a href="#ultra" aria-controls="ultra" role="tab" data-toggle="tab">Ultra</a></li>
		    <li role="presentation"><a href="#supremo" aria-controls="supremo" role="tab" data-toggle="tab">Supremo</a></li>
		    <li role="presentation"><a href="#master" aria-controls="master" role="tab" data-toggle="tab">Master</a></li>
		</ul>

		<!-- TABS Body -->
		<div class="tab-content Red-tabBody">
			
			<!-- REGISTRADOS
			******************************************* -->
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="registrado">
				
				
				<?php $redPlan = 'hijos_registrados'; ?>
				<?php if ($red[$redPlan]) : ?>
					<!-- Arbol de red -->
					<div class="Red-planArbol">
						<!-- Nivel 1 -->
						<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
							<ul class="nivel nivel-1">
								<?php $hijo = $hijoNivel1; $nivel = 1; ?>
								<!-- bloque de red -->
								<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
								<!-- nivel 2 -->	
								<?php if (!empty($hijoNivel1[$redPlan])) : ?>
									<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
										<ul class="nivel nivel-2">
											<?php $hijo = $hijoNivel2; $nivel = 2;?>
											<!-- bloque de red -->
											<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
											<!-- Nivel 3 -->
											<?php if (!empty($hijoNivel2[$redPlan])) : ?>
												<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
													<ul class="nivel nivel-3"> 
														<?php $hijo = $hijoNivel3; $nivel = 3;?>
														<!-- bloque de red -->
														<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>														
													</ul>											 
												<?php 	} ?>
											<?php endif; ?>
										</ul>											 
									<?php 	} ?>
								<?php endif; ?>
							</ul>
	    				<?php } ?>	
					</div>	
				<?php endif; ?>
			</div>


			<!-- BASICO
			******************************************* -->
			<div role="tabpanel" class="tab-pane active Red-tabBodyPanel" id="basico">
				
			<?php if  ($red['basico']) : ?>

				<!-- Indicador de plan -->
				<h3 class="Red-planIndicador"><i class="fa fa-smile-o"></i> Tienes activo éste plan</h3>
				<!-- Fecha de activación -->
				<div class="Red-planActivacion">
					<i class="fa fa-calendar"></i> Fecha de tu activación: <span><?php the_field('fechaPagoBasicoApi', $userACF); ?></span>
				</div>
				<!-- Comisiones del plan -->
				<div class="Red-planComisiones">
					<i class="fa fa-money"></i> Comisiones: <span>$<?php the_field(' gananciaBasicoApi', $userACF); ?></span>
				</div>

				<?php $redPlan = 'hijos_basico'; ?>
				<?php if ($red[$redPlan]) : ?>
					<!-- Arbol de red -->
					<div class="Red-planArbol">

						<!-- Nivel 1 -->
						<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
							<ul class="nivel nivel-1">
								<?php $hijo = $hijoNivel1; $nivel = 1; ?>
								<!-- bloque de red -->
								<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
								<!-- nivel 2 -->	
								<?php if (!empty($hijoNivel1[$redPlan])) : ?>
									<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
										<ul class="nivel nivel-2">
											<?php $hijo = $hijoNivel2; $nivel = 2;?>
											<!-- bloque de red -->
											<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
											<!-- Nivel 3 -->
											<?php if (!empty($hijoNivel2[$redPlan])) : ?>
												<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
													<ul class="nivel nivel-3"> 
														<?php $hijo = $hijoNivel3; $nivel = 3;?>
														<!-- bloque de red -->
														<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>														
													</ul>											 
												<?php 	} ?>
											<?php endif; ?>
										</ul>											 
									<?php 	} ?>
								<?php endif; ?>
							</ul>
	    				<?php } ?>	
					</div>	
				<?php endif; ?>
			<?php else : ?>
				<h3 class="Red-mensajeContratar">Actualmente no tiene comprando este plan. Para recibir ganancias de este plan te invitamos a activarlo. <strong>Costo: <span>$290</span></strong></h3>
			<?php endif; ?>
			</div>
				
			<!-- PREMIER
			******************************************* -->
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="premier">
				
				<?php if  ($red['premier']) : ?>
					<!-- Indicador de plan -->
					<h3 class="Red-planIndicador"><i class="fa fa-smile-o"></i> Tienes activo éste plan</h3>
					<!-- Fecha de activación -->
					<div class="Red-planActivacion">
						<i class="fa fa-calendar"></i> Fecha de tu activación: <span><?php the_field('fechaPagoPremierApi', $userACF); ?></span>
					</div>
					<!-- Comisiones del plan -->
					<div class="Red-planComisiones">
						<i class="fa fa-money"></i> Comisiones: <span>$<?php the_field(' gananciaPremierApi', $userACF); ?></span>
					</div>

					<?php $redPlan = 'hijos_premier'; ?>
					<?php if ($red[$redPlan]) : ?>
						<!-- Arbol de red -->
						<div class="Red-planArbol">

							<!-- Nivel 1 -->
							<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
								<ul class="nivel nivel-1">
									<?php $hijo = $hijoNivel1; $nivel = 1; ?>
									<!-- bloque de red -->
									<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
									<!-- nivel 2 -->	
									<?php if (!empty($hijoNivel1[$redPlan])) : ?>
										<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
											<ul class="nivel nivel-2">
												<?php $hijo = $hijoNivel2; $nivel = 2;?>
												<!-- bloque de red -->
												<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
												<!-- Nivel 3 -->
												<?php if (!empty($hijoNivel2[$redPlan])) : ?>
													<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
														<ul class="nivel nivel-3"> 
															<?php $hijo = $hijoNivel3; $nivel = 3;?>
															<!-- bloque de red -->
															<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>																
														</ul>											 
													<?php 	} ?>
												<?php endif; ?>
											</ul>											 
										<?php 	} ?>
									<?php endif; ?>
								</ul>
		    				<?php } ?>	
						</div>	
					<?php endif; ?>
				<?php else : ?>
					<h3 class="Red-mensajeContratar">Actualmente no tiene comprando este plan. Para recibir ganancias de este plan te invitamos a activarlo. <strong>Costo: <span>$580</span></strong></h3>
				<?php endif; ?>
			</div>

			<!-- PLUS
			******************************************* -->
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="plus">

				<?php if  ($red['plus']) : ?>
					
					<!-- Indicador de plan -->
					<h3 class="Red-planIndicador"><i class="fa fa-smile-o"></i> Tienes activo éste plan</h3>
					<!-- Fecha de activación -->
					<div class="Red-planActivacion">
						<i class="fa fa-calendar"></i> Fecha de tu activación: <span><?php the_field('fechaPagoPlusApi', $userACF); ?></span>
					</div>
					<!-- Comisiones del plan -->
					<div class="Red-planComisiones">
						<i class="fa fa-money"></i> Comisiones: <span>$<?php the_field('gananciaPlusApi', $userACF); ?></span>
					</div>
					<!-- Fecha de mantenimiento -->
					<div class="Red-mantenimientoActivacion">
						<i class="fa fa-calendar"></i> Fecha de mantenimiento: <span><?php the_field('fechaPagoMantenimientoApi', $userACF); ?></span>
					</div>

					<?php $redPlan = 'hijos_plus'; ?>
					<?php if ($red[$redPlan]) : ?>
						<!-- Arbol de red -->
						<div class="Red-planArbol">

							<!-- Nivel 1 -->
							<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
								<ul class="nivel nivel-1">
									<?php $hijo = $hijoNivel1; $nivel = 1; ?>
									<!-- bloque de red -->
									<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
									<!-- nivel 2 -->	
									<?php if (!empty($hijoNivel1[$redPlan])) : ?>
										<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
											<ul class="nivel nivel-2">
												<?php $hijo = $hijoNivel2; $nivel = 2;?>
												<!-- bloque de red -->
												<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>	
												<!-- Nivel 3 -->
												<?php if (!empty($hijoNivel2[$redPlan])) : ?>
													<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
														<ul class="nivel nivel-3"> 
															<?php $hijo = $hijoNivel3; $nivel = 3;?>
															<!-- bloque de red -->
															<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
															<!-- Nivel 4 -->
															<?php if (!empty($hijoNivel3[$redPlan])) : ?>
																<?php foreach ($hijoNivel3[$redPlan] as $hijoNivel4 ) { ?>
																	<ul class="nivel nivel-4"> 
																		<?php $hijo = $hijoNivel4; $nivel = 4;?>
																		<!-- bloque de red -->
																		<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>	
																	</ul>											 
																<?php 	} ?>
															<?php endif; ?>
														</ul>											 
													<?php 	} ?>
												<?php endif; ?>
											</ul>											 
										<?php 	} ?>
									<?php endif; ?>
								</ul>
		    				<?php } ?>	
						</div>	
					<?php endif; ?>
				<?php else : ?>
					<h3 class="Red-mensajeContratar">Actualmente no tiene comprando este plan. Para recibir ganancias de este plan te invitamos a activarlo. <strong>Costo: <span>$1,160</span></strong></h3>
				<?php endif; ?>

			</div>
				
			<!-- ULTRA
			******************************************* -->	
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="ultra">

				<?php if  ($red['ultra']) : ?>
					
					<!-- Indicador de plan -->
					<h3 class="Red-planIndicador"><i class="fa fa-smile-o"></i> Tienes activo éste plan</h3>
					<!-- Fecha de activación -->
					<div class="Red-planActivacion">
						<i class="fa fa-calendar"></i> Fecha de tu activación: <span><?php the_field('fechaPagoUltraApi', $userACF); ?></span>
					</div>
					<!-- Comisiones del plan -->
					<div class="Red-planComisiones">
						<i class="fa fa-money"></i> Comisiones: <span>$<?php the_field('gananciaUltraApi', $userACF); ?></span>
					</div>
					<!-- Fecha de mantenimiento -->
					<div class="Red-mantenimientoActivacion">
						<i class="fa fa-calendar"></i> Fecha de mantenimiento: <span><?php the_field('fechaPagoMantenimientoApi', $userACF); ?></span>
					</div>

					<?php $redPlan = 'hijos_ultra'; ?>
					<?php if ($red[$redPlan]) : ?>
						<!-- Arbol de red -->
						<div class="Red-planArbol">

							<!-- Nivel 1 -->
							<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
								<ul class="nivel nivel-1">
									<?php $hijo = $hijoNivel1; $nivel = 1; ?>
									<!-- bloque de red -->
									<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
									<!-- nivel 2 -->	
									<?php if (!empty($hijoNivel1[$redPlan])) : ?>
										<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
											<ul class="nivel nivel-2">
												<?php $hijo = $hijoNivel2; $nivel = 2;?>
												<!-- bloque de red -->
												<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>	
												<!-- Nivel 3 -->
												<?php if (!empty($hijoNivel2[$redPlan])) : ?>
													<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
														<ul class="nivel nivel-3"> 
															<?php $hijo = $hijoNivel3; $nivel = 3;?>
															<!-- bloque de red -->
															<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
															<!-- Nivel 4 -->
															<?php if (!empty($hijoNivel3[$redPlan])) : ?>
																<?php foreach ($hijoNivel3[$redPlan] as $hijoNivel4 ) { ?>
																	<ul class="nivel nivel-4"> 
																		<?php $hijo = $hijoNivel4; $nivel = 4;?>
																		<!-- bloque de red -->
																		<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>																		
																	</ul>											 
																<?php 	} ?>
															<?php endif; ?>
														</ul>											 
													<?php 	} ?>
												<?php endif; ?>
											</ul>											 
										<?php 	} ?>
									<?php endif; ?>
								</ul>
		    				<?php } ?>	
						</div>	
					<?php endif; ?>
				<?php else : ?>
					<h3 class="Red-mensajeContratar">Actualmente no tiene comprando este plan. Para recibir ganancias de este plan te invitamos a activarlo. <strong>Costo: <span>$2,900</span></strong></h3>
				<?php endif; ?>
			</div>

			<!-- SUPREMO
			******************************************* -->
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="supremo">

				<?php if  ($red['supremo']) : ?>
					
					<!-- Indicador de plan -->
					<h3 class="Red-planIndicador"><i class="fa fa-smile-o"></i> Tienes activo éste plan</h3>
					<!-- Fecha de activación -->
					<div class="Red-planActivacion">
						<i class="fa fa-calendar"></i> Fecha de tu activación: <span><?php the_field('fechaPagoSupremoApi', $userACF); ?></span>
					</div>
					<!-- Comisiones del plan -->
					<div class="Red-planComisiones">
						<i class="fa fa-money"></i> Comisiones: <span>$<?php the_field('gananciaSupremoApi', $userACF); ?></span>
					</div>
					<!-- Fecha de mantenimiento -->
					<div class="Red-mantenimientoActivacion">
						<i class="fa fa-calendar"></i> Fecha de mantenimiento: <span><?php the_field('fechaPagoMantenimientoApi', $userACF); ?></span>
					</div>

					<?php $redPlan = 'hijos_supremo'; ?>
					<?php if ($red[$redPlan]) : ?>
						<!-- Arbol de red -->
						<div class="Red-planArbol">

							<!-- Nivel 1 -->
							<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
								<ul class="nivel nivel-1">
									<?php $hijo = $hijoNivel1; $nivel = 1; ?>
									<!-- bloque de red -->
									<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
									<!-- nivel 2 -->	
									<?php if (!empty($hijoNivel1[$redPlan])) : ?>
										<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
											<ul class="nivel nivel-2">
												<?php $hijo = $hijoNivel2; $nivel = 2;?>
												<!-- bloque de red -->
												<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
												<!-- Nivel 3 -->
												<?php if (!empty($hijoNivel2[$redPlan])) : ?>
													<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
														<ul class="nivel nivel-3"> 
															<?php $hijo = $hijoNivel3; $nivel = 3;?>
															<!-- bloque de red -->
															<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
															<!-- Nivel 4 -->
															<?php if (!empty($hijoNivel3[$redPlan])) : ?>
																<?php foreach ($hijoNivel3[$redPlan] as $hijoNivel4 ) { ?>
																	<ul class="nivel nivel-4"> 
																		<?php $hijo = $hijoNivel4; $nivel = 4;?>
																		<!-- bloque de red -->
																		<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>	
																	</ul>											 
																<?php 	} ?>
															<?php endif; ?>
														</ul>											 
													<?php 	} ?>
												<?php endif; ?>
											</ul>											 
										<?php 	} ?>
									<?php endif; ?>
								</ul>
		    				<?php } ?>	
						</div>	
					<?php endif; ?>
				<?php else : ?>
					<h3 class="Red-mensajeContratar">Actualmente no tiene comprando este plan. Para recibir ganancias de este plan te invitamos a activarlo. <strong>Costo: <span>$5,800</span></strong></h3>
				<?php endif; ?>

			</div>

			<!-- MASTER
			******************************************* -->
			<div role="tabpanel" class="tab-pane Red-tabBodyPanel" id="master">
				
				<?php if  ($red['master']) : ?>
					
					<!-- Indicador de plan -->
					<h3 class="Red-planIndicador"><i class="fa fa-smile-o"></i> Tienes activo éste plan</h3>
					<!-- Fecha de activación -->
					<div class="Red-planActivacion">
						<i class="fa fa-calendar"></i> Fecha de tu activación: <span><?php the_field('fechaPagoMasterApi', $userACF); ?></span>
					</div>
					<!-- Comisiones del plan -->
					<div class="Red-planComisiones">
						<i class="fa fa-money"></i> Comisiones: <span>$<?php the_field('gananciaMasterApi', $userACF); ?></span>
					</div>
					<!-- Fecha de mantenimiento -->
					<div class="Red-mantenimientoActivacion">
						<i class="fa fa-calendar"></i> Fecha de mantenimiento: <span><?php the_field('fechaPagoMantenimientoApi', $userACF); ?></span>
					</div>

					<?php $redPlan = 'hijos_master'; ?>
					<?php if ($red[$redPlan]) : ?>
						<!-- Arbol de red -->
						<div class="Red-planArbol">

							<!-- Nivel 1 -->
							<?php foreach ($red[$redPlan] as $hijoNivel1 ) { ?>							
								<ul class="nivel nivel-1">
									<?php $hijo = $hijoNivel1; $nivel = 1; ?>
									<!-- bloque de red -->
									<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>
									<!-- nivel 2 -->	
									<?php if (!empty($hijoNivel1[$redPlan])) : ?>
										<?php foreach ($hijoNivel1[$redPlan] as $hijoNivel2 ) { ?>
											<ul class="nivel nivel-2">
												<?php $hijo = $hijoNivel2; $nivel = 2;?>
												<!-- bloque de red -->
												<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
												<!-- Nivel 3 -->
												<?php if (!empty($hijoNivel2[$redPlan])) : ?>
													<?php foreach ($hijoNivel2[$redPlan] as $hijoNivel3 ) { ?>
														<ul class="nivel nivel-3"> 
															<?php $hijo = $hijoNivel3; $nivel = 3;?>
															<!-- bloque de red -->
															<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>	
															<!-- Nivel 4 -->
															<?php if (!empty($hijoNivel3[$redPlan])) : ?>
																<?php foreach ($hijoNivel3[$redPlan] as $hijoNivel4 ) { ?>
																	<ul class="nivel nivel-4"> 
																		<?php $hijo = $hijoNivel4; $nivel = 4;?>
																		<!-- bloque de red -->
																		<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>		
																		<!-- Nivel 5 -->
																		<?php if (!empty($hijoNivel4[$redPlan])) : ?>
																			<?php foreach ($hijoNivel4[$redPlan] as $hijoNivel5 ) { ?>
																				<ul class="nivel nivel-5"> 
																					<?php $hijo = $hijoNivel5; $nivel = 5;?>
																					<!-- bloque de red -->
																					<?php bloqueRed( $hijo['ID'], $hijo['numero'], $hijo['nombre'], $nivel ); ?>	
																				</ul>											 
																			<?php 	} ?>
																		<?php endif; ?>		
																	</ul>											 
																<?php 	} ?>
															<?php endif; ?>
														</ul>											 
													<?php 	} ?>
												<?php endif; ?>
											</ul>											 
										<?php 	} ?>
									<?php endif; ?>
								</ul>
		    				<?php } ?>	
						</div>	
					<?php endif; ?>
				<?php else : ?>
					<h3 class="Red-mensajeContratar">Actualmente no tiene comprando este plan. Para recibir ganancias de este plan te invitamos a activarlo. <strong>Costo: <span>$15,800</span></strong></h3>
				<?php endif; ?>

			</div>
			
		</div>

    <?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>