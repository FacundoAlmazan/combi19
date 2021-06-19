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
<?php if(isset($_GET['o']) && isset($_GET['d'])){?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#origen > option[value="<?php echo $_GET['o']?>"]').attr('selected', 'selected');
	$('#destino > option[value="<?php echo $_GET['d'] ?>"]').attr('selected', 'selected');
	$('#fecha > option[value="<?php echo $_GET['f'] ?>"]').attr('selected', 'selected');
});
</script> <?php }?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>HOME USUARIO</title>
		<link rel="stylesheet" type="text/css" href="estilo-listar.css">
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
		<div class="bloque">
			<h1 class="titulo"> Todos los viajes </h1>
			<h3 class="busquedaLetra" >Busqueda(Los 3 campos son obligatorios)</h3>
			<form name="buscar" method="POST" action="db-buscarViaje.php">
			<select id="origen" type="text" class="campoTexto" name="origen" placeholder="Origen">
			<?php $consulta="SELECT * from lugares";
			    $datos=consultar($consulta); ?>
				     <?php foreach($datos as $datos){ ?>
						<option value=<?php echo'"'; echo $datos['lugar']; echo '">';
						echo $datos['lugar']; echo","; echo $datos['provincia'];  ?> </option>
				     <?php } ?>
					</select>
			<select id="destino" type="text" class="campoTexto" name="destino" placeholder="Destino">
			<?php $consulta="SELECT * from lugares";
			    $datos=consultar($consulta); ?>
				     <?php foreach($datos as $datos){ ?>
						<option value=<?php echo'"'; echo $datos['lugar']; echo '">';
						echo $datos['lugar']; echo","; echo $datos['provincia'];  ?> </option>
				     <?php } ?>
					</select>
			<select id="fecha" type="date" class="campoTexto" name="fecha" placeholder="Fecha">
			<?php $consulta="SELECT DISTINCT fecha from viajes where estado='1'";
			    $datos=consultar($consulta); ?>
				     <?php foreach($datos as $datos){ ?>
						<option value=<?php echo'"'; echo $datos['fecha']; echo '">';
						echo $datos['fecha']; ?> </option>
				     <?php } ?>
					</select>
					<br>
					 </br>
					<input type="submit" value="Buscar&#x1F50D;">
			</form>
<?php
        if(!empty($_GET['o']) && !empty($_GET['d']) && !empty($_GET['f'])){
			if ($_GET['o'] == $_GET['d']){
				echo '<h3 class="busquedaLetra">Error: El lugar y destino no pueden ser iguales</h3>';
			}
			else{
				$o=$_GET['o'];
				$d=$_GET['d'];
				$f=$_GET['f'];
				listarBusqueda($o,$d,$f);
			}
		}
		else{
		listarViajesUsuario();
		}
	 ?>
			</div>
	</div>
	<script type="text/javascript" src="scripts/script-listarViajes.js"></script>
</body>
</html>