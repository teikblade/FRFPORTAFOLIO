<?php
$server = "localhost";
$root = "id11641103_root";
$pass = "hL5C\gtJ(n>[xWvY";
$baseDatos = "id11641103_demo";
$conect = mysqli_connect($server, $root, $pass, $baseDatos);
// Revisando coneccion
if (mysqli_connect_errno())
  {
  echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  }
?>