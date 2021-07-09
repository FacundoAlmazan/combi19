<?php
    $chofer=$_POST['chofer'];
    $origen=$_POST['origen'];
    $destino=$_POST['destino'];
    $fecha1=$_POST['fecha1'];
    $fecha2=$_POST['fecha2'];
    header("location: pagina-reporteViajes.php?c=$chofer&o=$origen&d=$destino&f1=$fecha1&f2=$fecha2");
?>