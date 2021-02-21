<?php
date_default_timezone_set('America/Caracas');
$Date = date("d-m-Y");
include 'euro_funciones.php';
session_start();
$factura = rand(1,99999);
?>
<!DOCTYPE html>
<html>
<head>
	<title>EUROTOPES MARMOLES Y GRANITOS C.A</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="body-color-first">
	<header class="header-color-first container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 euro_usuario">
				<h4 class="text-center text-white">USUARIO: <b class="text-color-first">ADMINISTRATOR</b>  FECHA: <b class="text-color-first"><?php echo $Date;?></b></h4>
			</div>
		</div>
	</header>
	<main class="container-fluid">
		<div class="row justify-content-center text-center">
			<div class="col-12">
				<img src="../img/logo.png" class="width-img-panel margin-top-selector">
			</div>
		</div>
		<div class="row justify-content-center text-center margin-top-selector">
			<div class="col-12">
				<a href="logout.php" style="text-decoration: none;"><button class="col-xs-12 col-sm-2 col-md-2 btn btn-color-first"><b>EXIT</b></button></a>
			</div>
		</div>
		<div class="row justify-content-center text-center">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<button class="btn btn-color-first col-xs-8 col-sm-8 col-md-8" data-toggle="modal" data-target="#modal-Vendedor">CREATE SELLER</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<button class="btn btn-color-first col-xs-8 col-sm-8 col-md-8" data-toggle="modal" data-target="#modal-Usuarios">CREATED USERS</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<button class="btn btn-color-first col-xs-8 col-sm-8 col-md-8" data-toggle="modal" data-target="#modal-Formatear">FORMAT SYSTEM</button>
			</div>
		</div>
	</main>
	<div class="modal fade" id="modal-Vendedor">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">NEW SELLER</h4>
				</div>
				<div class="modal-body">
					<div id="stats-creacion-vendedor" class="text-center"></div>
					<label>USER</label>
					<input type="text" class="form-control" id="usuario">
					<label>PASSWORD</label>
					<input type="password" class="form-control" id="clave">	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					<button type="button" class="btn btn-color-secound" id="btnCrearVendedor" value="btnCrearVendedor" disabled >CREATE</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<div class="modal fade" id="modal-Agenda">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">CUSTOMERS</h4>
				</div>
				<div class="modal-body table_agenda">
					<?php $Mostrar = new Vista();?>
					<?php $Mostrar -> Agenda()?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<div class="modal fade" id="modal-Formatear">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">SYSTEM FORMAT</h4>
				</div>
				<div class="modal-body table_agenda">
				<div id="stats-formateo" class="text-center"></div>
				<div class="row">
					<div class="col-12">
						<h4>REMEMBER IF YOU WANT TO FORMAT THE SYSTEM, ALL EXISTING INFORMATION WILL BE DELETED, WHETHER IT IS CUSTOMERS, SELLERS, BILLINGS ETC... IF YOU WANT EVEN TO FORMAT IT PRESS CONFIRM</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
					<button type="button" class="btn btn-color-secound btn-block" id="btnFormatear" value="btnFormatear" disabled><b>CONFIRM</b></button>
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<div class="modal fade" id="modal-Usuarios">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">CREATED USERS</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
						<?php $Mostrar = new Vista();?>
						<?php $Mostrar -> Vendedores()?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/ajax.js"></script>
</body>
</html>