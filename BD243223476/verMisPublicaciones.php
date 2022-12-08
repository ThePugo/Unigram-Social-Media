<html>
    <head>
        <title>Mis publicaciones</title>
        <link rel="stylesheet" type="text/css" href="publicacionesstyle.css">
    </head>
<?php
    include "../conexiones.php";
    session_start();
    $nombreUsuario=$_SESSION['nombreUsuario'];
    $query="SELECT * FROM publicacion WHERE nombreUsuario='$nombreUsuario' ORDER BY fechaCreacion DESC";
    $consulta=mysqli_query($conexio,$query);?>
    <button onclick="location.href = '../principal.php';" style="position:relative;border:none;background-color:lightsteelblue;"><img src="../BD243224428/home.png" height="50px"></img></button>
    <center><h1>Mis publicaciones</h1></center>
    <?php
    while($reg=mysqli_fetch_array($consulta)) {
        ?>
        <div class="post">
            <?php
                $nusuario=$reg["nombreUsuario"];
                #ENLACE A PERFIL?>
                <a href="../BD243224428/verPerfil.php?nombredeusuario=<?php echo $nusuario ?>" class="linksposts"><?php echo $nusuario ?></a><br><br>
                <?php echo $reg["descripcion"];?>
                <div class="date">
                    <?php echo $reg["fechaCreacion"];?>
                </div>
        </div>
        <?php
            }
    ?>
</html>
