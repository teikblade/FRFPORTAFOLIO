/*AJAX ADMINISTRADOR DE USUARIOS*/
var formCrearUsuario = document.getElementById('FormAdministradorCrearUsuario');
formCrearUsuario.addEventListener('submit',function(e){
    e.preventDefault();
    var datos = new FormData(formCrearUsuario);
    let url = 'fork_updates.php';
    var envio = "nombre="+datos.get('nombre')+"&usuario="+datos.get('usuario')+"&password="+datos.get('password')+"&perfil="+datos.get('perfil')+"&BtnNuevoUsuario='BtnNuevoUsuario'";
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){ 
        if(this.readyState == 4 && this.status == 200){ 
            let res = this.responseText;
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
    xhttp.open('POST',url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(envio);
})

var formEliminarUsuario = document.getElementById('FormAdministradorEliminarUsuario');
formEliminarUsuario.addEventListener('submit',function(e){
    e.preventDefault();
    console.log('click');
    var datos = new FormData(formEliminarUsuario);
    let url = 'fork_updates.php';
    var envio = "eliminar="+datos.get('eliminar')+"&BtnEliminarUsuario='BtnEliminarUsuario'";
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){ 
        if(this.readyState == 4 && this.status == 200){ 
            let res = this.responseText;
            console.log(res);
            if(res === 'Success'){
                document.getElementById('resultado').innerHTML =` 
                <div class="alert alert-primary" role="alert">
                    Resultado Exitoso <br>
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
    xhttp.open('POST',url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(envio);
 })