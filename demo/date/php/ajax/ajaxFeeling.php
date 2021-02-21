<?php
include('../coneccion.php');
session_start();
$feelinguser1 = $_SESSION['usuario'];
$iduser2 = $_POST['feeling'];
$consultaUser2 = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$iduser2'");
$valorUser1 = mysqli_fetch_assoc($consultaUser2);
$feelinguser2 = $valorUser1['nombre'];
$validarConsulta = mysqli_query($conect,"SELECT * FROM feeling WHERE (user1 = '$feelinguser1' AND user2 = '$feelinguser2') OR (user1 = '$feelinguser2' AND user2 = '$feelinguser1')");
$idFeeling = mysqli_fetch_assoc($validarConsulta);
if(isset($idFeeling)){
		echo "<div class='col-12'>
				<h5 class='text-center bg-danger rounded aviso-panel' id='mensaje'>TU FEELING YA EXISTE</h5>	
			</div>";
}else{
	if($validar = mysqli_query($conect,"SELECT * FROM feeling WHERE (user1 = 'feelinguser1' AND user2 = 'feelinguser2') OR (user1 = 'feelinguser2' AND user2 = 'feelinguser1')")){
		if(mysqli_query($conect,"INSERT INTO feeling VALUES ('', '$feelinguser1', '$feelinguser2')")){
			$tipo = 'feeling';
			if(mysqli_query($conect,"INSERT INTO notificacion VALUES ('','$feelinguser1', '$feelinguser2', '$tipo',0)")){
				echo "
			<div class='col-12'>
				<h5 class='text-center bg-feeling rounded aviso-panel' id='mensaje'>HAS HECHO FEELING</h5>	
			</div>";
			}
		}else{ echo "Error";}
	}
}
?>
