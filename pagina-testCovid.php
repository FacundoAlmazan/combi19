<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<?php 
	   $idViaje=$_GET['idViaje'];
	   if(isset($_GET['idUsuario'])){
	          $idUsuario=$_GET['idUsuario'];}
	   else{
		   $idUsuario=420420;
	   }
	   $idPasaje=$_GET['idPasaje']; 
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

	<h1 class="titulo"> TEST DE COVID</h1>

	<div class="content">
		<form name="test" method="POST" action="db-testCovid.php?idViaje=<?php echo$idViaje;echo"&idUsuario=";echo$idUsuario;echo"&idPasaje=";echo $idPasaje;?>">
		   <h2>TEMPERATURA(°C)</h2>
		      <input id="temperatura" type="number" class="campoTexto" name="temperatura">
		   <h2>Sintomas que posee:</h2>
		   <h3>Perdida de gusto</h3>
		      <input  id="gusto" type="checkbox" name="gusto" value="gusto">
			<h3>Perdida de olfato</h3>
		      <input id="olfato" type="checkbox" name="olfato">
		   <h3>Dolor de cabeza</h3>
		      <input id="cabeza" type="checkbox" name="cabeza">
		   <h3>Dolor muscular</h3>
		      <input id="muscular" type="checkbox" name="muscular">
		   <h3>Tos</h3>
		      <input id="tos" type="checkbox" name="tos">
			  <br></br>
			<input type="submit" value="ENVIAR">
		</form>
		<script src="scripts/script-ver.js"></script> 			
</body>
</html>