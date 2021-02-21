<?php 
include('../coneccion.php');
session_start();
$user1 = $_SESSION['id'];
$user2 = $_GET['envio'];
$consultaUser1 = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$user1'");
$consultaUser2 = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$user2'");
$valorUser1 = mysqli_fetch_assoc($consultaUser1);
$valorUser2 = mysqli_fetch_assoc($consultaUser2);
$regUser1 = $valorUser1['nombre'];
$regUser2 = $valorUser2['nombre'];
$idChat = rand(1, 9999);
$validarConsulta = mysqli_query($conect,"SELECT * FROM sala WHERE (user1 = '$regUser1' AND user2 = '$regUser2') OR (user1 = '$regUser2' AND user2 = '$regUser1')");
$idSala = mysqli_fetch_assoc($validarConsulta);
if(isset($idSala['id'])){
echo "<div class='col-12'>
			<h5 class='text-center bg-danger rounded aviso-panel' id='mensaje'>CHAT YA EXISTE</h5>
		</div>";
}else{
if(mysqli_query($conect,"INSERT INTO sala VALUES ('', '$regUser1', '$regUser2','$idChat')")){
if(mysqli_query($conect,"INSERT INTO chat VALUES ('','$idChat', '$regUser1', '$regUser2','Estas chateando con $regUser2',0,'')")){
$tipo = 'chat';
if(mysqli_query($conect,"INSERT INTO notificacion VALUES ('','$regUser1', '$regUser2', '$tipo',0)")){
echo "<div class='col-12'>
			<h5 class='text-center bg-success rounded aviso-panel' id='mensaje'>SE AGREGO AL CHAT</h5>
		</div>";
}
}
}else{
echo "<div class='col-12'>
			<h5 class='text-center bg-warning rounded aviso-panel' id='mensaje'>ERROR NO SE PUDO AGREGAR CHAT</h5>
		</div>";
}
}
?>