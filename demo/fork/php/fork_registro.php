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
			<div class="col-12" id="resultado">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12">
				<form id="FormAdministradorCrearUsuario" class="form-style-inventario">
				<div class="row">
					<div class="col-sm-12 col-xs-12 col-md-5">
						<label>NOMBRE COMPLETO</label>
						<input type="text" class="form-control" placeholder="NOMBRE COMPLETO" name="nombre">
					</div>
					<div class="col-sm-12 col-xs-12 col-md-4">
						<label>USUARIO</label>
						<input type="text" class="form-control" placeholder="USUARIO" name="usuario">
					</div>
					<div class="col-sm-12 col-xs-12 col-md-3">
						<label>CONTRASEÑA</label>
						<input type="password" class="form-control" placeholder="CONTRASEÑA" name="password">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12">
						<label>PERFIL O CARGO A ASIGNAR</label>
						<select class="form-control" name="perfil">
							<option value="SELECCIONE">SELECCIONE</option>
							<!-- <option value="ADMUSUARIOS">ADMINISTRADOR DE USUARIOS</option> -->
							<option value="1800">VENTAS</option>
							<option value="2002">ALMACEN</option>
							<option value="3500">ADMINISTRADOR DE USUARIOS</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12">
					<button type="submit" class="btn btn-success btn-block font-weight-bold" form="FormAdministradorCrearUsuario" id="FormAdministradorCrearUsuario">CREAR USUARIO</button>
					</div>
				</div>
			</form>
			</div>
			<div class="col-sm-12 col-xs-12 col-md-12">
				<form id="FormAdministradorEliminarUsuario" class="form-style-inventario">
					<div class="row">
						<div class="col-sm-12 col-xs-12 col-md-12">
							<label> ELIMINAR CUENTA - ID DE CUENTA DE USUARIO</label>
							<input type="number" class="form-control" placeholder="CODIGO DE USUARIO" name="eliminar">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-xs-12 col-md-12">
							<button type="submit" class="btn btn-danger btn-block" form="FormAdministradorEliminarUsuario" disabled="disabled" >ELIMINAR</button>
						</div>
					</div>
				</form>
			</div>	
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12">
				<?php $Mostrar = new Muestra(); ?>
				<?php $Mostrar->MostrarCuentas();?>
			</div>
		</div>
		</div>
	</main>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/fork_ajax_registro.js"></script>
</body>
</html>