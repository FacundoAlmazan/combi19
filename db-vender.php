<?php
	include_once "db-funciones.php"; 
	$idViaje=$_GET['idViaje'];
	$email=$_POST['email'];

	$consultViaje= "SELECT * from viajes where id='$idViaje'"; //Busco la informacion del viaje
	$resultadoViaje= consultar($consultViaje);
	foreach ($resultadoViaje as $resultadoViaje){
		$pasajes= $resultadoViaje['asientosDisp']; //Agarro los asientos disponibles
	}
	$pasajes= $pasajes-1; //Le resto uno a la cantidad de asientos disponibles
	$updateViaje ="UPDATE viajes SET asientosDisp= '$pasajes'  WHERE (id='$idViaje')";
	$resultadoUpdate= consultar($updateViaje);

	$consulta= "SELECT * from usuarios where email='$email'";
	$resultado= consultar($consulta);
	if(isset($resultado)){
		foreach($resultado as $resultado){
			$idUsuario=$resultado['id'];
		}
	}
	if(isset($idUsuario)){
        $consultaPasaje="INSERT into pasajes (idViaje,idUsuario) VALUES ('$idViaje', '$idUsuario')";
	}
	else{
        $consultaPasaje="INSERT into pasajes (idViaje,mailPresencial) VALUES ('$idViaje', '$email')";
	}
	$respuestaPasaje= consultar($consultaPasaje);
	header("location: pagina-listarPasajeros.php?id=$idViaje#agregado");
	
	

?>