<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$lugar = $_POST["lugar"];
	$provincia = $_POST["provincia"];
	if(updatearLugar($id, $lugar, $provincia)){ 
	header("location: pagina-listar.php?tipo=3#modificado");
	}
	else{
		header("location: '$id'");
	}
?>