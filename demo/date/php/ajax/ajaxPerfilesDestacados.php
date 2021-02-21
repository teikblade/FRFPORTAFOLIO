<?php 
		include('../coneccion.php');
		$pais = $_GET['pais'];
		$nombre = $_GET['nombre'];
		$query = mysqli_query($conect,"SELECT * from usuarios WHERE  perfil_destacado = 'SI'  ORDER BY id_user DESC");
		if(mysqli_num_rows($query) > 0){
			while ($row = mysqli_fetch_array($query)) {
			echo "
 				<div class='col-12 col-sm-12 col-md-4 imgen-perfil-cerca'>
 				<a href='formularios.php?ficha=$row[id_user]' style='text-decoration:none;'>
					<img src='../profiles/$row[perfil_usuario]' class='border border-primary rounded'>
				</div>
				<div class='col-12 col-sm-12 col-md-8 texto-perfil-cerca text-left font-text-perfil'>
					<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
					<p>Pais: <b>$row[pais]</b></p>
					</a>
				</div>";
			}
		}else{
			echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados en estos momentos</h5>
			</div>";
		}
?>