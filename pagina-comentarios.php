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
		<link rel="stylesheet" type="text/css" href="estilo-comentarios.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeUsuario.php'><img src="img/avatar.png"></a></li>
		 <?php 
		 if(!isset($_SESSION['gold'])){
			 session_start();
		 }
		 if($_SESSION['gold']==1){
			echo '<li><img src="img/gold-member-logo.png" style="border:none"></li>'; } ?>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content" '>
		<div class="bloque" style="float:left; margin-left:10%" >
			<h1 class="titulo"> Todos los comentarios </h1>
<?php
		$consulta= "SELECT * from comentarios";
		$respuesta=consultar($consulta);
		$id=$_SESSION['id'];
		if (mysqli_num_rows($respuesta) != 0){
			foreach ($respuesta as $respuesta){
				if($respuesta['idUser']!=$id){
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
				else{
				$idComentario=$respuesta['id'];
				$comentario=$respuesta['comentario'];
				echo '<a class="btn" href=';
				echo "'pagina-editarComentario.php?idComentario=$idComentario'";
				echo '">';
				echo '<p id="comentario"> Dijiste ';
				echo '"';
				echo $comentario;
				echo '"';
				echo '</p>';
				echo "</a>";
				}

		    }
		}
		else{
			echo '<h2 style="color:white"> No hay comentarios </h2>';
		}
	 ?>
		</div>
		<div class="bloque" style="float:right; margin-right:10%">
			<h1 class="titulo"> Tus comentarios </h1>
			<?php 
			$id=$_SESSION['id'];
			$consulta= "SELECT * from comentarios where idUser='$id'";
	        $respuestas=consultar($consulta);
			if (mysqli_num_rows($respuestas) != 0){
				foreach ($respuestas as $respuesta){
					$idComentario=$respuesta['id'];
					$comentario=$respuesta['comentario'];
					echo '<button class="btn" onclick="location.href=';
					echo "'pagina-editarComentario.php?idComentario=$idComentario'";
					echo '">';
					echo $comentario;
					echo "</button>";
				}	
			}
			else{
				echo '<h2 style="color:white"> No hay comentarios </h2>';
			}
			?>
		</div>
	</div>
	<script type="text/javascript" src="scripts/script-comentario.js"></script>
</body>
</html>