<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(2);
	$_SESSION['url']=3;
    $id=$_SESSION['id'];
    $idViaje=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>LISTADO DE PASAJEROS</title>
		<link rel="stylesheet" type="text/css" href="estilo-listar.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" style="text-decoration:none" href='pagina-homeChofer.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
        <h1 style="color:white;"> LISTADO DE PASAJEROS </h1>
          <?php 
                echo '<h2 style="color:white;">Asientos disponibles:';
                $consultaViaje= "SELECT * from viajes where id=$idViaje";
                $resultadoViaje= consultar($consultaViaje);
                foreach ($resultadoViaje as $resultadoViaje){
                    $disponibles=$resultadoViaje['asientosDisp'];
                    $totales=$resultadoViaje['asientos'];
                }
                echo $disponibles; echo "/"; echo $totales;
                echo "</h2>";
                if($disponibles>0){
                echo '
                    <button  style="background-color:#7FFF00; color:black; font-weight:bold;  border-radius:5px; font-size:26px;"
                      onclick="window.location.href=';
                                   echo "'";
                                   echo 'pagina-venderPasaje.php?idViaje=';
                                   echo $idViaje;
                                   echo "'";     
                                   echo'">Vender pasaje</button>';
               }
                $consulta="SELECT * from pasajes where idViaje=$idViaje";
                $resultado=consultar($consulta);
                if(mysqli_num_rows($resultado) == 0){
                        echo'<h2 style="color:white"> No hay pasajeros </h2>';
                    
                }
                if(!empty($resultado)){
                foreach ($resultado as $resultado){
                    echo '<a class="item">';
                    if(!($resultado['idUsuario'] > 0)){
                         echo "<p>Nombre: "; echo $resultado['mailPresencial'];echo"<p><p>";
                         echo " (Sin usuario, pasaje vendido de manera PRESENCIAL"; echo "</p>";
                        if($resultado['estado']==3){ //Si el pasajero fue marcado como ausente
                            echo '<p style="color:red;font-weight:bold;">EL PASAJERO NO SE PRESENTO</p>';
                        }
                        else{ //Si fue testeado y paso la prueba
                            if($resultado['estado']==1){
                                echo'<p style="color:green;">EL PASAJERO FUE TESTEADO Y PASO LA PRUEBA&#9989;</p>';
                            }
                            else{
                                if($resultado['estado']==2){//Si fue testeado y no paso la prueba
                                    echo'<p style="color:red; font-weight:bold;">EL PASAJERO FUE TESTEADO Y NO PASO LA PRUEBA &#10060;</p>';
                                }
                                else{ //SI TODAVIA NO FUE TESTEADO
                                   echo '<button style="font-weight:bold; font-size:18px; background-color: #87CEFA;" onclick="window.location.href=';
                                   echo "'";
                                   echo 'pagina-testCovid.php?idViaje=';
                                   echo $idViaje;
                                   echo "&idPasaje=";
                                   echo $resultado['id'];
                                   echo "'";     
                                   echo'">TESTEAR COVID</button>';
                                   echo "&nbsp";
                                   echo '<button style="font-weight:bold; font-size:18px; background-color: #F08080;" onclick="window.location.href=';
                                   echo "'";
                                   echo 'db-ausencia.php?idViaje=';
                                   echo $idViaje;
                                   echo "&idPasaje=";
                                   echo $resultado['id'];
                                   echo "'";
                                   echo'">NO SE PRESENTO</button>';
                                }
                            }
                        }
                    }
                    else{
                    $idUser=$resultado['idUsuario'];
                    $consultaUsuario="SELECT * from usuarios where id=$idUser";
                    $datosUsuario= consultar($consultaUsuario);
                    if(!empty($datosUsuario)){
                        foreach ($datosUsuario as $datosUsuario){
                        echo "<p>Nombre: ";
                        echo $datosUsuario['nombre']; echo " "; echo $datosUsuario['apellido'];
                        echo " | Email: "; echo $datosUsuario['email']; echo "| Dni: "; echo $datosUsuario['dni']; echo"</p>";
                        if($resultado['cancelo']==1){
                            echo '<p style="color:red;font-weight:bold;">EL PASAJERO CANCELO EL VIAJE</p>';
                        }
                        else{
                        if($resultado['estado']==3){ //Si el pasajero fue marcado como ausente
                            echo '<p style="color:red;font-weight:bold;">EL PASAJERO NO SE PRESENTO</p>';
                        }
                        else{ //Si fue testeado y paso la prueba
                            if($resultado['estado']==1){
                                echo'<p style="color:green;">EL PASAJERO FUE TESTEADO Y PASO LA PRUEBA&#9989;</p>';
                            }
                            else{
                                if($resultado['estado']==2){//Si fue testeado y no paso la prueba
                                    echo'<p style="color:red; font-weight:bold;">EL PASAJERO FUE TESTEADO Y NO PASO LA PRUEBA &#10060;</p>';
                                }
                                else{ //SI TODAVIA NO FUE TESTEADO
                                   echo '<button style="font-weight:bold; font-size:18px; background-color: #87CEFA;" onclick="window.location.href=';
                                   echo "'";
                                   echo 'pagina-testCovid.php?idViaje=';
                                   echo $idViaje;
                                   echo "&idPasaje=";
                                   echo $resultado['id'];
                                   echo "&idUsuario=";
                                   echo $datosUsuario['id'];
                                   echo "'";     
                                   echo'">TESTEAR COVID</button>';
                                   echo "&nbsp";
                                   echo '<button style="font-weight:bold; font-size:18px; background-color: #F08080;" onclick="window.location.href=';
                                   echo "'";
                                   echo 'db-ausencia.php?idViaje=';
                                   echo $idViaje;
                                   echo "&idPasaje=";
                                   echo $resultado['id'];
                                   echo "'";
                                   echo'">NO SE PRESENTO</button>';
                                }
                            }
                        }
                    }
                    }
                
                }
                    echo '</a>';
                }
                }
            }
            else{
                echo'<h4 style="color:white;"> No hay pasajeros </h4>';
            }
          ?>
		</div>
	</div>
    <script>
        window.onload = function(){
            if (window.location.hash == "#agregado"){
                alert("El pasaje se ha vendido con éxito");
            }
        }
    </script>
} 
</body>
</html>