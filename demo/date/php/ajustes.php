<?php
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
	<?php include('vista/head.php') ?>
	<body class="container-fluid">
		<?php include('vista/header.php') ?>
		<section class="container">
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div class="col-12 panel-menu-header rounded-top">
					<div class="row">
						<div class="col-12 col-sm-6">
							<h4>Ajustes</h4>
						</div>
						<div class="col-6 text-right boton-ajustes-salir">
							<a href="panel_user.php"><img src="../img/salir.png"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div class="col-12 text-left">
					<div class="row">
						<div class="col-12 text-center">
							<h4>Cuenta</h4>	
						</div>
					</div>
					<div class="row">
						<div class="col-12 cambiar-correo">
							<a href="#" data-toggle="modal" data-target="#cambiarCorreoModal"><img src="../img/email.png" width="20" style="margin-right:1%;"><span><?php echo $_SESSION['correo'];?></span></a>	
						</div>
					</div>
					<div class="row">
						<div class="col-12 cambiar-clave">
							<a href="#" data-toggle="modal" data-target="#claveCorreoModal"><img src="../img/password.png" width="20" style="margin-right:1%;"><span>***********</span></a>
						</div>
					</div>
					<span>ATENCION: su correo electronico es importante. Sin el no podremos darle soporte.</span>
					<a href="#" disabled>Borrar Cuena</a>			
				</div>
			</div>
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div class="col-12 panel-menu-footer">
					<div class="row"></div>
				</div>
			</div>
		</section>
<!-- Modal Correo -->
<div class="modal fade" id="cambiarCorreoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cambiar correo electronico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="#" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 margin-bottom-index text-center">
							<label>Nuevo correo electronico</label>
							<input type="email" name="correo_nuevo" class="form-control" required>
							<label>Repita correo electronico</label>
							<input type="email" name="correo_confirmacion" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<button class="btn btn-color-one btn-block" type="submit" name="btn-cambiar-correo">Aceptar</button>
						</div>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Contraseña -->
<div class="modal fade" id="claveCorreoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="#" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 margin-bottom-index text-center">
							<label>Nuevo contraseña</label>
							<input type="password" name="clave_nueva" class="form-control" required>
							<label>Repita contraseña</label>
							<input type="password" name="clave_confirmacion" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<button class="btn btn-color-one btn-block" type="submit" name="btn-cambiar-clave">Aceptar</button>
						</div>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
		<?php include('vista/footer.php') ?>
		<script type="text/javascript" src="../js/previsualizar.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</body>
</html>