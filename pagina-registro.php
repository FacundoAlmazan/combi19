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
        <input id="nacimiento" type="text" class="campoTexto" onfocus="(this.type='date')" name="nacimiento" placeholder="Ingrese su fecha de nacimiento">
        <input id="user" type="text" class="campoTexto" name="username" placeholder="Ingrese nombre de usuario">
        <!-- ENTRADA DE CONTRASEÑA -->
        <input id="pw" type="password" class="campoTexto" name="password" placeholder="Ingrese contraseña">

    
        <style>
          .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 4px;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            height:28px;
          }

          .active, .collapsible:hover {
            background-color: #555;
          }

          .content {
            margin:20px;
            padding: 0 18px;
            display: none;
            overflow: hidden;
          }
        </style>
        <p>¿Sabías que con nuestra membresia GOLD accedes a 10% de descuento en todos nuestros servicios?</p>
        <button type="button" class="collapsible">Comprar membresia GOLD</button>
        <div class="content" style="width: 88%">
          <H4>Sea un miembro GOLD de Combi19 por $300ARS/mes. </H4>
          <input id="numTarjeta" type="text" class="campoTexto" name="numTarjeta" placeholder="Ingrese su número de tarjeta">
          <input id="claveTarjeta" type="password" class="campoTexto" name="claveTarjeta" placeholder="Ingrese la clave de su tarjeta">
          <input id="vencimientoTarjeta" type="text" class="campoTexto" name="vencimientoTarjeta" onfocus="(this.type='date')" placeholder="Ingrese la fecha de vencimiento de la tarjeta">
          <input id="nombreTarjeta" type="text" class="campoTexto" name="nombreTarjeta" placeholder="Ingrese su nombre y apellido">
        </div>

        <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
        </script>
        <br>
        <br>
        <!-- SUBMIT -->
        <input type="submit" value="Ingresar">
      </form>
      <a href="index.php"> Volver a inicio de sesión </a>
      </div>
    </div>
    <script src="scripts/script-registro.js"></script> 
  </body>
</html>
