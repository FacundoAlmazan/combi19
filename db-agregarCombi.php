<?php
	include_once "db-funciones.php";
	$modelo = $_POST["modelo"];
	$patente = $_POST["patente"];
	$asientos = $_POST["cantasientos"];
	$chofer = $_POST["chofer"];
	$tipo = $_POST["tipo"];
	$id= $_POST["id"];
	$idValidacion="ASDASKDALhasjdhasjkdasjd";
    $patenteValidacion="ASDASKDALhasjdhasjkdasjd";

	$consulta= "SELECT identificacion FROM combis where identificacion='$id'";
	$respuesta= consultar($consulta);
	if($respuesta){
	  foreach ($respuesta as $respuesta) {
			$idValidacion= $respuesta['identificacion'];
	  }
	}
  	if($id == $idValidacion){
	  header("location: pagina-agregar.php?tipo=2#errorId");
	}
	else{
	    $consulta= "SELECT * from combis where patente='$patente'";
	    $respuesta= consultar($consulta);
	    if($respuesta){
            foreach ($respuesta as $respuesta) {
                $patenteValidacion = $respuesta['patente'];
            }
	    }  
	    if($patente == $patenteValidacion){
		    header("location: pagina-agregar.php?tipo=2#errorPatente");
	    }
	    else{
            insertarCombi($modelo, $patente, $asientos, $chofer, $tipo,$id); 
            header("location: pagina-agregar.php?tipo=2#agregado");
        }
	}

	
?>