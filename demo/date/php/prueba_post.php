<?php
include('coneccion.php');
$consulta = "SELECT * FROM chat ORDER BY id ASC";
$ejecutar = $conect->query($consulta);
while ($fila = $ejecutar->fetch_array()):
?>	
<div>
	<span id="usuario"><b><?php echo $fila['nombre']; ?>:</b></span>
	<span><?php echo $fila['mensaje']; ?></span>
	<span><?php echo formatearFecha($fila['fecha']); ?></span>
	</div>
<?php endwhile; 
function formatearFecha($fecha){return date('g:i a', strtotime($fecha));}?>
