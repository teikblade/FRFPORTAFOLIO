<?php
$conect = mysqli_connect("localhost", "id11641103_root", "hL5C\gtJ(n>[xWvY", "id11641103_demo");

if (!$conect) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>