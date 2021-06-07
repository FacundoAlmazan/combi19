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
	    <li><button id="myBtn">Dejanos tu opinión&#11088;</button> </li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Inventario del negocio </h1>
			<div class="row">
				<div class="column">
				
<div id="myModal" class="modal">
<!-- POP UP Ventana OCULTA -->
<div class="modal-content">
  <span class="close">X</span>
  <h1> Ayudanos a mejorar con tu comentario! </h2>
  <form id="coment" method="POST" action="db-agregarComentario.php">
			<h3>Califique nuestro servicio (1 Estrella :Pésimo / 5 Estrellas :Excelente )</h3>
			<select name="slct" id=slct size="5">
                    <option value="1">&#11088;</option>
                    <option value="2">&#11088;&#11088;</option>
                    <option value="3">&#11088;&#11088;&#11088;</option> 
					<option value="4">&#11088;&#11088;&#11088;&#11088;</option> 
					<option value="5">&#11088;&#11088;&#11088;&#11088;&#11088;</option> 
            </select>
			<h3>Comentario&#128227;</h3>
			<textarea name="mensaje" form="coment" id="mensaje"placeholder="Comparte tu opinión!"></textarea>
			<br>
			<input type="submit" value="Enviar comentario">
		</form>
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

				</div>
				<div class="column">	
				</div>
			</div>
		</div>
		<div class="bloque">
			<h1 class="titulo"> Listados de reportes </h1>
		</div>
	</div>
</body>
</html>