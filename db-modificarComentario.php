<?php
	include_once "db-funciones.php";
	$mensaje = $_POST["mensaje"];
    $id = $_GET["id"];
	updatearComentario($mensaje,$id); 
	$dir=$_SESSION['url'];
	if ($dir==3){
		header("location:pagina-comentarios.php#modificado");
	}
?>