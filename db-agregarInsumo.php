<?php
	include_once "db-funciones.php";
	$precio = $_POST["precio"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	insertarInsumo($nombre, $precio, $tipo); 
	header("location: pagina-agregar.php?tipo=6#agregado");
?>