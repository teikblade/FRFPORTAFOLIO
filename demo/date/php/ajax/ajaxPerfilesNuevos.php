<?php 
include('../coneccion.php');
$busqueda = $_GET['envio'];
$query = mysqli_query($conect,"SELECT * from usuarios WHERE sexo_user = '$busqueda' ORDER BY id_user DESC");
	if(mysqli_num_rows($query) > 0){
		while ($row = mysqli_fetch_array($query)) {
		echo "
			<div class='col-12 col-sm-12 col-md-4 imgen-perfil-nuevo text-center' id='perfil-efect'>
			<a href='formularios.php?ficha=$row[id_user]' style='text-decoration:none;'>
				<img src='../profiles/$row[perfil_usuario]' class='border border-primary rounded'>
				</a>
			</div>
			<div class='col-12 col-sm-12 col-md-8 texto-perfil-nuevo text-left font-text-perfil'>
				<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
				<p>Pais: <b>$row[pais]</b></p>
			</div>
			";
			}
		}else{
			echo "
		<div class='col-12 text-center'>
			<h5>No hay resultados en estos momentos</h5>
		</div>";
		}
	
?>