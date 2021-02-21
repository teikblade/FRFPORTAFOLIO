<?php
$date = date('d/m/Y');
$hora = time();
$per = $_POST['nom'];
$telefono = $_POST['telf'];
$correoEmisor = $_POST['correo'];
$correoReceptor = "eurotopes@gmail.com";
$opcion = $_POST['op'];
$descripcion = $_POST['info'];
$campos = strlen($per)*strlen($telefono)*strlen($correoEmisor)*strlen($opcion)*strlen($descripcion);
if($campos != true){
	echo "<script type='text/javascript'>alert('COMPLETE LOS CAMPOS'); location.href = 'contacto.html'</script>";
}else{
$mensaje = "
Mensaje Nuevo
Nombre del remitente ".$per." - (".$correoEmisor.") </br>
Fecha: ".$date." a las ".$hora." </br>
Telefono: ".$telefono." </br>
Motivo - ".$opcion." </br>
------------------------------------------
Descripcion: ".$descripcion."
";
mail($correoReceptor, $opcion, utf8_decode($mensaje));
echo "<script type='text/javascript'>alert('SE ENVIO SU CORREO SATISFACTORIAMENTE'); location.href = 'contacto.html'</script>";
}
?>