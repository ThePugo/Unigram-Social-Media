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
        if (mysql_num_rows($consulta)==0 && isset($user)) {
    ?>

    <body>
        <div class="headerbox">  
            <?php echo "<h1>Bienvenido, $user</h1>";?>   
            <div class="navbar">
                <ul>
                    <li>Ver mi perfil</li>
                    <li>Mis publicaciones</li>
                    <li>Mis historias</li>
                    <li>Mis followers</li>
                    <li>Mensajes</li>
                    <div class="cerrarsesionli">
                        <li><a href="cierresesion.php">Cerrar sesion</a></li>
                    </div> 
            </div>  
        </div>
        <div class="postbox">
            <div class="center">
                <center>
                    <h1>Publica algo</h1><br>
                </center>
                    <form method="post" action="insertPublicacion.php">
                        <textarea name = "publicacion" required maxlength="200"></textarea><br>
                        <center>
                            <input type="submit" value="Publicar" class="roundborder">
                        </center>
                    </form>
            </div>
        </div>
    </body>

    <?php
        }
        else{
        ?>
            <html>
                <form method="post" action="insertPerfil.php">
                    Nombre: <input type="text" value="", name="nombre"><br>
                    Apellidos: <input type="text" value="", name="apellidos"><br>
                    Genero: <input type="text" value="", name="genero">
                    Edad: <input type="number" value="", name="edad">
                    Nombre de Usuario= <input type="text" value=<?php$user?>, name="nombreUsuario">
                    <input type="submit" value="Publicar">
                </form>
            </html>
        <?php
        }
    ?>
</html>