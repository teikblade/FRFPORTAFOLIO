function ChatAjax(){
/*LLAMADO A HTTPRQUEST*/
	var user2 = document.getElementById('user2').value;
	var enviar = "user2="+user2;
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("chat").innerHTML = return_data;
		}
	}
xAgregar.open("POST","ajax/ajaxMensaje.php",true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send(enviar);
}

function SalaAjax(usuario){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("sala").innerHTML = return_data;
		}
	}
xAgregar.open("GET","ajax/ajaxChats.php?envio="+usuario,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();
}

function PerfilesNuevosAjax(busqueda){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("perfilesNuevos").innerHTML = return_data;
		$('#perfilesNuevos').fadeOut(1000);
		$('#perfilesNuevos').fadeIn(1500);
		}
	}
xAgregar.open("GET","ajax/ajaxPerfilesNuevos.php?envio="+busqueda,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();
}

function PerfilesCercaAjax(pais, nombre, busqueda){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("perfilesCerca").innerHTML = return_data;
		$('#perfilesCerca').fadeOut(1000);
		$('#perfilesCerca').fadeIn(1500);
		}
	}
xAgregar.open("GET","ajax/ajaxPerfilesCerca.php?pais="+pais+"&nombre="+nombre+"&busqueda="+busqueda,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}

function PerfilesDestacadosAjax(pais, nombre){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("perfilesDestacados").innerHTML = return_data;
		$('#perfilesDestacados').fadeOut(1000);
		$('#perfilesDestacados').fadeIn(1500);
		}
	}
xAgregar.open("GET","ajax/ajaxPerfilesDestacados.php?pais="+pais+"&nombre="+nombre,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}

function feelingAjax(id){
/*LLAMADO A HTTPRQUEST*/
	var envio = "feeling="+id;
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("resultadoPerfil").innerHTML = return_data;
		$('#mensaje').fadeIn(1500);
		}
	}
xAgregar.open("POST","ajax/ajaxFeeling.php",true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send(envio);	
}

function feelingPanelAjax(id){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("feelingPanel").innerHTML = return_data;
		}
	}
xAgregar.open("GET","ajax/ajaxFeelingPanel.php?envio="+id,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}

function salaChatlAjax(id){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("resultadoPerfil").innerHTML = return_data;
		$('#mensaje').fadeIn(1500);
		}
	}
xAgregar.open("GET","ajax/ajaxChat.php?envio="+id,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}

function notificacionesAjax(id){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("notificacion").innerHTML = return_data;
		}
	}
xAgregar.open("GET","ajax/ajaxNotificaciones.php?envio="+id,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}

function mensajesAjax(id){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("prueba").innerHTML = return_data;
		}
	}
xAgregar.open("GET","ajax/ajaxMensajes.php?envio="+id,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}

function PerfilesFavoritosAjax(pais){
/*LLAMADO A HTTPRQUEST*/
	var xAgregar = new XMLHttpRequest();
	xAgregar.onreadystatechange = function(){
	if(xAgregar.readyState == 4 && xAgregar.status == 200){
		var return_data = xAgregar.responseText;	
		document.getElementById("perfilesFavoritos").innerHTML = return_data;
		$('#perfilesFavoritos').fadeOut(1000);
		$('#perfilesFavoritos').fadeIn(1500);
		}
	}
xAgregar.open("GET","ajax/ajaxPerfilesFavoritos.php?envio="+pais,true);
xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xAgregar.send();	
}