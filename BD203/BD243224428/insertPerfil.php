<html>
    <!-- INSERTA EN LA BASE DE DATOS (CON SQL) LOS DATOS QUE ENCUENTRA EN EL FORM-->
    <head>
        <meta http-equiv="refresh" content="2;url=../BD2X7682807/principal.php" />
    </head>
    <?php
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $genero= $_POST["genero"];
        $edad= $_POST["edad"];
        $nombreUsuario=$_POST["nombreUsuario"];
        $string="INSERT into perfil set nombre = \"$nombre\", apellidos = \"$apellidos\", genero = \"$genero\", edad = \"$edad\", nombreUsuario = \"$nombreUsuario\"";
        if ($edad=="" || $nombreUsuario=="") {
            echo "FALTAN DATOS MI COMPADRE METELOS BIEN DUROS AHI";
        } else {
            echo "Creando perfil...";
            include "../BD2X7682807/conexiones.php";
            $insert=mysqli_query($conexio,$string);
        }
    ?>
</html>