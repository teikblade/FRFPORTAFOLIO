<?php 
include('coneccion.php');
session_start();
$usuario = $_SESSION['correo'];
mysqli_query($conect,"UPDATE usuarios SET activo = 0 WHERE correo = '$usuario'");
session_destroy();
echo "<script language='javascript'>location.href = '../index.php' </script>";
?>