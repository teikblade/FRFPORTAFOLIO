<?php 
//INCLUDE ARCHIVE PHP AND CALL CLASS
include 'class.php';
$conectar = new Conexion();
$estatus = new Message();
$Exchange = new Exchange();
$Mostrar = new Table();
$Query = new CRUD();
//------------------------//
date_default_timezone_set('America/Caracas');
$Date = date("d-m-Y");
$DateCrud = date("Y-m-d");
//------------------------//
//CONECT AM THE DATABASE
if($conectar->connect()){
	$valor = $Exchange->ExchangeRates($conectar->connect(),"SELECT * FROM tazas ORDER BY n_taza DESC");
	if($valor == 0 || $valor == null){
		$valor = 0;
	}
	if(isset($_POST['btncargar'])){
		$taza = $_POST['taza'];
		$campos = strlen($taza);
		if($campos == true){
			$QueryInsert = $Query->InsertQuery($conectar->connect(),$taza,$DateCrud);
			if($QueryInsert == true){
				echo $estatus->ActionCrudSuccess();
			}else{
				echo $estatus->ActionCrudFailure();
			}
		}else{
			$estatus->FieldsFailure();
		}
	}

	if(isset($_POST['btneliminar'])){
		$QueryDelete = $Query->DeleteWhereQuery($conectar->connect(),$DateCrud);
		if($QueryDelete == true){
			echo $estatus->ActionCrudSuccess();
		}else{
			echo $estatus->ActionCrudFailure();
		}
	}
	if(isset($_POST['btnlimpiar'])){
		$QueryDeleteAll = $Query->DeleteAllQuery($conectar->connect(),$DateCrud);
		if($QueryDeleteAll == true){
			echo $estatus->ActionCrudSuccess();
		}else{
			echo $estatus->ActionCrudFailure();
		}
	}
}else{
	$estatus->DbFailure();
}
 ?>