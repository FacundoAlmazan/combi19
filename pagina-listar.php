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
	if(isset($_GET['tipo'])){
      	$tipo=$_GET['tipo'];
      	switch ($tipo){
	  		case '1':
		 		$categoria="Choferes";
		 		break;
	  		case '2':
		  		$categoria="Combis";
		  		break;
	  		case '3':
		  		$categoria="Lugares";
		  		break;
	  		case '4':
		  		$categoria="Rutas";
		  		break;
		    case '5':
	     		$categoria="Viajes";
				break;
	  	}
    } 
    ?>

	<ul>
	 	<li><a class="logo" href='pagina-homeAdmin.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		<!-- <li><a href="">Perfil</a></li> -->
	</ul>
	
	<div class="content">
		<div style="display:flex">
			<h1 class="titulo"> Listado de <?php echo $categoria; ?> </h1>
			<?php
			echo '<button class="agregar" onclick="window.location.href=';
			echo "'pagina-agregar.php?tipo=$tipo'";
			echo'">AGREGAR</button>';
			?>
		</div>
     <?php listarDatos($tipo); ?>
	</div>
</body>
</html>