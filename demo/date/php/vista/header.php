<header class="container panel-user">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(220, 226, 227);">
  		<a class="navbar-brand" href="panel_user.php"><img src="../img/logo.png" class="img-fluid" width="50"></a>
 	 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarText">
   	 		<ul class="navbar-nav">
      			<li class="nav-item active menu-header">
       				<a class="nav-link" href="panel_user.php">Inicio <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item dropdown menu-header">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pefiles</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          				<a class="dropdown-item" href="perfiles_nuevos.php">Nuevos</a>
   						<a class="dropdown-item" href="perfiles_cerca.php">Cerca</a>
    					<a class="dropdown-item" href="perfiles_favoritos.php">Favoritos</a>
              <a class="dropdown-item" href="perfiles_destacados.php">Destacados</a>
        			</div>
      			</li>
      			<li class="nav-item menu-header">
        			<a class="nav-link" href="buscador.php">Buscador</a>
      			</li>
      			<li class="nav-item menu-header">
        			<a class="nav-link" href="visitas.php">Visitas</a>
      			</li>
      			<li class="nav-item menu-header">
        			<a class="nav-link" href="chats.php" onclick="mensajesAjax('<?php echo $_SESSION['usuario']; ?>')">Mensajes <span class="notificaicon-mensajes"><?php $Notificaciones->mensajes($_SESSION['usuario']); ?></span></a>
      			</li>
      			<li class="nav-item menu-header">
        			<a class="nav-link" href="online.php">Online</a>
      			</li>
      			<li class="nav-item menu-header">
        			<a class="nav-link" href="feeling.php">Feeling</a>
      			</li>
      			<li class="nav-item dropdown menu-header">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notificacionesAjax('<?php echo $_SESSION['usuario']; ?>')">Cositas<span class="notificaicon-campana"><?php $Notificaciones->notificacion($_SESSION['usuario']); ?></span></a>
        			<div class="dropdown-menu" aria-labelledby="OpcionesMenuButton" id="notificacion"></div>
      			</li>
      			<li class="nav-item dropdown menu-header">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          				<a class="dropdown-item" href="mificha.php">Mi ficha</a>
   						<a class="dropdown-item" href="ajustes.php">Ajustes</a>
    					<a class="dropdown-item" href="logout.php">Salir</a>
        			</div>
      			</li>
    		</ul>
  		</div>
	</nav>
<!--
  <div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div> -->
  <!--
	<div class="row menu">
		<div class="col-12">
			<button id="menu-btn" class="btn btn-block btn-color-one menuUp"></button>
		</div>
	</div>
  -->
</header>
<section class="container">
	<div class="row border-header" id="informacion">
		<div class="col-12 col-sm-12 col-md-6 text-center">
			<div id="google_translate_element" class="btn btn-block"></div>
		</div>
		<div class="col-12 col-sm-12 col-md-6 text-center">
			<a href="#" class="btn btn-block btn-primary font-text">Donaciones por paypal</a>
		</div>
	</div>
</section>