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
	<div class="content">
		<h1> Detalle viaje </h1>
		<?php echo verViaje($id); ?>
		<br>	
		<h1> Comprar viaje </h1>
		<form  method="POST" onsubmit="return checkCompra()" action="db-comprarPasaje.php?id=<?php echo $id?>">
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
				<br>
				<h2> Datos de tarjeta de crédito </h2>
				<input id="numTarjeta" type="text" class="campoTexto" name="numTarjeta" placeholder="Ingrese número de tarjeta">
				<input id="claveTarjeta" type="password" class="campoTexto" name="claveTarjeta" placeholder="Ingrese el codigo de seguridad">
				<input id="vencimientoTarjeta" type="text" class="campoTexto" name="vencimientoTarjeta" onfocus="(this.type='date')" placeholder="Ingrese vencimiento de la tarjeta">
				<input id="nombreTarjeta" type="text" class="campoTexto" name="nombreTarjeta" placeholder="Ingrese su nombre y apellido">
				<input class="modificar" type="submit" value="Comprar">
			</form>
		<script type="text/javascript" src="scripts/script-comprarViaje.js"></script>
</body>
</html>