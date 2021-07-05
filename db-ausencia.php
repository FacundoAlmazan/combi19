<?php
	include_once "db-funciones.php";
	$idViaje=$_GET['idViaje'];
	$idPasaje=$_GET['idPasaje'];
	$consulta2= "UPDATE pasajes SET estado='3' where id='$idPasaje'";
	$resultado2=consultar($consulta2);
	$consultaViaje= "SELECT * from viajes where id='$idViaje'";
	$resultadoViaje= consultar($consultaViaje);
	foreach ($resultadoViaje as $resultadoViaje){
		$asientos=$resultadoViaje['asientosDisp'];
	}
	$asientos++;
	$updateViaje="UPDATE viajes SET asientosDisp='$asientos' where id='$idViaje'";
	$resultadoUpdate=consultar($updateViaje);
	header("location:pagina-listarPasajeros.php?id=$idViaje");
?>