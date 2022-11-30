<!DOCTYPE html>
<html>
    <head>
        <title>Pagina principal</title>
        <link rel="stylesheet" type="text/css" href="principalstyle.css">
    </head>


    <?php
        session_start();
        $user = $_SESSION["nombreUsuario"];
        include "conexiones.php";
    ?>

    <body>
        <div class="headerbox">  
            <?php echo "<h1>Bienvenido, $user</h1>";?>   
            <div class="navbar">
                <ul>
                    <li><a href="BD243224428/verPerfil.php?nombredeusuario=<?php echo $user ?>" class="linksnavbar">Ver mi perfil</a></li>
                    <li>Mis publicaciones</li>
                    <li>Mis historias</li>
                    <li>Mis followers</li>
                    <li>Mensajes</li>
                    <div class="cerrarsesionli">
                        <li><a href="BD2X7682807/cierresesion.php" class="linksnavbar">Cerrar sesion</a></li>
                    </div> 
            </div>  
        </div>
        <div class="postbox">
            <div class="center">
                <center>
                    <h1>Publica algo</h1><br>
                </center>
                    <form method="post" action="BD243223476/insertPublicacion.php">
                        <textarea name = "publicacion" required maxlength="255"></textarea><br>
                        <center>
                            <input type="submit" value="Publicar" class="roundborder">
                        </center>
                        <input type="hidden" value=<?php echo $user?> name="nombreUsuario">
                    </form>
            </div>
        </div>
        <div class="feed">
            <center>
                ACTIVIDAD
            </center>
            <?php
                $stringPublicacion="SELECT * FROM publicacion ORDER BY fechaCreacion DESC";
                $publicaciones=mysqli_query($conexio,$stringPublicacion);
                while($reg=mysqli_fetch_array($publicaciones)){
            ?>
            <div class="post">
                <?php
                    $nusuario=$reg["nombreUsuario"];
                    #ENLACE A PERFIL?>
                    <a href="BD243224428/verPerfil.php?nombredeusuario=<?php echo $nusuario ?>" class="linksposts"><?php echo $nusuario ?></a><br><br>
                    <?php echo $reg["descripcion"];?>
                    <div class="date">
                        <?php echo $reg["fechaCreacion"];?>
                    </div>
            </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>