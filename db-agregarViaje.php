<?php
	include_once "db-funciones.php";
	$precio = $_POST["precio"];
	$fecha = $_POST["fecha"];
	$ruta = $_POST["ruta"];
	$hora  = $_POST["hora"];
	if(!empty($_POST['insu'])){
		foreach($_POST['insu'] as $selected){
			if (isset($str)){
	     $str = $str.",".$selected;}
		 else{
			 $str=$selected;
		 }
		}
	}
	if (!isset($str)){
		$str="NULL";
	}
	$consulta= "SELECT * from rutas where id='$ruta'";
	$resultado= consultar($consulta);
	foreach ($resultado as $resultado){
		$combiId= $resultado['combi'];
	}
	$consulta2="SELECT * from combis where identificacion='$combiId'";
	$resultado2=consultar($consulta2);
	foreach ($resultado2 as $resultado2){
		$cantAsientos= $resultado2['cantasientos'];
	}
	insertarViaje($precio, $fecha, $hora, $ruta,$str,$cantAsientos); 
	header("location: pagina-agregar.php?tipo=5#agregado");
?>