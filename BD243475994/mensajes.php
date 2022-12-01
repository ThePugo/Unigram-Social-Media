<!DOCTYPE html>
<html>
    <head>
        <title>Mensajes</title>
        <link rel="stylesheet" type="text/css" href="mensajesstyle.css">
    </head>
    
    <body>
        <div class = "usersbox" style="overflow-y:auto;">
            <div class = "messagetitle"><h1>Mis mensajes</h1>
                <a href="../principal.php">
                    <button id="homebutton">
                    </button>
                </a>
            </div>
            <?php
                session_start();
                $nombreusuario = $_SESSION['nombreUsuario'];
                include "../conexiones.php";
                $stringPublicacion="SELECT nombreUsuario FROM usuario ORDER BY nombreusuario ASC";
                $nombresusuarios=mysqli_query($conexio,$stringPublicacion);
                while($reg=mysqli_fetch_array($nombresusuarios)){
                    if($reg["nombreUsuario"]!=$nombreusuario){?>
                        <button id="userbox">
                            <a href="verMensajes.php?receptor=<?php echo $reg["nombreUsuario"] ?>" class="linksmessage"><?php echo $reg["nombreUsuario"] ?></a>
                        </button>
                    <?php
                    }
                }
            ?>
        </div>
    </body>    

</html>


