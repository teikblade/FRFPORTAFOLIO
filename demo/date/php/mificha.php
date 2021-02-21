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
							<h4>Mi Perfil</h4>
						</div>
						<div class="col-6 text-right boton-mificha-salir">
							<a href="panel_user.php"><img src="../img/salir.png"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row panel-menu-margin">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 op-ficha text-center">
					<img src="../profiles/<?php echo $_SESSION['perfil']; ?>" class="border border-primary rounded text-primary" alt="DEMO">
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center font-text-roboto">
					<h4>Usuario: <b><?php echo $_SESSION['usuario']; ?></b></h4>
					<p>Vive en: <span><b><?php echo $_SESSION['pais']; ?></b></span></p>				
				</div>
			</div>
		</section>
		<section class="container">
			<div class="row panel-menu-margin">
				<?php $Opciones->fotosUsaurio($_SESSION['correo']);	?>
				<div id="status"></div>
			</div>
		</section>
		<section class="container">
			<form method="post" action="formularios.php" enctype="multipart/form-data">
			<div class="row panel-menu-margin">
				<div class="col-12 col-sm-12 col-md-12 foto-agregar text-center">
					<h5>Agregar foto</h5>
					<div id="preview">
						<img src="../img/agregar.png">
					</div>
					<input type="file" name="file" id="file" accept="image/jpg, image/jpeg, image/png">
				</div>
			</div>
			<div class="row panel-menu-margin">
				<div class="col-12 col-sm-12 col-md-12">
					<button class="btn btn-block btn-color-one" name="btn-agregar">cargar</button>
				</div>
			</div>
			</form>
			<div class="row panel-menu-margin">
				<div class="col-12 panel-menu-footer">
					<div class="row"></div>
				</div>
			</div>
		</section>
		<?php include('vista/footer.php') ?>
		<script type="text/javascript" src="../js/previsualizar.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</body>
</html>