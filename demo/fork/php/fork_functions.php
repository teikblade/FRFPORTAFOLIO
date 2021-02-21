<?php

	class Muestra
	{
		
		function MostrarCuentas()
		{
			include 'conexion.php';
			$QueryUsuarios = mysqli_query($conect,"SELECT * from fork_users ORDER BY ID ASC");
    		echo "
    		<table class='table table-dark table-hover text-center table-responsive-sm'>
					<thead>
						<tr>
							<th scope='col'>CODIGO CUENTA</th>
							<th scope='col'>NOMBRE</th>
							<th scope='col'>USUARIO</th>
							<th scope='col'>PERFIL DE USUARIO</th>
						</tr>
					</thead>
					<tbody>
			";
		while ($row = mysqli_fetch_array($QueryUsuarios)) {
			if($row['id_perfil'] == 2002){
			 	$row['id_perfil'] = 'ALMACEN';
			}
			if($row['id_perfil'] == 1800){
				$row['id_perfil'] = 'VENTAS';
			}
			if($row['id_perfil'] == 3500){
				$row['id_perfil'] = 'ADM. USUARIOS';
			}
		echo "
						<tr>
							<td>$row[id]</th>
							<td>$row[nombre]</th>
							<td>$row[user]</td>
							<td>$row[id_perfil]</td>
						</tr>
			";
		}
		echo "
					</tbody>
			</table>
		";
		}

		function MostrarInventario()
		{
			include 'conexion.php';
			$QueryUsuarios = mysqli_query($conect,"SELECT * from fork_productos ORDER BY nproducto ASC");
    		echo "
    		<table class='table table-dark table-hover text-center table-responsive-sm'>
					<thead>
						<tr>
							<th scope='col'>CODIGO PRODUCTO</th>
							<th scope='col'>PRODUCTO</th>
							<th scope='col'>COLOR</th>
							<th scope='col'>TIPO DE TELA</th>
							<th scope='col'>TALLA</th>
							<th scope='col'>CANTIDAD</th>
						</tr>
					</thead>
					<tbody>
			";
		while ($rowProductos = mysqli_fetch_array($QueryUsuarios)) {
		echo "
						<tr>
							<td>$rowProductos[nproducto]</th>
							<td>$rowProductos[producto]</td>
							<td>$rowProductos[color]</td>
							<td>$rowProductos[tipo_tela]</td>
							<td>$rowProductos[talla]</td>
							<td>$rowProductos[cantidad]</td>
						</tr>
			";
		}
		echo "
				</tbody>
			</table>
		";

		}
		function MostrarCotizacion()
		{
			include 'conexion.php';
			$usuario = $_SESSION["usuario"];
			$QueryCotizacion = mysqli_query($conect,"SELECT * FROM fork_cot_temp WHERE user = '$usuario'");
			if(mysqli_num_rows($QueryCotizacion) <= 0){
			echo "<h4 class='mt-4 text-white mb-4'>NO HAY COTIZACIONES REALIZADAS</h4>";
			}else{
    		echo "
    		<table class='table table-dark table-hover text-center table-responsive-sm'>
					<thead>
						<tr>
							<th scope='col'>PRODUCTO</th>
							<th scope='col'>CANTIDAD</th>
							<th scope='col'>PRECIO</th>
						</tr>
					</thead>
					<tbody>
						<tr>
			";
			while ($rowProductos = mysqli_fetch_array($QueryCotizacion)) {
				echo "
							<td>$rowProductos[producto]</td>
							<td>$rowProductos[cantidad]</td>
							<td>$rowProductos[precio]</td>
						</tr>
				";
				}
			echo "	</tbody>
			</table>
			<a href='fork_delete.php' style='text-decoration: none;'><button class='btn btn-block mb-4 font-weight-bold'>ELIMINAR PRODUCTOS</button></a>
			";
			}
		}

		function MostrarOrdenes()
		{
			include 'conexion.php';
			$usuario = $_SESSION["usuario"];
			$QueryOrdenes = mysqli_query($conect,"SELECT * FROM fork_ordenes");
			if(mysqli_num_rows($QueryOrdenes) <= 0){
			echo "<h4>NO HAY ORDENES DE COMPRA REALIZADAS</h4>";
			}else{
    		echo "
    		<table class='table table-dark table-hover text-center table-responsive-sm'>
					<thead>
						<tr>
							<th scope='col'>N° DE ORDEN</th>
							<th scope='col'>ESTATUS</th>
						</tr>
					</thead>
					<tbody>
						<tr>
			";
			while ($rowOrden = mysqli_fetch_array($QueryOrdenes)) {
					if($rowOrden['estatus'] == 0){
			 			$rowOrden['estatus'] = 'NO APROBADO';
					}
					if($rowOrden['estatus'] == 1){
			 			$rowOrden['estatus'] = 'APROBADO';
					}
				echo "
							<td>$rowOrden[codigo_orden]</td>
							<td>$rowOrden[estatus]</td>
						</tr>
				";
				}
			echo "	</tbody>
			</table>
			";
			}
		}
	}
?>