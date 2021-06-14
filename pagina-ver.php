<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>DETALLE</title>
		<link rel="stylesheet" type="text/css" href="estilo-ver.css">
</head>
<body>
	<?php include_once "db-funciones.php";
	if(isset($_GET['tipo'])){
		$id=$_GET['id'];
		$tipo=$_GET['tipo'];
      	switch ($tipo){
	  		case '1':
		 		$categoria="chofer";
		 		break;
	  		case '2':
		  		$categoria="combi";
		  		break;
	  		case '3':
		  		$categoria="lugar";
		  		break;
	  		case '4':
		  		$categoria="ruta";
		  		break;
			case '5':
				$categoria="viaje";
				break;
			case '6':
				$categoria="insumo";
				break;
	  	}
  	} 
	?>
	<ul>
	 	<li><a class="logo" href='pagina-homeAdmin.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		<!-- <li><a href="">Perfil</a></li> -->
	</ul>

	<h1 class="titulo"> Ver <?php echo $categoria;?></h1>

	<div class="content">
		<?php echo verDetalle($id,$tipo); ?>	
		<script src="scripts/script-ver.js"></script> 			
</body>
</html>