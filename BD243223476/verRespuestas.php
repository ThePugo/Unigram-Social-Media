<html>
    <head>
        <title>Mis Respuestas</title>
        <link rel="stylesheet" type="text/css" href="respuestasstyle.css">
    </head>

    <?php
    # Generar String para la consulta
    include "../conexiones.php";
    session_start();
    $idPubli = $_GET["id"];
    $query = "SELECT * FROM respuesta WHERE idPublicacion='$idPubli' ORDER BY fechaRespuesta DESC";
    $consulta = mysqli_query($conexio,$query); 
    ?>

    <button onclick="location.href = '../principal.php';" style="position:relative;border:none;background-color:lightsteelblue;"><img src="../BD243224428/home.png" height="50px"></img></button>
    <center><h1>Respuestas</h1></center>
    <?php
    while($reg=mysqli_fetch_array($consulta)) {
        ?>
        <div class="replybox">
            <?php
                $nusuario=$reg["nombreUsuario"];
                #ENLACE A PERFIL?>
                <a href="../BD243224428/verPerfil.php?nombredeusuario=<?php echo $nusuario ?>" class="linksposts"><?php echo $nusuario ?></a><br><br>
                <?php echo $reg["respuesta"];?>
                <div class="date">
                    <?php echo $reg["fechaRespuesta"];?>
                </div>
        </div>
        <?php
            }
    ?>
</html>