<?php
	include_once "db-funciones.php";
	$precio = $_POST["precio"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$consultaName="SELECT * from insumos where nombre='$nombre'";
	$resultadoName= consultar($consultaName);
	if(mysqli_num_rows($resultadoName) == 0){
	    insertarInsumo($nombre, $precio, $tipo); 
	    header("location: pagina-agregar.php?tipo=6#agregado");
	}
	else{
		header("location: pagina-agregar.php?tipo=6#InsumoNombre");
	}
?>