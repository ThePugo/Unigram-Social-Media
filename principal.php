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
        $string="SELECT * FROM perfil WHERE nombreUsuario='$user'";
        $consulta=mysqli_query($conexio,$string);
        $array=mysqli_fetch_array($consulta);
        if (mysqli_num_rows($consulta)!=0 && isset($user)) {
    ?>

    <body>
        <div class="headerbox">  
            <?php echo "<h1>Bienvenido, $user</h1>";?>   
            <div class="navbar">
                <ul>
                    <li><a href="BD243223476/verPerfilPersonal.php?nombredeusuario=<?php echo $user ?>" class="linksnavbar">Ver mi perfil</a></li>
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
                        <textarea name = "publicacion" required maxlength="200"></textarea><br>
                        <center>
                            <input type="submit" value="Publicar" class="roundborder">
                        </center>
                        <input type="hidden" value=<?php echo $array["idPerfil"]?> name="idPerfil">
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
                    $idPerfil=$reg["idPerfil"];
                    $stringUsuario="SELECT nombreUsuario FROM perfil WHERE idPerfil='$idPerfil'";
                    $usuarioPublicado=mysqli_query($conexio,$stringUsuario);
                    $usuario=mysqli_fetch_array($usuarioPublicado);
                    #ENLACE A PERFIL
                    echo "<a href='BD243223476/verPerfilUsuario.php?nombredeusuario=$usuario[nombreUsuario]' class=linksposts>$usuario[nombreUsuario]</a>";?><br><br>
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
    
    
    <?php
        // En caso de que el usuario no tenga un perfil creado:
        // Se le redirigirá a un form para que cree su perfil
        }
        else{ 
            header("Location: BD243224428/profileform.php");
        }
    ?>
</html>