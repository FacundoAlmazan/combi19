<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>Datos del viaje</title>
		<link rel="stylesheet" type="text/css" href="estilo-ver.css">
</head>
<body>
	<?php include_once "db-funciones.php";
	if(isset($_GET['idViaje'])){
		$id=$_GET['idViaje'];
		
  	} 
	?>
	<ul>
	 	<li><a class="logo" href='pagina-homeUsuario.php'><img src="img/avatar.png"></a></li>
		 <?php 
		 if(!isset($_SESSION['gold'])){
			 session_start();
		 }
		 if($_SESSION['gold']==1){
			echo '<li><img src="img/gold-member-logo.png" style="border:none"></li>'; } ?>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		<li><a href="">Perfil</a></li> 
	</ul>
    <?php
    if($_SESSION['gold']==1){
    ?>
        <div class="content">
            <h1> Detalle viaje </h1>
            <?php echo verViaje($id); ?>
            <br>	
            <h1> Comprar viaje </h1>
            <form  method="POST" onsubmit="return checkCompra()" action="db-comprarPasaje.php?id=<?php echo $id?>">
            <input id="gold" type="text" style="display:none" value="si">
            <?php 
            $consulta= "SELECT * from viajes where (id='$id')";
            $respuesta = consultar($consulta);
            $datos = $respuesta;
            if($respuesta){
                foreach ($datos as $datos){	
                    echo "<h4>Elegí los insumos para tu viaje</h6>";
                    $insumos=explode(",",$datos['insumos']);
                    foreach ($insumos as $insumos){
                        $insumoInt= (int)$insumos;
                        $consultaIns= "SELECT * from insumos where id='$insumoInt'";
                        $respuesta2=consultar($consultaIns);
                        echo '
                        <input type="checkbox" name="insu[]" value="';
                        foreach($respuesta2 as $respuesta2){
                        echo $respuesta2['id'];
                        echo'">';
                        echo $respuesta2['nombre'];}
                        echo '</input>';
                    }
                    echo'<br>';	
                }
            }
            ?>
            <br>
            <style>
                .collapsible {
                    background-color: #777;
                    color: white;
                    cursor: pointer;
                    padding: 4px;
                    border: none;
                    text-align: left;
                    outline: none;
                    font-size: 15px;
                    height:28px;
                }

                .active, .collapsible:hover {
                    background-color: #555;
                }

                .contenta {
                    margin:20px;
                    padding: 0 18px;
                    display: none;
                    overflow: hidden;
                }
            </style>
            <h4>¿No quieres pagar con tu tarjeta predefinida?</h4>
            <button type="button" class="collapsible">Usar otra</button>
            <div class="contenta" style="width: 95%">
            <H4>Ingresa los datos de la tarjeta con la que pagarás</H4>
            <input id="numTarjeta" type="text" class="campoTexto" name="numTarjeta" placeholder="Ingrese su número de tarjeta">
            <input id="claveTarjeta" type="password" class="campoTexto" name="claveTarjeta" placeholder="Ingrese la clave de su tarjeta">
            <input id="vencimientoTarjeta" type="text" class="campoTexto" name="vencimientoTarjeta" onfocus="(this.type='date')" placeholder="Ingrese la fecha de vencimiento">
            <input id="nombreTarjeta" type="text" class="campoTexto" name="nombreTarjeta" placeholder="Ingrese su nombre y apellido">
            </div>

            <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var contenta = this.nextElementSibling;
                if (contenta.style.display === "block") {
                    contenta.style.display = "none";
                } else {
                    contenta.style.display = "block";
                }
            });
            }
            </script>
            <br>
            <br>
            <!-- SUBMIT -->
            <input type="submit" class="modificar" value="Comprar">
        </form>
    <?php
    }
    else{
        ?>
        <div class="content">
            <h1> Detalle viaje </h1>
            <?php echo verViaje($id); ?>
            <br>	
            <h1> Comprar viaje </h1>
            <form  method="POST" onsubmit="return checkCompra()" action="db-comprarPasaje.php?id=<?php echo $id?>">
            <input id="gold" type="text" style="display:none" value="no">
            <?php 
            $consulta= "SELECT * from viajes where (id='$id')";
            $respuesta = consultar($consulta);
            $datos = $respuesta;
            if($respuesta){
                foreach ($datos as $datos){	
                    echo "<h4>Elegí los insumos para tu viaje</h6>";
                    $insumos=explode(",",$datos['insumos']);
                    foreach ($insumos as $insumos){
                        $insumoInt= (int)$insumos;
                        $consultaIns= "SELECT * from insumos where id='$insumoInt'";
                        $respuesta2=consultar($consultaIns);
                        echo '
                        <input type="checkbox" name="insu[]" value="';
                        foreach($respuesta2 as $respuesta2){
                        echo $respuesta2['id'];
                        echo'">';
                        echo $respuesta2['nombre'];}
                        echo '</input>';
                    }
                    echo'<br>';	
                }
            }
            ?>
            <h4>Ingresa los datos de la tarjeta con la que pagarás</h4>
            <input id="numTarjeta" type="text" class="campoTexto" name="numTarjeta" placeholder="Ingrese su número de tarjeta">
            <input id="claveTarjeta" type="password" class="campoTexto" name="claveTarjeta" placeholder="Ingrese la clave de su tarjeta">
            <input id="vencimientoTarjeta" type="text" class="campoTexto" name="vencimientoTarjeta" onfocus="(this.type='date')" placeholder="Ingrese la fecha de vencimiento">
            <input id="nombreTarjeta" type="text" class="campoTexto" name="nombreTarjeta" placeholder="Ingrese su nombre y apellido">
            <input type="submit" class="modificar" value="Comprar">
            </form>
            <?php
    }
    ?>
	<script type="text/javascript" src="scripts/script-comprarViaje.js"></script>
</body>
</html>