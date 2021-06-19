<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$nombre = $_POST["nombre"];
	$precio = $_POST["precio"];
	$tipo = $_POST["tipo"];
	$consulta = "SELECT * from viajes";
	$datos=consultar($consulta);
	foreach($datos as $datos){
		$insumos=explode(",",$datos['insumos']);
		foreach($insumos as $insumos){
			$insumoInt= (int)$insumos;
			if ($insumoInt == $id){
				$bool=1;
			}
		}
	}
	if (isset($bool)){
	       header("location:pagina-ver.php?tipo=6&id=$id#InsumoOcu");}
	else{
		$consultaName="SELECT * from insumos where nombre='$nombre' and id<>'$id'";
		$resultadoName= consultar($consultaName);
		if(mysqli_num_rows($resultadoName) == 0){
			updatearInsumo($id, $nombre, $precio, $tipo);
			header("location: pagina-listar.php?tipo=6#modificado");
		}
		else{
			header("location: pagina-ver.php?tipo=6&id=$id#InsumoNombre");
		}
	}
?>