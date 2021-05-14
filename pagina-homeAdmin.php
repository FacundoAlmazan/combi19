<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>HOME ADMIN</title>
		<link rel="stylesheet" type="text/css" href="estilo-homeAdmin.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeAdmin.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		 <!-- <li><a href="">Perfil</a></li> -->
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Inventario del negocio </h1>
			<div class="row">
				<div class="column">
					<a class="item" href="pagina-listar.php?tipo=1">
						<p class="item">CHOFERES</p>
					</a>
					<a class="item" href="pagina-listar.php?tipo=3">
						<p class="item">LUGARES</p>
					</a>
				</div>
				<div class="column">
					<a class="item" href="pagina-listar.php?tipo=2">
						<p class="item">COMBIS</p>
					</a>
					<a class="item" href="pagina-listar.php?tipo=4">
						<p class="item">RUTAS</p>
					</a>
				</div>
			</div>
		</div>
		<div class="bloque">
			<h1 class="titulo"> Listados de reportes </h1>
		</div>
	</div>
</body>
</html>