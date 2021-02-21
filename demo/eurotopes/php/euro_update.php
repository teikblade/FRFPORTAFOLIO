<?php
include 'conexion.php';
date_default_timezone_set('America/Caracas');
$fecha_creacion = date("Y-m-d");
session_start();
//LOGIN
if (isset($_POST['btnlogin'])) {
	$usaurio = $_POST['usuario'];
	$pass = $_POST['clave'];
	$campos = strlen($usaurio)*strlen($pass);
	$clave_encript = md5($pass);
	if($campos == true){
		$QueryBuscarUsuario = mysqli_query($conect,"SELECT * FROM vendedores WHERE usuario = '$usaurio' and clave = '$clave_encript'");
		if($usaurio == 'administrator' && $pass == 'administrator'){
			echo "<script type='text/javascript'>alert('Welcome Administrator'); location.href='euro_administrator.php';</script>";
		}
		if(mysqli_num_rows($QueryBuscarUsuario) > 0){
			while ($vendedor = mysqli_fetch_assoc($QueryBuscarUsuario)) {
    			$_SESSION["vendedor"] = $vendedor["usuario"];
    		}
			echo "<script type='text/javascript'>alert('Welcome Seller'); ; location.href='euro_seller.php';</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('User Not Exits'); location.href='../index.html';</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Complete Fields'); location.href='../index.html';</script>";
	}
}
//CREAR CLIENTE
if (isset($_POST['btncrearcliente'])) {
	$nombre_cliente = $_POST['nombre'];
	$direccion_cliente = $_POST['direccion'];
	$correo_cliente = $_POST['correo'];
	$telefono_cliente = $_POST['telefono'];
	$cedula_cliente = $_POST['cedula'];
	$campos = strlen($nombre_cliente)*strlen($direccion_cliente)*strlen($correo_cliente)*strlen($telefono_cliente)*strlen($cedula_cliente);
	if($campos == true){
		$QueryCrearCliente = mysqli_query($conect,"INSERT INTO clientes VALUES ('','$nombre_cliente','$cedula_cliente','$telefono_cliente','$direccion_cliente','$correo_cliente','$fecha_creacion')");
		if ($QueryCrearCliente == true) {
			echo "<h4 style='color:green;'>Successful loading</h4>";
		} else{
			echo "<h4 style='color:red;'>Failed loading</h4>";
		}
	}else{
		echo "<h4 style='color:red;'>Complete Fields</h4>";
	}
}
//PREFACTURAR
if(isset($_POST['btnprefactura'])){
	$producto_vendedor = $_POST['producto'];
	$monto_vendedor = $_POST['monto'];
	$cantidad_vendedor = $_POST['cantidad'];
	$metros_vendedor = $_POST['metros'];

	$campos = strlen($producto_vendedor)*strlen($monto_vendedor)*strlen($cantidad_vendedor)*strlen($metros_vendedor);

	if($campos == true){
		$QueryPrecargar = mysqli_query($conect,"INSERT INTO precargo VALUES ('','$cantidad_vendedor','$producto_vendedor','$metros_vendedor','$monto_vendedor','$_SESSION[vendedor]')");
		if ($QueryPrecargar == true) {
			echo "<h4 style='color:green;'>Successful loading</h4>";
		} else{
			echo "<h4 style='color:red;'>Failed loading</h4>";
		}
	}else{
		echo "<h4 style='color:red;'>Complete Fields</h4>";
	}
}
if(isset($_POST['btnborrarprefactura'])){
	$QueryBorrarPrecargar = mysqli_query($conect,"DELETE FROM precargo WHERE usuario = '$_SESSION[vendedor]'");
		if ($QueryBorrarPrecargar == true) {
			echo "<h4 style='color:green;'>SE ELIMINO CORRECTAMENTE</h4>";
		} else{
			echo "<h4 style='color:red;'>NO SE PUDO ELIMINAR</h4>";
		}
}
//CREAR VENDEDOR
if(isset($_POST['btncrearvendedor'])){

	$usaurio_vendedor = $_POST['usuario'];
	$clave_vendedor = $_POST['clave'];

	$campos = strlen($usaurio_vendedor)*strlen($clave_vendedor);
	$clave_encript = md5($clave_vendedor);
	if($campos == true){
		$QueryCrearVendedor = mysqli_query($conect,"INSERT INTO vendedores VALUES ('','$usaurio_vendedor','$clave_encript','$fecha_creacion')");
		if ($QueryCrearVendedor == true) {
			echo "<h4 style='color:green;'>USER CREATED, SUCCESSFULLY</h4>";
		} else{
			echo "<h4 style='color:red;'>USER CREATED, FAILED</h4>";
		}
	}else{
		echo "<h4 style='color:red;'>COMPLETE FIELDS</h4>";
	}
}
if(isset($_POST['btnformatear'])){
	$QueryFormateoVendedores = mysqli_query($conect,"DELETE FROM vendedores");
	if($QueryFormateoVendedores == true){
		$QueryFormateoClientes = mysqli_query($conect,"DELETE FROM clientes");
		if($QueryFormateoClientes == true){
			$QueryFormateoPrecargo = mysqli_query($conect,"DELETE FROM precargo");
			if($QueryFormateoPrecargo == true){
				echo "<h4 style='color:green;'>SE FORMATEO CORRECTAMENTE</h4>";
			}else{
				echo "<h4 style='color:red;'>NO SE PUDO FORMATEAR</h4>";
			}
		}else{
			echo "<h4 style='color:red;'>NO SE PUDO FORMATEAR</h4>";
		}
	}else{
		echo "<h4 style='color:red;'>NO SE PUDO FORMATEAR</h4>";
	}
}