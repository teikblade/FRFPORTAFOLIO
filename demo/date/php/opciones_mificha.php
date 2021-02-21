<?php
include('clasesFunciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
	<?php include('head.php') ?>
	<body class="container-fluid">
		<?php include('header.php') ?>
		<section class="container">
			<div class="row">
				<div class="col-12 op-ficha text-center">
					<img src="../profiles/<?php echo $_SESSION['perfil']; ?>" class="rounded border-primary text-primary" alt="DEMO">
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<p>Vive en: <span><b><?php echo $_SESSION['pais']; ?></b></span></p>
					<p>Edad: <span><b><?php echo $_SESSION['edad']; ?></b></span></p>				
				</div>
			</div>
		</section>
		<section class="container">
			<div class="row">
				<?php 
				$PanelUsuario = new Opciones();
				$PanelUsuario->fotosUsaurio($_SESSION['correo']);
				?>
				<div id="status"></div>
			</div>
		</section>
		<section class="container">
			<form method="post" action="formularios.php" enctype="multipart/form-data">
			<div class="row d-flex justify-content-center">
				<div class="col-8 foto-agregar text-center">
					<h5>Agregar foto</h5>
					<div id="preview">
						<img src="../img/agregar.png">
					</div>
					<input type="file" name="file" id="file" accept="image/jpg, image/jpeg, image/png">
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-9">
					<button class="btn btn-success btn-block" name="btn-agregar">cargar</button>
				</div>
			</div>
			</form>
		</section>
		<?php include('footer.php') ?>
		<script type="text/javascript" src="../js/previsualizar.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</body>
</html>