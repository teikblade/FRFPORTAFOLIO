<?php 

include('../coneccion.php');
$usuario = $_GET['envio'];
$sqlUpdateMensajeEstaus = "UPDATE chat SET leido = 1 WHERE user2 = '$usuario' AND leido = 0";
$resultUpdateMensajeEstaus = mysqli_query($conect, $sqlUpdateMensajeEstaus);
echo "";
?>