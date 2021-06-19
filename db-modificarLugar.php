<?php
	include_once "db-funciones.php";
	$id=$_GET['id'];
	$lugar = $_POST["lugar"];
	$provincia = $_POST["provincia"];
	$consultaDatos="SELECT * from lugares where id='$id'";
	$respuestaDatos= consultar($consulta);
	foreach ($respuestaDatos as $respuestaDatos){
		$datoLugar= $respuestaDatos['lugar'];
		$datoProvincia= $respuestaDatos['provincia'];
	}
	$consulta="SELECT * from lugares where lugar='$lugar' and provincia='$provincia' and id<>'$id'";
$resultado= consultar($consulta);
if($resultado){
	foreach ($resultado as $resultado){
		$datoLugar=$resultado['lugar'];
		$datoProvincia=$resultado['provincia'];
	}
}
if (isset($datoLugar) && isset($datoProvincia)){
	header("location: pagina-ver.php?tipo=3&id=$id#errorRe");
}
else{
	$consultaRut="SELECT * from rutas where idOrigen='$id' or idDestino='$id'";
	$respuestaRut= consultar($consultaRut);
    if(mysqli_num_rows ($respuestaRut) === 0){
	  updatearLugar($id, $lugar, $provincia);
	  header("location: pagina-listar.php?tipo=3#modificado"); 
	}
	else{
		header("location: pagina-ver.php?tipo=3&id=$id#errorRu");
	}
}
?>