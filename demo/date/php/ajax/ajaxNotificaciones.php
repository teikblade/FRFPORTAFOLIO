<?php 
include('../coneccion.php');
$usuario = $_GET['envio'];
$sqlCountNotificaciones = "SELECT * FROM notificacion WHERE user2 = '$usuario' AND leido = 0";
$resultCountNotificaciones = mysqli_query($conect, $sqlCountNotificaciones);
while($valuesCountNotificaciones = mysqli_fetch_assoc($resultCountNotificaciones)){
if($valuesCountNotificaciones['tipo'] == 'chat'){
	echo "
	<a class='dropdown-item' href='formularios.php?not=$usuario'> Hay un nuevo <b>$valuesCountNotificaciones[tipo]</b> con <b>$valuesCountNotificaciones[user2]</b></a>
	";
}
if($valuesCountNotificaciones['tipo'] == 'feeling'){
	echo "
	<a class='dropdown-item' href='formularios.php?not=$usuario'> Tienes un nuevo <b>$valuesCountNotificaciones[tipo]</b> con <b>$valuesCountNotificaciones[user2]</b></a>
	";	
}
}
?>