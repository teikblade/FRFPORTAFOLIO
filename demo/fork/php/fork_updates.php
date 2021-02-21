<?php
include('conexion.php');
/*
ERRORES
Success - TODO OK
Fail01 - INSERT FAIL
Fail02 - PERFIL NO SELECCIONADO
Fail03 - COMPLETE CAMPOS
Fail04 - USUARIO 0 CLAVE ERRONEA
Fail05 - USUARIO NO EXISTE
Fail06 - SELECICONE COLOR
Fail07 - COLOQUE UN PRODUCTO
Fail08 - PRODUCTO NO EXISTE O EXCEDE LA CANTIDAD

USUARIOS
rol1 - ALMACEN
rol2 - VENTAS
rol3 - REGISTRO DE USUARIOS
*/
//ACCESO O LOGIN - INDEX.HTML
if(isset($_POST['BtnAcceso'])){
    session_start();
	$usuario = $_POST['usuario'];
	$password = $_POST['clave'];
	$mdpass = md5($password);
	$campos = strlen($usuario)*strlen($password);
	if($campos == true){
		$QueryExistUsuario = mysqli_query($conect,"SELECT * FROM fork_users WHERE USER = '$usuario'");
        if (mysqli_num_rows($QueryExistUsuario) <= 0) {
            echo "Fail05";
        }
		while ($row = mysqli_fetch_assoc($QueryExistUsuario)) {
        $password_db = $row["password"];
        $rol = $row["id_perfil"];
        $persona = $row["nombre"];
        if ($mdpass == $password_db) {
        	//ALMACEN
            if($rol == '2002'){ 
            $key_almacen = 1;
            $key2_logout = 4;
            $_SESSION["estatusalmacen"]=$key_almacen;
            $_SESSION["identificado"] =$key2_logout;
            $_SESSION["usuario"] =$usuario;
            $_SESSION["persona"] =$persona;
        	echo "rol1";
        	}
            //VENTAS
        	if($rol == '1800'){
            $key_ventas = 2;
            $key2_logout = 4;
            $_SESSION["estatusventas"]=$key_ventas;
            $_SESSION["identificado"] =$key2_logout;
            $_SESSION["usuario"] =$usuario;
            $_SESSION["persona"] =$persona;
        	echo "rol2";
        	}
            //REGISTROS
            if($rol == '3500'){
            $key_registro = 3;
            $key2_logout = 4;
            $_SESSION["estatusregistro"]=$key_registro;
            $_SESSION["identificado"] =$key2_logout;
            $_SESSION["usuario"] =$usuario;
            $_SESSION["persona"] =$persona;
            echo "rol3";
            }
        }else{
        	echo "Fail04";
        }

    	}
	}else{
		echo "Fail03";
	}
}
//ADMINISTRADOR DE USUARIOS
//CREAR USUARIOS
if(isset($_POST['BtnNuevoUsuario'])){
	$nombre = $_POST['nombre'];
	$nusuario = $_POST['usuario'];
	$npassword = $_POST['password'];
	$rol = $_POST['perfil'];
	$campos = strlen($nombre)*strlen($nusuario)*strlen($npassword)*strlen($rol);
	if($campos == true){
		if ($rol != 'SELECCIONE') {
			$ClaveEncript = md5($npassword);
			$QueryInsert = mysqli_query($conect,"INSERT INTO fork_users VALUES ('', '$nombre','$nusuario','$ClaveEncript','$rol')");
			if($QueryInsert == true){
				echo "Success";
			}else{
				echo "Fail01";
			}
		}else{
			echo "Fail02";
		}
	}else{
		echo "Fail03";
	}
}
//ELIMINAR USUARIOS
if(isset($_POST['BtnEliminarUsuario'])){
	$EliminarUsuario = $_POST['eliminar'];
	$campos = strlen($EliminarUsuario);
	if($campos == true){
		$QueryDeleteUsuario = mysqli_query($conect,"DELETE FROM fork_users WHERE id = '$EliminarUsuario'");
		if($QueryDeleteUsuario == true){
			echo "Success";
		}else{
			echo "Fail01";
		}
	}else{
		echo "Fail03";
	}
}
//ALMACEN
//AGREGAR PRODUCTOS DE INVENTARIO
if(isset($_POST['AgregarProductos'])){
	$nameproducto = $_POST['producto'];
	$tipotela = $_POST['tela'];
	$cantidadproducto = $_POST['cantidad'];
	$talla = $_POST['talla'];
	$colores = $_POST['color'];
	$campos = strlen($nameproducto)*strlen($tipotela)*strlen($cantidadproducto)*strlen($talla);

	if($campos == true){
		if($colores != 'SELECCIONE'){
			$QueryInsertProducto = mysqli_query($conect,"INSERT INTO fork_productos VALUES ('', '$nameproducto','$tipotela','$colores','$talla','$cantidadproducto')");
		if($QueryInsertProducto == true){
			echo "Success";
		}else{
			echo "Fail01";
		}
		}else{
		echo "Fail06";
		}
	}else{
		echo "Fail03";
	}
}
//ELIMINAR PRODUCTOS DE INVENTARIO
if(isset($_POST['QuitarProductos'])){
	$CodProducto = $_POST['codproducto'];

	$campos = strlen($CodProducto);

	if($campos == true){
		$QueryDeleteProducto = mysqli_query($conect,"DELETE FROM fork_productos WHERE nproducto = '$CodProducto'");
		if($QueryDeleteProducto == true){
			echo "Success";
		}else{
			echo "Fail01";
		}
	}else{
		echo "Fail03";
	}
}

/*
if (isset($_POST['ModificarProducto'])) {

	$CodProducto = $_POST['codproducto'];
	$nameproducto = $_POST['producto'];
	$tipotela = $_POST['tela'];
	$cantidadproducto = $_POST['cantidad'];
	$talla = $_POST['talla'];
	$colores = $_POST['color'];

	$campos = strlen($CodProducto);

	if ($campos == true) {
	$BuscarProducto = mysqli_query($conect,"SELECT * FROM fork_productos WHERE nproducto = '$CodProducto'");
	if (mysqli_num_rows($BuscarProducto)>0) {
		if (!empty($nameproducto)) {
		mysqli_query($conect,"UPDATE fork_productos SET producto = '$nameproducto' WHERE nproducto = '$CodProducto'");
		}
		if(!empty($tipotela)){
		mysqli_query($conect,"UPDATE fork_productos SET tipo_tela = '$tipotela' WHERE nproducto = '$CodProducto'");
		}
		if(!empty($cantidadproducto)){
		mysqli_query($conect,"UPDATE fork_productos SET cantidad = '$cantidadproducto' WHERE nproducto = '$CodProducto'");
		}
		if(!empty($talla)){
		mysqli_query($conect,"UPDATE fork_productos SET talla = '$talla' WHERE nproducto = '$CodProducto'");
		}
		if(!empty($colores) || $colores != 'SELECCIONE'){
		mysqli_query($conect,"UPDATE fork_productos SET color = '$colores' WHERE nproducto = '$CodProducto'");
		}else{
			echo "<h5 style='color:orange'>SELECCIONE UN COLOR VALIDO</h5>";
		}
		echo "<h5 style='color:green'>SE MODIFICO EL PRODUCTO</h5>";
	}else{
		echo "<h5 style='color:red'>CODIGO DE ORDEN NO EXISTE</h5>";
	}
	}else{
		echo "<h5 style='color:orange'>DEBE COLOCAR EL PRODCUTO</h5>";
	}
}
*/

//VENTAS
//GENERAR COTIZACION
if(isset($_POST['BtnCotizar'])){
	session_start();
	$usuario = $_SESSION["usuario"];
   	$pd1 = $_POST['pd1'];
	$c1 = $_POST['c1'];
	$p1 = $_POST['p1'];
	$campos = strlen($pd1)*strlen($c1)*strlen($p1);
	if($campos == true){
		if(empty($pd1)){
			echo "Fail07";
		}else{
			$QueryProductos = mysqli_query($conect,"SELECT * FROM fork_productos WHERE nproducto = '$pd1' AND cantidad >= '$c1'");
			if($vali = mysqli_num_rows($QueryProductos)<= 0){
				echo "Fail08";
			}else{
				mysqli_query($conect,"INSERT INTO fork_cot_temp (`id_cot`, `user`, `producto`, `cantidad`, `precio`) VALUES ('1','$usuario','$pd1','$c1','$p1')");
				echo "Success";
			}
		}
	}else{
		echo "Fail03";
	}
}

// ELIMINAR COTIAZIONES NO APORBADAS
if (isset($_POST['btn-historial'])) {
	$QueryDeleteHistorial = mysqli_query($conect,"DELETE FROM fork_ordenes WHERE estatus = 0");
	if($QueryDeleteHistorial == true){
	echo "<script languaje='javascript'>alert('SE ELIMINO HISTORIAL NO APROBADO'); location.href = 'fork_ventas.php';</script>";
	}
}

//CAMBIAR ESTATUS DE NUMERO DE ORDEN
if (isset($_POST['btn-orden'])) {
	$codigo = $_POST['orden'];
	$BuscarOrden = mysqli_query($conect,"SELECT * FROM fork_ordenes WHERE codigo_orden = '$codigo'");
	if (mysqli_num_rows($BuscarOrden)>0) {
		echo "<script languaje='javascript'>alert('SE HA GENERADO LA ORDEN'); location.href = 'fork_ventas.php';</script>";
		mysqli_query($conect,"UPDATE fork_ordenes SET estatus = 1 WHERE codigo_orden = '$codigo'");
	}else{
		echo "<script languaje='javascript'>alert('CODIGO DE ORDEN NO EXISTE'); location.href = 'fork_ventas.php';</script>";
	}
}
?>