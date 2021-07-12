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
	function EnviarRegistro($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento,$gold,$tarjeta){
		$validacion="SELECT * from usuarios where nombreusuario=$user";
		$resultadoValidacion=consultar($validacion);
    	if ($resultadoValidacion== null){
			$consulta="INSERT into usuarios(nombre,apellido,nombreusuario,email,dni,clave,nacimiento,tipo,gold,tarjeta) VALUES ('$nombre','$apellido','$user','$email','$dni','$pass','$nacimiento','1','$gold','$tarjeta')";
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
					echo $respuesta['nombre'];
					echo " APELLIDO:";
					echo $respuesta['apellido'];
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
							$str= $str . "(" . $resultadoIns['nombre'].")";

						}
					}
					$strInsumos=rtrim($str,"+");
					echo $strInsumos;
					echo " ASIENTOS:";
					echo $respuesta['asientos'];echo "/"; echo $respuesta['asientosDisp'];
				echo "</p></div></a>";
		   	}
		}
		if(mysqli_num_rows ($rest) === 0){
			echo '<h2 style="color:white">No hay viajes en el catálogo</h2>';
		}
	}
	function listarViajesUsuario(){
		$consulta= "SELECT * from viajes where estado='1' and asientosDisp>0";
		$respuesta=consultar($consulta);
		$rest= $respuesta;
		if($respuesta){
			foreach ($respuesta as $respuesta){
			   	echo '<a class="item"';
				echo' href="pagina-comprarViaje.php?idViaje=';
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
					if(!isset($_SESSION)){
						session_start();
					 }
					 if($_SESSION['gold']==1){
						 echo '<strike>';
						 echo $respuesta['precio'];
						 echo '</strike>';
						 echo '->';
						 $precio=$respuesta['precio'];
						 $descuento= $precio*0.1;
						 $precio= $precio-$descuento;
						 echo $precio;
					 }
					 else{
					 echo'<p>';
					 echo $respuesta['precio'];
					 echo '</p>';}
					echo " FECHA:";
					echo $respuesta['fecha'];
					echo" HORA:";
					echo $respuesta['hora'];
					echo " ASIENTOS DISPONIBLES:";
                     echo $respuesta['asientosDisp'];
				echo "</p></div></a>";
		   	}
		}
		if(mysqli_num_rows ($rest) === 0){
			echo '<h2 style="color:white">No hay viajes en el catálogo</h2>';
		}
	}

	function listarBusqueda($o,$d,$f){
		$consulta= "SELECT * from viajes where (estado='1' and asientosDisp>0 and fecha='$f')";
		$respuesta=consultar($consulta);
		$rest= $respuesta;
		if(!empty($respuesta)){
			foreach ($respuesta as $respuesta){
				$rutId=$respuesta['idRuta'];
				$consulta22="SELECT * from rutas where id='$rutId'";
				$respuesta22= consultar($consulta22);
				foreach($respuesta22 as $respuesta22){
					$origen=$respuesta22['origen'];
					$destino=$respuesta22['destino'];
				}
				if($origen== $o && $destino==$d){
			   	echo '<a class="item"';
				echo' href="pagina-comprarViaje.php?idViaje=';
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
					if(!isset($_SESSION)){
						session_start();
					 }
					 if($_SESSION['gold']==1){
						 echo '<strike>';
						 echo $respuesta['precio'];
						 echo '</strike>';
						 echo '->';
						 $precio=$respuesta['precio'];
						 $descuento= $precio*0.1;
						 $precio= $precio-$descuento;
						 echo $precio;
					 }
					 else{
					 echo'<p>';
					 echo $respuesta['precio'];
					 echo '</p>';}
					echo " FECHA:";
					echo $respuesta['fecha'];
					echo" HORA:";
					echo $respuesta['hora'];
					echo " ASIENTOS DISPONIBLES:";
                     echo $respuesta['asientosDisp'];
				echo "</p></div></a>";
					 }
					 else{
						echo'<h4 style="color:white"> No se encontraron resultados para su busqueda  </h4>';
					 }
		   	}
		}
		else{
			echo "<h3> No se encontraron resultados para su busqueda </h3>";
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
					if(!isset($_SESSION['id'])){
						session_start();
					}
					$_SESSION['idUserChofer']=$datos['idUsuario'];
					
					echo '">
					<h3>Email:';
					echo '</h3>
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
					if(!isset($_SESSION['id'])){
						session_start();
					}
					$_SESSION['idCombi']=$datos['identificacion'];
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
						$consulta = "SELECT usuario FROM choferes";
						$choferes = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($choferes)) {
							if($valores[usuario] != $datos['chofer']){
		            		echo '<option value="'.$valores[usuario].'">'.$valores[usuario].'</option>';}
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
				echo '<form method="POST" onsubmit="return checkRuta()" action="db-modificarRuta.php?id=';
				echo $id; echo'">';?>
					<h3> Origen </h3>
					<select id=origen type="text" class="campoTexto" name="origen">
						<option value=<?php echo'"'; echo $datos['origen']; echo '">';
						echo $datos['origen']; ?> </option>
						<?php
						$consulta = "SELECT * FROM lugares";
						$lugares = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($lugares)) {
							if($valores['lugar'] != $datos['origen']){
								echo '<option value="';
								echo $valores['lugar'];
								echo "-";
								echo $valores['id'];
								echo '"';
								echo ">";
								echo $valores['lugar'];
								echo '</option>';}
		          		}
						?>
					</select>
					<h3>Destino:</h3>
					<select id=destino type="text" class="campoTexto" name="destino">
						<option value=<?php echo'"'; echo $datos['destino']; echo '">';
						echo $datos['destino']; ?> </option>
						<?php
						$consulta = "SELECT * FROM lugares";
						$lugares = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($lugares)) {
							if($valores['lugar'] != $datos['destino']){
		            		echo '<option value="';
							echo $valores['lugar'];
							echo "-";
							echo $valores['id'];
							echo '"';
							echo ">";
							echo $valores['lugar'];
							echo '</option>';}
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
							if($valores[identificacion] != $datos[combi]){
		            		echo '<option value="'.$valores[identificacion].'">'.$valores[identificacion].'</option>';}
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
					<h3> ID ruta </h3>
					<select id=ruta type="text" class="campoTexto" name="ruta">
						<option value=<?php echo'"'; echo $datos['idRuta']; echo '">';
						echo $datos['idRuta']; ?> </option>
						<?php
						$consulta = "SELECT id FROM rutas";
						$rutas = consultar($consulta);
		          		while ($valores = mysqli_fetch_array($rutas)) {
							if($valores[id] != $datos[idRuta]){
		            		echo '<option value="'.$valores[id].'">'.$valores[id].'</option>';}
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
						<?php
						if($datos['tipo']=="SALADO"){
							echo'<option value="DULCE">DULCE</option>';}
						else{
							echo'<option value="SALADO">SALADO</option>';}
						?>
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
		$consulta="SELECT MAX(id) AS id FROM usuarios";
					$respuesta= consultar($consulta);
                    foreach($respuesta as $respuesta){
						$idUltimo=$respuesta['id'];
					}
		$nombrecompleto=$apellido.', '.$nombre;
		$consulta= "INSERT INTO choferes(nombre, apellido,usuario, email, telefono, idUsuario) VALUES('$nombre','$apellido','$usuario','$mail','$telefono','$idUltimo')";
		consultar($consulta);
	}

	function insertarCombi($modelo,$patente,$asientos,$chofer,$tipo,$id){
		session_start();
		$consulta= "INSERT INTO combis(identificacion,modelo, patente, cantasientos, chofer, tipo) VALUES('$id','$modelo','$patente','$asientos','$chofer','$tipo')";
		consultar($consulta);
	}
	function insertarViaje($precio,$fecha,$hora,$ruta,$ins,$cant){
		session_start();
		$consulta= "INSERT INTO viajes(precio,fecha,hora,idRuta,estado,insumos,asientos,asientosDisp) VALUES('$precio','$fecha','$hora','$ruta',1,'$ins','$cant','$cant')";
		consultar($consulta);
	}
	function insertarComentario($mensaje){
       session_start();
	   $id= $_SESSION['id'];
	   $consulta= "INSERT INTO comentarios(comentario,idUser) VALUES ('$mensaje','$id')";
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
    function insertarPasaje($MiId, $idViaje, $str){
		$consulta= "SELECT * from viajes where id='$idViaje'";
		$resultado= consultar($consulta);
		foreach ($resultado as $resultado){
			$pasajes= $resultado['asientosDisp'];
		}
		$pasajes= $pasajes-1;
		$consulta ="UPDATE viajes SET asientosDisp= '$pasajes'  WHERE (id='$idViaje')";
		$resultado= consultar($consulta);
		$consulta1="INSERT INTO pasajes(idViaje,idUsuario,insumos) VALUES ('$idViaje','$MiId','$str')";
		$resultado1= consultar($consulta1);
	}
	function insertarRuta($origen,$destino,$combi,$km,$duracion,$idO,$idD){
		session_start();
		$consulta= "INSERT INTO rutas(origen, destino, combi, km, duracion , idOrigen , idDestino) VALUES('$origen','$destino','$combi','$km','$duracion','$idO','$idD')";
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
		$consulta= "UPDATE choferes SET nombre='$nombre', apellido='$apellido', email='$mail', telefono='$telefono' WHERE (id='$id')";
		$respuesta=consultar($consulta);
		$consultaUsuario= "UPDATE usuarios SET nombre='$nombre', apellido='$apellido' , email='$mail' where email='$emailviejo'";
		$respuestaUsuario=consultar($consultaUsuario);
	}

	function updatearLugar($id, $lugar, $provincia){
		session_start();
		$consulta ="UPDATE lugares SET lugar='$lugar', provincia='$provincia' WHERE (id='$id')";
		$respuesta=consultar($consulta);
	}

	
	function updatearRuta($id, $origen, $destino, $combi, $km, $duracion, $orId,$desId){
		session_start();
		$consulta ="UPDATE rutas SET origen='$origen', destino='$destino', combi='$combi', km='$km', duracion= '$duracion', idOrigen='$orId', idDestino='$desId'  WHERE (id='$id')";
		$respuesta=consultar($consulta);
	}

	function updatearCombi($id, $modelo, $patente, $cantasientos, $chofer, $tipo,$idex){
		session_start();
		$consulta ="UPDATE combis SET identificacion='$idex', modelo='$modelo', patente='$patente', cantasientos='$cantasientos', tipo='$tipo', chofer= '$chofer'  WHERE (identificacion='$id')";
		$respuesta=consultar($consulta);
	}

	function updatearViaje($id, $ruta, $precio, $fecha, $hora){
		session_start();
		$consulta ="UPDATE viajes SET idRuta='$ruta', precio='$precio', fecha='$fecha', hora='$hora' WHERE (id='$id')";
		$respuesta=consultar($consulta);
	}

	function updatearInsumo($id, $nombre, $precio, $tipo){
		session_start();
		$consulta ="UPDATE insumos SET nombre='$nombre', precio='$precio', tipo='$tipo' WHERE (id='$id')";
		$respuesta=consultar($consulta);
	}

	function updatearUsuario($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento){
		$gold= $_SESSION['gold'];
		$tipo= $_SESSION['tipo'];
		$id=$_SESSION['id'];
		$consulta="UPDATE usuarios SET nombre='$nombre',apellido='$apellido',nombreusuario='$user',email='$email',dni='$dni',clave='$pass',nacimiento='$nacimiento',tipo='$tipo',gold='$gold' where (id='$id')";
		$resultado=consultar($consulta);
	}
	
	function updatearComentario($mensaje, $idComentario){
		session_start();
		$consulta= "UPDATE comentarios SET comentario='$mensaje' WHERE (id='$idComentario')";
		consultar($consulta);
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
				$consulta = "SELECT usuario FROM choferes";
				$choferes = consultar($consulta);
          		while ($valores = mysqli_fetch_array($choferes)) {
            		echo '<option value="'.$valores[usuario].'">'.$valores[usuario].'</option>';
          		}
				?>
			</select>
			<h3>Tipo:</h3>
			<input id="tipo" type="text" class="campoTexto" name="tipo">
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
			<input id="lugar" type="text" class="campoTexto" name="lugar">
			<h3>Provincia:</h3>
			<input id="provincia" type="text" class="campoTexto" name="provincia">
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
				$consulta = "SELECT * FROM lugares";
				$lugares = consultar($consulta);
          		while ($valores = mysqli_fetch_array($lugares)) {
					echo '<option value="';
					echo $valores['lugar'];
					echo "-";
					echo $valores['id'];
					echo '"';
					echo ">";
					echo $valores['lugar'];
					echo '</option>';
				}
          		
				?>
			</select>
			<h3>Destino:</h3>
			<select id="destino" type="text" class="campoTexto" name="destino">
				<option value="x">SELECCIONE UN DESTINO</option>
				<?php
				$consulta = "SELECT * FROM lugares";
				$lugares = consultar($consulta);
          		while ($valores = mysqli_fetch_array($lugares)) {
					echo '<option value="';
					echo $valores['lugar'];
					echo "-";
					echo $valores['id'];
					echo '"';
					echo ">";
					echo $valores['lugar'];
					echo '</option>';}
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
		<form method="POST" onsubmit="return checkViaje()" action="db-agregarViaje.php">
			<h3> ID ruta </h3>
			<select id="ruta" type="text" class="campoTexto" name="ruta">
				<option value="x">SELECCIONE UN ID DE RUTA</option>
				<?php
					$consulta = "SELECT id FROM rutas";
					$rutas = consultar($consulta);
					while ($valores = mysqli_fetch_array($rutas)) {
						echo '<option value="'.$valores[id].'">'.$valores[id].'</option>';
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
					  echo '</input>';
          		}
				  echo'<br>';
				?>
			</select>
			<br>
			<input type="submit" value="AGREGAR" class="modificar">
		</form>
	</div>
	<script type="text/javascript" src="scripts/script-agregarViaje.js"></script>
	<?php
	}
	function agregarInsumo(){
		?>
		<form method="POST" onsubmit="return checkInsumo()" action="db-agregarInsumo.php">
			<h3>Nombre:</h3>
			<input id="nombre" type="text" class="campoTexto" name="nombre">
			<h3>Precio:</h3>
			<input id="precio" type="number" class="campoTexto" name="precio">
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
	function verViaje($id){
		$consulta= "SELECT * from viajes where (id='$id')";
		$respuesta = consultar($consulta);
		$datos = $respuesta;
		if($respuesta){
			foreach ($datos as $datos){
				echo '<h3>Ruta:</h3>
					 <div class="column">
					<p>Origen : ';
					$idR=$datos['idRuta'];
					$consulta1= "SELECT * from rutas where id='$idR'";
					$ans=consultar($consulta1);
					foreach($ans as $ans){
						echo $ans['origen']. "      Destino:" . $ans['destino'];
					}
					echo '<h3>Precio:</h3>';
					if(!isset($_SESSION)){
                       session_start();
					}
					if($_SESSION['gold']==1){
						echo '<strike>';
						echo $datos['precio'];
						echo '</strike>';
						echo '->';
						$precio=$datos['precio'];
						$descuento= $precio*0.1;
						$precio= $precio-$descuento;
						echo $precio;
					}
					else{
				    echo'<p>';
					echo $datos['precio'];
					echo '</p>';}
					echo '<h3>Fecha:</h3>
					<p>';
					echo $datos['fecha'];
					echo '</p>';
					echo '<h3>Hora:</h3>
					<p>';
					echo $datos['hora'];
					echo '</p>';
					echo "<h3> Insumos Disponibles:</h3>";
					$str=" ";
					$insumos=explode(",",$datos['insumos']);
					if(!isset($_SESSION)){
						session_start();
					 }
					 if($_SESSION['gold']==1){
					foreach ($insumos as $insumos){
						$insumoInt= (int)$insumos;
						$consultaIns= "SELECT * from insumos where id='$insumoInt'";
						$resultadoIns= consultar($consultaIns);
						foreach($resultadoIns as $resultadoIns){
							$precioIns=$resultadoIns['precio'];
							$descuentoIns = $precioIns * 0.1;
							$precioIns= $precioIns - $descuentoIns;
							$str= $str . " " . $resultadoIns['nombre']."(".$precioIns."$)/";


						}
					}
				}
				else{
					foreach ($insumos as $insumos){
						$insumoInt= (int)$insumos;
						$consultaIns= "SELECT * from insumos where id='$insumoInt'";
						$resultadoIns= consultar($consultaIns);
						foreach($resultadoIns as $resultadoIns){
							$str= $str . " " . $resultadoIns['nombre']."(".$resultadoIns['precio']."$)/";

						}
					}
				}
					$strInsumos=rtrim($str,"/");
					echo $strInsumos;
					?>
					<br>
				<?php
			}
		}
				?>
			</div>
		<script type="text/javascript" src="scripts/script-agregarViaje.js"></script>
		<?php
	}

    function listarPasajerosCovid(){
        $counter=0;
        $datetime1 = new DateTime('2009-10-11');
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $back= date("Y-m-d",strtotime('-30 days'));
        $consulta="SELECT * FROM usuarios WHERE fechaCovid != '0000-00-00'";
        $respuesta=consultar($consulta);
        if (mysqli_num_rows($respuesta) != 0){
			foreach ($respuesta as $respuesta){
                if($respuesta['fechaCovid']>=$back){
                    echo '<a class="item">';
                    echo' <div class="column">
                        <p>usuario:';
                        echo $respuesta['nombreusuario'];
                    echo "</p></div></a>";
                    $counter++;
                }
		   	}
		}
        if($counter==0){
            echo'<h3 style="color:white"> No hubieron usuarios rechazados por covid en los ultimos 30 días </h2>';
        }
	}

    function filtrarReporte($c,$o,$d,$f1,$f2){
        if($f1 != 'X' && $f2 != 'X'){
            $consulta1= "SELECT * FROM viajes WHERE (fecha>='$f1' AND fecha<='$f2')";
            $respuesta1=consultar($consulta1);
            if(mysqli_num_rows($respuesta1) != 0){
                foreach ($respuesta1 as $respuesta1){
                    $boo=true;
                    $str = "Fecha:'".$respuesta1['fecha'];
				    $rutId=$respuesta1['idRuta'];
                    $consulta2="SELECT * FROM rutas WHERE id='$rutId'";
                    $respuesta2= consultar($consulta2);
                    if(mysqli_num_rows($respuesta2) != 0){
                        foreach($respuesta2 as $respuesta2){
                            $origen=$respuesta2['origen'];
                            $destino=$respuesta2['destino'];
                            if(($o != 'X') && ($d != 'X')){                     //SI ESTAN SETEADOS EL ORIGEN Y DESTINO BUSCO VIAJES CON ESE ORIGEN Y DESTINO 
                                if($origen== $o && $destino==$d){  
                                    $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                }
                                else{
                                    $boo=false;
                                }
                            }
                            else{
                                if($o != 'X' && $d == 'X'){              //SI SOLO ESTA SETEADO EL ORIGEN BUSCO VIAJES CON ESE ORIGEN Y CUALQUIER DESTINO
                                    if($origen== $o){
                                        $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                    }
                                    else{
                                        $boo=false;
                                    }
                                }
                                else{
                                    if($o == 'X' && $d != 'X'){         //SI SOLO ESTA SETEADO EL DESTINO BUSCO VIAJES CON ESE DESTINO Y CUALQUIER ORIGEN
                                        if($destino== $d){
                                            $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                        } 
                                        else{
                                            $boo=false;
                                        }
                                    }
                                    else{
                                        if(($o == 'X' && $o == 'X')){   //SI NO ESTA SETEADO EL ORIGEN NI EL DESTINO BUSCO CUALQUIER VIAJE
                                            $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                        }
                                        else{
                                            $boo=false;
                                        }
                                    }
                                }
                            }
                            $combiId=$respuesta2['combi'];
                            $consulta3= "SELECT * FROM combis WHERE (identificacion = '$combiId')";
                            $respuesta3= consultar($consulta3);
                            if(mysqli_num_rows($respuesta3) != 0){
                                foreach($respuesta3 as $respuesta3){
                                    $chofer=$respuesta3['chofer'];
                                    if($c != 'X'){
                                        if($chofer != $c){
                                            $boo=false;
                                        }
                                    } 
                                    $str = $str. " Chofer:'$chofer'";
                                }
                            }
                        }
                    }
                    if($boo){
                        echo "<a class='item'><p style='font-size:18px'>$str</p></a>";
                    }
                    else{
                        echo'<h3 style="color:white"> No hay viajes que coincidan con los criterios de búsqueda </h3>';
                        break;
                    }
		        }
            }
        }
        else{
            $consulta1= "SELECT * FROM viajes";
            $respuesta1=consultar($consulta1);
            if(mysqli_num_rows($respuesta1) != 0){
                foreach ($respuesta1 as $respuesta1){
                    $boo=true;
                    $str = "Fecha:'".$respuesta1['fecha'];
				    $rutId=$respuesta1['idRuta'];
                    $consulta2="SELECT * FROM rutas WHERE id='$rutId'";
                    $respuesta2= consultar($consulta2);
                    if(mysqli_num_rows($respuesta2) != 0){
                        foreach($respuesta2 as $respuesta2){
                            $origen=$respuesta2['origen'];
                            $destino=$respuesta2['destino'];
                            if(($o != 'X') && ($d != 'X')){                     //SI ESTAN SETEADOS EL ORIGEN Y DESTINO BUSCO VIAJES CON ESE ORIGEN Y DESTINO 
                                if($origen== $o && $destino==$d){  
                                    $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                }
                                else{
                                    $boo=false;
                                }
                            }
                            else{
                                if($o != 'X' && $d == 'X'){              //SI SOLO ESTA SETEADO EL ORIGEN BUSCO VIAJES CON ESE ORIGEN Y CUALQUIER DESTINO
                                    if($origen== $o){
                                        $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                    }
                                    else{
                                        $boo=false;
                                    }
                                }
                                else{
                                    if($o == 'X' && $d != 'X'){         //SI SOLO ESTA SETEADO EL DESTINO BUSCO VIAJES CON ESE DESTINO Y CUALQUIER ORIGEN
                                        if($destino== $d){
                                            $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                        } 
                                        else{
                                            $boo=false;
                                        }
                                    }
                                    else{
                                        if(($o == 'X' && $o == 'X')){   //SI NO ESTA SETEADO EL ORIGEN NI EL DESTINO BUSCO CUALQUIER VIAJE
                                            $str = $str. "' Origen:'$origen' Destino:'$destino'";
                                        }
                                        else{
                                            $boo=false;
                                        }
                                    }
                                }
                            }
                            $combiId=$respuesta2['combi'];
                            $consulta3= "SELECT * FROM combis WHERE (identificacion = '$combiId')";
                            $respuesta3= consultar($consulta3);
                            if(mysqli_num_rows($respuesta3) != 0){
                                foreach($respuesta3 as $respuesta3){
                                    $chofer=$respuesta3['chofer'];
                                    if($c != 'X'){
                                        if($chofer != $c){
                                            $boo=false;
                                        }
                                    } 
                                    $str = $str. " Chofer:'$chofer'";
                                }
                            }
                        }
                    }
                    if($boo){
                        echo "<a class='item'><p style='font-size:18px'>$str</p></a>";
                    }
                    else{
                        echo'<h3 style="color:white"> No hay viajes que coincidan con los criterios de búsqueda </h3>';
                        break;
                    }
		        }
            }
        }
	}
?>