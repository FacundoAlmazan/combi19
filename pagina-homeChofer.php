<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(2);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>HOME CHOFER</title>
		<link rel="stylesheet" type="text/css" href="estilo-homeAdmin.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeChofer.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Acciones </h1>
			<div class="row">
				<div class="column">
					<a class="item" href="pagina-historialChofer.php">
						<p class="item">HISTORIAL DE VIAJES</p>
					</a>
				</div>
				<div class="column">
					
				</div>
			</div>
		</div>
		<div class="bloque">
			<h1 class="titulo"> Listados de reportes </h1>
		</div>
	</div>
	<script src="scripts/script-homeAdmin.js"></script> 
</body>
</html>