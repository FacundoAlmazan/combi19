<?php
	include_once "db-funciones.php";
	$slct = $_POST["slct"];
	$mensaje = $_POST["mensaje"];
	insertarComentario($slct, $mensaje); 
	$dir=$_SESSION['url'];
	if ($dir==1){
		header("location:pagina-homeUsuario.php");
	}
?>