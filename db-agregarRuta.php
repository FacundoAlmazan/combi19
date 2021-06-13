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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 651da343a9db71102f8c2bec2760dfb3d762ec3b
	foreach($resultado as $resultado){
		if(isset($resultado['origen'])){
			$bool=TRUE;
		}
	}
	if($bool){
		header("location: pagina-agregar.php?tipo=4#errorRepetido");
<<<<<<< HEAD
=======
=======
	if($origen == $destino){
		header("location: pagina-agregar.php?tipo=4#error");	
>>>>>>> 43f80b9776cec460bd44cf2f9cad31356e4e8846
	}
	else{
		foreach($resultado as $resultado){
			if(isset($resultado['origen'])){
				$bool=TRUE;
			}
		}
	}
	if($bool){
		header("location: pagina-agregar.php?tipo=4#errorRepetido");
>>>>>>> 651da343a9db71102f8c2bec2760dfb3d762ec3b
	}
	else{
	insertarRuta($origen, $destino, $combi, $km, $duracion); 
	header("location: pagina-agregar.php?tipo=4#agregado");
	}
?>