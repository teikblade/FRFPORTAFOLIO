/*AJAX LOGIN*/
var BtnLogin = document.getElementById('buttonSubmit');
BtnLogin.addEventListener('click',function(e){ 
    console.log('ok');
    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("clave").value;
    console.log(usuario);
    console.log(password);
    let url = 'php/fork_updates.php';
    var envio = "usuario="+usuario+"&clave="+password+"&BtnAcceso='BtnAcceso'";
    console.log(envio);
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){ 
        if(this.readyState == 4 && this.status == 200){ 
            let res = this.responseText;
            if(res === 'rol1'){
                window.location.href = "php/fork_almacen.php";
            }
            if(res === 'rol2'){
                window.location.href = "php/fork_ventas.php";
            }
            if(res === 'rol3'){
                window.location.href = "php/fork_registro.php";
            }
            if(res === 'Fail03'){
                document.getElementById('resultado').innerHTML =` 
                    <div class="alert alert-danger" role="alert">
                        Complete los Campos
                    </div>`
                setTimeout(function(){location.reload()},3000);
            }
            if(res === 'Fail04'){
                document.getElementById('resultado').innerHTML =` 
                    <div class="alert alert-danger" role="alert">
                        Usuario o Clave Erronea
                    </div>`
                setTimeout(function(){location.reload()},3000);
            }
            if(res === 'Fail05'){
                document.getElementById('resultado').innerHTML =` 
                    <div class="alert alert-danger" role="alert">
                        Usuario no Existe
                    </div>`
                setTimeout(function(){location.reload()},3000);
            }
        }
    }
    xhttp.open('POST',url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(envio);
    
})