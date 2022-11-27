<html>
    <!-- FORM QUE AL SER RELLENADO INSERTA EN LA CLASE MASCOTA UNA NUEVA MASCOTA CON LOS DATOS QUE SE PROPORCIONEN -->
    <?php
        include "conexiones.php";
        $string="Select * from propietari";
        $consulta=mysqli_query($conexio,$string);
    ?>
    <head>
    </head>
    <body>
pu        <form action="insert.php" method="get">
            nom de la mascota: <input type="text" name="nommasc"><br>
            tipus de mascota: <input type="text" name="tipusmasc"><br>
            propietari: <select name="propmasc">
                <?php
                //AL SER ESTE DATO UNA FK (LA ID DE PROPIETARIO),
                //ES PREFERIBLE HACER UN RECORRIDO Y ASÍ
                //HACER UNA DROPDOWN LIST PARA ESCOGER EL QUE SE DESEE 
                //(QUE SE MUESTRA POR NOMBRE Y APELLIDO Y NO POR ID POR COMODIDAD)
                while($reg=mysqli_fetch_array($consulta))
                {
                ?>
                    <option value="<?php echo $reg["idprop"];?>">
                        <?php echo $reg["nomprop"]." ".$reg["lliprop"];?>
                    </option>
                <?php
                }
                ?>
            </select><br>
            <input type="submit" name="insert" value="Inserir Dades">
        </form>
    </body>
</html>