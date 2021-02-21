
/*AJAX PARA EL AREA DE ALMACEN*/
var BtnAgregarProducto = document.getElementById('submitAgregar');
BtnAgregarProducto.addEventListener('click',function(){
		var xAgregar = new XMLHttpRequest();
		var boton = document.getElementById("submitAgregar").value;
		var Producto = document.getElementById("producto").value;
		var Tela = document.getElementById("tela").value;
		var Cantidad = document.getElementById("cantidad").value;
		var Talla = document.getElementById("talla").value;
		var Color = document.getElementById("color").value;
		var envio = "AgregarProductos="+boton+"&producto="+Producto+"&tela="+Tela+"&cantidad="+Cantidad+"&talla="+Talla+"&color="+Color;
		xAgregar.onreadystatechange = function(){
			if(xAgregar.readyState == 4 && xAgregar.status == 200){
                var res = xAgregar.responseText;
                if(res === 'Success'){
                    document.getElementById('resultado').innerHTML =` 
                    <div class="alert alert-primary" role="alert">
                        Creacion Satisfactoria <br>
                    </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail03'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Complete los Campos
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail06'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Seleccione Color
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
			}
		}
		var method = "POST";
		var url = "fork_updates.php";
		var asincrono = true; 

		xAgregar.open(method,url,asincrono);
        xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xAgregar.send(envio);
})
var BtnModificarProducto = document.getElementById('submitModificar');
BtnModificarProducto.addEventListener('click',function(){
		var xAgregar = new XMLHttpRequest();
		var boton = document.getElementById("submitModificar").value;
		var codigo = document.getElementById("codproducto").value;
		var Producto = document.getElementById("producto").value;
		var Tela = document.getElementById("tela").value;
		var Cantidad = document.getElementById("cantidad").value;
		var Talla = document.getElementById("talla").value;
		var Color = document.getElementById("color").value;
		var envio = "ModificarProducto="+boton+"&codproducto="+codigo+"&producto="+Producto+"&tela="+Tela+"&cantidad="+Cantidad+"&talla="+Talla+"&color="+Color;
		
		xAgregar.onreadystatechange = function(){
			if(xAgregar.readyState == 4 && xAgregar.status == 200){
				var res = xAgregar.responseText;	
				if(res === 'Success'){
                    document.getElementById('resultado').innerHTML =` 
                    <div class="alert alert-primary" role="alert">
                        Creacion Satisfactoria <br>
                    </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail01'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Error Base De Datos
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail02'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Perfil No Seleccionado
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail03'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Complete los Campos
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }   
			}
		}
		
		var method = "POST";
		var url = "fork_updates.php";
		var asincrono = true; 
		xAgregar.open(method,url,asincrono);
        xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xAgregar.send(envio);
})

var BtnEliminarProducto = document.getElementById('submitEliminar');
BtnEliminarProducto.addEventListener('click',function(){
		var xAgregar = new XMLHttpRequest();
		var boton = document.getElementById("submitEliminar").value;
		var codigo = document.getElementById("codproducto").value;
		var envio = "QuitarProductos="+boton+"&codproducto="+codigo;
	
		xAgregar.onreadystatechange = function(){
			if(xAgregar.readyState == 4 && xAgregar.status == 200){
                var res = xAgregar.responseText;
                console.log(res);	
				if(res === 'Success'){
                    document.getElementById('resultado').innerHTML =` 
                    <div class="alert alert-primary" role="alert">
                        Eliminacion Satisfactoria <br>
                    </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail03'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Complete los Campos
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
                if(res === 'Fail06'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
                            Seleccione Color
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
			}
		}
		var method = "POST";
		var url = "fork_updates.php";
		var asincrono = true; 

		xAgregar.open(method,url,asincrono);
        xAgregar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xAgregar.send(envio);
})