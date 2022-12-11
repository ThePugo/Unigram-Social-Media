<html>
    <?php
        $idHistoria=$_GET['id'];
        $string="DELETE from historia WHERE idHistoria='$idHistoria'";
        include "../conexiones.php";
        $insert=mysqli_query($conexio,$string);
    ?>
    <head>
        <meta http-equiv="refresh" content="0;url=../principal.php" />
    </head>
</html>