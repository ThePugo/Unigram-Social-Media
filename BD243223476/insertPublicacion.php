<html>
    <!-- INSERTA EN LA BASE DE DATOS (CON SQL) LOS DATOS QUE ENCUENTRA EN EL FORM-->
    <head>
        <meta http-equiv="refresh" content="0;url=../principal.php" />
    </head>
    <?php
        $descripcion = $_POST["publicacion"];
        date_default_timezone_set('Europe/Madrid');
        $fechaCreacion = date('Y-m-d H:i:s');
        $nombreUsuario = $_POST["nombreUsuario"];
        $string="INSERT into publicacion set descripcion = \"$descripcion\", fechaCreacion = \"$fechaCreacion\", nombreUsuario = \"$nombreUsuario\"";
        if ($descripcion=="" || $fechaCreacion=="" || $nombreUsuario=="") {
            echo "FALTAN DATOS MI COMPADRE METELOS BIEN DUROS AHI";
        } else {
            include "../conexiones.php";
            $insert=mysqli_query($conexio,$string);
        }
    ?>
</html>
