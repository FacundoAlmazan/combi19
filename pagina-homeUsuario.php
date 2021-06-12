<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(1);
	$_SESSION['url']=1;
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
			<h1 class="titulo"> Inventario del negocio </h1>
			<div class="row">
				<div class="column">
					<a class="item" href="pagina-comentarios.php">
						<p class="item">COMENTARIOS</p>
					</a>
					<div id="myModal" class="modal">
						<!-- POP UP Ventana OCULTA -->
						<div class="modal-content">
							<span class="close">X</span>
							<h1> Ayudanos a mejorar con tu comentario! </h2>
							<form id="coment" method="POST" onsubmit="return checkComentario()" action="db-agregarComentario.php">
									<h3>Comentario&#128227;</h3>
									<textarea name="mensaje" form="coment" id="comentario" placeholder="Comparte tu opinión!"></textarea>
									<br>
									<input type="submit" value="Enviar comentario">
								</form>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<div class="bloque">
			<h1 class="titulo"> Viajes </h1>
			<div class="row">
				<div class="column">
					<a class="item" href="pagina-listarViajes.php">
					<p class="item">Ver viajes</p>
					</a>
				</div>
			</div>
		</div>
	</div>
					<!-- Cerrar / Abrir el Pop Up -->
<script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} </script>
<!-- Termina el POP UP -->

<script src="scripts/script-comentario.js"></script> 
</body>
</html>