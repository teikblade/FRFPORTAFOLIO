<?php
session_start();
if($_SESSION["identificado"]==4){
	session_destroy();
	echo "<script languaje='javascript'>alert('CIERRE DE SESION'); location.href = '../index.html';</script>";
}
?>