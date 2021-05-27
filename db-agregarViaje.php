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
	insertarViaje($precio, $fecha, $hora, $ruta,$str); 
	header("location: pagina-agregar.php?tipo=5#agregado");
?>