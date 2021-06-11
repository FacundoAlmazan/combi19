<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(1);
	$_SESSION['url']=3;
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>HOME USUARIO</title>
		<link rel="stylesheet" type="text/css" href="estilo-listar.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeUsuario.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Todos los viajes </h1>
<?php
		listarViajesUsuario();
	 ?>
			</div>
	</div>
</body>
</html>