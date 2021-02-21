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
		<div class="row text-center mb-4">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<h2 class="tittle-font">FORK</h2>
				<h6 class="subtittle-font-user">SISTEMA DE INVENTARIO FORK USUARIO: <?php echo strtoupper($_SESSION["usuario"]);?></h6>
				<a href="fork_logout.php" style="text-decoration: none;" class="btn btn-danger btn-block font-weight-bold"><span>CERRAR SESION</span></a>
			</div>
		</div>
		<div class="row">
			<div class="col-12" id="resultado"></div>
		</div>
		<div class="row mb-4">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<label>CODIGO DE PRODUCTO</label>
				<input type="text" class="form-control" placeholder="SOLO PARA MODIFICAR Y ELIMINAR" id="codproducto">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<label>PRODUCTO</label>
				<input type="text" class="form-control" placeholder="NOMBRE DE PRODUCTO" id="producto">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<label>TIPO DE TELA</label>
				<input type="text" class="form-control" placeholder="TIPO DE TELA" id="tela">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<label>CANTIDAD</label>
				<input type="text" class="form-control" placeholder="CANTIDAD DE PRODUCTOS" id="cantidad">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<label>TALLA</label>
				<input type="text" class="form-control" placeholder="TALLA DEL PRODUCTO" id="talla">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<label>COLOR</label>
				<select class="form-control" id="color">
						<option value="SELECCIONE" selected>SELECCIONE</option>
						<option>BLANCO</option>
						<option>NARANJA</option>
						<option>AZUL MARINO</option>
						<option>BEIGE</option>
						<option>ROJO</option>
						<option>MARRON OSCURO</option>
				</select>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-xs-12 col-sm-12 col-md-4"><button type="submit" class="btn btn-success btn-block font-weight-bold" value="AgregarProductos" id="submitAgregar">AGREGAR</button></div>
			<div class="col-xs-12 col-sm-12 col-md-4"><button type="submit" class="btn btn-secondary btn-block font-weight-bold" value="ModificarProducto" id="submitModificar" disabled="disabled">MODIFICAR</button></div>
			<div class="col-xs-12 col-sm-12 col-md-4"><button type="submit" class="btn btn-danger btn-block font-weight-bold" value="QuitarProductos"  id="submitEliminar">ELIMINAR</button></div>
		</div>
		<div class="row">
			<div class="col-12 table-wrapper-scroll-y">
				<?php $Mostrar = new Muestra(); ?>
				<?php $Mostrar->MostrarInventario();?>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 table-wrapper-scroll-y">
				<h5 class="text-center text-white">ORDENES DE COMPRA</h5>
				<?php $Mostrar = new Muestra(); ?>
				<?php $Mostrar->MostrarOrdenes();?>
			</div>
		</div>
	</main>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/fork_ajax_almacen.js"></script>
</body>
</html>