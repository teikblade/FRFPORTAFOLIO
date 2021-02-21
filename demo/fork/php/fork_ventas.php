<?php include('fork_controller.php');?>
</html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema Fork</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body class="body-background">
	<main>
	<div class="container-fluid">
		<div class="row index-logo text-center">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<h2 class="tittle-font">FORK</h2>
				<h6 class="subtittle-font-user">SISTEMA DE INVENTARIO FORK USUARIO: <?php echo strtoupper($_SESSION["usuario"]);?></h6>
				<a href="fork_logout.php" style="text-decoration: none;" class="btn btn-danger btn-block font-weight-bold"><span>CERRAR SESION</span></a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12" id="resultado"></div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12  col-md-12 table-wrapper-scroll-y">
				<h5 class="text-center text-white font-weight-bold mt-1">INVENTARIO - FORK</h5>
				<?php $Mostrar = new Muestra(); ?>
				<?php $Mostrar->MostrarInventario();?>
			</div>
		</div>
		<div class="row panel-ventas">
			<div class="col-sm-12 col-xs-12 col-md-12 text-center">
				<h5 class="text-white">COTIZADOR - FORK</h5>
				<label>COTIZADOR - FORK CARGAR PRODUCTO</label>
				<!--<form method="post" action="fork_agregar.php" id="Cotizador">-->
				<div class="row justify-content-center">
					<input type="text" id="pd1" placeholder="COD. PRODUCTO" class="col-sm-12 col-xs-12 col-md-3 form-control text-center">
					<input type="text" id="c1" placeholder="CANTIDAD" class="col-sm-12 col-xs-12 col-md-3 form-control text-center">
					<input type="text" id="p1" placeholder="PRECIO" class="col-sm-12 col-xs-12 col-md-3 form-control text-center">
				</div>
				<!--</form>-->
				<button class="btn btn-success btn-block font-weight-bold" id="ProductoCotizar">AGREGAR OTRO PRODUCTO</button>
				<div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12">
						<?php $Mostrar = new Muestra(); ?>
						<?php $Mostrar->MostrarCotizacion();?>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-sm-12 col-xs-12 col-md-4"><a href="fork_generador.php" target="_blank" style="text-decoration: none;"><button type="submit" class="btn btn btn-secondary btn-block btn-block font-weight-bold">GENERAR COTIZACIONES</button></a></div>
			<div class="col-sm-12 col-xs-12 col-md-4"><button type="submit" class="btn btn btn-secondary btn-block font-weight-bold" data-toggle="modal" data-target="#modal-Orden">GENERAR VENTA</button></div>
			<div class="col-sm-12 col-xs-12 col-md-4"><button type="submit" class="btn btn btn-secondary btn-block btn-block font-weight-bold" data-toggle="modal" data-target="#modal-Cotizacion">HISTORIAL DE COTIZACIONES</button></div>
		</div>
	</div>
	</main>
	<!-- MODAL GENERAR COMPRAR -->
	<div class="modal fade" id="modal-Orden">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">ORDEN DE COMPRA</h4>
				</div>
				<form method="post" action="fork_updates.php">
				<div class="modal-body">
					<label>NUMERO DE ORDEN DE COMPRA</label>
					<input type="number" placeholder="N° DE ORDEN" class="form-control" name="orden">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="btn-orden">Enviar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- HISTORIAL DE COTIZACIONES -->
	<div class="modal fade" id="modal-Cotizacion">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">HISTORIAL DE COTIZACIONES</h4>
				</div>
				<form method="post" action="fork_updates.php">
				<div class="modal-body table-wrapper-scroll-y-modal">
					<?php $Mostrar = new Muestra(); ?>
					<?php $Mostrar->MostrarOrdenes();?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="btn-historial">ELIMINAR NO APROBADOS</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/fork_ajax_ventas.js"></script>
</body>
</html>