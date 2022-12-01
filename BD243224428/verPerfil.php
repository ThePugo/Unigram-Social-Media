<html>
    <head>
        <title><?php
            $x=$_GET['nombredeusuario'];
            echo $x;
            ?>
        </title>
        <link rel="stylesheet" type="text/css" href="profileStyle.css">
    </head>

    <?php
        include "../conexiones.php";
        session_start();
        $a=$_SESSION['nombreUsuario'];
        $query1 = mysqli_query($conexio,"SELECT COUNT(nombreUsuario) FROM publicacion WHERE nombreUsuario='$x' AND idHistoria IS NULL");
        $query2 = mysqli_query($conexio,"SELECT COUNT(nombreUsuario2) FROM r_follower WHERE nombreUsuario2='$x'");
        $query3 = mysqli_query($conexio,"SELECT COUNT(nombreUsuario1) FROM r_follower WHERE nombreUsuario1='$x'");
        $query4 = mysqli_query($conexio,"SELECT * FROM usuario WHERE nombreUsuario='$x'");
        $query5 = mysqli_query($conexio,"SELECT * FROM r_follower WHERE nombreUsuario1='$a'");
        $numPublicaciones = mysqli_fetch_array($query1);
        $numFollowers= mysqli_fetch_array($query2);
        $numFollowed= mysqli_fetch_array($query3);
        $datos= mysqli_fetch_array($query4);
    ?>

    <div class="profileBox">
        <div class="profileinfo">
            <?php echo $x ?><br><br>
            <?php echo $numPublicaciones["COUNT(nombreUsuario)"] ?> publicacion/es&emsp;●&emsp;
            <?php echo $numFollowers["COUNT(nombreUsuario2)"] ?> seguidores&emsp;●&emsp;
            <?php echo $numFollowed["COUNT(nombreUsuario1)"] ?> seguidos
            <br><br>
            <?php echo $datos["nombre"].' '.$datos["apellidos"] ?>&emsp;●&emsp;
            <?php echo $datos["genero"] ?>&emsp;●&emsp;
            <?php echo $datos["edad"] ?> años
            <br><br>
            <p class="biografia"><?php echo $datos["biografia"]?></p>
        </div>
        <p class="userimage">
            <button onclick="location.href = '../principal.php';" id="homeButton"></button>
        </p>
        <?php
            #USUARIO PASADO POR PARÁMETRO ES IGUAL AL USUARIO DE LA SESIÓN
            if ($x == $a) {
            ?>
                <a href="modificarPerfil.php?nombreusuarioriginal=<?php echo $datos["nombreUsuario"]?>
                &passwordoriginal=<?php echo $datos["password"]?>&nombreoriginal=<?php echo $datos["nombre"]?>
                &apellidosoriginales=<?php echo $datos["apellidos"]?>&generoriginal=<?php echo $datos["genero"]?>
                &edadoriginal=<?php echo $datos["edad"]?>&biografiaoriginal=<?php echo $datos["biografia"]?>">
                    <button id="profileButton">
                        MODIFICAR PERFIL
                    </button>
                </a>
            <?php
            }
            else {
                $lesigue=FALSE;
                while ($listaseguidos=mysqli_fetch_array($query5)) {
                    if ($listaseguidos["nombreUsuario2"]==$x) {
                        $lesigue=TRUE;
                        break;
                   }
                }
                if ($lesigue==FALSE) {
                ?>
                    <a href="follow.php?nombredeusuario1=<?php echo $a ?>&nombredeusuario2=<?php echo $x ?>">
                        <button id="profileButton">
                            SEGUIR
                        </button>
                    </a>
                <?php
                }
                else {
                ?>
                    <a href="unfollow.php?nombredeusuario1=<?php echo $a ?>&nombredeusuario2=<?php echo $x ?>">
                        <button id="profileButtonFollowing">
                            SIGUIENDO
                        </button>
                    </a>
                <?php
                }
            }
        ?>
    </div>
</html>