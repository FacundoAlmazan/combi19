<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
	if(updatearRuta($id, $origen, $destino, $combi, $km, $duracion)){
	   header("location: pagina-listar.php?tipo=4#modificado");}
	   else{
		header("location: $id"); 
	   }
?>