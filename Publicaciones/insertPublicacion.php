<html>
    <!-- INSERTA EN LA BASE DE DATOS (CON SQL) LOS DATOS QUE ENCUENTRA EN EL FORM-->
    <head>
        <meta http-equiv="refresh" content="2;url=../Red-Social/principal.php" />
    </head>
    <?php
        $descripcion = $_POST["publicacion"];
        $fechaCreacion = date('d-m-y h:i:s');
        $idPerfil = $_POST["idPerfil"];
        $string="INSERT into publicacion set descripcion = \"$descripcion\", fechaCreacion = \"$fechaCreacion\", idPerfil = \"$idPerfil\"";
        if ($descripcion=="" || $fechaCreacion=="" || $idPerfil=="") {
            echo "FALTAN DATOS MI COMPADRE METELOS BIEN DUROS AHI";
        } else {
            echo $string;
            include "../Red-Social/conexiones.php";
            $insert=mysqli_query($conexio,$string);
        }
    ?>
</html>