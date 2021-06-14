<?php
include_once "db-funciones.php";
class autenticacion {  
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
                $_SESSION['email']=$datos_usuario['email'];
                $tipo=$_SESSION['tipo'];
                switch($tipo){
                  case 1:
                    header("location: pagina-homeUsuario.php");
                    break;
                  case 2:
                    header("location: pagina-homeChofer.php");
                    break;
                  case 3:
                    header("location: pagina-homeAdmin.php");
                    break;
                }
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

    function validar_sesion() { 
        if (!isset($_SESSION)){
            session_start();
        } 
        if (!isset($_SESSION['id'])){
            ?>
            <script>
                alert("No hay una sesion iniciada");
                window.location.href = "cerrarSesion.php"
            </script>
            <?php
        }
    }

    function validar_rol($rol){
        if($_SESSION['tipo']!=$rol){
            ?>
            <script>
                alert("no tienes el rol para acceder a esta locacion");
                window.location.href = "cerrarsec.php"
            </script>
            <?php
        } 
    }
} 
?>               