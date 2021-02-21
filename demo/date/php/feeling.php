<?php
include('coneccion.php');
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
	<?php include('vista/head.php') ?>
	<body class="container-fluid" onload="feelingPanelAjax('<?php echo $_SESSION['usuario'] ?>')">
		<?php include('vista/header.php') ?>
		<section class="container">
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div class="col-12 panel-menu-header rounded-top">
					<div class="row">
						<div class="col-6">
							<h4>Feeling</h4>
						</div>
						<div class="col-6 text-right">
							<a href="panel_user.php"><img src="../img/salir.png"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row perfiles-feeling panel-menu-margin" id="feelingPanel">
				<?php //$Feeling->perfil($_SESSION['usuario']);?>
			</div>
			<div class="row panel-menu-margin">
				<div class="col-12 panel-menu-footer">
					<div class="row"></div>
				</div>
			</div>
	</section>
	<?php include('vista/footer.php') ?>
	</body>
</html>