<?php
include('coneccion.php');
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
if(isset($_GET)){ $id = $_GET['id'];}else{}
?>
<!DOCTYPE html>
<html>
	<?php include('vista/head.php') ?>
	<script type="text/javascript">setInterval(function(){ ChatAjax(); }, 1000);</script>
	<body class="container-fluid" onload="ChatAjax();">
		<?php include('vista/header.php') ?>
		<section class="container modelo-chat" id="modelo-chat-scroll">
			<div class="row panel-menu-margin">
				<div class="col-12 col-sm-12 col-md-8 text-center chat-usaurio rounded-top panel-menu-margin">
					<h5 class="font-text-roboto" style="padding-top: 2%;"><b>Chat Usuario: <?php echo $Sala->Usuario($id); ?></b></h5>
				</div>
			</div>
			<div class="row panel-menu-margin panel-chat-margin">
				<div class="col-12 col-sm-12 col-md-8 mensajes-usuario panel-menu-margin" id="chat" onclick="scrollDown();"></div>
			</div>
		</section>
		<section class="container">
			<form method="post" action="formularios.php">
				<div class="row panel-menu-margin">
					<div class="col-12 col-sm-12 col-md-10 escribir-chat">
					<textarea name="mensaje" class="form-control" placeholder="escribe un mensaje" onclick="scrollDown();"></textarea>
					<button type="submit" name="btn-chat" class="btn btn-block btn-color-one">enviar</button>	
					</div>
					<input type="text" name="user2" hidden value="<?php echo $id; ?>" id="user2">
				</div>
			</form>
		</section>
		<?php include('vista/footer.php') ?>
	</body>
</html>