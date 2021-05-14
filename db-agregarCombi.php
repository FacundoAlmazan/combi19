<?php
	include_once "db-funciones.php";
	$modelo = $_POST["modelo"];
	$patente = $_POST["patente"];
	$asientos = $_POST["cantasientos"];
	$chofer = $_POST["chofer"];
	$tipo = $_POST["tipo"];
	$id= $_POST["id"];
	insertarCombi($modelo, $patente, $asientos, $chofer, $tipo,$id); 
	header("location: pagina-agregar.php?tipo=2#agregado");
?>