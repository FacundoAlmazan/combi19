<?php
include_once "db-funciones.php";
$lugar = $_POST["lugar"];
$provincia = $_POST["provincia"];
$consulta="SELECT * from lugares where lugar='$lugar' and provincia='$provincia'";
$resultado= consultar($consulta);
if($resultado){
	foreach ($resultado as $resultado){
		$dato=$resultado['lugar'];
	}
}
if (isset($dato)){
	header("location: pagina-agregar.php?tipo=3#error");
}
else{
insertarLugar($lugar, $provincia); 
header("location: pagina-agregar.php?tipo=3#agregado");
}
?>