/*AJAX PARA EL AREA DE VENTAS*/
document.getElementById('ProductoCotizar').addEventListener('click',function(){
	var xhttp = new XMLHttpRequest();
		var Producto = document.getElementById("pd1").value;
		var Cantidad = document.getElementById("c1").value;
		var Precio = document.getElementById("p1").value;
		var envio = "pd1="+Producto+"&c1="+Cantidad+"&p1="+Precio+"&BtnCotizar='BtnCotizar'";
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				var res = xhttp.responseText;
				console.log(res);	
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
                if(res === 'Fail08'){
                    document.getElementById('resultado').innerHTML =` 
                        <div class="alert alert-danger" role="alert">
							Producto no existe o excede la cantidad
                        </div>`
                    setTimeout(function(){location.reload()},3000);
                }
			}
		}
		var method = "POST";
		var url = "fork_updates.php";
		var asincrono = true; 

		xhttp.open(method,url,asincrono);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(envio);
});