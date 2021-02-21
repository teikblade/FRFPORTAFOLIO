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
				<h4 class="text-center text-white">USUARIO: <b class="text-color-first"><?php echo $_SESSION["vendedor"] ?></b>  FECHA: <b class="text-color-first"><?php echo $Date;?></b></h4>
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
				<button class="btn btn-color-first col-xs-12 col-sm-12 col-md-8" data-toggle="modal" data-target="#modal-Usuario">NEW CLIENT</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<button class="btn btn-color-first col-xs-12 col-sm-12 col-md-8" data-toggle="modal" data-target="#modal-Factura">INVOICE ORDER</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<button class="btn btn-color-first col-xs-12 col-sm-12 col-md-8" data-toggle="modal" data-target="#modal-Agenda">CUSTOMERS</button>
			</div>
		</div>
	</main>
	<div class="modal fade" id="modal-Usuario">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">NEW CLIENT</h4>
				</div>
				<div class="modal-body">
					<div id="stats-creacion" class="text-center"></div>
					<label>NAME</label>
					<input type="text" class="form-control" id="nombre">
					<label>DNI OR RIF</label>
					<input type="number" class="form-control" id="identificacion">
					<label>PHONE</label>
					<input type="number" class="form-control" id="telefono">
					<label>DIRECTION</label>
					<textarea name="" id="direccion" class="form-control"></textarea>
					<label>EMAIL</label>
					<input type="email" class="form-control" id="email">	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					<button type="button" class="btn btn-color-secound" id="btnCrear" value="btnCrear" disabled>CREATE</button>
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
	<div class="modal fade" id="modal-Factura">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">INVOICE ORDER</h4>
				</div>
				<div class="modal-body">
					<h5>COMPLETE THE FOLLOWING FIELDS BEFORE BILLING</h5>
					<form method="post" action="euro_generar.php" id="GenerarFactura">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
						<?php $Mostrar = new Vista();?>
						<?php $Mostrar -> Facturar()?>
						</div>
					</div>
					<div class="row modal_datos text-center">
						<div class="col-xs-12 col-sm-12 col-md-4">
							<label>Date:</label>
							<input type="text" placeholder="<?php echo $Date ?>" disabled="disabled" class="text-center col-xs-12 col-sm-12">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<label>Order N°</label>
							<input type="text" placeholder="<?php echo $factura ?>" class="text-center col-xs-12 col-sm-12" value="<?php echo $factura;?>" name="factura">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<label>Seller</label>
							<input type="text" placeholder="<?php echo $_SESSION["vendedor"] ?>" class="text-center col-xs-12 col-sm-12" disabled="disabled">
						</div>
					</div>
					<div class="row modal_datos text-center">
						<div class="col-xs-12 col-sm-12 col-md-3">
							<label>Quantity.</label>
							<input type="text" id="cantidad" class="text-center col-xs-12 col-sm-12">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3">
							<label>TOPE/QUARTZ</label>
							<textarea id="producto" class="text-center col-xs-12 col-sm-12"></textarea>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3">
							<label>Meters</label>
							<input type="number" id="metros" class="text-center col-xs-12 col-sm-12">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3">
							<label>$</label>
							<input type="number" id="monto" class="text-center col-xs-12 col-sm-12">
						</div>
					</div>
					</form>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div id="stats-prefacturacion" class="text-center"></div>
							<button class="col-xs-12 col-sm-12 col-md-12 text-center btn btn-color-secound"  id="btnPrefactura" value="btnPrefactura">LOAD</button>
						</div>
					</div>
					<div class="row modal_datos">
						<div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
							<?php $Mostrar = new Vista(); ?>
							<?php $Mostrar -> ProductosCargados(); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/ajax.js"></script>
</body>
</html>