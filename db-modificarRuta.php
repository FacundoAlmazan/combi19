<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$LugarIdAndName = explode("-", $_POST['origen']);
    $origenNombre= $LugarIdAndName[0];
    $origenId= $LugarIdAndName[1];
	$DestinoIdAndName = explode("-", $_POST['destino']);
    $DestinoNombre= $DestinoIdAndName[0];
    $DestinoId= $DestinoIdAndName[1];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
     //Comprobacion necesaria para que el valor por defecto no chingue la base de datos
    $conO="SELECT * from rutas where id='$id'";
	$respuestaO=consultar($conO);
	foreach ($respuestaO as $respuestaO){
		if($origenNombre == $respuestaO['origen']){
			$origenId= $respuestaO['idOrigen'];
		}
		if($DestinoNombre == $respuestaO['destino']){
			$DestinoId= $respuestaO['idDestino'];
		}
	}
	 //Fin de la comprobacion 
	$consulta="SELECT * from rutas where (origen='$origenNombre' and destino='$DestinoNombre' and combi='$combi' and NOT id='$id')";
	$resultado= consultar($consulta);
	if($origenNombre == $DestinoNombre){
		header("location: pagina-listar.php?tipo=4#errorOrigDest");	
	}
	else{
		foreach($resultado as $resultado){
			if(isset($resultado['origen'])){
				$bool=1; }
		}
	}
	if(isset($bool)){
		header("location: pagina-listar.php?tipo=4#errorRepetidoRuta");
	}
	else{
		updatearRuta($id, $origenNombre, $DestinoNombre, $combi, $km, $duracion,$origenId,$DestinoId);
		header("location: pagina-listar.php?tipo=4#modificado");
	}
?>