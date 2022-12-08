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
    <button onclick="location.href = '../principal.php';"><img src="home.png" height="50px" style="position:absolute;"></img></button>
    <div class="profileBox">
        <center>
            <img src="user.png" height="150px"></img>
            <hr class="round">
            <div class="profileinfo">
                <?php echo "<h1> $x </h1>";?><br>
                <?php
                    #USUARIO PASADO POR PARÁMETRO ES IGUAL AL USUARIO DE LA SESIÓN
                    if ($x == $a) {
                    ?>
                    <a href="modificarPerfil.php?passwordoriginal=<?php echo $datos["password"]?>&nombreoriginal=<?php echo $datos["nombre"]?>&apellidosoriginales=<?php echo $datos["apellidos"]?>&generoriginal=<?php echo $datos["genero"]?>&edadoriginal=<?php echo $datos["edad"]?>&biografiaoriginal=<?php echo $datos["biografia"]?>">
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
                <br><br>
                <?php echo $numPublicaciones["COUNT(nombreUsuario)"] ?> publicacion/es&emsp;●&emsp;
                <?php echo $numFollowers["COUNT(nombreUsuario2)"] ?> seguidores&emsp;●&emsp;
                <?php echo $numFollowed["COUNT(nombreUsuario1)"] ?> seguidos
                <br><br>
                </div>
                <div class="profileinfo2">
                <?php echo $datos["nombre"].' '.$datos["apellidos"] ?>&emsp;●&emsp;
                <?php echo $datos["genero"] ?>&emsp;●&emsp;
                <?php echo $datos["edad"] ?> años
                <?php echo "<br><br> <h2>Acerca de mi</h2>"?>
                </div>
                <p class="biografia"><?php echo $datos["biografia"]?></p>
            </div>
        </center>
    </div>
        
    <div class="feed">
        <center>
        <div class="feedtitle">Feed</div>
        </center>
        <div class="postsfeed">
            <center>
            <h3>Publicaciones</h3>
            </center>
            <?php
                # Mostrar PUBLICACIONES
                $stringPublicacion="SELECT * FROM publicacion WHERE nombreUsuario='$x' AND idHistoria IS NULL ORDER BY fechaCreacion";
                $publicaciones=mysqli_query($conexio,$stringPublicacion);
                while($reg=mysqli_fetch_array($publicaciones)){
            ?>
            <div class="post">
                <?php
                    $nusuario=$reg["nombreUsuario"];
                    #ENLACE A PERFIL?>
                    <b><?php echo $nusuario ?></b><br><br>
                    <?php echo $reg["descripcion"];?>
                    <div class="date">
                        <?php echo $reg["fechaCreacion"];?>
                    </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="storiesfeed">
            <center>
            <h3>Historias</h3>
            </center>
            <?php
                # Mostrar HISTORIAS de la gente que sigue
                $stringF="SELECT * FROM r_follower WHERE nombreUsuario1='$a' AND nombreUsuario2='$x'";
                $sesiguen=mysqli_query($conexio,$stringF);
                #LE SIGUE O ES ÉL MISMO, ASÍ QUE SACA TODAS LAS HISTORIAS
                if (mysqli_num_rows($sesiguen)!=0 or $x==$a) {
                    $stringH="SELECT * FROM historia WHERE nombreUsuario='$x' ORDER BY fechaHistoria DESC";
                    $historias1=mysqli_query($conexio,$stringH);
                }
                #NO LE SIGUE, ASÍ QUE SOLO SACA LAS PÚBLICAS
                else {
                    $stringH="SELECT * FROM historia WHERE nombreUsuario='$x' AND privada=FALSE ORDER BY fechaHistoria DESC";
                    $historias1=mysqli_query($conexio,$stringH);
                }

                while ($reg1=mysqli_fetch_array($historias1)) {
            ?>
                    <div class="story">
                        <?php
                            $storyuser=$reg1["nombreUsuario"];
                        ?>
                        <h3 style="color:black;">Historia #<?php echo $reg1["idHistoria"] ?> de <?php echo $storyuser ?></h3>
                        <div class="desc">
                            <?php echo $reg1["descripcion"]?>
                        </div>
                        <div class="storydate">
                            <?php echo $reg1["fechaHistoria"]?>
                        </div>
                        <button id="seepostsbutton"><a href="../BD2X7682807/verHistoria.php?id=<?php echo $reg1["idHistoria"];?>"
                            class="linksnavbar">Ver publicaciones</a></button>
                    </div>
                <?php
                    }
                ?>
        </div>
    </div>
</html>
