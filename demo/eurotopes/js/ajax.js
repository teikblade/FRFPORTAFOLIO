//LISTENERS
console.log(document.getElementById("btnPrefactura"));
console.log(document.getElementById("btnCrear"));
if (document.addEventListener) {
	if(document.getElementById("btnPrefactura") !== null){
		document.getElementById("btnPrefactura").addEventListener("click", Prefacturar);
	}
	if(document.getElementById("btnCrearVendedor") !== null){
		document.getElementById("btnCrearVendedor").addEventListener("click", CrearVendedor);
	}
	if(document.getElementById("btnFormatear") !== null){
		document.getElementById("btnFormatear").addEventListener("click", Formatear);
	}
	if(document.getElementById("btnCrear") !== null){
		document.getElementById("btnCrear").addEventListener("click", CrearCliente);
	}
	if(document.getElementById("btnBorrar") !== null){
		document.getElementById("btnBorrar").addEventListener("click", BorrarPrecargo);
	}
}
//FUCTIONS
function CrearCliente() {
			/*LLAMDO A HTTP REQUEST*/
				var xCargarCliente = new XMLHttpRequest();
				/*VARIABLES*/
				var nombre = document.getElementById("nombre").value;
				var direccion = document.getElementById("direccion").value;
				var correo = document.getElementById("email").value;
				var telefono = document.getElementById("telefono").value;
				var cedula = document.getElementById("identificacion").value;
			
				var BtnCrearCliente = document.getElementById("btnCrear").value;
				var envio = "nombre="+nombre+"&btncrearcliente="+BtnCrearCliente+"&direccion="+direccion+"&correo="+correo+"&telefono="+telefono+"&cedula="+cedula;

				xCargarCliente.onreadystatechange = function(){
					var return_data = xCargarCliente.responseText;
					document.getElementById("stats-creacion").innerHTML = return_data;
						setInterval(function(){	window.location.reload();}, 1500);
				}
			var method = "POST";
			var url = "euro_update.php";
			var asincrono = true;
			xCargarCliente.open(method,url,asincrono);
		/*
		Establece la información del encabezado de tipo de contenido para enviar, las variables codificadas en la URL
		en este caso es para la variable envio.
		*/
		xCargarCliente.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			/*
			Send: Envia la solcitud al servidor. En caso de utilizar variables por el metodo Post se debe agregar a Send.
			*/
			xCargarCliente.send(envio);
			document.getElementById("stats-creacion").innerHTML = 'CARGANDO';
		}
		//PREFACTURAR
		function Prefacturar(){
				/*LLAMDO A HTTP REQUEST*/
				var xPrefacturar = new XMLHttpRequest();
				/*VARIABLES*/
				var cantidad = document.getElementById("cantidad").value;
				var producto = document.getElementById("producto").value;
				var metros = document.getElementById("metros").value;
				var monto = document.getElementById("monto").value;

				var BtnPrefactura = document.getElementById("btnPrefactura").value;
				var envio = "monto="+monto+"&btnprefactura="+BtnPrefactura+"&metros="+metros+"&producto="+producto+"&cantidad="+cantidad;

				xPrefacturar.onreadystatechange = function(){
					var return_data = xPrefacturar.responseText;
					document.getElementById("stats-prefacturacion").innerHTML = return_data;
					setInterval(function(){	window.location.reload();}, 1500);
				}
			var method = "POST";
			var url = "euro_update.php";
			var asincrono = true;
			xPrefacturar.open(method,url,asincrono);
		/*
		Establece la información del encabezado de tipo de contenido para enviar, las variables codificadas en la URL
		en este caso es para la variable envio.
		*/
		xPrefacturar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			/*
			Send: Envia la solcitud al servidor. En caso de utilizar variables por el metodo Post se debe agregar a Send.
			*/
			xPrefacturar.send(envio);
			document.getElementById("stats-prefacturacion").innerHTML = 'CARGANDO';
		}
		function BorrarPrecargo(){
			/*LLAMDO A HTTP REQUEST*/
				var xBorrarPrecargo = new XMLHttpRequest();

				var BtnBorrar = document.getElementById("btnBorrar").value;
				var envio = "btnborrarprefactura="+BtnBorrar;

				xBorrarPrecargo.onreadystatechange = function(){
					var return_data = xBorrarPrecargo.responseText;
					document.getElementById("stats-prefacturacion").innerHTML = return_data;
					setInterval(function(){	window.location.reload();}, 1500);
				}
			var method = "POST";
			var url = "euro_update.php";
			var asincrono = true;
			xBorrarPrecargo.open(method,url,asincrono);
		/*
		Establece la información del encabezado de tipo de contenido para enviar, las variables codificadas en la URL
		en este caso es para la variable envio.
		*/
		xBorrarPrecargo.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			/*
			Send: Envia la solcitud al servidor. En caso de utilizar variables por el metodo Post se debe agregar a Send.
			*/
			xBorrarPrecargo.send(envio);
			document.getElementById("stats-prefacturacion").innerHTML = 'CARGANDO';
		}

	function CrearVendedor(){
			/*LLAMDO A HTTP REQUEST*/
				var xCrearVendedor = new XMLHttpRequest();

				var usuario = document.getElementById("usuario").value;
				var clave = document.getElementById("clave").value;

				var BtnCrearVendedor = document.getElementById("btnCrearVendedor").value;
				var envio = "usuario="+usuario+"&clave="+clave+"&btncrearvendedor="+BtnCrearVendedor;

				xCrearVendedor.onreadystatechange = function(){
					var return_data = xCrearVendedor.responseText;
					document.getElementById("stats-creacion-vendedor").innerHTML = return_data;
					setInterval(function(){	window.location.reload();}, 1500);
				}
			var method = "POST";
			var url = "euro_update.php";
			var asincrono = true;
			xCrearVendedor.open(method,url,asincrono);
		/*
		Establece la información del encabezado de tipo de contenido para enviar, las variables codificadas en la URL
		en este caso es para la variable envio.
		*/
		xCrearVendedor.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			/*
			Send: Envia la solcitud al servidor. En caso de utilizar variables por el metodo Post se debe agregar a Send.
			*/
			xCrearVendedor.send(envio);
			document.getElementById("stats-creacion-vendedor").innerHTML = 'CARGANDO';
		}
		function Formatear(){
			/*LLAMDO A HTTP REQUEST*/
				var xFormatear = new XMLHttpRequest();

				var BtnFormatear = document.getElementById("btnFormatear").value;
				var envio = "btnformatear="+BtnFormatear;

				xFormatear.onreadystatechange = function(){
					var return_data = xFormatear.responseText;
					document.getElementById("stats-formateo").innerHTML = return_data;
					setInterval(function(){	window.location.reload();}, 1500);
				}
			var method = "POST";
			var url = "euro_update.php";
			var asincrono = true;
			xFormatear.open(method,url,asincrono);
		/*
		Establece la información del encabezado de tipo de contenido para enviar, las variables codificadas en la URL
		en este caso es para la variable envio.
		*/
		xFormatear.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			/*
			Send: Envia la solcitud al servidor. En caso de utilizar variables por el metodo Post se debe agregar a Send.
			*/
			xFormatear.send(envio);
			document.getElementById("stats-formateo").innerHTML = 'CARGANDO';
		}	