<?php 
		include('../coneccion.php');
		$usuario = $_GET['envio'];
		$resultEmisor = mysqli_query($conect,"SELECT * FROM sala WHERE user1 = '$usuario'");
		if(mysqli_num_rows($resultEmisor) > 0){
			while($rowEmisor = mysqli_fetch_assoc($resultEmisor)){
				$user2 = $rowEmisor['user2'];
				$resultUsuario2 = mysqli_query($conect,"SELECT DISTINCT * FROM usuarios WHERE nombre = '$user2'");
				while ($rowUsuario2 = mysqli_fetch_assoc($resultUsuario2)) {
					echo "
			<div class='row perfiles-nuevos panel-menu-margin'>
 				<div class='col-12 col-sm-12 col-md-4 text-center imagen-chats'>
					<img src='../profiles/$rowUsuario2[perfil_usuario]' class='border border-primary rounded'>
				</div>
				<div class='col-12 col-sm-12 col-md-6 text-left font-text-perfil texto-chats'>
					<p>Nombre: <b>$rowUsuario2[nombre], Edad: $rowUsuario2[edad]</b></p>
					<p>Pais: <b>$rowUsuario2[pais]</b></p>
				</div>
			</div>
			<div class='row panel-menu-margin'>
 				<div class='col-12 text-right btn-sala-chats'>
 					<a href='chat.php?id=$rowUsuario2[id_user]' style='text-decoration:none;'>
					<button class='btn btn-success font-text-roboto' style='height: 37px;'><p>ABRIR CHAT</p></button>
					</a>
					<a href='formularios.php?eliminarsala=$user2' class='sala-salir btn-eliminar-sala'>
					<button class='btn btn-danger font-text-roboto' style='height: 37px;'><p>ELIMINAR</p></button>
					</a>
				</div>
			</div>
			";
				}
			}
		}else{
			$resultEmisor = mysqli_query($conect,"SELECT * FROM sala WHERE user2 = '$usuario'");
			if(mysqli_num_rows($resultEmisor) > 0){
				while($rowEmisor = mysqli_fetch_assoc($resultEmisor)){
					$user2 = $rowEmisor['user1'];
					$resultUsuario2 = mysqli_query($conect,"SELECT DISTINCT * FROM usuarios WHERE nombre = '$user2'");
					while ($rowUsuario2 = mysqli_fetch_assoc($resultUsuario2)) {
					echo "
					<div class='row perfiles-nuevos panel-menu-margin'>
 						<div class='col-4 text-center'>
							<img src='../profiles/$rowUsuario2[perfil_usuario]' class='border border-primary rounded'>
						</div>
						<div class='col-6 text-left font-text-perfil'>
							<p>Nombre: <b>$rowUsuario2[nombre], Edad: $rowUsuario2[edad]</b></p>
							<p>Pais: <b>$rowUsuario2[pais]</b></p>
						</div>
					</div>
					<div class='row panel-menu-margin'>
 						<div class='col-12 text-right btn-eliminar-sala'>
 							<a href='chat.php?id=$rowUsuario2[id_user]' style='text-decoration:none;'>
							<button class='btn btn-success font-text-roboto' style='height: 37px;'><p>ABRIR CHAT</p></button>
							</a>
							<a href='formularios.php?eliminarsala=$user2' class='sala-salir btn-eliminar-sala'>
							<button class='btn btn-danger font-text-roboto' style='height: 37px;'><p>ELIMINAR</p></button>
							</a>
					</div>
				</div>";
					}
				}
			}else{
				echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados en estos momentos</h5>
			</div>";
			}
		}

?>