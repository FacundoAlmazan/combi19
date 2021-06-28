<?php
	include_once "db-funciones.php";
	$idViaje=$_GET['idViaje'];
	$consulta2= "UPDATE viajes SET estado='2' where id='$idViaje'";
	$resultado2=consultar($consulta2);
	header("location:pagina-historialChofer.php");
?>