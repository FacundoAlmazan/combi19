<?php
	include_once "db-funciones.php";
	$id=$_GET['idComentario'];
    $consulta= "DELETE from comentarios where id='$id'";
	$resultado= consultar($consulta);
	include "pagina-comentarios.php";
?>