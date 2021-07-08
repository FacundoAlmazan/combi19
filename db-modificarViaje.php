<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$ruta = $_POST["ruta"];
	$precio = $_POST["precio"];
	$fecha = $_POST["fecha"];
	$hora = $_POST["hora"];
	$consulta= "SELECT * from rutas where id='$ruta'";
	$resultado= consultar($consulta);
	foreach ($resultado as $resultado){
		$combiId= $resultado['combi'];
	}
	$consulta2="SELECT * from combis where identificacion='$combiId'";
	$resultado2=consultar($consulta2);
	foreach ($resultado2 as $resultado2){
		$cantAsientos= $resultado2['cantasientos'];
		$chofer= $resultado2['chofer'];
	}
	$consultaViaje= "SELECT * from viajes where fecha='$fecha' and id<>'$id'";
	$resultadoViaje= consultar($consultaViaje);
	if(isset($resultadoViaje)){
		foreach($resultadoViaje as $resultadoViaje){ //Para cada viaje con la misma fecha que el que queremos agregar
			$ruta=$resultadoViaje['idRuta'];
	       	$consultaRuta="SELECT * from rutas where id='$ruta'"; //Seleccionar todo de la ruta de ese viaje (Deberia devolver 1 solo resultado)
	     	$resultadoRuta=consultar($consultaRuta);
	        	foreach($resultadoRuta as $resultadoRuta){       //Para cada ruta (Deberia ser 1 sola)
                    $combi= $resultadoRuta['combi'];
                    $consultaCombi= "SELECT * from combis where identificacion='$combi'"; //Tomamos la combi de la ruta, para ver su chofer
		            $resultadoCombi=consultar($consultaCombi);
		            foreach($resultadoCombi as $resultadoCombi){
		             	if($resultadoCombi['chofer'] == $chofer){ // Preguntamos si el chofer de la combi es el mismo que quiere hacer el viaje actual
							$bool=1;
			             }
		            }
				}
     	}
	}
	if(!isset($bool)){
		updatearViaje($id, $ruta, $precio, $fecha, $hora); 
	   header("location: pagina-listar.php?tipo=5#modificado");
	}
	else{
		header("location: pagina-listar.php?tipo=5#errorTiempos");
	}
?>