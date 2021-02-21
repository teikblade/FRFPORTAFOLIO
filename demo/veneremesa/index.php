<?php include 'php/controller.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>VENEREMESA</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
	<?php include_once "php/header.php"; ?>
	<main class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 section1 text-center">
				<img src="img/background.jpg" class="fondo" id="fondo">
				<img src="img/logoVeneremesa.png" class="logo" id="logo">
					<div class="col-md-12 bg-dark text-center padding-text">
						<p class="text-white font-weight-bold">ESTO ES UNA DEMO PANEL ADMINISTRADOR <a href="php/panel.adm.php" class="text-warning" style="text-decoration: none;">CLICK AQUI</a></p>
					</div>
			</div>
		</div>
	<div class="row text-center conversor">
		<div class="col-12">
		<p class="text-content">CONVIERTE TUS PESOS A BOLIVARES FECHA <b class="index-color"><?php echo $Date;?></b> TAZA DE CAMBIO A <b class="index-color"><?php echo $valor ?> Bs.S</b></p>
		<input type="text" id="moneda" class="bg-secondary col-xs-12 col-sm-12 col-md-6 text-center" value="0">
		<input type="text" id="conversion" class="bg-secondary col-xs-12 col-sm-12 col-md-6 text-center" value="0">	
		</div>
	</div>
	<div class="row text-center section2">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img src="img/atencion.png">
			<h5>ATENCIÓN</h5>	
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img src="img/seguridad.png">
			<h5>SEGURIDAD</h5>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img src="img/confiable.png">
			<h5>CONFIABILIDAD</h5>
		</div>
	</div>	
	</div>
	
	</main>
	<footer class="background-footer">
		<div class=" text-center padding-text">
			<p>© 2017 Veneremesa. Todos los derechos reservados.| <a href="https://www.instagram.com/frf.web/" style="text-decoration:none;"><span>Desarrollado por @FRF.WEB - Venezuela</span></a></p>	
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
	document.getElementById("moneda").addEventListener('input',moneda);
		function moneda(){
			var valor = document.getElementById("moneda").value;
			var taza = '<?php echo $valor;?>';
			var conversion = valor/taza;
			if( taza == ""){
	    		document.getElementById('conversion').value = "TAZA NO ACTUALIZADA O NO CARGADA POR FAVOR ESPERE"
			}else{
	    		document.getElementById('conversion').value = conversion.toFixed(2)+" Bs.S";
			}
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$( "#logo, #moneda, #conversion, .section2 div img" ).slideUp( 100 ).fadeIn( 3000 );
		});
	</script>
</body>
</html>