<?php
	include_once "db-funciones.php";
	$precio = $_POST["precio"];
	$fecha = $_POST["fecha"];
	$ruta = $_POST["ruta"];
	$hora  = $_POST["hora"];
	insertarViaje($precio, $fecha, $hora, $ruta); 
	header("location: pagina-agregar.php?tipo=5#agregado");
?>