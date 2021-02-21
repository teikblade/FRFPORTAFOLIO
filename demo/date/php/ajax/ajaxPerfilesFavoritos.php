<?php 
include('../coneccion.php');
$pais = $_GET['envio'];
$resultperfil = mysqli_query($conect, "SELECT DISTINCT user2 FROM perfil");
while($valuesPerfil = mysqli_fetch_assoc($resultperfil)){
$nombreUserEstrellas = $valuesPerfil['user2'];
$query = mysqli_query($conect,"SELECT * from usuarios WHERE nombre = '$nombreUserEstrellas'");
while ($row = mysqli_fetch_array($query)) {
	echo "
 		<div class='col-12 col-sm-12 col-md-4 imgen-perfil-cerca'>
 			<a href='formularios.php?ficha=$row[id_user]' style='text-decoration:none;'>
				<img src='../profiles/$row[perfil_usuario]'>
		</div>
		<div class='col-12 col-sm-12 col-md-8 texto-perfil-cerca text-left font-text-perfil'>
				<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
				<p>Pais: <b>$row[pais]</b></p>
				";
			$resultEstrellas = mysqli_query($conect, "SELECT SUM(estrellas) AS suma FROM perfil WHERE user2='$nombreUserEstrellas'");
			while($valuesEstrellas = mysqli_fetch_assoc($resultEstrellas)){
			$num = $valuesEstrellas['suma'];
			} echo "
			<p>Estrellas: <b>$num</b></p>
			</a>
		</div>
	";
	}
}
?>