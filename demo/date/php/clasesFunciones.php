<?php 
/**
 * 
 */
class PanelUsuario
{
	
	function perfilesNuevos($busqueda)
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * from usuarios WHERE sexo_user = '$busqueda' ORDER BY id_user DESC");
		if(mysqli_num_rows($query) > 0){
			while ($row = mysqli_fetch_array($query)) {
			echo "
			<div class='row perfiles-nuevos panel-menu-margin'>
 				<div class='col-4 text-center'>
 				<a href='ficha.php?id=$row[id_user]' style='text-decoration:none;'>
					<img src='../profiles/$row[perfil_usuario]' class='border border-primary rounded'>
					</a>
				</div>
				<div class='col-8 text-left font-text-perfil'>
					<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
					<p>Pais: <b>$row[pais]</b></p>
				</div>
			</div>";
			}
		}else{
			echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados en estos momentos</h5>
			</div>";
		}
	}
	function perfilesCerca($pais,$nombre)
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * from usuarios WHERE pais = '$pais' AND nombre !='$nombre' ORDER BY id_user DESC");
		if(mysqli_num_rows($query) > 0){
			while ($row = mysqli_fetch_array($query)) {
			echo "
			<a href='ficha.php?id=$row[id_user]' style='text-decoration:none;'>
			<div class='row perfiles-nuevos panel-menu-margin '>
 				<div class='col-4'>
					<img src='../profiles/$row[perfil_usuario]'>
				</div>
				<div class='col-8 text-left font-text-perfil'>
					<p>Nombre: <b>$row[nombre]</b>, <b>Edad: $row[edad]</b></p>
					<p>Pais: <b>$row[pais]</b></p>
				</div>
			</div></a>";
			}
		}else{
			echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados en estos momentos</h5>
			</div>";
		}
	}

	function perfilesFavoritos()
	{
		//include('coneccion.php');
		/*
		$query = mysqli_query($conect,"SELECT * from usuarios WHERE pais = '$pais' ORDER BY id_user DESC");
		if(mysqli_fetch_array($query) > 0){
			while ($row = mysqli_fetch_array($query)) {
			echo "
			<div class='row perfiles-nuevos'>
 				<div class='col-4 text-center'>
					<img src='../profiles/$row[perfil_usuario]'>
				</div>
				<div class='col-8 text-left'>
					<p>Nombre: $row[nombre], Edad: $row[edad]</p>
					<p>Sexo: $row[sexo_user]</p>
					<p>Pais: $row[pais]</p>
				</div>
			</div>";
			}
		}else{*/
			echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados en estos momentos</h5>
			</div>";
		//}
	}

	function InformacionPerfil($correo)
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * FROM configuracion WHERE id_correo = '$correo'");
		while ($row = mysqli_fetch_assoc($query)) {
			echo "
			<p>Buscar: <b>$row[item1]</b></p>
			<p>Texto de presentacion: <b>$row[item2]</b></p>
			<p>Pref. Religiosa: <b>$row[item4]</b></p>
			<p>Profesion: <b>$row[item5]</b></p>
			<p>Fuma: <b>$row[item6]</b></p>
			";
			}
		
	}

	function contadorFotos($perfil)
	{
		include('coneccion.php');
		$sqlperfil = "SELECT COUNT(perfil_usuario) AS countPerfil FROM usuarios WHERE correo = '$perfil'";
		$sqlfotos = "SELECT COUNT(imagen) AS countFotos FROM fotos WHERE correo = '$perfil'";
		$resultperfil = mysqli_query($conect, $sqlperfil);
		$resultfotos = mysqli_query($conect, $sqlfotos);
		$valuesPerfil = mysqli_fetch_assoc($resultperfil);
		$valuesfotos = mysqli_fetch_assoc($resultfotos);
		$num_rows = $valuesPerfil['countPerfil'] + $valuesfotos['countFotos'];
		echo $num_rows;
	}

	function configuracion($correo)
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * FROM configuracion WHERE id_correo = '$correo'");
		$row = mysqli_fetch_assoc($query);
		if($row['estatus'] == 0){
			echo "<a href='#'' data-toggle='modal' data-target='#perfilModalUser' style='text-decoration:none;'><b>>> Completar perfil</b></a>";
		}
	}
}

/**
 * 
 */
class Opciones
{
	
	function fotosUsaurio($correo)
	{
	include('coneccion.php');
	$a = 3;
	$query = mysqli_query($conect,"SELECT * from fotos WHERE correo = '$correo' ORDER BY id_foto ASC");
		while ($row = mysqli_fetch_array($query)) {
			echo "
 			<div class='col-4 text-center op-foto'>
				<img src='../profiles/$row[imagen]'>
				<a href='formularios.php?id=$row[id_foto]&img=../profiles/$row[imagen]' class='btn btn-block btn-danger' name='btn-eliminar'>Eliminar</a>	
			</div>";
			$a = $a - 1;
			if($a == 0){}
		}
	}
}

/**
 * 
 */
class Buscador
{
	
	function buscar($busqueda, $pais)
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * from usuarios WHERE sexo_user = '$busqueda' AND pais = '$pais' ORDER BY id_user DESC");
		if(mysqli_num_rows($query) > 0){
			while ($row = mysqli_fetch_array($query)) {
			echo "
 				<div class='col-4 text-center buscador rounded'>
					<img src='../profiles/$row[perfil_usuario]'>
					<p>Nombre: $row[nombre], Edad: $row[edad]</p>
					<p>Sexo: $row[sexo_user]</p>
					<p>Pais: $row[pais]</p>
				</div>";
			}
		}else{
			echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados en estos momentos</h5>
			</div>";
		}
	}
}
/**
 * 
 */
class Chat
{
	
	function entrada()
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * from chat ORDER BY id DESC");
		if(mysqli_fetch_array($query) > 0){
			while ($row = mysqli_fetch_array($query)):
			echo "
				<p>Mensaje: $row[mensaje]</p>
				";
			endwhile;
		}else{
			echo "
			<div class='col-12 text-center'>
				<h5>No hay resultados  mensajes en estos momentos</h5>
			</div>";
		}
	}
}

Class Online
{
	function enLinea($nombre)
	{
		include('coneccion.php');
		$query = mysqli_query($conect,"SELECT * from usuarios WHERE activo = 1 AND nombre != '$nombre' ORDER BY id_user DESC");
			while ($row = mysqli_fetch_array($query)) {
			echo "
			<a href='ficha.php?id=$row[id_user]' style='text-decoration:none;'>
			<div class='row perfiles-nuevos panel-menu-margin'>
 				<div class='col-4'>
					<img src='../profiles/$row[perfil_usuario]' class='border border-primary rounded'>
				</div>
				<div class='col-8 text-left font-text-perfil'>
					<p>Nombre: <b>$row[nombre]</b>, Edad: <b>$row[edad]</b></p>
					<p>Pais: <b>$row[pais]</b></p>
				</div>
			</div></a>";
			}
	}
}

Class Ficha
{
	function perfil($id)
	{
		include('coneccion.php');
		$resultPerfil = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$id'");
		while ($rowPerfil = mysqli_fetch_assoc($resultPerfil)) {
			$id_foto = $rowPerfil['correo'];
		echo "
			<div class='carousel-item active'>
      			<img class='d-block w-100' src='../profiles/$rowPerfil[perfil_usuario]'>
    		</div>";
		}
		$resultFoto = mysqli_query($conect,"SELECT * FROM fotos WHERE correo = '$id_foto'");
		while ($rowFoto = mysqli_fetch_assoc($resultFoto)) {
		echo "
			<div class='carousel-item'>
      			<img class='d-block w-100' src='../profiles/$rowFoto[imagen]'>
    		</div>";
		}
		echo "<a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
    			<span class='carousel-control-prev-icon' aria-hidden='true'></span>
    			<span class='sr-only'>Previous</span>
  			</a>
  			<a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
    			<span class='carousel-control-next-icon' aria-hidden='true'></span>
    			<span class='sr-only'>Next</span>
  			</a>";
	}
	function chatOfeeling($id)
	{
		include('coneccion.php');
		$resultPerfil = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$id'");
		$rowPerfil = mysqli_fetch_assoc($resultPerfil);
		$nombre = $rowPerfil['nombre'];
		$edad = $rowPerfil['edad'];
		$pais = $rowPerfil['pais'];
		echo "
			<div class='row row panel-menu-margin chatOfeeling'>
			<div class='col-4 text-right'>
					<a href='formularios.php?chats=$rowPerfil[id_user]'><img src='../img/chat.png' class='border border-header rounded' width='80'></a>
				</div>
				<div class='col-4 text-center'>
					<h6 class='font-text-roboto'>$nombre, $edad años</h6>
					<h6 class='font-text-roboto'>Pais: $pais</h6>
				</div>
				<div class='col-4 text-left'>
					<a href='formularios.php?feeling=$rowPerfil[id_user]'><img src='../img/feeling.png' class='border border-header rounded' width='80'></a>
				</div>
			</div>";
	}

	function fotos($id)
	{
		include('coneccion.php');
	}
}

Class Feeling
{
	function perfil($id)
	{
		include('coneccion.php');
		$consulta = mysqli_query($conect,"SELECT DISTINCT * FROM feeling WHERE user1 = '$id'");
		if(mysqli_num_rows($consulta) > 0){
			while($feeling = mysqli_fetch_assoc($consulta)){
				$user2 = $feeling['user2'];
				$consultaUser2 = mysqli_query($conect,"SELECT * FROM usuarios WHERE nombre = '$user2'");
				$rowUser2 = mysqli_fetch_assoc($consultaUser2);
				echo "
				<div class='col-4 feeling font-text-perfil text-center'>
					<a href='ficha.php?id=$rowUser2[id_user]' style='text-decoration:none;'>
						<img src='../profiles/$rowUser2[perfil_usuario]'>
					</a>
						<h5>Usuario: <b>$rowUser2[nombre]</b></h5>
						<h6>Pais: <b>$rowUser2[pais]</b></h6>
					<a href='formularios.php?eliminarfeeling=$user2' style='text-decoration:none;'>
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
	}
}

Class Sala
{
	function chats($usuario)
	{	
		include('coneccion.php');
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
	}

	function Usuario($id)
	{	
		include('coneccion.php');
		$resultUsuario = mysqli_query($conect,"SELECT * FROM usuarios WHERE id_user = '$id'");
		$rowUsuario = mysqli_fetch_assoc($resultUsuario);
		$nombre = $rowUsuario['nombre'];
		echo $nombre;
	}
}

Class Herramientas
{
	function convertidorFecha($fecha){
		echo date("d-m-Y",strtotime($fecha));
	}

	function contardorVisitasHombres(){
		include('php/coneccion.php');
		$sqlUsuariosHombres = "SELECT COUNT(*) AS countHombres FROM usuarios WHERE sexo_user = 'Hombre'";
		$resultUsuariosHombres = mysqli_query($conect, $sqlUsuariosHombres);
		$valuesCountHombres = mysqli_fetch_assoc($resultUsuariosHombres);
		$numHombres = $valuesCountHombres['countHombres'];
		echo $numHombres;
	}
	function contardorVisitasMujeres(){
		include('php/coneccion.php');
		$sqlUsuariosMujer = "SELECT COUNT(*) AS countMujeres FROM usuarios WHERE sexo_user = 'Mujer'";
		$resultUsuariosMujer = mysqli_query($conect, $sqlUsuariosMujer);
		$valuesCountMujer = mysqli_fetch_assoc($resultUsuariosMujer);
		$numMujer = $valuesCountMujer['countMujeres'];
		echo $numMujer;
	}
}
?>