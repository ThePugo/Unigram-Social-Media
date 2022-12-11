<html>
    <?php
        $idPublicacion=$_GET['id'];
        include "../conexiones.php";
        $consulta="SELECT * FROM publicacion WHERE idPublicacion2='$idPublicacion'";
        $c=mysqli_query($conexio,$consulta);
        if (mysqli_num_rows($c)==0) {
            $string="DELETE from publicacion WHERE idPublicacion='$idPublicacion'";
            $insert=mysqli_query($conexio,$string);
            ?>
            <head>
                <meta http-equiv="refresh" content="0;url=../principal.php" />
            </head>
            <?php
        }
        else {
            echo "NO SE PUEDE BORRAR UNA PUBLICACIÓN QUE TIENE REENVÍOS";
            ?>
            <head>
                <meta http-equiv="refresh" content="2;url=../principal.php" />
            </head>
            <?php
        }
    ?>
</html>
