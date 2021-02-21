<?php
include('../coneccion.php');
session_start();
$pais=$_POST['pais'];
$buscar=$_POST['buscar'];
$edadinf=$_POST['edadinf'];
$edadsup=$_POST['edadsup'];
$religion=$_POST['religion'];
$sexoBusqueda = $_SESSION['sexo_interesado'];
$sql = "SELECT * FROM usuarios INNER JOIN configuracion ON usuarios.correo = configuracion.id_correo WHERE ((usuarios.pais = '$pais') AND (usuarios.edad BETWEEN '$edadinf' AND '$edadsup') AND (configuracion.item1 = '$buscar') AND (configuracion.item4 = '$religion')) AND usuarios.sexo_user = '$sexoBusqueda'";
$query = mysqli_query($conect,$sql);
if(mysqli_num_rows($query) > 0){
while ($row = mysqli_fetch_array($query)) {
echo "
<div class='col-12 col-sm-12 col-md-4 imgen-perfil-nuevo text-center' style='padding-top:2%;' id='perfil-efect'>
	<a href='formularios.php?ficha=$row[id_user]' style='text-decoration:none;'>
		<img src='../profiles/$row[perfil_usuario]' class='border border-primary rounded'>
	</a>
</div>
<div class='col-8 text-left font-text-perfil' style='padding-top:2%;'>
	<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
	<p>Pais: <b>$row[pais]</b></p>
</div>";
}
}else if($pais == 'todos'){
$query = mysqli_query($conect,"SELECT * from usuarios WHERE sexo_user = '$sexoBusqueda' ORDER BY id_user DESC");
if(mysqli_num_rows($query) > 0){
while ($row = mysqli_fetch_array($query)) {
echo "
<div class='col-4 text-center' style='padding-top:2%;' id='perfil-efect'>
	<a href='formularios.php?ficha=$row[id_user]' style='text-decoration:none;'>
		<img src='../profiles/$row[perfil_usuario]' class='border border-primary rounded'>
	</a>
</div>
<div class='col-8 text-left font-text-perfil' style='padding-top:2%;'>
	<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
	<p>Pais: <b>$row[pais]</b></p>
</div>";
}
}
}
else{
echo "
<div class='col-12 text-center'>
	<h5>No hay resultados en estos momentos</h5>
</div>";
}
?>