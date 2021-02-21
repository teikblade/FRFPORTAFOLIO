<?php 
include("coneccion.php");
//Secret Key - reCaptcha v2
//$secret_key = '6Le5M68UAAAAAPAioS9KCzYW0ZBSfE_qa6HbKWi6';
$usuario = $_POST['name_user'];
$clave = base64_encode($_POST['pass_user']);
$correo = $_POST['email_user'];
$sexo_usuario = $_POST['sexo_user'];
$fechaNacimiento_usuario = strtotime($_POST['date_user']);
$transformarFecha = date('Y-m-d', $fechaNacimiento_usuario);
$fechaActual = date('Y-m-d');
$datetimeUsuario = date_create($transformarFecha);
$datetimeServidor = date_create($fechaActual);
$interval = date_diff($datetimeUsuario, $datetimeServidor);
$edadUsuario = $interval->format('%Y%');
if(isset($_POST['btn-register'])){
	$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
	$consulta = mysqli_query($conect,$sql);
	if(mysqli_num_rows($consulta) > 0){
		echo "<script language='javascript'>alert('El correo ya existe'); location.href = '../index.php' </script>";
	}else{
	$campos = strlen($usuario)*strlen($clave)*strlen($correo);
	if($campos == true){
		if($sexo_usuario == 'Hombre'){
			if (isset($_FILES["file"]["name"])) {
				$name = $_FILES["file"]["name"];
    			$tmp_name = $_FILES['file']['tmp_name'];
    			$error = $_FILES['file']['error'];
    			if (!empty($name)) {
        			$location = '../profiles/';
        			if(move_uploaded_file($tmp_name, $location.$name)){
					$sql = "INSERT INTO usuarios VALUES ('', '$usuario', '$edadUsuario', '$clave','$correo','$sexo_usuario','Mujer','$transformarFecha','$name')";
						if(mysqli_query($conect,$sql)){
						echo "<script language='javascript'>alert('Se ha registrado satisfactoriamente'); location.href = '../index.php' </script>";
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
					$sql = "INSERT INTO usuarios VALUES ('', '$usuario', '$edadUsuario', '$clave','$correo','$sexo_usuario','Hombre','$transformarFecha','$name')";
						if(mysqli_query($conect,$sql)){
						echo "<script language='javascript'>alert('Se ha registrado satisfactoriamente'); location.href = '../index.php' </script>";
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
}else{
	echo "<script language='javascript'>alert('Registro Fallido'); location.href = '../index.php' </script>";
}
?>