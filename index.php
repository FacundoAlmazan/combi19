<!DOCTYPE html >
<html >
  <head>
    <meta charset="utf-8">
    <title> Iniciar sesion </title>
    <link rel="stylesheet" href="estilo-login.css"> <!-- CAMBIO: Adaptar link a CSS -->
  </head>
  <body>
    <div class="login-box">
      <img src="img/avatar.png" class="avatar" alt="Imagen Avatar"> <!-- CAMBIO: Adaptar imagen -->
      <h1> Iniciar sesion </h1>
      <form  method="POST" name="registro" onsubmit="return checkLogin()" <?php // es la funcion js// ?>action="db-ValidarLogin.php" <?php // esto es php// ?>>
        <!-- ENTRADA DE NOMBRE DE USUARIO -->
        <input id="user" type="text" class="campoTexto" name="username" placeholder="Ingrese nombre de usuario">

        <!-- ENTRADA DE CONTRASEÑA -->
        <input id="pw" type="password" class="campoTexto" name="password" placeholder="Ingrese contraseña">

        <!-- SUBMIT -->
        <a href="index_inicio.php"> 
        <input type="submit" value="Ingresar">
        </a>
      </form>
      <a href="pagina-registro.php"> Aun no tiene un usuario? Registrese!</a>
    </div>
    <script src="scripts/script-login.js"></script> 
  </body>
</html>