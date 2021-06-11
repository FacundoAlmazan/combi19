<?php
	include_once "db-funciones.php";
	$mensaje = $_POST["mensaje"];
	insertarComentario($mensaje); 
	$dir=$_SESSION['url'];
	if ($dir==1){
		header("location:pagina-homeUsuario.php");
	}
?>