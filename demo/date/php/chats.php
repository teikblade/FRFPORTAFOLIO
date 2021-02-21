<?php
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
	<?php include('vista/head.php') ?>
	<script type="text/javascript" src="../js/functions.js"></script>
	<body class="container-fluid" onload="SalaAjax('<?php echo $usuario; ?>');">
		<?php include('vista/header.php') ?>
		<section class="container">
			<div class="row panel-menu-margin panel-menu-margin-top ">
				<div class="col-12 panel-menu-header rounded-top">
					<div class="row">
						<div class="col-12 col-sm-6">
							<h4>Chats</h4>
						</div>
						<div class="col-6 text-right boton-sala-chat-salir">
							<a href="panel_user.php"><img src="../img/salir.png"></a>
						</div>
					</div>
				</div>
			</div>
			<div id="sala"></div>
			<div class="row panel-menu-margin" >
				<div class="col-12 panel-menu-footer">
					<div class="row"></div>
				</div>
			</div>
		</section>
		<?php include('vista/footer.php') ?>
	</body>
</html>