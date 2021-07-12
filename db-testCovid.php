<?php
	include_once "db-funciones.php";
	$idViaje=$_GET['idViaje'];
	$idPasaje=$_GET['idPasaje'];
	$idUsuario=$_GET['idUsuario'];
	$estado=1;
	$cantSintomas=0;
	$timezone="America/Argentina/Buenos_Aires";
	date_default_timezone_set($timezone);
	$fecha=$DateAndTime = date('Y-m-d', time());
	if($_POST['temperatura']>37){
		$estado=2;
	}

    if(isset($_POST['gusto'])){
		$cantSintomas++;
	}
	if(isset($_POST['olfato'])){
	   $cantSintomas++;
 	}
	if(isset($_POST['cabeza'])){
		$cantSintomas++;
	}
	if(isset($_POST['muscular'])){
		$cantSintomas++;
	}
	if(isset($_POST['tos'])){
		$cantSintomas++;
	}
	if($estado == 1 and $cantSintomas>2)	{
		$estado=4;
	}
	if($estado != 1){
		$consultaPasaje="UPDATE pasajes SET estado='2' where id='$idPasaje'";
		$resultPasaje=consultar($consultaPasaje);
        if($idUsuario != 420420){
		$consultaUsuario="UPDATE usuarios SET covid='1' ,fechaCovid='$fecha' where id='$idUsuario'";
		$resultUsuario=consultar($consultaUsuario);
		}
		$consultaViaje="SELECT * from viajes where id='$idViaje'";
		$resultViaje=consultar($consultaViaje);
		foreach($resultViaje as $resultViaje){
			$asientos=$resultViaje['asientosDisp'];
		}
		$asientos++;

		$updateViaje="UPDATE viajes SET asientosDisp='$asientos' where id='$idViaje'";
		$updatearViaje=consultar($updateViaje);
	}

	if($estado== 1){
        ?>
		<script>alert("Testeo de covid APROBADO")</script>
        <?php
		$consultaPasaje="UPDATE pasajes SET estado='1' where id='$idPasaje'";
		$resultPasaje=consultar($consultaPasaje);
		
	}
	elseif($estado==2){
		?>
        <script>alert("Testeo de covid RECHAZADO | Razón: El pasajero posee una temperatura mayor a 38")</script>
        <?php
	}
	elseif($estado==3){
		?> <script>alert("Testeo de covid RECHAZADO | Razón: El pasajero debe mostrar un test de COVID negativo")
        <?php
	}
	elseif($estado==4){
        ?>
		<script>alert("Testeo de covid RECHAZADO | Razón: El pasajero posee mas de dos sintomas de lista")</script>
        <?php
	}
    header("location:pagina-listarPasajeros.php?id=$idViaje&estado=$estado");
	/*
	*/
?>