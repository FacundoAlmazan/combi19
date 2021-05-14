<?php
	include_once "db-funciones.php";
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$mail = $_POST["email"];
	$nacimiento = $_POST["nacimiento"];
	$telefono = $_POST["telefono"];
	$dni = $_POST["dni"];
	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
	insertarChofer($nombre, $apellido, $mail, $nacimiento, $telefono, $dni, $usuario, $clave); 
	header("location: pagina-agregar.php?tipo=1#agregado");
?>