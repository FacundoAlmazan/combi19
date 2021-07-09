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
			<?php $consulta="SELECT * from usuarios WHERE tipo=2";
			    $datos=consultar($consulta); 
                foreach($datos as $datos){
                    ?>
                    <option value=<?php echo'"'; echo $datos['id']; echo '">';
                    echo $datos['nombre']; echo","; echo $datos['apellido'];  ?> </option>
                    <?php } ?>
                </select>
            <span style="color:white">Origen:</span>
			<select id="origen" type="text" class="campoTexto" name="origen" placeholder="Origen">
			<?php $consulta="SELECT * from lugares";
			    $datos=consultar($consulta); ?>
				     <?php foreach($datos as $datos){ ?>
						<option value=<?php echo'"'; echo $datos['lugar']; echo '">';
						echo $datos['lugar']; echo","; echo $datos['provincia'];  ?> </option>
				     <?php } ?>
					</select>
            <span style="color:white">Destino:</span>
			<select id="destino" type="text" class="campoTexto" name="destino" placeholder="Destino">
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
            <input id="fecha1" onfocus="(this.type='date')" type="text" class="campoTexto" value="<?php if(isset($_GET['f1'])){echo $_GET["f1"];}else{echo 'dd /  mm / aaaa';}?>" name="fecha1">
            <span style="color:white">-</span>
			<input id="fecha2" onfocus="(this.type='date')" type="text" class="campoTexto" value="<?php if(isset($_GET['f2'])){echo $_GET["f2"];}else{echo 'dd / mm / aaaa';}?>" name="fecha2">
            <br>
            <br>
			<input type="submit" value="Buscar&#x1F50D;">
            <br>
            <br>
			</form>
<?php
        if(empty($_GET['c']) && empty($_GET['o']) && empty($_GET['d']) && empty($_GET['f1']) && empty($_GET['f2'])){
            echo '<h3 style="color:white">Seleccione filtros para generar el reporte</h3>';
        }
        else{
            if(isset($_GET['o']) && isset($_GET['d'])){
                if ($_GET['o'] == $_GET['d']){
                    echo '<h3 class="busquedaLetra">El origen y el destino no pueden ser iguales</h3>';
                }
            }
            if (isset($_GET['f1']) || isset($_GET['f2'])){
                if (empty($_GET['f1']) || empty($_GET['f2'])){
                    echo '<h3 class="busquedaLetra">Ambas fechas deben cargarse para representar un rango</h3>';
                }
                else{
                    $c=$_GET['c'];
                    $o=$_GET['o'];
                    $d=$_GET['d'];
                    $f1=$_GET['f1'];
                    $f2=$_GET['f2'];
                    filtrarReporte($c,$o,$d,$f1,$f2);
                }
            }
        }
	 ?>
			</div>
	</div>
	<script type="text/javascript" src="scripts/script-listarViajes.js"></script>
</body>
</html>