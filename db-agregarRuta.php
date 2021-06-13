<?php
	include_once "db-funciones.php";
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
	$consulta="SELECT * from rutas where (origen='$origen' and destino='$destino' and combi='$combi')";
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
	insertarRuta($origen, $destino, $combi, $km, $duracion); 
	header("location: pagina-agregar.php?tipo=4#agregado");
	}
?>