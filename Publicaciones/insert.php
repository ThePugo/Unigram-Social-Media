 <html>
    <!-- INSERTA EN LA BASE DE DATOS (CON SQL) LOS DATOS QUE ENCUENTRA EN EL FORM (MASCALTA.PHP)-->
    <head>
        <meta http-equiv="refresh" content="2;url=principal.htm" />
    </head>
    <?php
        $nommasc = $_GET["nommasc"];
        $tipusmasc = $_GET["tipusmasc"];
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