<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$nombre = $_POST["nombre"];
	$precio = $_POST["precio"];
	$tipo = $_POST["tipo"];
	updatearInsumo($id, $nombre, $precio, $tipo);
	header("location: pagina-listar.php?tipo=6#modificado");
?>