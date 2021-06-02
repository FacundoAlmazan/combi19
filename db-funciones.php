<?php
	include "db.php";
	// Funciones generales
	function consultar($consulta){
	  $link = conn();
	  $resultado = mysqli_query($link, $consulta);
	  return $resultado;  
	}
	// Funciones login

	// Funciones Registro
	function EnviarRegistro($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento){
		$validacion="SELECT * from usuarios where nombreusuario=$user";
		$resultadoValidacion=consultar($validacion);
    	if ($resultadoValidacion== null){
			$consulta="INSERT into usuarios(nombre,apellido,nombreusuario,email,dni,clave,nacimiento,tipo,gold) VALUES ('$nombre','$apellido','$user','$email','$dni','$pass','$nacimiento','1','1')";
	    	$resultado=consultar($consulta);
			if($resultado){
				echo '<script language="javascript">alert("Se ha registrado exitosamente");</script>';
				include "index.php";
				//include "index.php";
				return true;
			}
			else{
				include"error.php";
				return false;
			}
		}
		else{
            echo '<script language="javascript">alert("El registro fallo: Nombre de usuario ya existente");</script>';
			include "pagina-registro.php";
			return false;
		}
	}

	// LISTAR ITEMS INVENTARIO

    function listarLugares(){
		$tipo=3;
		$consulta= "SELECT * from lugares";
		$respuesta=consultar($consulta);
		if($respuesta){
			foreach ($respuesta as $respuesta){
			   	echo '<a class="item"';
			    echo' href="pagina-ver.php?tipo=';
			   	echo $tipo;
			  	echo"&id=";
			   	echo $respuesta['id'];
			   	echo '">'; 
				echo' <div class="column">
					<p>PROVINCIA:';
					echo $respuesta['provincia'];
					echo " LUGAR:";
					echo $respuesta['lugar'];
				echo "</p></div></a>";
		    }
		}
	}

	function listarChoferes(){
		$tipo=1;
		$consulta= "SELECT * from choferes";
		$respuesta=consultar($consulta);
		if($respuesta){
			foreach ($respuesta as $respuesta){
				echo '<a class="item"';
				echo' href="pagina-ver.php?tipo=';
				echo $tipo;
				echo"&id=";
				echo $respuesta['id'];
				echo '">'; 
				echo' <div class="column">
					<p>NOMBRE:';
					echo $respuesta['nombrecompleto'];
					echo " EMAIL:";
					echo $respuesta['email'];
					echo" TELEFONO:";
					echo $respuesta['telefono'];
				echo "</p></div></a>";
			}
		}
	}

	function listarRutas(){
		$tipo=4;
		$consulta= "SELECT * from rutas";
		$respuesta=consultar($consulta);
		if($respuesta){
			foreach ($respuesta as $respuesta){
			   	echo '<a class="item"';
			    echo' href="pagina-ver.php?tipo=';
			   	echo $tipo;
			   	echo"&id=";
			  	echo $respuesta['id'];
			   	echo '">'; 
				echo '<div class="column"><p> ORIGEN:';
					echo $respuesta['origen'];
					echo" DESTINO:";
					echo $respuesta['destino'];
					echo" COMBI:";
					echo $respuesta['combi'];
					echo" DURACION:";
					echo $respuesta['duracion'];
					echo" KM:";
					echo $respuesta['km'];
				echo "</p></div></a>";
		   	}
	   	}
	}

	function listarCombis(){
		$tipo=2;
		$consulta= "SELECT * from combis";
		$respuesta=consultar($consulta);
		if($respuesta){
			foreach ($respuesta as $respuesta){
			   	echo '<a class="item"';
			    echo' href="pagina-ver.php?tipo=';
			   	echo $tipo;
			   	echo"&id=";
			   	echo $respuesta['identificacion'];
			   	echo '">'; 
				echo' <div class="column">
					<p>MODELO:';
					echo $respuesta['modelo'];
					echo " ASIENTOS:";
					echo $respuesta['cantasientos'];
					echo " IDENTIFICACION:";
					echo $respuesta['identificacion'];
					echo" CHOFER:";
					echo $respuesta['chofer'];
					echo" TIPO:";
					echo $respuesta['tipo'];
				echo "</p></div></a>";
		   	}
		}
	}

	function listarViajes(){
		$tipo=5;
		$consulta= "SELECT * from viajes";
		$respuesta=consultar($consulta);
		$rest= $respuesta;
		if($respuesta){
			foreach ($respuesta as $respuesta){
			   	echo '<a class="item"';
			    echo' href="pagina-ver.php?tipo=';
			   	echo $tipo;
			   	echo"&id=";
			   	echo $respuesta['id'];
			   	echo '">'; 
				echo' <div class="column">
					<p>RUTA : ';
					$idR=$respuesta['idRuta'];
					$consulta1= "SELECT * from rutas where id='$idR'";
					$ans=consultar($consulta1);
					foreach($ans as $ans){
						echo $ans['origen']. " ---> " . $ans['destino'];
					}
					echo " PRECIO:";
					echo $respuesta['precio'];
					echo " FECHA:";
					echo $respuesta['fecha'];
					echo" HORA:";
					echo $respuesta['hora'];
					echo " INSUMOS:";
					$str=" ";
					$insumos=explode(",",$respuesta['insumos']);
					foreach ($insumos as $insumos){
						$insumoInt= (int)$insumos;
						$consultaIns= "SELECT * from insumos where id='$insumoInt'";
						$resultadoIns= consultar($consultaIns);
						foreach($resultadoIns as $resultadoIns){
							$str= $str . " " . $resultadoIns['nombre']."+";

						}
					}
					$strInsumos=rtrim($str,"+");
					echo $strInsumos;
				echo "</p></div></a>";
		   	}
		}
		if(mysqli_num_rows ($rest) === 0){
			echo '<h2 style="color:white">No hay viajes en el catálogo</h2>';
		}
	}
    
	function listarInsumos(){
		$tipo=6;
		$consulta= "SELECT * from insumos";
		$respuesta=consultar($consulta);
		$rest= $respuesta;
		if($respuesta){
			foreach ($respuesta as $respuesta){
			   	echo '<a class="item"';
			    echo' href="pagina-ver.php?tipo=';
			   	echo $tipo;
			  	echo"&id=";
			   	echo $respuesta['id'];
			   	echo '">'; 
				echo' <div class="column">
					<p>NOMBRE:';
					echo $respuesta['nombre'];
					echo " TIPO:";
					echo $respuesta['tipo'];
					echo " PRECIO:";
					echo $respuesta['precio'];
				echo "</p></div></a>";
		    }
		}
		if(mysqli_num_rows ($rest) === 0){
			echo '<h2 style="color:white">No hay insumos en el catálogo</h2>';
		}
	}


	function listarDatos($tipo){
		if($tipo=='1'){
          listarChoferes();
		}
		elseif ($tipo=='2'){
          listarCombis();
		}
		elseif ($tipo=='3'){
          listarLugares();
		}
		elseif ($tipo=='4'){
          listarRutas();
		}
		elseif ($tipo=='5'){
			listarViajes();
		}
		elseif ($tipo=='6'){
			listarInsumos();
		}
	}

	//BAJA-MODIFICACIÓN ITEMS INVENTARIO//

	function detalleChofer($id){
		$consulta= "SELECT * from choferes where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<form method="POST" onsubmit="return checkChofer()" action="db-modificarChofer.php?id=';
				echo $id; echo'">
					<h3>Nombre:</h3>
					<input id="nombre" type="text" class="campoTexto" name="nombre" value="';
					echo $datos['nombre'];
					echo '">
					<h3>Apellido:</h3>
					<input id="apellido" type="text" class="campoTexto" name="apellido" value="';
					echo $datos['apellido'];
					echo '">
					<h3>Email:</h3>
					<input id="email" type="text" class="campoTexto" name="email" value="';
					echo $datos['email'];
					echo '">
					<h3>Telefono:</h3>
					<input id=telefono type="text" class="campoTexto" name="telefono" value="';
					echo $datos['telefono'];
				echo '">'; ?>
				<br>
				<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<button class="baja" onclick= "if (confirm('¿Seguro que quieres dar de baja?')) window.location.href=
				<?php
				echo "'baja.php?tipo=1&id=$id'";
				echo'">DAR DE BAJA</button>';
			}
		}
		?>
	</div>
	<script type="text/javascript" src="scripts/script-modificarChofer.js"></script>
		<?php
	}

	function detalleCombi($id){
		$consulta= "SELECT * from combis where (identificacion='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<form method="POST" onsubmit="return checkCombi()" action="db-modificarCombi.php?id=';
				echo $id; echo'">
					<h3> Modelo </h3>
					<input id="modelo" type="text" class="campoTexto" name="modelo" value="';
					echo $datos['modelo'];
					echo'">
					<h3>Patente:</h3>
					<input id="patente" type="text" class="campoTexto" name="patente" value="';
					echo $datos['patente'];
					echo '">
					<h3>Identificacion:</h3>
					<input id="id" type="text" class="campoTexto" name="idex" value="';
					echo $datos['identificacion'];
					echo '">
					<h3>Cant Asientos:</h3>
					<input id="cantasientos" type="number" class="campoTexto" name="cantasientos" value="';
					echo $datos['cantasientos'];
					echo '">';
					?>
					<br>
					<h3>Chofer:</h3>
					<select id="chofer" type="text" class="campoTexto" name="chofer">
						<option value=<?php echo'"'; echo$datos['chofer']; echo '">';
						echo $datos['chofer']; ?> </option>
						<?php
						$consulta = "SELECT nombrecompleto FROM choferes";
						$choferes = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($choferes)) {
		            		echo '<option value="'.$valores[nombrecompleto].'">'.$valores[nombrecompleto].'</option>';
		          		}
						?>
					</select>
					<?php
					echo '<h3>Tipo:</h3>
					<input id="tipo" type="text" class="campoTexto" name="tipocombi" value="';
					echo $datos['tipo'];
					echo '">'; ?>
					<br>
					<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<button class="baja" onclick= "if (confirm('Seguro que quieres dar de baja?')) window.location.href=
				<?php
				echo "'baja.php?tipo=2&id=$id'";
				echo'">DAR DE BAJA</button>';
			}
		}
		?>
	</div>
		<script type="text/javascript" src="scripts/script-agregarCombi.js"></script>
		<?php
	}

	function detalleLugar($id){
		$consulta= "SELECT * from lugares where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<form method="POST" onsubmit="return checkLugar()" action="db-modificarLugar.php?id=';
				echo $id; echo'">
					<h3>Lugar:</h3>
					<input id="lugar" type="text" class="campoTexto" name="lugar" value="';
					echo $datos['lugar'];
					echo '">
					<h3>Provincia:</h3>
					<input id="provincia" type="text" class="campoTexto" name="provincia" value="';
					echo $datos['provincia'];
					echo '">'; ?>
					<br>
					<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<button class="baja" onclick= "if (confirm('Seguro que quieres dar de baja?')) window.location.href=
				<?php
				echo "'baja.php?tipo=3&id=$id'";
				echo'">DAR DE BAJA</button>';
			}
		}
		?>
			</div>
		<script type="text/javascript" src="scripts/script-agregarLugar.js"></script>
		<?php
	}

	function detalleRuta($id){
		$consulta= "SELECT * from rutas where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<form method="POST" onsubmit="return checkLugar()" action="db-modificarRuta.php?id=';
				echo $id; echo'">';?>
					<h3> Origen </h3>
					<select id=origen type="text" class="campoTexto" name="origen">
						<option value=<?php echo'"'; echo $datos['origen']; echo '">';
						echo $datos['origen']; ?> </option>
						<?php
						$consulta = "SELECT lugar FROM lugares";
						$lugares = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($lugares)) {
		            		echo '<option value="'.$valores[lugar].'">'.$valores[lugar].'</option>';
		          		}
						?>
					</select>
					<h3>Destino:</h3>
					<select id=destino type="text" class="campoTexto" name="destino">
						<option value=<?php echo'"'; echo $datos['destino']; echo '">';
						echo $datos['destino']; ?> </option>
						<?php
						$consulta = "SELECT lugar FROM lugares";
						$lugares = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($lugares)) {
		            		echo '<option value="'.$valores[lugar].'">'.$valores[lugar].'</option>';
		          		}
						?>
					</select>
					<h3>Combi:</h3>
					<select id=combi type="text" class="campoTexto" name="combi">
						<option value=<?php echo'"'; echo $datos['combi']; echo '">';
						echo $datos['combi']; ?> </option>
						<?php
						$consulta = "SELECT identificacion FROM combis";
						$combis = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($combis)) {
		            		echo '<option value="'.$valores[identificacion].'">'.$valores[identificacion].'</option>';
		          		}
						?>
					</select>
				<?php
					echo '<h3>Km:</h3>
					<input id=km type="number" class="campoTexto" name="km" value="';
					echo $datos['km'];
					echo '">';

					echo '<h3>Duración:</h3>
					<input id=duracion type="text" class="campoTexto" name="duracion" value="';
					echo $datos['duracion'];
					echo '">'; ?>
					<br>
					<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<button class="baja" onclick= "if (confirm('Seguro que quieres dar de baja?')) window.location.href=
				<?php
				echo "'baja.php?tipo=4&id=$id'";
				echo'">DAR DE BAJA</button>';
			}
		}
				?>
			</div>
		<script type="text/javascript" src="scripts/script-agregarRuta.js"></script>
		<?php
	}
	function detalleViaje($id){
		$consulta= "SELECT * from viajes where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<form method="POST" onsubmit="return checkViaje()" action="db-modificarViaje.php?id=';
				echo $id; echo'">';?>
					<h3> Ruta </h3>
					<select id=ruta type="text" class="campoTexto" name="ruta">
						<option value=<?php echo'"'; echo $datos['idRuta']; echo '">';
						echo $datos['idRuta']; ?> </option>
						<?php
						$consulta = "SELECT idRuta FROM viajes";
						$rutas = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($rutas)) {
		            		echo '<option value="'.$valores[idRuta].'">'.$valores[idRuta].'</option>';
		          		}
						?>
					</select>
				<?php
					echo '<h3>Precio:</h3>
					<input id="precio" type="number" class="campoTexto" name="precio" value="';
					echo $datos['precio'];
					echo '">';
					echo '<h3>Fecha:</h3>
					<input id=fecha type="date" class="campoTexto" name="fecha" value="';
					echo $datos['fecha'];
					echo '">';
					echo '<h3>Hora:</h3>
					<input id="hora" type="text" class="campoTexto" name="hora" value="';
					echo $datos['hora'];
					echo '">';
					?>
					<br>
					<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<button class="baja" onclick= "if (confirm('Seguro que quieres dar de baja?')) window.location.href=
				<?php
				echo "'baja.php?tipo=5&id=$id'";
				echo'">DAR DE BAJA</button>';
			}
		}
				?>
			</div>
		<script type="text/javascript" src="scripts/script-agregarViaje.js"></script>
		<?php
	}

	function detalleInsumo($id){
		$consulta= "SELECT * from insumos where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<form method="POST" onsubmit="return checkInsumo()" action="db-modificarInsumo.php?id=';
				echo $id; echo'">';
					echo '<h3>Nombre:</h3>
					<input id="nombre" type="text" class="campoTexto" name="nombre" value="';
					echo $datos['nombre'];
					echo '">';
					echo '<h3>Precio:</h3>
					<input id="precio" type="number" class="campoTexto" name="precio" value="';
					echo $datos['precio'];
					echo '">';
					?>
					<h3>Tipo:</h3>
					<select id="tipo" type="text" class="campoTexto" name="tipo">
						<option value=<?php echo'"'; echo $datos['tipo']; echo '">';
								echo $datos['tipo']; ?> </option>
						<option value="SALADO">Salado</option>
						<option value="DULCE">Dulce</option>
					</select>
					<br>
					<input type="submit" value="GUARDAR" class="modificar" onclick="return confirm('¿Seguro que quieres modificar?')">
				</form>
				<button class="baja" onclick= "if (confirm('Seguro que quieres dar de baja?')) window.location.href=
				<?php
				echo "'baja.php?tipo=6&id=$id'";
				echo'">DAR DE BAJA</button>';
			}
		}
		?>
	</div>
	<script type="text/javascript" src="scripts/script-agregarInsumo.js"></script>
	<?php
	}

	function verDetalle($id,$tipo){
		if($tipo=='1'){
			detalleChofer($id);
		  }
		elseif ($tipo=='2'){
			detalleCombi($id);
		  }
		elseif ($tipo=='3'){
			detalleLugar($id);
		  }
		elseif ($tipo=='4'){
			detalleRuta($id);
		  }
		elseif ($tipo=='5'){
			detalleViaje($id);
		  }
		elseif ($tipo=='6'){
			detalleInsumo($id);
		  }
	}

	// ALTA ITEMS INVENTARIO //

	function insertarChofer($nombre,$apellido,$mail,$nacimiento,$telefono,$dni,$usuario,$clave){
		session_start();
		$consulta= "INSERT INTO usuarios(nombre, apellido, nombreusuario, email, dni, clave, nacimiento, tipo, gold) VALUES('$nombre','$apellido','$usuario','$mail','$dni','$clave','$nacimiento','2','0')";
		consultar($consulta);
		$nombrecompleto=$apellido.', '.$nombre;
		$consulta= "INSERT INTO choferes(nombrecompleto, nombre, apellido, email, telefono) VALUES('$nombrecompleto','$nombre','$apellido','$mail','$telefono')";
		consultar($consulta);
	}

	function insertarCombi($modelo,$patente,$asientos,$chofer,$tipo,$id){
		session_start();
		$consulta= "INSERT INTO combis(identificacion,modelo, patente, cantasientos, chofer, tipo) VALUES('$id','$modelo','$patente','$asientos','$chofer','$tipo')";
		consultar($consulta);
	}
	function insertarViaje($precio,$fecha,$hora,$ruta,$ins){
		session_start();
		$consulta= "INSERT INTO viajes(precio,fecha,hora,idRuta,estado,insumos) VALUES('$precio','$fecha','$hora','$ruta',1,'$ins')";
		consultar($consulta);
	}
	function insertarLugar($lugar,$provincia){
		session_start();
		$consulta= "INSERT INTO lugares(lugar, provincia) VALUES('$lugar','$provincia')";
		consultar($consulta);
	}
	function insertarInsumo($nombre,$precio,$tipo){
		session_start();
		$consulta= "INSERT INTO insumos(nombre,precio,tipo) VALUES('$nombre','$precio','$tipo')";
		consultar($consulta);
	}

	function insertarRuta($origen,$destino,$combi,$km,$duracion){
		session_start();
		$consulta= "INSERT INTO rutas(origen, destino, combi, km, duracion) VALUES('$origen','$destino','$combi','$km','$duracion')";
		consultar($consulta);
	}

	//UPDATES

	function updatearChofer($id,$nombre,$apellido,$mail,$telefono){
		session_start();
		$traer_datos="SELECT * from choferes where id='$id'";
		$datosviejos=consultar($traer_datos);
		foreach ($datosviejos as $datosviejos){
			$emailviejo= $datosviejos['email'];
		}
		$nombrecompleto=$apellido.', '.$nombre;
		$consulta= "UPDATE choferes SET nombrecompleto='$nombrecompleto', apellido='$apellido', nombre='$nombre', email='$mail', telefono='$telefono' WHERE (id='$id')";
		$respuesta=consultar($consulta);
		$consultaUsuario= "UPDATE usuarios SET email='$mail' , nombre='$nombre', apellido='$apellido' , email='$mail' where email='$emailviejo'";
		$respuestaUsuario=consultar($consultaUsuario);
			return true;
	}

	function updatearLugar($id, $lugar, $provincia){
		session_start();
		$consulta ="UPDATE lugares SET lugar='$lugar', provincia='$provincia' WHERE (id='$id')";
		$respuesta=consultar($consulta);
		if($respuesta){  
			return true; }
		else{ 
			return false;}
	}

	
	function updatearRuta($id, $origen, $destino, $combi, $km, $duracion){
		session_start();
		$consulta ="UPDATE rutas SET origen='$origen', destino='$destino', combi='$combi', km='$km', duracion= '$duracion'  WHERE (id='$id')";
		$respuesta=consultar($consulta);
		if($respuesta){  
			return true; }
		else{ 
			return false;}
	}

	function updatearCombi($id, $modelo, $patente, $cantasientos, $chofer, $tipo,$idex){
		session_start();
		$consulta ="UPDATE combis SET identificacion='$idex', modelo='$modelo', patente='$patente', cantasientos='$cantasientos', tipo='$tipo', chofer= '$chofer'  WHERE (identificacion='$id')";
		$respuesta=consultar($consulta);
		if($respuesta){  
			return true; }
		else{ 
			return false;}
	}

	function updatearViaje($id, $ruta, $precio, $fecha, $hora){
		session_start();
		$consulta ="UPDATE viajes SET idRuta='$ruta', precio='$precio', fecha='$fecha', hora='$hora' WHERE (id='$id')";
		$respuesta=consultar($consulta);
		if($respuesta){  
			return true; }
		else{ 
			return false;}
	}

	function updatearInsumo($id, $nombre, $precio, $tipo){
		session_start();
		$consulta ="UPDATE insumos SET nombre='$nombre', precio='$precio', tipo='$tipo' WHERE (id='$id')";
		$respuesta=consultar($consulta);
		if($respuesta){  
			return true; }
		else{ 
			return false;}
	}

	function agregarChofer(){
		?>
		<form method="POST" onsubmit="return checkChofer()" action="db-agregarChofer.php">
			<h3>Nombre:</h3>
			<input id="nombre" type="text" class="campoTexto" name="nombre">
			<h3>Apellido:</h3>
			<input id="apellido" type="text" class="campoTexto" name="apellido">
			<h3>Email:</h3>
			<input id="email" type="text" class="campoTexto" name="email">
			<br>
			<h3>Nacimiento:</h3>
			<input id="nacimiento" type="date" class="campoTexto" name="nacimiento">
			<h3>Telefono:</h3>
			<input id="telefono" type="text" class="campoTexto" name="telefono">
			<br>
			<h3>DNI:</h3>
			<input id="dni" type="text" class="campoTexto" name="dni">
			<br>
			<h3>Nombre de usuario:</h3>
			<input id="usuario" type="text" class="campoTexto" name="usuario">
			<br>
			<h3>Clave:</h3>
			<input id="clave" type="password" class="campoTexto" name="clave">
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarChofer.js"></script>
		<?php
	}

	function agregarCombi(){
		?>
		<form method="POST" onsubmit="return checkCombi()" action="db-agregarCombi.php">
			<h3> Modelo </h3>
			<input id="modelo" type="text" class="campoTexto" name="modelo">
			<h3>Patente:</h3>
			<input id="patente" type="text" class="campoTexto" name="patente">
			<h3>Cant Asientos:</h3>
			<input id="cantasientos" type="number" class="campoTexto" name="cantasientos">
			<h3>Identificacion</h3>
			<input id="id" type="text" class="campoTexto" name="id">
			<h3>Chofer:</h3>
			<select id="chofer" type="text" class="campoTexto" name="chofer">
				<option value="x">SELECCIONE UN CHOFER</option>
				<?php
				$consulta = "SELECT nombrecompleto FROM choferes";
				$choferes = consultar($consulta);
          		while ($valores = mysqli_fetch_array($choferes)) {
            		echo '<option value="'.$valores[nombrecompleto].'">'.$valores[nombrecompleto].'</option>';
          		}
				?>
			</select>
			<h3>Tipo:</h3>
			<input id=tipo type="text" class="campoTexto" name="tipo">
			<br>
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarCombi.js"></script>
	<?php
	}

	function agregarLugar(){
		?>
		<form method="POST" onsubmit="return checkLugar()" action="db-agregarLugar.php">
			<h3>Lugar:</h3>
			<input id=lugar type="text" class="campoTexto" name="lugar">
			<h3>Provincia:</h3>
			<input id=provincia type="text" class="campoTexto" name="provincia">
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarLugar.js"></script>
	<?php
	}

	function agregarRuta(){
		?>
		<form method="POST" onsubmit="return checkRuta()" action="db-agregarRuta.php">
			<h3> Origen </h3>
			<select id="origen" type="text" class="campoTexto" name="origen">
				<option value="x">SELECCIONE UN ORIGEN</option>
				<?php
				$consulta = "SELECT lugar FROM lugares";
				$lugares = consultar($consulta);
          		while ($valores = mysqli_fetch_array($lugares)) {
            		echo '<option value="'.$valores[lugar].'">'.$valores[lugar].'</option>';
          		}
				?>
			</select>
			<h3>Destino:</h3>
			<select id="destino" type="text" class="campoTexto" name="destino">
				<option value="x">SELECCIONE UN DESTINO</option>
				<?php
				$consulta = "SELECT lugar FROM lugares";
				$lugares = consultar($consulta);
          		while ($valores = mysqli_fetch_array($lugares)) {
            		echo '<option value="'.$valores[lugar].'">'.$valores[lugar].'</option>';
          		}
				?>
			</select>
			<h3>Combi:</h3>
			<select id="combi" type="text" class="campoTexto" name="combi">
				<option value="x">SELECCIONE UNA COMBI</option>
				<?php
				$consulta = "SELECT identificacion FROM combis";
				$combis = consultar($consulta);
          		while ($valores = mysqli_fetch_array($combis)) {
            		echo '<option value="'.$valores[identificacion].'">'.$valores[identificacion].'</option>';
          		}
				?>
			</select>
			<h3>Km:</h3>
			<input id="km" type="number" class="campoTexto" name="km">
			<h3>Duracion:</h3>
			<input id="duracion" type="text" class="campoTexto" name="duracion" placeholder="00:00:00">
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarRuta.js"></script>
	<?php
	}

	function agregarViaje(){
		?>
		<form method="POST" onsubmit="return checkRuta()" action="db-agregarViaje.php">
			<h3> Ruta </h3>
			<select id="ruta" type="text" class="campoTexto" name="ruta">
				<option value="x">SELECCIONE UNA RUTA</option>
				<?php
				$consulta = "SELECT * FROM rutas";
				$rutas = consultar($consulta);
          		while ($valores = mysqli_fetch_array($rutas)) {
            		echo '<option value="'.$valores[id].'">'.$valores[origen].' ---> '.$valores[destino].'</option>';
          		}
				?>
			</select>
			<h3>Precio:</h3>
			<input id="precio" type="number" class="campoTexto" name="precio">
			<h3>Fecha:</h3>
			<input id="fecha" type="date" class="campoTexto" name="fecha">
			<h3>Hora:</h3>
			<input id="hora" type="text" class="campoTexto" name="hora" placeholder="hs:mn:sg">
			<h3>Insumos:</h3>
				<?php
				$consulta = "SELECT * FROM insumos";
				$insumos = consultar($consulta);
          		while ($valores = mysqli_fetch_array($insumos)) {
					  echo '
					  <input type="checkbox" name="insu[]" value="';
					  echo $valores['id'];
					  echo'">';
					  echo $valores['nombre'];
					  echo '</input>
';
          		}
				  echo'<br>';
				?>
			</select>
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarRuta.js"></script>
	<?php
	}
	function agregarInsumo(){
		?>
		<form method="POST" onsubmit="return checkInsumo()" action="db-agregarInsumo.php">
			<h3>Nombre:</h3>
			<input id=nombre type="text" class="campoTexto" name="nombre">
			<h3>Precio:</h3>
			<input id=precio type="number" class="campoTexto" name="precio">
			<h3>Tipo:</h3>
			<select id="tipo" type="text" class="campoTexto" name="tipo">
				<option value="SALADO">Salado</option>
				<option value="DULCE">Dulce</option>
			</select>
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarInsumo.js"></script>
	<?php
	}
	function agregar($tipo){
		switch($tipo){
			case 1:
				agregarChofer();
				break;
		  	case 2:
				agregarCombi();
				break;
			case 3:
				agregarLugar();
				break;
			case 4:
				agregarRuta();
				break;
			case 5:
				agregarViaje();
				break;
		    case 6:
				agregarInsumo();
                break;
		}
	}

?>