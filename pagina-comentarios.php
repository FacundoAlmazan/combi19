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
		<link rel="stylesheet" type="text/css" href="estilo-homeUsuario.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeUsuario.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
		<li><button id="myBtn">Dejanos tu opinión&#11088;</button> </li>
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Todos los comentarios </h1>
<?php
		$consulta= "SELECT * from comentarios";
		$respuesta=consultar($consulta);
		 if($respuesta){
			foreach ($respuesta as $respuesta){
				echo '<div class="prueba">';
					$usuarioBuscar=$respuesta['idUser'];
					$consulta2= "SELECT * from usuarios where id='$usuarioBuscar'";
					$respuesta2=consultar($consulta2);
					foreach ($respuesta2 as $respuesta2){
						$nombre=$respuesta2['nombreusuario'];
					}
					echo '<p id=comentario>';
					echo $nombre;
					echo' dijo "';
					echo $respuesta['comentario'];
				    echo '"';
				echo "</p></div>";
		    }
		}
	 ?>
			</div>
		<div class="bloque">
		      <h1 class="titulo"> Tus comentarios </h1>
			  <?php 
			  $id=$_SESSION['id'];
			  $consulta= "SELECT * from comentarios where idUser='$id'";
	        $respuesta=consultar($consulta);
		if($respuesta){ 
			foreach ($respuesta as $respuesta){
				echo '<div class="prueba">';
					echo '<p id=comentario>';
					echo $respuesta['comentario'];
				echo "</p>";
				$idComentario=$respuesta['id'];
				echo '<a class="comentarioEliminar" href="db-eliminarComentario.php?idComentario=';
				echo $idComentario;
				echo '"';
				echo"> Eliminar </a>
				</div>";
		    }
		}
			?>
		</div>
	</div>
</body>
</html>