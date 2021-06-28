<?php 
    include_once "db-funciones.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $numTarjeta = $_POST['numTarjeta'];
    $claveTarjeta = $_POST['claveTarjeta'];
    $nombreTarjeta = $_POST['nombreTarjeta'];
    $dniValidacion= 1;
    $gold = 0;
    $nombreValidacion="ASDASKDALhasjdhasjkdasjd";
    $emailValidacion="ASDASKDALhasjdhasjkdasjd";
    $nacimiento=$_POST['nacimiento'];
    $consulta= "SELECT * from usuarios where nombreusuario='$user'";
    $respuesta= consultar($consulta);
    if($respuesta){
        foreach ($respuesta as $respuesta) {
        $nombreValidacion= $respuesta['nombreusuario'];
        }
    }
    if($user == $nombreValidacion){
        include("pagina-registro.php");
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
    else{
        $consulta= "SELECT * from usuarios where dni='$dni'";
        $respuesta= consultar($consulta);
        if($respuesta){
            foreach ($respuesta as $respuesta) {
                $dniValidacion= $respuesta['dni'];
            }
        }
        if($dni == $dniValidacion){
            include("pagina-registro.php");
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
        else{
            $consulta= "SELECT email FROM usuarios where email='$email'";
            $respuesta= consultar($consulta);
            if($respuesta){
                foreach ($respuesta as $respuesta) {
                    $emailValidacion= $respuesta['email'];
                }
            }
            if($email == $emailValidacion){
                include("pagina-registro.php");
                ?>
                <script> alert("El mail ya se encuentra en uso");
                document.getElementById("email").focus();
                document.getElementById("nombre").value= <?php echo json_encode($nombre); ?>;
                document.getElementById("apellido").value= <?php echo json_encode($apellido); ?>;
                document.getElementById("user").value= <?php echo json_encode($user); ?>;
                document.getElementById("dni").value= <?php echo json_encode($dni); ?>;
                document.getElementById("nacimiento").value= <?php echo json_encode($nacimiento); ?>;
                document.getElementById("pw").value= <?php echo json_encode($pass); ?>;
                </script>
                <?php
            }
            else{
                if(!empty($numTarjeta) && !empty($claveTarjeta) && !empty($nombreTarjeta)){
                    $gold=1;
                }
                if(empty($numTarjeta)){
                    $numTarjeta="a";
                }
                EnviarRegistro($nombre,$apellido,$user,$email,$dni,$pass,$nacimiento,$gold,$numTarjeta);
            }
        }
    }
?>