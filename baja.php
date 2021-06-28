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
        $verificacion2 = "SELECT * from rutas where (origen='$lugar') or (destino='$lugar')";
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
           $usuario = $resultado['usuario'];
        }
        $verificacion2 = "SELECT * from combis where (chofer='$usuario')";
        $resultado2= consultar($verificacion2);
        if(isset($resultado2)){
            foreach ($resultado2 as $resultado2){
                $usuario2 = $resultado2['chofer'];
             }
            }
        if(isset($usuario2)){
            echo'<script> alert ("Este chofer esta a cargo de una combi, no se puede eliminar");</script>';
            include "pagina-homeAdmin.php";
            return false;
        }
        else{
            $consulta0="DELETE from usuarios where (nombreusuario='$usuario')";
            consultar($consulta0);
            $consulta="DELETE from choferes where (id='$id')";
        }
    }
    elseif($tipo=='4'){
        $consulta = "SELECT * FROM viajes WHERE idRuta=$id";
        $resultados = consultar($consulta);
        if($resultados){
            foreach ($resultados as $resultado){
                $ruta = $resultado['idRuta'];
            }
            if(isset($ruta)){
                echo'<script> alert ("Esta ruta forma parte de un viaje, no se puede eliminar");</script>';
                include "pagina-homeAdmin.php";
                return false;
            }
            else{
                $consulta="DELETE from rutas where (id='$id')";
            }
        } 
    }
    elseif ($tipo=='5'){
        $consulta="DELETE from viajes where (id='$id')";
    }
    elseif ($tipo=='6'){
        $consulta = "SELECT * FROM viajes";
        $resultados = consultar($consulta);
        if($resultados){
            foreach ($resultados as $resultado){
                $insumos = $resultado['insumos'];
                $str_arr = explode (",", $insumos);
                foreach ($str_arr as $str_arr) {
                    if($str_arr==$id){
                        echo'<script> alert ("Esta insumo forma parte de un viaje, no se puede eliminar");</script>';
                        include "pagina-homeAdmin.php";
                        return false;
                    }
                }
            }
            $consulta="DELETE from insumos where (id='$id')";
        }
    }
$resultado= consultar($consulta);
header("location: pagina-homeAdmin.php?#eliminado");
?>