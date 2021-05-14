<?php 
  include_once "db-funciones.php";
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $dni=$_POST['dni'];
  $nacimiento=$_POST['nacimiento'];
  EnviarRegistro($nombre,$apellido,$user,$email,$user,$pass,$nacimiento);
?>