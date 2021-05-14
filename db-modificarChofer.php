<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$mail = $_POST["email"];
	$telefono = $_POST["telefono"];
	if(updatearChofer($id, $nombre, $apellido, $mail, $telefono)){
	   header("location: pagina-listar.php?tipo=1#modificado");}
	   else{
		header("location: $id"); 
	   }
?>