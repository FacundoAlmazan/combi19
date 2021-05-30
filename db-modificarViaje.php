<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$ruta = $_POST["ruta"];
	$precio = $_POST["precio"];
	$fecha = $_POST["fecha"];
	$hora = $_POST["hora"];
	if(updatearViaje($id, $ruta, $precio, $fecha, $hora)){
	   header("location: pagina-listar.php?tipo=5#modificado");}
	   else{
		header("location: $id"); 
	   }
?>