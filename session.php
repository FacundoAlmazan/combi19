<?php
include_once "db-funciones.php";
class autenticacion {  
    
    function verificarRol($rol){
        if($_SESSION['rol']!=$rol){
          ?>
          <script>
            alert("no tienes el rol para acceder a esta locacion");
            window.location.href = "cerrarsec.php"
          </script>
          <?php
        } 
      }
    function autenticar_usuario() { 
		  if (!isset($_SESSION)) session_start(); 
      if (!isset($_SESSION['id'])) throw new Exception();
    }

    function validar_usuario($user,$pass){
    $consulta = "SELECT * FROM usuarios where nombreusuario = '$user'";
    $resultado = consultar($consulta);
    $cant= mysqli_num_rows($resultado);
    if ($cant>0){
            $datos_usuario = mysqli_fetch_array($resultado); 
            if($datos_usuario['clave'] == $pass){ //Si todo sale bien 
              session_start();
              $_SESSION['gold']= $datos_usuario['gold'];
              $_SESSION['name']= $datos_usuario['nombre'];
              $_SESSION['apellido']= $datos_usuario['apellido'];
              $_SESSION['id']= $datos_usuario['id'];
              $_SESSION['tipo']=$datos_usuario['tipo'];
              $_SESSION['nombreusuario']=$datos_usuario['nombreusuario'];
              if ($_SESSION['tipo'] == 1) include "homeUsuario.php";
              elseif($_SESSION['tipo'] == 2) include "homeChofer.php";
              elseif($_SESSION['tipo'] == 3) include "pagina-homeAdmin.php";
              return true;
            }
            else{
              include "index.php";
              echo '<script language="javascript">alert("Clave incorrecta");</script>';
              return false;
            }
          }
            else{
              include "index.php";
              echo '<script language="javascript">alert("No se encontro el nombre de usuario");</script>';
              return false;
            }
    }
} 

?>               