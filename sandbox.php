




    				<?php $nP = 1;   $nH = $nP + 1; ?>
	
						<?php foreach ($red['hijos_basico'] as $redHijo[$nP] ) {  ?>

							<div class="nivel"><?= $nP; ?> - <?= $redHijo[$nP]['nombre']; ?>

								<?php if (!empty($redHijo[$nP]['hijos_basico'])) : ?> 

									<?php foreach ($redHijo[$nP]['hijos_basico'] as $redHijo[$nH] ) { ?>

											<div class="nivel"> <?= $nivelHijo; ?> - <?= $redHijo[$nH]['nombre']; ?>

												<?php //var_dump($redHijo[$nH]['hijos_basico']); ?>

											</div>	
											 
									<?php 	} ?>

								<?php endif; ?>

							</div>	

	    				<?php } ?>	

						<?php //$nivel[0] = 0; // inicio contador de niveles en 0 ?>
						<?php //for ($numNivel = 0; $numNivel <= 7; $numNivel++) { ?>
								<?php //echo $numNivel; ?>
						<?php //} ?>	