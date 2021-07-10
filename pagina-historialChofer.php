<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(2);
	$_SESSION['url']=3;
    $id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>HOME USUARIO</title>
		<link rel="stylesheet" type="text/css" href="estilo-historial.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeChofer.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
        <h1> Viajes realizados / por realizar </h3>
            <?php
                $consulta = "SELECT * FROM viajes";
                $dato = consultar($consulta);
                if ((!empty($dato) AND mysqli_num_rows($dato) > 0)){
                    foreach ($dato as $dato){
                        $consulta2="SELECT * from rutas where id='$dato[idRuta]'";
                        $resultado2=consultar($consulta2);
                        $resRutas= mysqli_fetch_assoc($resultado2);
                        $consulta3= "SELECT * from combis where identificacion='$resRutas[combi]' and chofer='$_SESSION[nombreusuario]'";
                        $resCombis= consultar($consulta3);
                        if (!empty($resCombis) AND mysqli_num_rows($resCombis) != 0){
                        $idViaje = $dato['id'];
                        $consulta = "SELECT * FROM viajes WHERE id= $idViaje";
                        $datos = consultar($consulta);
                        if (mysqli_num_rows($datos) != 0){
                            foreach ($datos as $dato){
                                $idRuta = $dato['idRuta'];
                                $consulta = "SELECT * FROM rutas WHERE id=$idRuta";
                                $datosRuta= consultar($consulta);
                                echo '<div class=item>';
                                    if (mysqli_num_rows($datosRuta) != 0){
                                        foreach ($datosRuta as $datoRuta){
                                            $origen = $datoRuta['origen'];
                                            $destino = $datoRuta['destino'];
                                            echo "$origen --> $destino <br>";
                                            echo "<br>";
                                            $idCombi = ($datoRuta['combi']);
                                            $consulta = "SELECT * FROM combis WHERE identificacion='$idCombi'";
                                            $datosCombi = consultar($consulta);
                                            if (mysqli_num_rows($datosCombi) != 0){
                                                foreach ($datosCombi as $datoCombi){
                                                    $tipo = $datoCombi['tipo'];
                                                    echo "TIPO DE COMBI:$tipo ";
                                                }
                                            }
                                        }
                                    }
                                    $precio = $dato['precio'];
                                    $fecha = $dato['fecha'];
                                    $hora = $dato['hora'];
                                    $estado = $dato['estado'];
                                    $asientos = $dato['asientos'];
                                    $disp= $dato['asientosDisp'];
                                    echo"<p id='fecha'>$fecha</p>";
                                    echo"<p>FECHA: $fecha</p>";
                                    echo"<p>HORA: $hora</p>";
                                    echo "<p> PRECIO:$precio </p>";
                                    $consultaViajeEstado= "SELECT * from pasajes where idViaje='$idViaje'";
                                    $resultViajeEstado= consultar($consultaViajeEstado);
                                    $comprobador=1;
                                    if(!empty($resultViajeEstado)){
                                        foreach($resultViajeEstado as $resultViajeEstado){
                                        if($resultViajeEstado['estado'] == 0){
                                            $comprobador=0;
                                        }
                                    }
                                }
                                    $ocupados=$asientos - $disp;
                                    echo "ASIENTOS OCUPADOS:$ocupados"; echo "/"; echo $asientos;
                                    echo "<br></br>";
                                    if($estado=='1'){
                                        echo '<br>';
                                        echo"<nbsp >ESTADO:</nbsp>";echo "<nbsp style='color:yellow'>Pendiente</nbsp>";
                                        echo'<br></br>';
                                        echo '<a class="canViaje" onclick="checkCancelar(); return confirm(';
                                        echo "'¿Seguro que quieres cancelar el viaje?')";
                                        echo '" href="db-cancelar.php?idViaje=';
                                        echo $idViaje;
                                        echo'">  Cancelar viaje</a>';
                                        echo '<br></br>';
                                        if($comprobador==0){
                                            echo '<a style="color:grey; text-decoration: none;" onclick="checkCancelar();"';
                                            echo'">Empezar viaje(No disponible hasta que no se testeen todos los pasajeros)</a>'; 
                                        }
                                        else{
                                        echo '<a style="color:green; text-decoration: none;" onclick="checkCancelar();"';
                                        echo ' href="db-empezarViaje.php?idViaje=';
                                        echo $idViaje;
                                        echo'">Empezar viaje</a>';}
                                    }    
                                    if($estado=='2'){
                                        echo '<br>';
                                        echo"<nbsp >ESTADO:</nbsp>";echo "<nbsp style='color:green'>En curso</nbsp>";
                                        echo '<br></br>';
                                        echo '<a class="canViaje" onclick="checkCancelar(); return confirm(';
                                        echo "'¿Llegaste a destino?')";
                                        echo '" href="db-TerminarViaje.php?idViaje=';
                                        echo $idViaje;
                                        echo'">Finalizar viaje</a>';
                                    }    
                                    if($estado=='3'){
                                        echo '<br>';
                                        echo"<nbsp >ESTADO:</nbsp>";echo "<nbsp style='color:red'>Finalizado</nbsp>";
                                        echo'<br>';
                                        echo '</br>';
                                    }  
                                    if($estado=='4'){
                                        echo '<br>';
                                        echo"<nbsp >ESTADO:</nbsp>";echo "<nbsp style='color:red'>EL CHOFER CANCELO ESTE VIAJE</nbsp>";
                                        echo'<br>';
                                        echo '</br>';
                                    }  
                                    echo'<br></br> <button style="font-size:22px; background-color: #4CAF50; border-radius:10px;" onclick="window.location.href=';
                                    echo "'";
                                    echo 'pagina-listarPasajeros.php?id=';
                                    echo $idViaje;
                                    echo "'";     
                                    echo'">PASAJEROS</button>';
                                echo '</div>';
                                echo "<br> </br>";
                            }
                        }
                    }
                    else{
                        echo'<h4 style="color:white"> No hay viajes en tu historial </h3>';
                    }
                }
            }
                
            ?>
		</div>
	</div>
    <script src="scripts/script-cancelarViaje.js"></script> 
</body>
</html>