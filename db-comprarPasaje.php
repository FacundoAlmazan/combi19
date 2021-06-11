<?php
	include_once "db-funciones.php";
	$precio = $_POST["numTarjeta"];
	$fecha = $_POST["claveTarjeta"];
	$ruta = $_POST["nombreTarjeta"];
	$selected= $_POST['insu'];
	if (isset($_GET['id'])){
        $idViaje=$_GET['id'];
	}
	if(!isset($_SESSION['id'])){
		session_start();
	}
	$MiId=$_SESSION['id'];
	if(!empty($_POST['insu'])){
		foreach($selected as $selected){
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
	insertarPasaje($MiId, $idViaje, $str); 
	header("location: pagina-listarViajes.php?#agregado");
?>