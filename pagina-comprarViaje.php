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
			echo '<li><img src="img/gold-member-logo.png"></li>'; } ?>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		<li><a href="">Perfil</a></li> 
	</ul>
	<div class="content">
		<?php echo verViaje($id); ?>
		<br>	
		<h1> Comprar viaje </h3>
		<form  method="POST" action="db-comprarPasaje.php?id=<?php echo $id?>">
		<?php 
		$consulta= "SELECT * from viajes where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){	
				echo "<h4>Elegi los insumos para tu viaje</h6>";
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
				 <input id="numTarjeta" type="text" class="campoTexto" name="numTarjeta" placeholder="Ingrese su número de tarjeta">
          <input id="claveTarjeta" type="password" class="campoTexto" name="claveTarjeta" placeholder="Ingrese el codigo de seguridad de su tarjeta">
          <input id="nombreTarjeta" type="text" class="campoTexto" name="nombreTarjeta" placeholder="Ingrese su nombre y apellido">
		  <input type="submit" value="Ingresar">
		</form>
	<script type="text/javascript" src="scripts/script-agregarChofer.js"></script>
</body>
</html>