<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$modelo = $_POST["modelo"];
	$patente = $_POST["patente"];
	$cantasientos = $_POST["cantasientos"];
	$chofer = $_POST["chofer"];
	$tipo = $_POST["tipocombi"];
	$idex = $_POST["idex"];
	if(!isset($_SESSION['id'])){
		session_start();
	}
	$idSesion= $_SESSION['idCombi'];
	if($idex == $idSesion){
		updatearCombi($id, $modelo, $patente, $cantasientos, $chofer, $tipo, $idex);
		header("location: pagina-listar.php?tipo=2#modificado");
	}
	else{
		$consulta= "SELECT identificacion FROM combis where identificacion='$idex'";
		$respuesta= consultar($consulta);
		$idValidacion="ASDASKDALhasjdhasjkdasjd";
		if($respuesta){
			foreach ($respuesta as $respuesta) {
				$idValidacion= $respuesta['identificacion'];
			}
		}
		if($idex == $idValidacion){
			header("location: pagina-ver.php?tipo=2&id=$id#errorId");
		}
		else{
			updatearCombi($id, $modelo, $patente, $cantasientos, $chofer, $tipo, $idex);
			header("location: pagina-listar.php?tipo=2#modificado");
		}
	}
?>