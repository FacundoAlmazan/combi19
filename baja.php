<?php 
 include_once"db-funciones.php";
$tipo=$_GET['tipo'];
$id=$_GET['id'];
    if($tipo=='3'){
        $verificacion="SELECT * from lugares where (id='$id')";
        $resultado = consultar($verificacion);
        foreach ($resultado as $resultado){
           $lugar = $resultado['lugar'];
        }
        $verificacion2 = "SELECT * from rutas where (origen='$lugar') or (destino='lugar')";
        $resultado2= consultar($verificacion2);
        if(isset($resultado2)){
            foreach ($resultado2 as $resultado2){
                $nombre = $resultado2['origen'];
             }
            }
        if(isset($nombre)){
            echo'<script> alert ("Este lugar forma parte de una/s ruta/s, no se puede eliminar");</script>';
            include "pagina-homeAdmin.php";
            return false;
        }
        else{
        $consulta= "DELETE from lugares where (id='$id')";
    }
}
    elseif($tipo=='2'){
        $verificacion2 = "SELECT * from rutas where (combi='$id')";
        $resultado= consultar($verificacion2);
        if($resultado){
            foreach ($resultado as $resultado){
                $nombre = $resultado['origen'];
             }
        if(isset($nombre)){
            echo'<script> alert ("Esta combi forma parte de una/s ruta/s, no se puede eliminar");</script>';
            include "pagina-homeAdmin.php";
            return false;
        }
        else{
        $consulta="DELETE from combis where (identificacion='$id')";
    }
}
}
    elseif($tipo=='1'){
        $verificacion="SELECT * from choferes where (id='$id')";
        $resultado = consultar($verificacion);
        foreach ($resultado as $resultado){
           $nombre = $resultado['nombrecompleto'];
        }
        $verificacion2 = "SELECT * from combis where (chofer='$nombre')";
        $resultado2= consultar($verificacion2);
        if(isset($resultado2)){
            foreach ($resultado2 as $resultado2){
                $nombre2 = $resultado2['chofer'];
             }
            }
        if(isset($nombre2)){
            echo'<script> alert ("Este chofer esta a cargo de una combi, no se puede eliminar");</script>';
            include "pagina-homeAdmin.php";
            return false;
        }
        else{
            $consulta="DELETE from choferes where (id='$id')";
        }
    }
    elseif($tipo=='4'){
        $consulta="DELETE from rutas where (id='$id')";
    }
    elseif ($tipo=='5'){
        
    }
$resultado= consultar($consulta);
include "pagina-homeAdmin.php";
?>