<?php
include 'conexion.php';
session_start();
require('../mpdf/mpdf.php');
date_default_timezone_set('America/Caracas');
$hoy = date("d-m-Y");
$facturacion = $_POST['factura'];
$cliente = $_POST['cliente'];

$QueryFactura = mysqli_query($conect,"SELECT * FROM precargo WHERE usuario = '$_SESSION[vendedor]'");
if(mysqli_num_rows($QueryFactura) <= 0){
	echo "<script languaje='javascript'>alert('GENERATE ORDER ERROR'); location.href = 'euro_vendedor.php';</script>";
}else{
$QueryCliente = mysqli_query($conect,"SELECT * FROM clientes WHERE id = '$cliente'");
$clientes = mysqli_fetch_assoc($QueryCliente);
$PlantillaPdf ='
<img src="../img/logo.png" class="img-pdf">
<h6 class="text-center-pdf">EUROTOPES MARMOLES Y GRANITOS C.A RiF: J-xxxxx-1</h6>
<table class="table-pdf-clientes">
<thead class="text-center-pdf">
		<tr>
    	<th scope="col">DATE</th>
		<th scope="col">NAME</th>
		<th scope="col">PHONE</th>
		<th scope="col">DNI OR RIF</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td>'.$hoy.'</th>
		<td>'.$clientes["nombre"].'</th>
		<td>'.$clientes["telefono"].'</th>
		<td>'.$clientes["cedula"].'</th>
	</tr>
	</tbody>
</table>
<table class="table-pdf">
<thead class="text-center-pdf">
		<tr>
		<th scope="col">Direction</th>
		<th scope="col">Email</th>
		<th scope="col">ORDER</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td>'.$clientes["direccion"].'</th>
		<td>'.$clientes["correo"].'</th>
		<td>'.$facturacion.'</th>
	</tr>
	</tbody>
</table>
<table class="table-pdf">
	<thead class="text-center-pdf">
		<tr>
    	<th scope="col">QUANTITY</th>
		<th scope="col">PRODUCT</th>
		<th scope="col">METERS</th>
		<th scope="col">$</th>
		<th scope="col">IVA</th>
		<th scope="col">TOTAL</th>
		</tr>
	</thead>
	<tbody>
';
while ($row = mysqli_fetch_array($QueryFactura)) {
	$total = ($row['cantidad']*($row['metros']*$row['monto']));
$PlantillaPdf .='
	<tr>
		<td>'.$row['cantidad'].'</th>
		<td>'.$row['producto'].'</th>
		<td>'.$row['metros'].'</th>
		<td>'.$row['monto'].'</th>
		<td>16</th>
		<td>'.$total.'</th>
	</tr>
';
$subtotal = $subtotal + $total;
}
$iva = $subtotal*0.16;
$final = $subtotal + $iva;
$PlantillaPdf .='
	</tbody>
</table>
<h4 class="text-right-pdf">SUBTOTAL: '.$subtotal.'</h4>
<h4 class="text-right-pdf">IVA: '.$iva.'</h4>
<h4 class="text-right-pdf">TOTAL: '.$final.'</h4>
<h6 align="center">DEVELOPER BY @FRF.WEB</h6>
';
}
$mpdf = new mpdf();
$css = file_get_contents('../css/pdf.css');
$mpdf->SetTitle('EURO_FACTURA_'.$facturacion.'.pdf');
$mpdf->writeHTML($css, 1);
$mpdf->WriteHTML($PlantillaPdf);
$mpdf->Output();
?>