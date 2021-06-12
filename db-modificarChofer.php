<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$consulta= "SELECT * FROM choferes where id='$id'";
	$respuesta= consultar($consulta);
	foreach ($respuesta as $respuesta){
		$idUsuario= $respuesta['idUsuario'];
	}
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$emailValidacion="ASDASKDALhasjdhasjkdasjd";
	$consulta= "SELECT * FROM usuarios where email='$email'";
	$respuesta= consultar($consulta);
	if($respuesta){
		foreach ($respuesta as $respuesta) {
			$emailValidacion= $respuesta['email'];
			$idUser= $respuesta['id'];
		}
	}
	if($email == $emailValidacion){
		if($idUser !== $idUsuario){
		header("location: pagina-ver.php?tipo=1&id=$id#errorMail");
	}
	else{
		updatearChofer($id, $nombre, $apellido, $email, $telefono);
		header("location: pagina-listar.php?tipo=1#modificado");
	}
}
	else{
		updatearChofer($id, $nombre, $apellido, $email, $telefono);
		header("location: pagina-listar.php?tipo=1#modificado");
	}


?>