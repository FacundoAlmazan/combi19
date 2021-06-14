<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>Editar Perfil</title>
		<link rel="stylesheet" type="text/css" href="estilo-homeAdmin.css">
</head>
<body>
	 <ul>
	    <?php if($_SESSION['tipo']==1){
			  echo '<li><a class="logo" href=';
			  echo "'pagina-homeUsuario.php'><img src=";
			  echo '"img/avatar.png"></a></li>';

			  if(!isset($_SESSION['gold'])){
				  session_start();
			  }
			  if($_SESSION['gold']==1){
				 echo '<li><img src="img/gold-member-logo.png" style="border:none"></li>'; } }
			 elseif($_SESSION['tipo']==2){
				echo '<li><a class="logo" href=';
				echo "'pagina-homeChofer.php'><img src=";
				echo '"img/avatar.png"></a></li>';}
			 else{
				echo '<li><a class="logo" href=';
				echo "'pagina-homeAdmin.php'><img src=";
				echo '"img/avatar.png"></a></li>'; } ?>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir</a></li>
 		 <!-- <li><a href="">Perfil</a></li> -->
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Datos del Perfil </h1>
			<div class="row">
				<div class="column">
				<?php
				$id= $_SESSION['id']; 
				$consulta= "SELECT * from usuarios where id='$id'"; 
				      $resultado=consultar($consulta);
					  foreach ($resultado as $resultado){
					     $nombre= $resultado['nombre'];
						 $apellido= $resultado['apellido'];
						 $user= $resultado['nombreusuario'];
						 $email= $resultado['email'];
						 $dni = $resultado['dni'];
						 $clave= $resultado['clave'];
						 $nacimiento= $resultado['nacimiento'];
					  }?>
                <form class="login-box" method="POST" onsubmit="return checkEditar()" action="db-CambiarDatosUsuario.php">
					<!-- ENTRADA DE NOMBRE DE USUARIO -->
					<h1>NOMBRE </h1>
					<input id="nombre" type="text" class="campoTexto" name="nombre" value="<?php echo $nombre ?>">
					<h1>APELLIDO </h1>
					<input id="apellido" type="text" class="campoTexto" name="apellido" value="<?php echo $apellido?>">
					<h1>EMAIL </h1>
					<input id="email" type="email" class="campoTexto" name="email" value="<?php echo $email?>">
					<h1>NOMBRE DE USUARIO </h1>
					<input id="user" type="text" class="campoTexto" name="username" value="<?php echo $user ?>">
					<h1>CLAVE </h1>
					<!-- ENTRADA DE CONTRASEÑA -->
					<input id="pw" type="password" class="campoTexto" name="password" value="<?php echo $clave?>">
					<h1>DNI </h1>
					<input id="dni" type="number" maxlength="8" class="campoTexto" name="dni" value="<?php echo $dni?>">
					<h1>FECHA DE NACIMIENTO </h1>
					<input id="nacimiento" type="date" class="campoTexto" name="nacimiento" value="<?php echo $nacimiento?>">
					<!-- SUBMIT -->
					<input type="submit" value="GUARDAR">
				</form>
				</div>
			</div>
		</div>
		</div>
	</div>
	<script src="scripts/script-perfil.js"></script> 
</body>
</html>