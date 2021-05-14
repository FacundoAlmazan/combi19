<!DOCTYPE html >
<html >
  <head>
    <meta charset="utf-8">
    <title> Formulario de registro </title>
    <link rel="stylesheet" href="estilo-login.css"> <!-- CAMBIO: Adaptar link a CSS -->
  </head>
  <body>
    <div class="login-box">
      <img src="img/avatar.png" class="avatar" alt="Imagen Avatar"> <!-- CAMBIO: Adaptar imagen -->
      <h1> Registrarse </h1>
      <form  method="POST" name="registro" onsubmit="return checkRegister()" action="db-ValidarRegistro.php">
        <!-- ENTRADA DE NOMBRE DE USUARIO -->
        <input id="nombre" type="text" class="campoTexto" name="nombre" placeholder="Ingrese su nombre">
        <input id="apellido" type="text" class="campoTexto" name="apellido" placeholder="Ingrese su apellido">
        <input id="email" type="email" class="campoTexto" name="email" placeholder="Ingrese su email">
        <input id="dni" type="number" maxlength="8" class="campoTexto" name="dni" placeholder="Ingrese su DNI">
        <input id="nacimiento" type="date" class="campoTexto" name="nacimiento" placeholder="Ingrese su fecha de nacimiento">
        <input id="user" type="text" class="campoTexto" name="username" placeholder="Ingrese nombre de usuario">
        <!-- ENTRADA DE CONTRASEÑA -->
        <input id="pw" type="password" class="campoTexto" name="password" placeholder="Ingrese contraseña">

        <!-- SUBMIT -->
        <a href="index_inicio.php"> 
        <input type="submit" value="Ingresar">
        </a>
      </form>
      <p>¿Sabías que con nuestra membresia GOLD accedes a 10% de descuento en todos nuestros servicios?</p>
      <div class="gold-div">
      <button class="gold-button"> Comprar membresia GOLD </button>
      </div>
    </div>
    <script src="scripts/script-registro.js"></script> 
  </body>
</html>
