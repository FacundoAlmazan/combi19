<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>LISTADO</title>
		<link rel="stylesheet" type="text/css" href="estilo-listar.css">
</head>
<body>
	<?php 
	include_once "db-funciones.php";
    ?>

	<ul>
	 	<li><a class="logo" href='pagina-homeAdmin.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		<!-- <li><a href="">Perfil</a></li> -->
	</ul>
	
	<div class="content">
		<div style="display:flex">
			<h1 class="titulo"> Listado de usuarios rechazados</h1>
			<?php

			?>
		</div>
     <?php ?>
	</div>
	<script src="scripts/script-listar.js"></script> 
</body>
</html>