<?php 
  include_once "db-funciones.php";
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $dni=$_POST['dni'];
  $nombreValidacion="ASDASKDALhasjdhasjkdasjd";
  $nacimiento=$_POST['nacimiento'];
  $consulta= "SELECT * from usuarios where nombreusuario='$user'";
  $respuesta= consultar($consulta);
  if($respuesta){
    foreach ($respuesta as $respuesta) {
       $nombreValidacion= $respuesta['nombreusuario'];
    }
  }
  if($user == $nombreValidacion){
    include("pagina-registro.php");
    ?>
    <script> alert("El usuario ya existe");
    document.getElementById("user").focus();
    document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
    document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
    document.getElementById("email").value= <?php echo json_encode($email); ?>;
    document.getElementById("dni").value= <?php echo json_encode($dni); ?>;
    document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
    document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
    </script>
    <?php
  }
  else{
  EnviarRegistro($nombre,$apellido,$user,$email,$user,$pass,$nacimiento);
  }
?>