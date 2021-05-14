<?php
	include_once "db-funciones.php";
	$lugar = $_POST["lugar"];
	$provincia = $_POST["provincia"];
	insertarLugar($lugar, $provincia); 
	header("location: pagina-agregar.php?tipo=3#agregado");
?>