<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(1);
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
	 	<li><a class="logo" href='pagina-homeUsuario.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
            <?php
                $consulta = "SELECT DISTINCT idViaje,id FROM pasajes WHERE idUsuario = $id";
                $datos = consultar($consulta);
                if (mysqli_num_rows($datos) != 0){
                    foreach ($datos as $dato){
                        $idPasaje= $dato['id'];
                        $idViaje = $dato['idViaje'];
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
                                    echo "PRECIO:$precio FECHA:$fecha HORA:$hora ASIENTOS:$disp"; echo "/"; echo $asientos;
                                    if($estado=='1'){
                                        echo'<br>';
                                        echo '<a class="canViaje" href="db-cancelarViaje.php?idViaje=';
                                        echo $idViaje;
                                        echo '&idPasaje=';
                                        echo $idPasaje;
                                        echo'">  Cancelar viaje</a>';
                                       
                                    }    
                                echo '</div>';
                                echo "<br> </br>";
                            }
                        }
                    }
                }
            ?>
		</div>
	</div>
</body>
</html>