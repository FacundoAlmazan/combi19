<?php
	include_once "db-funciones.php";
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$nacimiento = $_POST["nacimiento"];
	$telefono = $_POST["telefono"];
	$dni = $_POST["dni"];
	$user = $_POST["usuario"];
	$clave = $_POST["clave"];
	$nombreValidacion="ASDASKDALhasjdhasjkdasjd";
	$emailValidacion="ASDASKDALhasjdhasjkdasjd";

	$consulta= "SELECT * from usuarios where nombreusuario='$user'";
	$respuesta= consultar($consulta);
	if($respuesta){
	  	foreach ($respuesta as $respuesta) {
		 	$nombreValidacion = $respuesta['nombreusuario'];
	  	}
	}
	if($user == $nombreValidacion){
		header("location: pagina-agregar.php?tipo=1#errorUsuario");
	}
	else{
        $consulta= "SELECT * from usuarios where dni='$dni'";
        $respuesta= consultar($consulta);
        if($respuesta){
            foreach ($respuesta as $respuesta) {
                $dniValidacion= $respuesta['dni'];
            }
        }
        if($dni == $dniValidacion){
            header("location: pagina-agregar.php?tipo=1#dniRepetido");
        }
        else{
            $consulta= "SELECT email FROM usuarios where email='$email'";
            $respuesta= consultar($consulta);
            if($respuesta){
                foreach ($respuesta as $respuesta) {
                    $emailValidacion= $respuesta['email'];
                }
            }
            if($email == $emailValidacion){
                header("location: pagina-agregar.php?tipo=1#errorMail");
            }
            else{
                insertarChofer($nombre, $apellido, $email, $nacimiento, $telefono, $dni, $user, $clave); 
                header("location: pagina-agregar.php?tipo=1#agregado");
            }
        }
	}
?>