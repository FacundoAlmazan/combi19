<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$origen = $_POST['origen'];
	$destino = $_POST['destino'];
	$combi = $_POST["combi"];
	$km = $_POST["km"];
	$duracion = $_POST["duracion"];
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> 43f80b9776cec460bd44cf2f9cad31356e4e8846
>>>>>>> 651da343a9db71102f8c2bec2760dfb3d762ec3b
>>>>>>> 4a6b223563cbd4ef358f73da9939f87c236e8d7c
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
	

>>>>>>> 43f80b9776cec460bd44cf2f9cad31356e4e8846
>>>>>>> 651da343a9db71102f8c2bec2760dfb3d762ec3b
>>>>>>> 4a6b223563cbd4ef358f73da9939f87c236e8d7c
?>