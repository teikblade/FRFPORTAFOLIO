<?php


class Vista
{
	
	function Agenda(){
		include 'conexion.php';
		$QueryBuscarClientes = mysqli_query($conect,"SELECT * from clientes");
			if(mysqli_num_rows($QueryBuscarClientes) <= 0){
			echo "<h4 style='text-align:center;'>NO hAY CLIENTES AGREGADOS</h4>";
			}else{
    		echo "
    		<table class='table'>
					<thead class='text-center text-color-secound'>
						<tr>
							<th scope='col'>N°</th>
							<th scope='col'>NOMBRE</th>
							<th scope='col'>TELEFONO</th>
							<th scope='col'>DIRECCION</th>
							<th scope='col'>CORREO</th>
							<th scope='col'>CREACION</th>
						</tr>
					</thead>
					<tbody>
			";
		while ($row = mysqli_fetch_array($QueryBuscarClientes)) {
		echo "
						<tr class='text-center'>
							<td>$row[id]</th>
							<td>$row[nombre]</th>
							<td>$row[telefono]</th>
							<td>$row[direccion]</th>
							<td>$row[correo]</th>
							<td>$row[fecha_creacion]</th>
						</tr>
			";
		}
		echo "
					</tbody>
			</table>
		";
		}
	}

	function Facturar(){
		include 'conexion.php';
		$QueryBuscarClientes = mysqli_query($conect,"SELECT * from clientes");
		if(mysqli_num_rows($QueryBuscarClientes) <= 0){
			echo "<h4 style='text-align:center;'>NO hAY CLIENTES AGREGADOS</h4>";
			}else{
    		echo "
    		<select class='form-control' name='cliente'>
			";
		while ($row = mysqli_fetch_array($QueryBuscarClientes)) {
		echo "
			<option value='$row[id]'>Cliente: $row[nombre]</option>
			";
		}
			echo "
			</select>
			";
		}
	}

	function ProductosCargados(){
		include 'conexion.php';
		$QueryProductoPrecargado = mysqli_query($conect,"SELECT * from precargo WHERE usuario = '$_SESSION[vendedor]'");
			if(mysqli_num_rows($QueryProductoPrecargado) <= 0){
			echo "<h4 style='text-align:center;'>NO PRODUCTS ADDED</h4>";
			}else{
    		echo "
    		<table class='table' id='table-a'>
					<thead class='text-center text-color-secound'>
						<tr>
    					<th scope='col'>CANT</th>
						<th scope='col'>PRODUCTO</th>
						<th scope='col'>METROS</th>
						<th scope='col'>BOLIVARES</th>
						<th scope='col'>IVA</th>
						<th scope='col'>TOTAL</th>
						</tr>
					</thead>
					<tbody>
			";
		while ($row = mysqli_fetch_array($QueryProductoPrecargado)) {
				$total = ($row['cantidad']*($row['metros']*$row['monto']));
		echo "
						<tr class='text-center'>
							<td>$row[cantidad]</th>
							<td>$row[producto]</th>
							<td>$row[metros]</th>
							<td>$row[monto]</th>
							<td>16</th>
							<td>$total</th>
						</tr>
			";
		}
			echo "
				</tbody>
			</table>
			<div class='row'>
			  <div class='col-xs-12 col-sm-12 col-md-6'>
				<button class='col-xs-12 col-sm-12 col-md-12 text-center btn btn-color-secound' type='submit' form='GenerarFactura'>GENERATE ORDER</button></a>
			   </div>
			   <div class='col-xs-12 col-sm-12 col-md-6'>
				<button class='col-xs-12 col-sm-12 col-md-12 text-center btn btn-color-secound' id='btnBorrar' value='btnBorrar'>CLEAR LOG</button>
				</div>
			</div>
			";
		}
	}
	function Vendedores(){
		include 'conexion.php';
		$QueryVendedores = mysqli_query($conect,"SELECT * from vendedores");
			if(mysqli_num_rows($QueryVendedores) <= 0){
			echo "<h4 style='text-align:center;'>NO SELLERS CREATED</h4>";
			}else{
    		echo "
    		<table class='table'>
					<thead class='text-center text-color-secound'>
						<tr>
							<th scope='col'>N°</th>
							<th scope='col'>USUARIO</th>
							<th scope='col'>CREACION</th>
						</tr>
					</thead>
					<tbody>
			";
		while ($row = mysqli_fetch_array($QueryVendedores)) {
		echo "
						<tr class='text-center'>
							<td>$row[id]</th>
							<td>$row[usuario]</th>
							<td>$row[fecha_creacion]</th>
						</tr>
			";
		}
		echo "
					</tbody>
			</table>
		";
		}
	}
}
?>