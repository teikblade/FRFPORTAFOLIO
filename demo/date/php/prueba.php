<?php 
include('coneccion.php');
		$usuario = $_POST['dato'];
		echo $usuario;
		$resultEmisor = mysqli_query($conect,"SELECT * FROM sala WHERE user1 = '$usuario'");
		if(mysqli_num_rows($resultEmisor) > 0){
			while($rowEmisor = mysqli_fetch_assoc($resultEmisor)){
				$user2 = $rowEmisor['user2'];
				$resultUsuario2 = mysqli_query($conect,"SELECT DISTINCT * FROM usuarios WHERE nombre = '$user2'");
				while ($rowUsuario2 = mysqli_fetch_assoc($resultUsuario2)) {
					echo "
			<div class='row perfiles-nuevos panel-menu-margin'>
 				<div class='col-4 text-center'>
 					<a href='chat.php?id=$rowUsuario2[id_user]' style='text-decoration:none;'>
					<img src='../profiles/$rowUsuario2[perfil_usuario]' class='border border-primary rounded'>
					</a>
				</div>
				<div class='col-6 text-left font-text-perfil'>
					<p>Nombre: <b>$rowUsuario2[nombre], Edad: $rowUsuario2[edad]</b></p>
					<p>Pais: <b>$rowUsuario2[pais]</b></p>
				</div>
			</div>
			<div class='row panel-menu-margin'>
 					<div class='col-12 text-right btn-eliminar-sala'>
 					<a href='formularios.php?eliminarsala=$user2' class='sala-salir'>
					<button class='btn btn-danger font-text-roboto' style='height: 37px;'><p>ELIMINAR</p></button>
					</a>
				</div>
			</div>
			";
				}
			}
		}
		$resultEmisor = mysqli_query($conect,"SELECT * FROM sala WHERE user2 = '$usuario'");
		if(mysqli_num_rows($resultEmisor) > 0){
			while($rowEmisor = mysqli_fetch_assoc($resultEmisor)){
				$user2 = $rowEmisor['user1'];
				$resultUsuario2 = mysqli_query($conect,"SELECT DISTINCT * FROM usuarios WHERE nombre = '$user2'");
				while ($rowUsuario2 = mysqli_fetch_assoc($resultUsuario2)) {
					echo "
			<div class='row perfiles-nuevos panel-menu-margin'>
 				<div class='col-4 text-center'>
 					<a href='chat.php?id=$rowUsuario2[id_user]' style='text-decoration:none;'>
					<img src='../profiles/$rowUsuario2[perfil_usuario]' class='border border-primary rounded'>
					</a>
				</div>
				<div class='col-6 text-left font-text-perfil'>
					<p>Nombre: <b>$rowUsuario2[nombre], Edad: $rowUsuario2[edad]</b></p>
					<p>Pais: <b>$rowUsuario2[pais]</b></p>
				</div>
			</div>
			<div class='row panel-menu-margin'>
 					<div class='col-12 text-right btn-eliminar-sala'>
 					<a href='formularios.php?eliminarsala=$user2' class='sala-salir'>
					<button class='btn btn-danger font-text-roboto' style='height: 37px;'><p>ELIMINAR</p></button>
					</a>
				</div>
			</div>
			";
				}
			}
		}
?>