<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<?php 
	   $idViaje=$_GET['idViaje'];
	?>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>DETALLE</title>
		<link rel="stylesheet" type="text/css" href="estilo-ver.css">
</head>
<body>
	<?php include_once "db-funciones.php";
	?>
	<ul>
	 	<li><a class="logo" href='pagina-homeChofer.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
 		<!-- <li><a href="">Perfil</a></li> -->
	</ul>

	<h1 class="titulo"> VENDER PASAJE PRESENCIAL</h1>

	<div class="content">
		<form name="test" method="POST" onsubmit="return validarEdad()" action="db-vender.php?idViaje=<?php echo$idViaje?>">
		   <h2>EMAIL</h2>
		      <input id="email" type="text" class="campoTexto" name="email">
			<h2>FECHA DE NACIMIENTO</h2>
			  <input type="date" id="nacimiento" name="nacimiento"> 	
			  <br></br>
			  <input type="submit" value="ENVIAR">
		</form>
		<script src="scripts/script-vender.js"></script> 		
</body>
</html>