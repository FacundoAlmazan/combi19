<?php
	include_once "session.php";
	$a = new autenticacion();
	$a->validar_sesion();
	$a->validar_rol(3);
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#chofer > option[value="<?php echo $_GET['c']?>"]').attr('selected', 'selected');
    $('#origen > option[value="<?php echo $_GET['o']?>"]').attr('selected', 'selected');
	$('#destino > option[value="<?php echo $_GET['d'] ?>"]').attr('selected', 'selected');
});
</script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
	<title>HOME USUARIO</title>
		<link rel="stylesheet" type="text/css" href="estilo-listar.css">
</head>
<body>
	 <ul>
	 	<li><a class="logo" href='pagina-homeAdmin.php'><img src="img/avatar.png"></a></li>
  		<li><a href="cerrarSesion.php" id="btn-cerrar">Salir </a></li>
		<li><a href="pagina-perfil.php"> Perfil </a></li>
	</ul> 
	<div class="content">
		<div class="bloque">
			<h1 class="titulo"> Reporte de viajes </h1>
			<h3 class="busquedaLetra" >Parámetros de búsqueda:</h3>
			<form name="buscar" method="POST" action="db-filtrarReporteViajes.php">
            <span style="color:white">Chofer:</span>
            <select id="chofer" type="text" class="campoTexto" name="chofer" placeholder="Chofer">
            <option value="X" selected >-</option>
			<?php $consulta="SELECT * from usuarios WHERE tipo=2";
			    $datos=consultar($consulta); 
                foreach($datos as $datos){
                    ?>
                    <option value=<?php echo'"'; echo $datos['nombreusuario']; echo '">';
                    echo $datos['nombre']; echo","; echo $datos['apellido'];  ?> </option>
                    <?php } ?>
                </select>
            <span style="color:white">Origen:</span>
			<select id="origen" type="text" class="campoTexto" name="origen" placeholder="Origen">
            <option value="X" selected >-</option>
			<?php $consulta="SELECT * from lugares";
			    $datos=consultar($consulta); ?>
				     <?php foreach($datos as $datos){ ?>
						<option value=<?php echo'"'; echo $datos['lugar']; echo '">';
						echo $datos['lugar']; echo","; echo $datos['provincia'];  ?> </option>
				     <?php } ?>
					</select>
            <span style="color:white">Destino:</span>
			<select id="destino" type="text" class="campoTexto" name="destino" placeholder="Destino">
            <option value="X" selected >-</option>
			<?php $consulta="SELECT * from lugares";
			    $datos=consultar($consulta); ?>
				     <?php foreach($datos as $datos){ ?>
						<option value=<?php echo'"'; echo $datos['lugar']; echo '">';
						echo $datos['lugar']; echo","; echo $datos['provincia'];  ?> </option>
				     <?php } ?>
					</select>
            <br>
            <br>
			<span style="color:white">Rango de fechas:</span>
            <input id="fecha1" class="campoTexto" type="date" <?php if(isset($_GET['f1'])){echo 'value="'; echo $_GET['f1']; echo'"';}?>" name="fecha1">
            <span style="color:white">-</span>
			<input id="fecha2" class="campoTexto" type="date" <?php if(isset($_GET['f2'])){echo 'value="'; echo $_GET['f2']; echo'"';}?>" name="fecha2">
            <br>
            <br>
			<input type="submit" value="Buscar&#x1F50D;">
            <br>
            <br>
			</form>
<?php
        if(empty($_GET['c'])){$c='X';}else{$c=$_GET['c'];}
        if(empty($_GET['o'])){$o='X';}else{$o=$_GET['o'];}
        if(empty($_GET['d'])){$d='X';}else{$d=$_GET['d'];}
        if(empty($_GET['f1'])){$f1='X';}else{$f1=$_GET['f1'];}
        if(empty($_GET['f2'])){$f2='X';}else{$f2=$_GET['f2'];}
        if(($c=='X') && ($o=='X') && ($d=='X') && ($f1=='X') && ($f2=='X')){
            echo '<h3 style="color:white">Seleccione filtros para generar el reporte</h3>';
        }
        else{
            if(($o!='X') && ($d!='X')){
                if ($o == $d){
                    echo '<h3 class="busquedaLetra">El origen y el destino no pueden ser iguales</h3>';
                }
            }
            if ((($f1!='X') || ($f2!='X')) && (($f1=='X') || ($f2=='X'))){
                echo '<h3 class="busquedaLetra">Ambas fechas deben cargarse para representar un rango</h3>';
            }
            else{
                filtrarReporte($c,$o,$d,$f1,$f2);
            }
        }

	 ?>
			</div>
	</div>
	<script type="text/javascript" src="scripts/script-listarViajes.js"></script>
</body>
</html>