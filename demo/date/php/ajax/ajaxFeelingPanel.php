<?php 
include('../coneccion.php');
$id = $_GET['envio'];
$consulta = mysqli_query($conect,"SELECT DISTINCT * FROM feeling WHERE user1 = '$id'");
$consulta2 = mysqli_query($conect,"SELECT DISTINCT * FROM feeling WHERE user2 = '$id'");
if(mysqli_num_rows($consulta) > 0){
while($feeling = mysqli_fetch_assoc($consulta)){
$user2 = $feeling['user2'];
$consultaUser2 = mysqli_query($conect,"SELECT * FROM usuarios WHERE nombre = '$user2'");
$rowUser2 = mysqli_fetch_assoc($consultaUser2);
echo "
<div class='col-12 col-sm-12 col-md-4 feeling font-text-perfil text-center datos-feeling'>
	<a href='ficha.php?id=$rowUser2[id_user]' style='text-decoration:none;'>
		<img src='../profiles/$rowUser2[perfil_usuario]' class='border border-primary rounded'>
	</a>
	<h5>Usuario: <b>$rowUser2[nombre]</b></h5>
	<h6>Pais: <b>$rowUser2[pais]</b></h6>
	<a href='formularios.php?eliminarfeeling=$user2' style='text-decoration:none;'>
		<button class='btn btn-danger font-text-roboto' style='height: 37px;'><p style='color:#FFF;'>ELIMINAR</p></button>
	</a>
</div>
";
}
}else if(mysqli_num_rows($consulta2) > 0){
while($feeling = mysqli_fetch_assoc($consulta2)){
$user1 = $feeling['user1'];
$consultaUser2 = mysqli_query($conect,"SELECT * FROM usuarios WHERE nombre = '$user1'");
$rowUser2 = mysqli_fetch_assoc($consultaUser2);
echo "
<div class='col-4 feeling font-text-perfil text-center'>
	<a href='ficha.php?id=$rowUser2[id_user]' style='text-decoration:none;'>
		<img src='../profiles/$rowUser2[perfil_usuario]'>
	</a>
	<h5>Usuario: <b>$rowUser2[nombre]</b></h5>
	<h6>Pais: <b>$rowUser2[pais]</b></h6>
	<a href='formularios.php?eliminarfeeling=$user1' style='text-decoration:none;'>
		<button class='btn btn-danger font-text-roboto' style='height: 37px;'><p style='color:#FFF;'>ELIMINAR</p></button>
	</a>
</div>
";
}
}else{
echo "
<div class='col-12 text-center'>
	<h5>No hay Feeling en estos momentos</h5>
</div>";
}