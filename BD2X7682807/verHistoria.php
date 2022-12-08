<!DOCTYPE html>
<html>
    <head>
        <title>Publicaciones de la historia</title>
        <link rel="stylesheet" type="text/css" href="storystyle.css">
    </head>
    <?php
        include "../conexiones.php";
        // Obtenemos el id pasado por enlace tras clickar el boton de "Ver publicaciones"
        $id = $_GET["id"];
        $stringPosts = "SELECT * FROM publicacion WHERE idHistoria = $id ORDER BY fechaCreacion DESC";
        $posts = mysqli_query($conexio,$stringPosts);
        
        // Vemos si la historia tiene publicaciones o no
        $numrows = mysqli_num_rows($posts);
        if($numrows == 0){
    ?>
    <div class="nopostsmessage">
        <div class="center">
            <h1>¡Vaya! Esta historia no tiene publicaciones aun</h1>
            <center>
                <h2>Prueba con crear una</h2><br>
                <button id="createbutton" onclick="location.href = '../principal.php';">Volver a Pagina Principal</button>
            </center>
        </div>
    </div>
    <?php }
        else{
        // Mostrar las publicaciones
        while($reg = mysqli_fetch_array($posts)){
    ?>     
    <div class="poststorybox">
        <h2><a href="../BD243224428/verPerfil.php?nombredeusuario=<?php echo $reg["nombreUsuario"] ?>" class="linksposts"><?php echo $reg["nombreUsuario"]?></a></h2>
        <div class="desc">
            <?php echo $reg["descripcion"];?>
        </div>
        <div class="date">
            <?php echo $reg["fechaCreacion"];?>
        </div>
    </div>
    <?php
        // End WHILE
        }
    ?>
    <center>
        <button id="returnbutton" onclick="location.href = '../principal.php';">Volver a Pagina principal</button>
    </center>
    <?php
        // End ELSE
        }
    ?>    
    
   
</html>