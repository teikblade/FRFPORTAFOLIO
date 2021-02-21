<?php
include('coneccion.php');
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
if(isset($_GET)){ $id = $_GET['id'];}
?>
<!DOCTYPE html>
<html>
	<?php include('vista/head.php') ?>
    <script src="../js/bootstrap.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>    
    <link href="../css/starrr.css" rel=stylesheet/>
    <script src="../js/starrr.js"></script>
	<body class="container-fluid">
		<?php include('vista/header.php') ?>
		<section class="container">
			<div class="row panel-menu-margin panel-menu-margin-top ">
				<div class="col-12 panel-menu-header rounded-top">
					<div class="row">
						<div class="col-12 col-sm-6">
							<h4>Perfil</h4>
						</div>
						<div class="col-6 col-sm-6 boton-perfil-nuevo-salir text-right">
							<a href="panel_user.php"><img src="../img/salir.png"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row panel-menu-margin" id="resultadoPerfil" style="margin-top: 2%;"></div>
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div id="carouselExampleIndicators" class="col-12 col-sm-12 col-md-8 carousel slide ficha_perfil" data-ride="carousel">
  					<div class="carousel-inner">
  						<?php $Ficha->perfil($id)?>
  					</div>
				</div>	
			</div>
			<?php $Ficha->chatOfeeling($id)?>
			<div class="row">
				<div class="col-12 text-center">
					<h5 id="Estrellas"></h5>	
				</div>
			</div>
	<script>
   $('#Estrellas').starrr({
       rating:1,
       change:function(e,valor){
           var usuario = '<?php echo $id; ?>';
		var enviar = "star="+valor+"&id="+usuario;
		var xAgregar = new XMLHttpRequest();
		xAgregar.onreadystatechange = function(){
		if(xAgregar.readyState == 4 && xAgregar.status == 200){
			var return_data = xAgregar.responseText;	
			document.getElementById("resultadoPerfil").innerHTML = return_data;
			$('#mensaje').fadeIn(1500);
			}
		}
		xAgregar.open("POST","ajax/ajaxStar.php",true);
		xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xAgregar.send(enviar);
       }
   });
    </script>
			<div class="row panel-menu-margin">
				<div class="col-12 panel-menu-footer">
					<div class="row"></div>
				</div>
			</div>
	</section>
	<?php include('vista/footer.php') ?>
	</body>
</html>