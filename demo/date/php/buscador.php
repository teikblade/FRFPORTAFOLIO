<?php
include('logica/funciones.php');
session_start();
if(isset($_SESSION['estatus']) == 0){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
	<?php include('vista/head.php') ?>
	<body class="container-fluid">
		<?php include('vista/header.php') ?>
		<section class="container">
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div class="col-12 panel-menu-header rounded-top">
					<h4>Filtrar Busqueda</h4>
				</div>
			</div>
			<div class="row panel-menu-margin panel-menu-margin-top">
				<div class="col-12 col-sm-12 col-md-3 text-center">
					<label class="font-text-slabo">Pais</label>
					<?php include('vista/pais.php') ?>
				</div>
				<div class="col-12 col-sm-12 col-md-3 text-center">
					<label class="font-text-slabo">Buscando</label>
					<select class="form-control" id="buscando">
						<option value="null">Seleccione..</option>
						<option value="relacion">Relacion</option>
						<option value="amistad">Amistad</option>
					</select>
				</div>
				<div class="col-12 col-sm-12 col-md-3 text-center">
					<label class="font-text-slabo">Entre edades</label>
					<div class="input-group">
					<input type="number" value="0" class="form-control col-6 text-center" id="edad1">
					<input type="number" value="0" class="form-control col-6 text-center" id="edad2">
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-3 text-center">
					<label class="font-text-slabo">Preferencia Religiosa</label>
					<select class="form-control" id="religion">
						<option value="null">Seleccione..</option>
						<option value="adventista">Adventista</option>
						<option value="noadventista">No adventista</option>
					</select>
				</div>
			</div>
			<script>
    $(document).ready(function(){
        $("#pais, #buscando, #edad1, #edad2, #religion").on('change',function(){
            $.ajax({
                url:'ajax/ajaxBusqueda.php',
                type:'POST',
                data:{
                	'pais': $('#pais').val(),
                	'buscar': $('#buscando').val(),
                	'edadinf': $('#edad1').val(),
                	'edadsup': $('#edad2').val(),
                	'religion': $('#religion').val(),
                },
                beforeSend:function()
                {
                $("#result").html('Cargando...'); 
                },
                success:function(data)
                {
                    $("#result").html(data);
                },
            });
        });
    });
</script>
			<div class='row perfiles-nuevos panel-menu-margin text-center' id="result" style="border-top: 1px solid black; margin-top: 2%"></div>
		</section>
		<?php include('vista/footer.php') ?>
	</body>
</html>