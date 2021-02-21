<?php 
include("coneccion.php");
date_default_timezone_set('America/Caracas');
//Registrar Usuario
if(isset($_POST['btn-register'])){
	//Post
	$usuario = $_POST['name_user'];
	$clave = base64_encode($_POST['pass_user']);
	$correo = $_POST['email_user'];
	$sexo_usuario = $_POST['sexo_user'];
	$pais_usuario = $_POST['pais'];
	$fechaNacimiento_usuario = strtotime($_POST['date_user']);
	//Transformando formato de fecha
	$transformarFecha = date('Y-m-d', $fechaNacimiento_usuario);
	$fechaActual = date('Y-m-d');
	//Calculando edad
	$datetimeUsuario = date_create($transformarFecha);
	$datetimeServidor = date_create($fechaActual);
	$interval = date_diff($datetimeUsuario, $datetimeServidor);
	$edadUsuario = $interval->format('%Y%');
	$consulta = mysqli_query($conect,"SELECT * FROM usuarios WHERE correo = '$correo'");
	if(mysqli_num_rows($consulta) > 0){
		echo "<script language='javascript'>alert('El correo ya existe'); location.href = '../index.php' </script>";
	}else{
	$campos = strlen($usuario)*strlen($clave)*strlen($correo)*strlen($pais_usuario);
	if($campos == true){
		if($sexo_usuario == 'Hombre'){
			if (isset($_FILES["file"]["name"])) {
				$name = $_FILES["file"]["name"];
    			$tmp_name = $_FILES['file']['tmp_name'];
    			$error = $_FILES['file']['error'];
    			if (!empty($name)) {
        			$location = '../profiles/';
        			if(move_uploaded_file($tmp_name, $location.$name)){
						if(mysqli_query($conect,"INSERT INTO usuarios VALUES ('', '$usuario', '$edadUsuario', '$clave','$correo','$sexo_usuario','Mujer','$transformarFecha', '$pais_usuario','$name', 'NO',0)")){
							if(mysqli_query($conect,"INSERT INTO configuracion VALUES ('$correo', '', '', '','','','',0,'')")){
						echo "<script language='javascript'>alert('Se ha registrado satisfactoriamente'); location.href = '../index.php' </script>";}
							else{
								echo "<script language='javascript'>alert('Error en insertar la configuracion'); location.href = '../index.php' </script>";
							}	
						}else{
						echo "<script language='javascript'>alert('Error en insertar el registro'); location.href = '../index.php' </script>";
						}
        			}
    			} else {
    			echo "<script language='javascript'>alert('Error no hay imagen cargada'); location.href = '../index.php' </script>";
    			}
			}			
		}
		if($sexo_usuario == 'Mujer'){
			if (isset($_FILES["file"]["name"])) {
				$name = $_FILES["file"]["name"];
    			$tmp_name = $_FILES['file']['tmp_name'];
    			$error = $_FILES['file']['error'];
    			if (!empty($name)) {
        			$location = '../profiles/';
        			if(move_uploaded_file($tmp_name, $location.$name)){
						if(mysqli_query($conect,"INSERT INTO usuarios VALUES ('', '$usuario', '$edadUsuario', '$clave','$correo','$sexo_usuario','Hombre','$transformarFecha','$pais_usuario','$name', 'NO',0)")){
							if(mysqli_query($conect,"INSERT INTO configuracion VALUES ('$correo', '', '', '','','','',0,'')")){
							echo "<script language='javascript'>alert('Se ha registrado satisfactoriamente'); location.href = '../index.php' </script>";
							}else{
							echo "<script language='javascript'>alert('Error en insertar la configuracion'); location.href = '../index.php' </script>";	
							}
						}else{
						echo "<script language='javascript'>alert('Error en insertar el registro'); location.href = '../index.php' </script>";
						}
        			}
    			} else {
    			echo "<script language='javascript'>alert('Error no hay imagen cargada'); location.href = '../index.php' </script>";
    			}
			}	
		}
		if($sexo_usuario == 'null'){
			echo "<script language='javascript'>alert('Debe elegir su sexo'); location.href = '../index.php' </script>";
		}
	}else{
		echo "<script language='javascript'>alert('Complete los campos'); location.href = '../index.php' </script>";
	}
	}
}
//Recuperar contraseña
if(isset($_POST['btn-recuperar'])){
	$email_recuperar = $_POST['correo_recuperacion'];
	$campos = strlen($email_recuperar);
	if($campos == true){
		$consulta = mysqli_query($conect,"SELECT * FROM usuarios WHERE correo = '$email_recuperar'");
		if(mysqli_num_rows($consulta) > 0){
			$resultado = mysqli_fetch_array ($consulta);
			$de = "no-reply@dateadventista.com";
			$Para = $email_recuperar;
			$mensaje = "
			<html>
				<head>
				<title>Correo de Recuperacion</title>
				</head>
			<body>
				<h1>Hola ".$resultado['nombre']."</h1>
				<p>
				<b>Gracias por enviarnos tu solicitud de contraseña, por favor no respondas este correo</b>.</p>
				<p>A continuacion se te suministra la siguiente informacion:</p>
				<p>Correo electronico: <b>".$email_recuperar."</b><br/> Contraseña: <b>".base64_decode($resultado['password'])."</b><br/></p>
			</body>
			</html>";
		$cabeceras = "MIME-Version: 1.0" . "\r\n";
		$cabeceras .= "Content-type:text/html; charset=UTF-8" . "\r\n";  
		$cabeceras .= "From: Date Adventista " . $de;
		if(mail($Para,"Recuperacion de Contraseña - Date Adventista",$mensaje,$cabeceras)){
			echo "<script language='javascript'>alert('Correo enviado'); location.href = '../index.php' </script>";
		}else{
			echo "<script language='javascript'>alert('Correo no enviado'); location.href = '../index.php' </script>";
		}
		}else{
			echo "<script language='javascript'>alert('Correo no existe'); location.href = '../index.php' </script>";
		}
	}else{
		echo "<script language='javascript'>alert('Por favor coloque su correo electronico'); location.href = '../index.php' </script>";	
	}
}
//Login de usuario
if(isset($_POST['btn-login'])){
session_start();
$usuario = $_POST['user'];
$password = base64_encode($_POST['password']);
$campos	= strlen($usuario)*strlen($password);
$estatus = true;
if($campos == true){
	$consulta = mysqli_query($conect,"SELECT * FROM usuarios WHERE correo = '$usuario' and password = '$password'");
	if(mysqli_num_rows($consulta) > 0){
		$resultado = mysqli_fetch_array ($consulta);
		$_SESSION['estatus'] = $estatus;
		$_SESSION['id'] = $resultado['id_user'];
		$_SESSION['correo'] = $resultado['correo'];
		$_SESSION['perfil'] = $resultado['perfil_usuario'];
		$_SESSION['usuario'] = $resultado['nombre'] ;
		$_SESSION['edad'] = $resultado['edad'] ;
		$_SESSION['sexo'] = $resultado['sexo_user'];
		$_SESSION['pais'] = $resultado['pais'];
		$_SESSION['sexo_interesado'] = $resultado['sexo_busqueda'];
		$_SESSION['fecha_nacimiento'] = $resultado['fecha_user'];
		$_SESSION['activo'] = $resultado['activo'];
		mysqli_query($conect,"UPDATE usuarios SET activo = 1 WHERE correo = '$usuario'");
		echo "<script language='javascript'>location.href = '../php/panel_user.php' </script>";
	}else{
		echo "<script language='javascript'>alert('Error en usuario o contraseña'); location.href = '../index.php' </script>";
	}
}else{
	echo "<script language='javascript'>alert('Complete los campos'); location.href = '../index.php' </script>";
}
}
//Agregar foto
if(isset($_POST['btn-agregar'])){
	session_start();
	$correo = $_SESSION['correo'];
	if (isset($_FILES["file"]["name"])) {
	$name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    	if (!empty($name)) {
    	$location = '../profiles/';
    		if(move_uploaded_file($tmp_name, $location.$name)){
    			if(mysqli_query($conect,"INSERT INTO fotos VALUES ('', '$correo', '$name')")){
				echo "<script language='javascript'>alert('Se ha cargado la foto'); location.href = '../php/mificha.php' </script>";
				}else{
				echo "<script language='javascript'>alert('Error al cargar la foto'); location.href = '../php/mificha.php' </script>";
				}
    		}
    	} else {
    		echo "<script language='javascript'>alert('Error no hay foto que cargar'); location.href = '../php/mificha.php' </script>";
    	}
	}else{
		echo "<script language='javascript'>alert('Error con el boton de cargar'); location.href = '../php/mificha.php' </script>";
	}
}
//Enviar mensaje de chat
if(isset($_POST['btn-chat'])){
	session_start();
	$nombreUser1 = $_SESSION['usuario'];
	$mensaje = $_POST['mensaje'];
	$id = $_POST['user2'];
	$consulta = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$id'");
	$valor = mysqli_fetch_assoc($consulta);
	$nombreUser2 = $valor['nombre'];
	$dia = date('Y-m-d h:m:s');
	$consultaChatUser1 = mysqli_query($conect,"SELECT * FROM sala WHERE (user1 = '$nombreUser1' AND user2 ='$nombreUser2') OR (user1 = '$nombreUser2' AND user2 ='$nombreUser1')");
	$valorfinal = mysqli_fetch_assoc($consultaChatUser1);
	$id_chat =  $valorfinal['id_chat'];
	if($id_chat == 0){
	echo "<script language='javascript'> alert('El chat fue eliminado'); location.href = '../php/chats.php' </script>";
	}else{
	if(mysqli_query($conect,"INSERT INTO chat VALUES ('','$id_chat', '$nombreUser1','$nombreUser2', '$mensaje',0,'$dia')")){}
	echo "<script language='javascript'> location.href = '../php/chat.php?id=$id' </script>";
	}
}
//Cambiar correo electronico
if(isset($_POST['btn-cambiar-correo'])){
	session_start();
	$correo = $_SESSION['correo'];
	$correoNuevo = $_POST['correo_nuevo'];
	$correoConfirmacion = $_POST['correo_confirmacion'];
	$campos = strlen($correoNuevo)*strlen($correoConfirmacion);
	if($campos == true){
		if($correoNuevo == $correoConfirmacion ){
			if(mysqli_query($conect,"UPDATE usuarios SET correo = '$correoNuevo' WHERE correo = '$correo'")){
				echo "<script language='javascript'> alert('Correo cambiado'); location.href = 'ajustes.php' </script>";
			}else{
				echo "<script language='javascript'> alert('No se ha cambiado el correo'); location.href = 'ajustes.php' </script>";
			}
		}else{
			echo "<script language='javascript'> alert('Correos no son iguales'); location.href = 'ajustes.php' </script>";
		}
	}else{
		echo "<script language='javascript'> alert('Complete los campos'); location.href = 'ajustes.php' </script>";
	}
}
//Cambiar clave
if(isset($_POST['btn-cambiar-clave'])){
	session_start();
	$correo = $_SESSION['correo'];
	$claveNuevo = $_POST['clave_nueva'];
	$claveConfirmacion = $_POST['clave_confirmacion'];
	$campos = strlen($claveNuevo)*strlen($claveConfirmacion);
	if($campos == true){
		if($claveNuevo == $claveConfirmacion ){
		$clave = base64_encode($claveNuevo);
			if(mysqli_query($conect,"UPDATE usuarios SET password = '$clave' WHERE correo = '$correo'")){
				echo "<script language='javascript'> alert('Clave cambiado'); location.href = 'ajustes.php' </script>";
			}else{
			echo "<script language='javascript'> alert('No se ha cambiado la Clave'); location.href = 'ajustes.php' </script>";
			}
		}else{
		echo "<script language='javascript'> alert('Las claves no son iguales'); location.href = 'ajustes.php' </script>";
		}
	}else{
		echo "<script language='javascript'> alert('Complete los campos'); location.href = 'ajustes.php' </script>";
	}	
}
if(isset($_GET)){
	//Eliminar fotos
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if(mysqli_query($conect,"DELETE FROM fotos WHERE id_foto = '$id'")){
		echo "<script language='javascript'> alert('Imagen eliminada'); location.href = '../php/mificha.php' </script>";
		}else{
		echo "<script language='javascript'> alert('La imagen no se pudo eliminar'); location.href = '../php/mificha.php' </script>";		
		}
	}
	//Eliminar Cuenta
	if(isset($_GET['eliminar'])){
		session_start();
		$usuario = $_GET['eliminar'];
		$consulta = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$usuario'");
		$valor = mysqli_fetch_assoc($consulta);
		$correo = $valor['correo'];
		$nombre = $valor['nombre'];
		mysqli_query($conect,"DELETE FROM usuarios WHERE id_user = '$usuario'");
		mysqli_query($conect,"DELETE FROM fotos WHERE correo = '$correo'");
		mysqli_query($conect,"DELETE FROM chat WHERE nombre = '$nombre'");
		session_destroy();
		echo "<script language='javascript'>alert('Se elimino la cuenta'); location.href = '../index.php' </script>";
		}
	//Eliminar sala de chat
	if(isset($_GET['eliminarsala'])){
		session_start();
		$user1 = $_SESSION['id'];
		$delUser2 = $_GET['eliminarsala'];
		$consultaUser1 = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$user1'");
		$valorUser1 = mysqli_fetch_assoc($consultaUser1);
		$delUser1 = $valorUser1['nombre'];
		if(mysqli_query($conect,"DELETE FROM sala WHERE (user1='$delUser1' AND user2='$delUser2') OR (user1='$delUser2' AND user2='$delUser1')")){
			if (mysqli_query($conect,"DELETE FROM chat WHERE (user1='$delUser1' AND user2='$delUser2') OR (user1='$delUser2' AND user2='$delUser1')")) {
				echo "<script language='javascript'>alert('Se elimino correctamente'); location.href = 'chats.php' </script>";
			}
		}else{
			echo "<script language='javascript'>alert('No elimino del la sala de chat'); location.href = 'chats.php' </script>";
		}
	}
	//elimiar feeling
	if(isset($_GET['eliminarfeeling'])){
		session_start();
		$feelingUser1 = $_SESSION['id'];
		$feelingDelUser2 = $_GET['eliminarfeeling'];
		$consultaUser1 = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$feelingUser1'");
		$valorUser1 = mysqli_fetch_assoc($consultaUser1);
		$feelingDelUser1 = $valorUser1['nombre'];
		if(mysqli_query($conect,"DELETE FROM feeling WHERE (user1='$feelingDelUser1' AND user2='$feelingDelUser2') OR (user1='$feelingDelUser2' AND user2='$feelingDelUser1')")){
				echo "<script language='javascript'>alert('Adios feeling'); location.href = 'feeling.php' </script>";
		}else{
			echo "<script language='javascript'>alert('Error al eliminar feeling'); location.href = 'feeling.php' </script>";
		}
	}
	//Validar Notificaciones
	if(isset($_GET['not'])){
		session_start();
		$usuario = $_GET['not'];
		$consulta = mysqli_query($conect,"SELECT * FROM notificacion WHERE user2='$usuario'");
		$valorId = mysqli_fetch_assoc($consulta);
		$id = $valorId['user1'];
		$tipoNotificaion = $valorId['tipo'];
		$consultaUsuario1 = mysqli_query($conect,"SELECT * FROM usuarios WHERE nombre='$id'");
		$valorIdUser1 = mysqli_fetch_assoc($consultaUsuario1);
		$idUser1 = $valorIdUser1['id_user'];
		echo $tipoNotificaion;
		if(mysqli_query($conect,"UPDATE notificacion SET leido = 1 WHERE user2='$usuario'")){
			if($tipoNotificaion == 'chat'){
				echo "<script language='javascript'>location.href = 'chat.php?id=$idUser1' </script>";
			}
			if($tipoNotificaion =='feeling'){
				echo "<script language='javascript'>location.href = 'ficha.php?id=$idUser1' </script>";	
			}
		}else{
			echo "<script language='javascript'>location.href = 'panel_user.php' </script>";
		}
	}
	//Visitas
	if(isset($_GET['ficha'])){
		session_start();
		$user1 = $_SESSION['usuario'];
		$idUser2 = $_GET['ficha'];
		$consulta = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user='$idUser2'");
		$result = mysqli_fetch_assoc($consulta);
		$user2 = $result['nombre'];
		$fechaActual = date('Y-m-d');
		if(mysqli_query($conect,"INSERT INTO visitas VALUES ('', '$user1', '$user2', '$fechaActual')")){
			echo "<script language='javascript'>location.href = 'ficha.php?id=$idUser2' </script>";
		}else{
			//echo "<script language='javascript'>location.href = 'ficha.php?id=$idUser2' </script>";
		}
	}		
}
//Cambiar clave
if(isset($_POST['btn-perfil'])){
	session_start();
	$correo = $_SESSION['correo'];
	$buscando = $_POST['buscando'];
	$presentacion = $_POST['presentacion'];
	$gustos = $_POST['gustos'];
	$preferencia = $_POST['prefencias'];
	$profesion = $_POST['profesion'];
	$fuma = $_POST['fumador'];
	$campos = strlen($buscando)*strlen($presentacion)*strlen($gustos)*strlen($preferencia)*strlen($profesion)*strlen($fuma);
	if($campos == true){
		if(mysqli_query($conect,"UPDATE configuracion SET item1='$buscando', item2='$presentacion', item3='$gustos', item4='$preferencia', item5='$profesion', item6='$fuma', estatus=1 WHERE id_correo = '$correo'")){
			echo "<script language='javascript'>alert('Se ha completado el perfil'); location.href = 'panel_user.php' </script>";
		}else{
			echo "<script language='javascript'>alert('No se completo el perfil'); location.href = 'panel_user.php' </script>";
		}
	}else{
		echo "<script language='javascript'>alert('Complete los campos'); location.href = 'panel_user.php' </script>";
	}
}
mysqli_close($conect);
?>