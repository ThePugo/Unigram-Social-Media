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
                    <li>Ver mi perfil</li>
                    <li>Mis publicaciones</li>
                    <li>Mis historias</li>
                    <li>Mis followers</li>
                    <li>Mensajes</li>
                    <div class="cerrarsesionli">
                        <li><a href="BD2X7682807/cierresesion.php">Cerrar sesion</a></li>
                    </div> 
            </div>  
        </div>
        <div class="postbox">
            <div class="center">
                <center>
                    <h1>Publica algo</h1><br>
                </center>
                    <form method="post" action="BD243224428/insertPublicacion.php">
                        <textarea name = "publicacion" required maxlength="200"></textarea><br>
                        <center>
                            <input type="submit" value="Publicar" class="roundborder">
                        </center>
                        <input type="hidden" value=<?php echo $array["idPerfil"]?> name="idPerfil">
                    </form>
            </div>
        </div>
        
    </body>

    <?php
        }
        else{
        ?>
            <html>
                <form method="post" action="BD243224428/insertPerfil.php">
                    PARECE QUE ES TU PRIMERA VEZ. CREA TU PERFIL<br>
                    Nombre: <input type="text" value="", name="nombre"><br>
                    Apellidos: <input type="text" value="", name="apellidos"><br>
                    Genero: <input type="text" value="", name="genero"><br>
                    Edad: <input type="number" value="", name="edad"><br>
                    <input type="hidden" value=<?php echo $user?> name="nombreUsuario">
                    <input type="submit" value="Publicar">
                </form>
            </html>
        <?php
        }
    ?>
</html>