<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$emailValidacion="ASDASKDALhasjdhasjkdasjd";

	$consulta= "SELECT email FROM usuarios where email='$email'";
	$respuesta= consultar($consulta);
	if($respuesta){
		foreach ($respuesta as $respuesta) {
			$emailValidacion= $respuesta['email'];
		}
	}
	if($email == $emailValidacion){
		header("location: pagina-ver.php?tipo=1&id=$id#errorMail");
	}
	else{
		updatearChofer($id, $nombre, $apellido, $email, $telefono);
		header("location: pagina-listar.php?tipo=1#modificado");
	}


?>