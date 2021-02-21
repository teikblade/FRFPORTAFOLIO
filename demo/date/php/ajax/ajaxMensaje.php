<?php
include('../coneccion.php');
session_start();
$id = $_POST['user2'];
$nombreUser1 = $_SESSION['usuario'];
$query = mysqli_query($conect,"SELECT * from usuarios WHERE id_user = '$id'");
$valor = mysqli_fetch_assoc($query);
$nombreUser2 = $valor['nombre'];
$consultaSalaUser1 = mysqli_query($conect,"SELECT * FROM sala WHERE (user1 = '$nombreUser1' AND user2='$nombreUser2') OR (user1 = '$nombreUser2' AND user2='$nombreUser1')");
$resultSala = mysqli_fetch_assoc($consultaSalaUser1);
$id_chat = $resultSala['id_chat'];
$consultaChatUser1 = "SELECT * FROM chat WHERE id_chat = '$id_chat' ORDER BY id_chat ASC";
$ejecutarChatUser1 = $conect->query($consultaChatUser1);
while ($filaUser1 = $ejecutarChatUser1->fetch_array()):
?>	
<div class="text-left">
	<span id="usuario"><b><?php echo $filaUser1['user1']; ?>:</b></span>
	<div>
	<span class="btn bg-light font-text-roboto"><?php echo $filaUser1['mensaje']; ?></span>
	</div>
</div>
<?php endwhile;
function formatearFecha($fecha){return date('g:i a', strtotime($fecha));}?>