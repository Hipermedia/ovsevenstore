<?php 
/**
 * Bloque de red (item)
 */
?>

<div id="<?= $hijo['ID']; ?>" class="Red-bloque">
	<a class="Red-bloqueIcon is-plus"><i class="fa fa-minus i"></i></a>
	<span class="Red-bloqueImagen">
		<i class="fa fa-user"></i>
	</span>
	<span class="Red-bloqueNombre"><?= $hijo['nombre']; ?>x</span>
	<span class="Red-bloqueStatus">Activo</span>
	<span class="Red-bloqueNivel"><?php $nivel; ?></span>
</div>