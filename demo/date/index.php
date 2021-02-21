<?php
include('php/logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 1){
	header("Location: php/panel_user.php");
}
?>
<!DOCTYPE html>
<html  lang="es">
	<head>
		<title>Date Adventista</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/progress.css">
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">
		<script type="text/javascript" src="js/jquery3-4-1.min.js"></script>
		<script type="text/javascript" src="js/efects.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/animateprogress.js"></script>
		<script type="text/javascript" src="js/googletranslate.js"></script>
		<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</head>
	<body class="container-fluid" >
		<header class="fixed-top">
			<nav class="navbar navbar-light bg-header-index">
				<div class="row margin-logo-index">
					<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
						<a class="navbar-brand col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" href="index.php">
							<img src="img/logo.png" class="img-fluid logo" alt="Logo">
						</a>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<h3>DATE ADVENSTISTA</h3>
					</div>
				</div>
				<form id="form-login" method="post" action="php/formularios.php" class="margin-form-index col-md-12 col-xl-8">
					<div class="row">
						<div class="offset-lg-1"></div>
						<div class="col-12 col-sm-12 col-md-3 col-lg-3 text-right google-margin" id="google_translate_element">
						</div>
						<div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center label-user">
							<input class="form-control border-input-radius" type="text" value="test@gmail.com" aria-label="Usuario" name="user">
							<a href="#" data-toggle="modal" data-target="#userModalRecuperar"><span style="color:white;">Recordar Contraseña</span></a>
						</div>
						<div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center label-user">
							<input class="form-control border-input-radius" type="password" value="1234" aria-label="Contraseña" name="password">
							<a href="#" data-toggle="modal" data-target="#userModalRegister"><span style="color:white;">Registro</span></a>
						</div>
						<div class="col-12 col-sm-12 col-md-3 col-lg-2 text-center label-user">
							<button class="btn btn-color-one form-control" type="submit" name="btn-login">Entrar</button>
						</div>
					</div>
				</form>
			</nav>
			<div class="row menu">
				<div class="col-12">
					<button id="menu-btn" class="btn btn-block btn-color-one menuUp"></button>
				</div>
			</div>
		</header>
		<section class="margin-top-index margin-bottom-index">
			<div class="row">
				<img src="img/background_index.jpg" class="img-index">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center section-index-one">
					<div class="target-index container target-body">
						<div class="row target-content">
							<div class="col-12">
								<h4 class="text-center">Busca Pareja y Amigos</h4>	
							</div>
						</div>
						<div class="row target-content">
							<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
								<h5>América</h5>
								<img src="img/c_americano.png" width="50">
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
								<h5>Asía</h5>
								<img src="img/c_asiatico.png" width="50">
							</div>
						</div>
						<div class="row target-content">
							<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
								<h5>África</h5>
								<img src="img/c_africano.png" width="50">
							</div>
							<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
								<h5>Europa</h5>
								<img src="img/c_europeo.png" width="50">
							</div>
							<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
								<h5>Oceanía</h5>
								<img src="img/c_oceanico.png" width="60">
							</div>
						</div>
						<div class="row target-content">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center target-border-bottom-index">
								<a href="#" data-toggle="modal" data-target="#userModalRegister"><button class="btn btn-color-one col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 2%;"><h6>Entra Ahora, Es Gratis</h6></button></a>
							</div>
						</div>
						<div class="row text-center redes-sociales target-footer">
							<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
								<a href="https://www.facebook.com/DateAdventista-232146794477806" target="_blank"><img src="img/facebook.png"></a>
							</div>
							<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
								<a href="https://www.instagram.com/dateadventista/" target="_blank"><img src="img/instagram.png"></a>
							</div>
							<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
								<a href="https://twitter.com/AdventistaDate" target="_blank"><img src="img/twiiter.png"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="container margin-bottom-index">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
					<div class="row">
						<div class="col-12">
							<img src="img/chico.png" class="img-gender">
						</div>
						<div class="col-12">
							<b>HOMBRES REGISTRADOS</b>
						</div>
						<div class="col-12">
							<div class="progress_data">
							<progress id="hombres" max="100" value="<?php echo $Herramientas->contardorVisitasHombres(); ?>" class="progress-class"></progress>
							<h5></h5>
						</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
					<div class="row">
						<div class="col-12">
							<img src="img/chica.png" class="img-gender">
						</div>
						<div class="col-12">
							<b>MUJERES REGISTRADAS</b>
						</div>
						<div class="col-12">
							<div class="progress_data">
							<progress id="mujeres" max="100" value="<?php echo $Herramientas->contardorVisitasMujeres(); ?>" class="progress-class"></progress>
							<h5></h5>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</section>
<section class="container margin-bottom-index">
	<div class="row">
		<!-- img src="http://ximg.es/390x110/000/fff" class="vid" -->
		<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
			<h2 class="text-center">Introducción y reglamento</h2>
			<p class="text-center">Hola bienvenido a esta tu web, fue diseñada pensando en ti, para conocer amigos y porque no encontrar al futuro compañero o compañera de la vida. El servicio es completamente gratuito pero si quieres que destaquemos tu perfil tendrá un costo. Al hacerte miembro estas aceptando los términos y condiciones que a continuación detallamos: Deberás completar tu perfil y podrás añadir hasta 5 fotos. Así otros podrán mirar tu perfil y podrán saber a quién está contactando. No está permitido publicar fotos en ropa interior, ni fotos con niños, tampoco fotos provocativas, ni mucho menos fotos pornográficos. Solo se aceptarán fotos del rostro, mitad del cuerpo o fotos completas de la persona. Una vez completado tu perfil, esperas desde unos minutos hasta doce horas para publicar tu perfil. Una vez publicado ya podrás contactarte con otras personas. Usando la lista de miembros o podrás usar el buscador. Si te contactan personas mal intencionadas, hablando un lenguaje obsceno, o propuestas indecentes debes reportarlo inmediatamente a los modeladores. Tampoco se acepta publicidad o propaganda de ningún artículo o servicio. Si alguien insiste en acosarte y tú no deseas su amistad podrás bloquearlo y denunciar a los modeladores. Los miembros voluntariamente se añaden a nuestra página voluntariamente se pueden retirarse cuando así lo deseen. Serán consideradas faltas graves y eliminadas del grupo los miembros que no respeten a otros miembros, hablen lenguaje obsceno, acosen a otros que no deseen tener amistad con el o ella. Personas que hagan publicidad de algún producto o servicio. Esperamos que esta web sea amena y útil para ti. Bendiciones</p>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 img-section-index">
			<img src="img/pareja.png" class="text-center" id="image_efect_one">
		</div>
	</div>
</section>
<section class="container margin-bottom-index">
	<div class="row">
		<!-- img src="http://ximg.es/390x110/000/fff" class="vid" -->
		<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 img-section-index">
			<img src="img/pareja2.png" id="image_efect_two">
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
			<h2 class="text-center">Para Ti que estas Soltero o Soltera</h2>
			<p class="text-center">Cuando te sientes solo, no existe compañía, no vez salida al amor, no tienes amistades, sientes que no puedes relacionarte con el entorno que te rodea, entras en depresión porque crees que es un problema que no ayuda a que avances en la vida, esta página es para ti, donde a pesar de la timidez que puedas tener, conocerás a personas que puedas relacionarte, tener amistades, encontrar pareja y hasta formar una familia.</p>
		</div>
	</div>
</section>
<section class="container margin-bottom-index">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
			<div class="panel-index">
				<h5>¿A que esperas?</h5>
				<a href="#" data-toggle="modal" data-target="#userModalRegister"><button class="btn btn-color-one btn-block"><h3>Enamorate YA!</h3></button></a>
			</div>
		</div>
	</div>
</section>
<footer class="container-fluid footer">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
			<h2>Llegamos a todas partes del mundo</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
			<h5>América</h5>
			<img src="img/c_americano.png" width="120">
		</div>
		<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
			<h5>Asía</h5>
			<img src="img/c_asiatico.png" width="120">
		</div>
		<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
			<h5>África</h5>
			<img src="img/c_africano.png" width="120">
		</div>
	</div>
	<div class="row">
		<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
		<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
			<h5>Oceanía</h5>
			<img src="img/c_oceanico.png" width="120">
		</div>
		<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
			<h5>Europa</h5>
			<img src="img/c_europeo.png" width="120">
		</div>
		<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 footer-desing">
			
		</div>
	</div>
</footer>
<!-- Modal Demo Usuario -->
<div class="modal fade" id="demoModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Quieres ver...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 margin-bottom-index">
						<a href="demo/demopanel_hombre.html" class="list-group-item"><img src="img/masculino.png" class="img-genero"><span style="font-size: 18px; font-weight: bold; margin-left: 10%; color: #50c8ef">Hombres</span></a>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 margin-bottom-index">
						<a href="demo/demopanel_mujer.html" class="list-group-item"> <img src="img/femenino.png" class="img-genero"><span style="font-size: 18px; font-weight: bold; margin-left: 10%; color: #f05228">Mujeres</span></a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Recuperar Usuario-->
<div class="modal fade" id="userModalRecuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-register-user" method="post" action="php/formularios.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 margin-bottom-index text-center">
							<img src="img/recuperar.png" width="150" class="margin-bottom-index">
							<p>Enviaremos un mensaje a tu correo electronico, recuerda revisar en la bandeja de entrada y la bandeja de span</p>
							<input type="text" name="correo_recuperacion" placeholder="Ingrese Correo Electronico" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<button class="btn btn-color-one btn-block" type="submit" name="btn-recuperar" disabled>Recuperar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Registar Usuario -->
<div class="modal fade" id="userModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registro de Nuevo Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-register-user" method="post" action="php/formularios.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12 text-center">
							<h5>Coloque Imagen de Perfil</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center image-register-user">
							<div id="preview">
								<img src="img/imagen_user.png">
							</div>
							<input type="file" name="file" id="file" accept="image/jpg, image/jpeg, image/png">
						</div>
					</div>
					<div class="row">
						<div class="col-12 modal-margin">
							<select class="form-control col-12 btn-color-one" name="sexo_user">
								<option value="null">Yo soy ..</option>
								<option value="Hombre">Hombre</option>
								<option value="Mujer">Mujer</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<select name="pais" class="form-control col-12 btn-color-one">
								<option value="">Soy De ..</option>
								<option value="Afganistán" id="AF">Afganistán</option>
								<option value="Albania" id="AL">Albania</option>
								<option value="Alemania" id="DE">Alemania</option>
								<option value="Andorra" id="AD">Andorra</option>
								<option value="Angola" id="AO">Angola</option>
								<option value="Anguila" id="AI">Anguila</option>
								<option value="Antártida" id="AQ">Antártida</option>
								<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
								<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
								<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
								<option value="Argelia" id="DZ">Argelia</option>
								<option value="Argentina" id="AR">Argentina</option>
								<option value="Armenia" id="AM">Armenia</option>
								<option value="Aruba" id="AW">Aruba</option>
								<option value="Australia" id="AU">Australia</option>
								<option value="Austria" id="AT">Austria</option>
								<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
								<option value="Bahamas" id="BS">Bahamas</option>
								<option value="Bahrein" id="BH">Bahrein</option>
								<option value="Bangladesh" id="BD">Bangladesh</option>
								<option value="Barbados" id="BB">Barbados</option>
								<option value="Bélgica" id="BE">Bélgica</option>
								<option value="Belice" id="BZ">Belice</option>
								<option value="Benín" id="BJ">Benín</option>
								<option value="Bermudas" id="BM">Bermudas</option>
								<option value="Bhután" id="BT">Bhután</option>
								<option value="Bielorrusia" id="BY">Bielorrusia</option>
								<option value="Birmania" id="MM">Birmania</option>
								<option value="Bolivia" id="BO">Bolivia</option>
								<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
								<option value="Botsuana" id="BW">Botsuana</option>
								<option value="Brasil" id="BR">Brasil</option>
								<option value="Brunei" id="BN">Brunei</option>
								<option value="Bulgaria" id="BG">Bulgaria</option>
								<option value="Burkina Faso" id="BF">Burkina Faso</option>
								<option value="Burundi" id="BI">Burundi</option>
								<option value="Cabo Verde" id="CV">Cabo Verde</option>
								<option value="Camboya" id="KH">Camboya</option>
								<option value="Camerún" id="CM">Camerún</option>
								<option value="Canadá" id="CA">Canadá</option>
								<option value="Chad" id="TD">Chad</option>
								<option value="Chile" id="CL">Chile</option>
								<option value="China" id="CN">China</option>
								<option value="Chipre" id="CY">Chipre</option>
								<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
								<option value="Colombia" id="CO">Colombia</option>
								<option value="Comores" id="KM">Comores</option>
								<option value="Congo" id="CG">Congo</option>
								<option value="Corea" id="KR">Corea</option>
								<option value="Corea del Norte" id="KP">Corea del Norte</option>
								<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
								<option value="Costa Rica" id="CR">Costa Rica</option>
								<option value="Croacia" id="HR">Croacia</option>
								<option value="Cuba" id="CU">Cuba</option>
								<option value="Dinamarca" id="DK">Dinamarca</option>
								<option value="Djibouri" id="DJ">Djibouri</option>
								<option value="Dominica" id="DM">Dominica</option>
								<option value="Ecuador" id="EC">Ecuador</option>
								<option value="Egipto" id="EG">Egipto</option>
								<option value="El Salvador" id="SV">El Salvador</option>
								<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
								<option value="Eritrea" id="ER">Eritrea</option>
								<option value="Eslovaquia" id="SK">Eslovaquia</option>
								<option value="Eslovenia" id="SI">Eslovenia</option>
								<option value="España" id="ES">España</option>
								<option value="Estados Unidos" id="US">Estados Unidos</option>
								<option value="Estonia" id="EE">Estonia</option>
								<option value="c" id="ET">Etiopía</option>
								<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
								<option value="Filipinas" id="PH">Filipinas</option>
								<option value="Finlandia" id="FI">Finlandia</option>
								<option value="Francia" id="FR">Francia</option>
								<option value="Gabón" id="GA">Gabón</option>
								<option value="Gambia" id="GM">Gambia</option>
								<option value="Georgia" id="GE">Georgia</option>
								<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
								<option value="Ghana" id="GH">Ghana</option>
								<option value="Gibraltar" id="GI">Gibraltar</option>
								<option value="Granada" id="GD">Granada</option>
								<option value="Grecia" id="GR">Grecia</option>
								<option value="Groenlandia" id="GL">Groenlandia</option>
								<option value="Guadalupe" id="GP">Guadalupe</option>
								<option value="Guam" id="GU">Guam</option>
								<option value="Guatemala" id="GT">Guatemala</option>
								<option value="Guayana" id="GY">Guayana</option>
								<option value="Guayana francesa" id="GF">Guayana francesa</option>
								<option value="Guinea" id="GN">Guinea</option>
								<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
								<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
								<option value="Haití" id="HT">Haití</option>
								<option value="Holanda" id="NL">Holanda</option>
								<option value="Honduras" id="HN">Honduras</option>
								<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
								<option value="Hungría" id="HU">Hungría</option>
								<option value="India" id="IN">India</option>
								<option value="Indonesia" id="ID">Indonesia</option>
								<option value="Irak" id="IQ">Irak</option>
								<option value="Irán" id="IR">Irán</option>
								<option value="Irlanda" id="IE">Irlanda</option>
								<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
								<option value="Isla Christmas" id="CX">Isla Christmas</option>
								<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
								<option value="Islandia" id="IS">Islandia</option>
								<option value="Islas Caimán" id="KY">Islas Caimán</option>
								<option value="Islas Cook" id="CK">Islas Cook</option>
								<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
								<option value="Islas Faroe" id="FO">Islas Faroe</option>
								<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
								<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
								<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
								<option value="Islas Marshall" id="MH">Islas Marshall</option>
								<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
								<option value="Islas Palau" id="PW">Islas Palau</option>
								<option value="Islas Salomón" d="SB">Islas Salomón</option>
								<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
								<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
								<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
								<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
								<option value="Israel" id="IL">Israel</option>
								<option value="Italia" id="IT">Italia</option>
								<option value="Jamaica" id="JM">Jamaica</option>
								<option value="Japón" id="JP">Japón</option>
								<option value="Jordania" id="JO">Jordania</option>
								<option value="Kazajistán" id="KZ">Kazajistán</option>
								<option value="Kenia" id="KE">Kenia</option>
								<option value="Kirguizistán" id="KG">Kirguizistán</option>
								<option value="Kiribati" id="KI">Kiribati</option>
								<option value="Kuwait" id="KW">Kuwait</option>
								<option value="Laos" id="LA">Laos</option>
								<option value="Lesoto" id="LS">Lesoto</option>
								<option value="Letonia" id="LV">Letonia</option>
								<option value="Líbano" id="LB">Líbano</option>
								<option value="Liberia" id="LR">Liberia</option>
								<option value="Libia" id="LY">Libia</option>
								<option value="Liechtenstein" id="LI">Liechtenstein</option>
								<option value="Lituania" id="LT">Lituania</option>
								<option value="Luxemburgo" id="LU">Luxemburgo</option>
								<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
								<option value="Madagascar" id="MG">Madagascar</option>
								<option value="Malasia" id="MY">Malasia</option>
								<option value="Malawi" id="MW">Malawi</option>
								<option value="Maldivas" id="MV">Maldivas</option>
								<option value="Malí" id="ML">Malí</option>
								<option value="Malta" id="MT">Malta</option>
								<option value="Marruecos" id="MA">Marruecos</option>
								<option value="Martinica" id="MQ">Martinica</option>
								<option value="Mauricio" id="MU">Mauricio</option>
								<option value="Mauritania" id="MR">Mauritania</option>
								<option value="Mayotte" id="YT">Mayotte</option>
								<option value="México" id="MX">México</option>
								<option value="Micronesia" id="FM">Micronesia</option>
								<option value="Moldavia" id="MD">Moldavia</option>
								<option value="Mónaco" id="MC">Mónaco</option>
								<option value="Mongolia" id="MN">Mongolia</option>
								<option value="Montserrat" id="MS">Montserrat</option>
								<option value="Mozambique" id="MZ">Mozambique</option>
								<option value="Namibia" id="NA">Namibia</option>
								<option value="Nauru" id="NR">Nauru</option>
								<option value="Nepal" id="NP">Nepal</option>
								<option value="Nicaragua" id="NI">Nicaragua</option>
								<option value="Níger" id="NE">Níger</option>
								<option value="Nigeria" id="NG">Nigeria</option>
								<option value="Niue" id="NU">Niue</option>
								<option value="Norfolk" id="NF">Norfolk</option>
								<option value="Noruega" id="NO">Noruega</option>
								<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
								<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
								<option value="Omán" id="OM">Omán</option>
								<option value="Panamá" id="PA">Panamá</option>
								<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
								<option value="Paquistán" id="PK">Paquistán</option>
								<option value="Paraguay" id="PY">Paraguay</option>
								<option value="Perú" id="PE">Perú</option>
								<option value="Pitcairn" id="PN">Pitcairn</option>
								<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
								<option value="Polonia" id="PL">Polonia</option>
								<option value="Portugal" id="PT">Portugal</option>
								<option value="Puerto Rico" id="PR">Puerto Rico</option>
								<option value="Qatar" id="QA">Qatar</option>
								<option value="Reino Unido" id="UK">Reino Unido</option>
								<option value="República Centroafricana" id="CF">República Centroafricana</option>
								<option value="República Checa" id="CZ">República Checa</option>
								<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
								<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
								<option value="República Dominicana" id="DO">República Dominicana</option>
								<option value="Reunión" id="RE">Reunión</option>
								<option value="Ruanda" id="RW">Ruanda</option>
								<option value="Rumania" id="RO">Rumania</option>
								<option value="Rusia" id="RU">Rusia</option>
								<option value="Samoa" id="WS">Samoa</option>
								<option value="Samoa occidental" id="AS">Samoa occidental</option>
								<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
								<option value="San Marino" id="SM">San Marino</option>
								<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
								<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
								<option value="Santa Helena" id="SH">Santa Helena</option>
								<option value="Santa Lucía" id="LC">Santa Lucía</option>
								<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
								<option value="Senegal" id="SN">Senegal</option>
								<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
								<option value="Sychelles" id="SC">Seychelles</option>
								<option value="Sierra Leona" id="SL">Sierra Leona</option>
								<option value="Singapur" id="SG">Singapur</option>
								<option value="Siria" id="SY">Siria</option>
								<option value="Somalia" id="SO">Somalia</option>
								<option value="Sri Lanka" id="LK">Sri Lanka</option>
								<option value="Suazilandia" id="SZ">Suazilandia</option>
								<option value="Sudán" id="SD">Sudán</option>
								<option value="Suecia" id="SE">Suecia</option>
								<option value="Suiza" id="CH">Suiza</option>
								<option value="Surinam" id="SR">Surinam</option>
								<option value="Svalbard" id="SJ">Svalbard</option>
								<option value="Tailandia" id="TH">Tailandia</option>
								<option value="Taiwán" id="TW">Taiwán</option>
								<option value="Tanzania" id="TZ">Tanzania</option>
								<option value="Tayikistán" id="TJ">Tayikistán</option>
								<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
								<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
								<option value="Timor Oriental" id="TP">Timor Oriental</option>
								<option value="Togo" id="TG">Togo</option>
								<option value="Tonga" id="TO">Tonga</option>
								<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
								<option value="Túnez" id="TN">Túnez</option>
								<option value="Turkmenistán" id="TM">Turkmenistán</option>
								<option value="Turquía" id="TR">Turquía</option>
								<option value="Tuvalu" id="TV">Tuvalu</option>
								<option value="Ucrania" id="UA">Ucrania</option>
								<option value="Uganda" id="UG">Uganda</option>
								<option value="Uruguay" id="UY">Uruguay</option>
								<option value="Uzbekistán" id="UZ">Uzbekistán</option>
								<option value="Vanuatu" id="VU">Vanuatu</option>
								<option value="Venezuela" id="VE">Venezuela</option>
								<option value="Vietnam" id="VN">Vietnam</option>
								<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
								<option value="Yemen" id="YE">Yemen</option>
								<option value="Zambia" id="ZM">Zambia</option>
								<option value="Zimbabue" id="ZW">Zimbabue</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-6 modal-margin">
							<label>Nombre y Apellido</label>
							<input type="text" name="name_user" placeholder="Nombre y Apellido" class="form-control" required>
						</div>
						<div class="col-6 modal-margin">
							<label>Contraseña</label>
							<input type="password" name="pass_user" placeholder="Contraseña" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-6 modal-margin">
							<label>Correo electronico</label>
							<input type="email" name="email_user" placeholder="Correo Electronico" class="form-control" required>
						</div>
						<div class="col-6 modal-margin">
							<label>Fecha de nacimiento</label>
							<input type="date" name="date_user" placeholder="Fecha de nacimiento" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-12 modal-margin">
							<button class="btn btn-color-one btn-block" type="submit" name="btn-register" disabled>Registrar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/previsualizar.js"></script>
<script type="text/javascript">
window.onload = function() {
    var countH = "<?php $Herramientas->contardorVisitasHombres(); ?>";
    var countM = "<?php $Herramientas->contardorVisitasMujeres(); ?>";
    animateprogress("#hombres",countH);
    animateprogress("#mujeres",countM);
}
</script>
</body>
</html>