<?php
	include_once "db-funciones.php";
	$idViaje=$_GET['idViaje'];
	$consulta= "SELECT * from viajes where id='$idViaje'";
	$resultado= consultar($consulta);
	foreach ($resultado as $resultado){
		$valor=$resultado['asientosDisp'];
	}
	$valor=$valor+1;
	$consulta2= "UPDATE viajes SET asientosDisp='$valor' where id='$idViaje'";
	$resultado2=consultar($consulta2);
	$idPasaje=$_GET['idPasaje'];
    $consulta= "UPDATE pasajes SET cancelo=1 where id='$idPasaje'";
	$resultado= consultar($consulta);
	header("location:pagina-historialPasajero.php");
?>