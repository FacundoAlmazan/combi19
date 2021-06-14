<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(1);
	$_SESSION['url']=3;
    $id=$_SESSION['id'];
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
	<div class="content">
        <?php
        if(isset($_GET['idComentario'])){
		    $idComentario=$_GET['idComentario'];
            $consulta = "SELECT comentario FROM comentarios WHERE id = $idComentario";
            $respuesta=consultar($consulta);
            foreach($respuesta as $respuesta){
                $textoComentario=$respuesta['comentario'];
            }
            echo '<div class="prueba" style="height:auto; margin-top:10%">';
				echo '<form id="coment" method="POST" onsubmit="return checkComentario()" action="db-modificarComentario.php?id=';
				echo $idComentario; echo'">';
				echo '<h3>Dijiste:</h3>
					<input id="comentario" form="coment" type="text" style="color:black" class="campoTexto" name="mensaje" value="';
					echo $textoComentario;
					echo '">';
					?>
					<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<br>
				<?php
				echo '<a class="comentarioEliminar" href="db-eliminarComentario.php?idComentario=';
				echo $idComentario;
				echo '"';
				echo"> Eliminar </a>
				</div>";
        }
        ?>
    </div>
    <script  type="text/javascript" src="scripts/script-comentario.js"></script>
</body>