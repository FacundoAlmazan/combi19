<?php
	include_once "db-funciones.php";
	$LugarIdAndName = explode("-", $_POST['origen']);
    $origenNombre= $LugarIdAndName[0];
    $origenId= $LugarIdAndName[1];
	$DestinoIdAndName = explode("-", $_POST['destino']);
    $DestinoNombre= $DestinoIdAndName[0];
    $DestinoId= $DestinoIdAndName[1];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
	$consulta="SELECT * from rutas where (origen='$origenNombre' and destino='$DestinoNombre' and combi='$combi')";
	$resultado= consultar($consulta);
	$bool=FALSE;
	foreach($resultado as $resultado){
		if(isset($resultado['origen'])){
			$bool=TRUE;
		}
	}
	if($bool){
		header("location: pagina-agregar.php?tipo=4#errorRepetido");
	}
	else{
	insertarRuta($origenNombre, $DestinoNombre, $combi, $km, $duracion, $origenId, $DestinoId); 
	header("location: pagina-agregar.php?tipo=4#agregado");
	}
?>