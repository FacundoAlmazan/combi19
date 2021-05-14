<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$modelo = $_POST["modelo"];
	$patente = $_POST["patente"];
	$cantasientos = $_POST["cantasientos"];
	$chofer = $_POST["chofer"];
	$tipo = $_POST["tipocombi"];
	$idex = $_POST["idex"];
	if(updatearCombi($id, $modelo, $patente, $cantasientos, $chofer, $tipo, $idex)){
	   header("location: pagina-listar.php?tipo=2#modificado");}
	   else{
		header("location: $id"); 
	   }
?>