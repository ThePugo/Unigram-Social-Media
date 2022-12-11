<html>
    <?php
        $idPublicacion=$_GET['id'];
        $string="DELETE from publicacion WHERE idPublicacion='$idPublicacion'";
        include "../conexiones.php";
        $insert=mysqli_query($conexio,$string);
    ?>
    <head>
        <meta http-equiv="refresh" content="0;url=../principal.php" />
    </head>
</html>