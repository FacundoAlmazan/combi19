<?php
	include_once "db-funciones.php";
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
	if($origen == $destino){
		header("location: pagina-agregar.php?tipo=4#error");	
	}
	else{
	insertarRuta($origen, $destino, $combi, $km, $duracion); 
	header("location: pagina-agregar.php?tipo=4#agregado");
	}
?>