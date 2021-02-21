<?php
include 'controller.php';
?>
<!DOCTYPE html>
<html>
	<?php include_once "head.php" ?>
	<body class="container">
	<?php include_once "header.php"; ?>
		<main>
			<div class="container">
				<div class="row text-center">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h4 class="font-weight-bold">PANEL ADMINISTRADOR</h4>
					<h4 class="font-weight-bold">FECHA: <?php echo $Date ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="border-bottom: 4px solid black;">
						<h5>Ingrese Monto del dia</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<input type="number" id="taza" class="form-control bg-dark text-white text-center font-weight-bold">
					</div>
				</div>
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4">
					<button onclick="cargar()" value="btncargar" id="btn-cargar" class="btn btn-success btn-block font-weight-bold">CARGAR TAZA</button>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<button onclick="eliminar()" value="btneliminar" id="btn-eliminar" class="btn btn-danger btn-block font-weight-bold">ELIMINAR TAZA</button>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<button onclick="limpiar()" value="btnlimpiar" id="btn-limpiar" class="btn btn-warning btn-block font-weight-bold text-white">LIMPIAR BASE DE DATOS</button>
				</div>
			</div>
			</div>
			<div class="row text-center">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<a href="../index.php" class="btn btn-dark col-12 font-weight-bold">Salir</a>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-xs-12 col-sm-12 col-md-12" id="status">
				</div>
			</div>
			<div class="row text-left">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<span><b>EXPLICACION DE USO:</b> AGREGAR EL VALOR DE LA TAZA DEL DIA ACTUAL EN LA CASILLA DEBAJO DE CARGAR TAZA LUEGO PRESIONAR CARGAR TAZA, SI ES NECESARIO CAMBIAR LA TAZA Y/O MODIFICARLA PRESIONAR ELIMINAR Y ESTA ELIMINARA LA TAZA AGREGADA DEL DIA ACTUAL Y REPITA EL MISMO PASO DICTADO CON ANTERIORIDAD Y LISTO</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-xs-12 col-sm-12 col-md-12 table-tazas table-responsive">
					<?php $Mostrar->RateHistory($conectar->connect());?>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		function cargar(){
			var xcargar = new XMLHttpRequest();
			var TazaConversion = document.getElementById("taza").value;
			var BtnCargar = document.getElementById("btn-cargar").value;
			var envio = "taza="+TazaConversion+"&btncargar="+BtnCargar;
			xcargar.onreadystatechange = function(){
				var return_data = xcargar.responseText;
				document.getElementById("status").innerHTML = return_data;
				setInterval(function(){	window.location.reload();}, 2500);
			}
			var method = "POST";
			var url = "controller.php";
			var asincrono = true;
			xcargar.open(method,url,asincrono);
			xcargar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xcargar.send(envio);
			document.getElementById("status").innerHTML = 'CARGANDO';
		}

		function eliminar(){
			var xeliminar = new XMLHttpRequest();
			var btneliminar = document.getElementById("btn-eliminar").value;
			var envio = "btneliminar="+btneliminar;
			xeliminar.onreadystatechange = function(){
				var return_data = xeliminar.responseText;
				document.getElementById("status").innerHTML = return_data;
				setInterval(function(){	window.location.reload();}, 2500);
			}
			var method = "POST";
			var url = "controller.php";
			var asincrono = true;
			xeliminar.open(method,url,asincrono);
			xeliminar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xeliminar.send(envio);
			document.getElementById("status").innerHTML = 'CARGANDO';
		}
		function limpiar(){
			var xlimpiar = new XMLHttpRequest();
			var btnlimpiar = document.getElementById("btn-limpiar").value;
			var envio = "btnlimpiar="+btnlimpiar;
			xlimpiar.onreadystatechange = function(){
				var return_data = xlimpiar.responseText;
				document.getElementById("status").innerHTML = return_data;
				setInterval(function(){	window.location.reload();}, 2500);
			}
			var method = "POST";
			var url = "controller.php";
			var asincrono = true;
			xlimpiar.open(method,url,asincrono);
			xlimpiar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xlimpiar.send(envio);
			document.getElementById("status").innerHTML = 'CARGANDO';
		}
		</script>
	</body>
</html>