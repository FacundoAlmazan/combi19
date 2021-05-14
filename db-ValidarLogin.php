<?php 
include_once "session.php"; 
$user = $_POST['username'];
$pass = $_POST['password'];
$a = new autenticacion();
$a->validar_usuario($user,$pass);
?>