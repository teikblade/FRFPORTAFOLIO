<?php
include 'conexion.php';
session_start();
$usuario = $_SESSION["usuario"];
$DeleteTemp = mysqli_query($conect,"DELETE FROM fork_cot_temp WHERE user ='$usuario'");
if(mysqli_affected_rows($conect) > 0){
	echo "<script languaje='javascript'>alert('LIMPIEZA SI EXISTOSA'); location.href = 'fork_ventas.php';</script>";;
}else{
	echo "<script languaje='javascript'>alert('LIMPIEZA NO EXISTOSA'); location.href = 'fork_ventas.php';</script>";;
}
?>