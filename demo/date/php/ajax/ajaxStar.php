<?php 
include('../coneccion.php');
session_start();
$user1 = $_SESSION['usuario'];
$idUser2 = $_POST['id'];
$estrellas = $_POST['star'];
$consultUsuario = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user ='$idUser2'");
$resultUsuario = mysqli_fetch_assoc($consultUsuario);
$user2 = $resultUsuario['nombre'];
$consultPerfil = mysqli_query($conect,"SELECT * FROM perfil WHERE user1 ='$user1' AND user2 = '$user2' AND calificado = 1");
if(mysqli_num_rows($consultPerfil)>0){
	echo "<div class='col-12'>
			<h5 class='text-center bg-danger rounded aviso-panel' id='mensaje'>YA HAS CALIFACO ANTERIORMENTE</h5>	
		</div>";
}else{
	mysqli_query($conect,"INSERT INTO perfil VALUES('','$user1','$user2','$estrellas',1)");
	echo "<div class='col-12'>
			<h5 class='text-center bg-success rounded aviso-panel' id='mensaje'>TU CALIFICACION YA SIDO CARGADA</h5>
		</div>";
}


 ?>