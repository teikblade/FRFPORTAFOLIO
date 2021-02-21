<?php
include 'conexion.php';
session_start();
require('../mpdf/mpdf.php');
date_default_timezone_set('America/Caracas');
$hoy = date("F j, Y, g:i a");
$mes = date("F");
$dia = date("j");
$año = date("Y");
$usuario = $_SESSION["usuario"];
$vendedor = $_SESSION["persona"];
$codigo = rand();

$QueryCotizacion = mysqli_query($conect,"SELECT fork_productos.nproducto, fork_productos.producto, fork_productos.talla, fork_productos.color, fork_cot_temp.cantidad, fork_cot_temp.precio FROM fork_productos INNER JOIN fork_cot_temp ON fork_productos.nproducto = fork_cot_temp.producto WHERE fork_cot_temp.user = '$usuario'");
if(mysqli_num_rows($QueryCotizacion) <= 0){
	echo "<script languaje='javascript'>alert('NO PRODUCTOS CARGARDOS'); location.href = 'fork_ventas.php';</script>";
}else{
$PlantillaPdf ='
<h1 align="center">TEST GENERADOR</h1>
<h5 align="center">Cotización de Productos</h5>
<table align="center">
	<thead>
		<tr>
			<th scope="col">COD.PRODUCTO</th>
			<th scope="col">PRODUCTO</th>
			<th scope="col">TALLA</th>
			<th scope="col">COLOR</th>
			<th scope="col">CANTIDAD</th>
			<th scope="col">PRECIO</th>
		</tr>
	</thead>
	<tbody>
';
while ($row = mysqli_fetch_array($QueryCotizacion)) {
	$precio = ($precio + ($row['precio'] * $row['cantidad']));
	$iva = $precio * 0.16;
	$total = $precio + $iva;
$PlantillaPdf .='
			<tr>
			<td>'.$row['nproducto'].'</td>
			<td>'.$row['producto'].'</td>
			<td>'.$row['talla'].'</td>
			<td>'.$row['color'].'</td>
			<td>'.$row['cantidad'].'</td>
			<td>'.$row['precio'].' Bs.S</td>
			</tr>
';
}
$PlantillaPdf .='
	</tbody>
</table>
</br>
<h5 align="right" style="padding-right:5%;">Subtotal: '.$precio.' Bs.S</h5>
<h5 align="right" style="padding-right:5%;">IVA: '.$iva.' Bs.S</h5>
<h5 align="right" style="padding-right:5%;">MONTO TOTAL: '.$total.' Bs.S</h5>
<h5 align="center">COTIZADO POR: '.$vendedor.' Bs.S</h5>
<p align="center">'.$hoy.'</p>
<p align="center">CODIGO DE ORDEN N° '.$codigo.'</p>
';
}
$GeneradorOrder = mysqli_query($conect,"INSERT INTO fork_ordenes VALUES ('$codigo','0')");
$mpdf = new mpdf();
$css = file_get_contents('../css/pdf.css');
$mpdf->writeHTML($css, 1);
$mpdf->WriteHTML($PlantillaPdf);
$mpdf->Output();
?>