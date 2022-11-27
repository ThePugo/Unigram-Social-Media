<html>
    <!-- INSERTA EN LA BASE DE DATOS (CON SQL) LOS DATOS QUE ENCUENTRA EN EL FORM-->
    <head>
        <meta http-equiv="refresh" content="2;url=principal.htm" />
    </head>
    <?php
        $descripcion = $_POST["publicacion"];
        $fechaCreacion = date('d-m-y h:i:s');
        $propmasc = $_GET["propmasc"];
        $string="INSERT into mascota set nommasc = \"$nommasc\", tipusmasc = \"$tipusmasc\", propmasc = \"$propmasc\"";
        if ($nommasc=="" || $tipusmasc=="" || $propmasc=="") {
            echo "FALTAN DATOS MI COMPADRE METELOS BIEN DUROS AHI";
        } else {
            echo $string;
            include "20220925conexiones.php";
            $insert=mysqli_query($conexio,$string);
        }
    ?>
</html>