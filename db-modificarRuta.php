<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$origen = $_POST['origen'];
	$destino = $_POST['destino'];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
	$consulta="SELECT * from rutas where (origen='$origen' and destino='$destino' and combi='$combi' and NOT id='$id')";
	$resultado= consultar($consulta);
	if($origen == $destino){
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
		updatearRuta($id, $origen, $destino, $combi, $km, $duracion);
		header("location: pagina-listar.php?tipo=4#modificado");
	}
	

?>