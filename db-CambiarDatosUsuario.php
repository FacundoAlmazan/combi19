<?php 
    if (!isset($_SESSION)){
        session_start();
    }
    include_once "db-funciones.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $nacimiento=$_POST['nacimiento'];
    $userActual= $_SESSION['nombreusuario'];
    $emailActual= $_SESSION['email'];
    $id=$_SESSION['id'];
    $nombreValidacion="ASDSADSADSA";
    $dniValidacion="ASDSADASDSAS";
    if( $user !=  $userActual){
        $consulta= "SELECT * from usuarios where nombreusuario='$user' and id<>'$id'";
        $result= consultar($consulta);
        $respuesta= consultar($consulta);
        if($respuesta){
            foreach ($respuesta as $respuesta) {
            $nombreValidacion= $respuesta['nombreusuario'];
            }
        }
        if($user == $nombreValidacion){
            include("pagina-perfil.php");
            ?>
            <script> alert("El usuario ya existe");
            document.getElementById("user").focus();
            document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
            document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
            document.getElementById("email").value= <?php echo json_encode($email); ?>;
            document.getElementById("dni").value= <?php echo json_encode($dni); ?>;
            document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
            document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
            </script>
            <?php
        }
        else{ //Si no se encontro un usuario igual al que puso
            $consulta= "SELECT * from usuarios where dni='$dni' and id<>'$id'";
            $result= consultar($consulta);
            $respuesta= $result;
            if($respuesta){
                foreach ($respuesta as $respuesta) {
                $dniValidacion= $respuesta['dni'];
                }
            }
            if($dni == $dniValidacion){
                include("pagina-perfil.php");
                ?>
                <script> alert("El dni ya se encuentra en uso");
                    document.getElementById("dni").focus();
                    document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
                    document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
                    document.getElementById("email").value= <?php echo json_encode($email); ?>;
                    document.getElementById("user").value= <?php echo json_encode($user); ?>;
                    document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
                    document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
                </script>
                <?php
            }
            else{ //Si no se encontro un DNI igual al que puso
                if($email != $emailActual){ //Si cambio la direccion de mail
                    $consultaMail= "SELECT * from usuarios where email='$email' and id<>'$id'";
                    $respM= consultar($consultaMail);
                    $respuestaMail = $respM;
                    if(mysqli_num_rows ($respuestaMail) === 0){ //Si no se encontro un mail igual al que ingreso
                        updatearUsuario($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento);
                        header("location: pagina-perfil.php#modificado");
                    }
                    else{ //Si se encontraron mails iguales
                        include("pagina-perfil.php");
                        ?>
                        <script> alert("El mail ya existe");
                        document.getElementById("dni").focus();
                        document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
                        document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
                        document.getElementById("email").value= <?php echo json_encode($email); ?>;
                        document.getElementById("user").value= <?php echo json_encode($user); ?>;
                        document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
                        document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
                        </script>
                        <?php
                    }
                }
                else{
                    updatearUsuario($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento);
                    header("location: pagina-perfil.php#modificado");
                }
            }
        }
    }
    else{ //Si no modifico el usuario
        $consulta= "SELECT * from usuarios where dni='$dni' and id<>'$id'";
        $result= consultar($consulta);
        $respuesta= $result;
        if($respuesta){
            foreach ($respuesta as $respuesta) {
            $dniValidacion= $respuesta['dni'];
            }
        }
        if($dni == $dniValidacion){
            include("pagina-perfil.php");
            ?>
            <script> alert("El dni ya se encuentra en uso");
                document.getElementById("dni").focus();
                document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
                document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
                document.getElementById("email").value= <?php echo json_encode($email); ?>;
                document.getElementById("user").value= <?php echo json_encode($user); ?>;
                document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
                document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
            </script>
            <?php
        }
        else{ //Si no se encontro un DNI igual al que puso
            if($email != $emailActual){ //Si cambio la direccion de mail
                $consultaMail= "SELECT * from usuarios where email='$email' and id<>'$id'";
                $respM= consultar($consultaMail);
                $respuestaMail = $respM;
                if(mysqli_num_rows ($respuestaMail) === 0){ //Si no se encontro un mail igual al que ingreso
                    updatearUsuario($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento);
                    header("location: pagina-perfil.php#modificado");
                }
                else{ //Si se encontraron mails iguales
                    include("pagina-perfil.php");
                    ?>
                    <script> alert("El mail ya existe");
                    document.getElementById("dni").focus();
                    document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
                    document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
                    document.getElementById("email").value= <?php echo json_encode($email); ?>;
                    document.getElementById("user").value= <?php echo json_encode($user); ?>;
                    document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
                    document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
                    </script>
                    <?php
                }
            }
            else{
                updatearUsuario($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento);
                header("location: pagina-perfil.php#modificado");
            }
        }
    }
?>