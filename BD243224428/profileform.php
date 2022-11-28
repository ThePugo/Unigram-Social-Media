<!DOCTYPE html>
<html>
    <head>
        <title>Crea tu perfil</title>
        <link rel="stylesheet" type="text/css" href="profilestyle.css">
    </head>

    <body>

        <?php
        # Obtenemos el nombre del usuario de la sesion iniciada en principal.php
        session_start();
        $user = $_SESSION["nombreUsuario"];
        ?>
        
        <div class="profilebox">
            <div class="center">
                <form method="post" action="insertPerfil.php">

                    <center>
                        <h2>CREA TU PERFIL</h2><br>
                    </center>

                    <label>Nombre</label>
                    <input type="text" value="", name="nombre" placeholder="Introduzca su nombre" class="roundborder">

                    <label>Apellidos</label> 
                    <input type="text" value="", name="apellidos"  placeholder="Introduzca sus apellidos" class="roundborder">

                    <label>Genero</label>
                    <input type="text" value="", name="genero"  placeholder="Introduzca su genero" class="roundborder">

                    <label>Edad</label>
                    <input type="number" value="", name="edad"  placeholder="Introduzca su edad" class="roundborder">

                    <input type="hidden" value= <?php echo $user ?> name="nombreUsuario">
                    <input type="submit" value="Crear">
                </form>
            </div>      
        </div>
    
    </body>
</html>