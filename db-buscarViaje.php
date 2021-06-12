<?php
  if (!empty($_POST['origen']) && !empty($_POST['destino']) && !empty($_POST['fecha'])){
      $origen=$_POST['origen'];
      $destino=$_POST['destino'];
      $fecha=$_POST['fecha'];
      header("location: pagina-listarViajes.php?o=$origen&d=$destino&f=$fecha");
  }
  else{
    header("location: pagina-listarViajes.php?#errorLugares");
  }

?>