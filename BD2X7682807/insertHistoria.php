<html>
    <head>
        <meta http-equiv="refresh" content="2;url=historias.php" />
    </head>
    <?php
        session_start();
        $user = $_SESSION["nombreUsuario"];
        include "../conexiones.php";

        $privada = $_POST["priv"];
       
        if($privada == "0"){
            $privada = false;
        }
        else if($privada == "1"){
            $privada = true;
        }
        $descripcion = $_POST["desc"];
        date_default_timezone_set('Europe/Madrid');
        $fechaHistoria = date('Y-m-d H:i:s');

        $string= "INSERT into historia set privada= \"$privada\", descripcion= \"$descripcion\", fechaHistoria=\"$fechaHistoria\", nombreUsuario=\"$user\"";
        $insert = mysqli_query($conexio,$string);
        echo "Creando historia..."
    ?>
</html>