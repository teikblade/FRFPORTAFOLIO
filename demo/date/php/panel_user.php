<?php
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html> 
<html lang="es">
	<?php include('vista/head.php') ?>
	<body>
	<?php include('vista/header.php') ?>
		<section class="container panel-user-datos">
			<div class="row">
				<div class="col-12  col-sm-12 col-md-12 col-xl-7 border-usuario">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6 text-center">
							<img src="../profiles/<?php echo $_SESSION['perfil']; ?>" class="rounded" alt="DEMO">
							<h4>Edad: <?php echo $_SESSION['edad']; ?> años</h4>
						</div>
						<div class="col-12 col-sm-12 col-md-6 text-left">
							<h4>Usuario: <?php echo $_SESSION['usuario']; ?></h4>
							<p>Vive en: <span><b><?php echo $_SESSION['pais']; ?></b></span></p>
							<p>Sexo: <span><b><?php echo $_SESSION['sexo']; ?></b></span></p>
							<p>fecha de nacimiento: <span><b><?php $Herramientas->convertidorFecha($_SESSION['fecha_nacimiento']); ?></b></span></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-xl-3 border-usuario">
					<h4>Perfil</h4>
					<p>Numero de Fotos: <b><?php $PanelUsuario->contadorFotos($_SESSION['correo']);?></b></p>
					<?php $PanelUsuario->InformacionPerfil($_SESSION['correo']);?>
					<?php $PanelUsuario->configuracion($_SESSION['correo']);?>
				</div>
			</div>
		</section>
<!-- Modal Completando perfil de Usuario -->
<div class="modal fade" id="perfilModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Completar Perfil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="formularios.php">
				<div class="row">
					<div class="col-12">
						<label><b>Buscando</b></label>
						<select name="buscando" class="form-control">
							<option value="null">Seleccione..</option>
							<option value="relacion">Relacion</option>
							<option value="amistad">Amistad</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label><b>Presentacion</b></label>
						<textarea name="presentacion" placeholder="Indica un breve resumen de quien eres" class="form-control" maxlength="50"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label><b>GUSTOS Y AFICIONES</b></label>
						<textarea name="gustos" placeholder="Indica tus gustos y aficiones" class="form-control" maxlength="50"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label><b>Pref. Religiosa</b></label>
						<select name="prefencias" class="form-control">
							<option value="null">Seleccione..</option>
							<option value="adventista">Adventista</option>
							<option value="noadventista">No Adventista</option>
						</select>
					</div>
					<div class="col-6">
						<label><b>Profesion</b></label>
						<input placeholder="Profesion" name="profesion" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label><b>Fuma</b></label>
						<select name="fumador" class="form-control">
							<option value="null">Seleccione..</option>
							<option value="si">Si</option>
							<option value="no">No</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="margin-top: 2%;">
						<button class="btn btn-color-one btn-block" type="submit" name="btn-perfil">Aceptar</button>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="margin-top: 2%;">
						<button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
		<?php include('vista/footer.php') ?>
	</body>
</html>