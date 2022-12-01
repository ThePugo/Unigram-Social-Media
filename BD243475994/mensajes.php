<!DOCTYPE html>
<html>
    <head>
        <title>Mensajes</title>
        <link rel="stylesheet" type="text/css" href="mensajesstyle.css">
    </head>
<div class = "usersbox">
    <?php
        session_start();
        $nombreusuario = $_SESSION['nombreUsuario'];
        include "../conexiones.php";
        $stringPublicacion="SELECT nombreUsuario FROM usuario ORDER BY nombreusuario ASC";
        $nombresusuarios=mysqli_query($conexio,$stringPublicacion);
        while($reg=mysqli_fetch_array($nombresusuarios)){
            if($reg["nombreUsuario"]!=$nombreusuario){?>
                <button id="userbox">
                    <a href="verMensajes.php" class="linksmessage"><?php echo $reg["nombreUsuario"] ?></a>
                </button>
            <?php
            }
        }
    ?>
</div>
</html>


