<?php
    include "mensajes.php";
    $receptor=$_GET['receptor'];
    ?>
    <div class="insertmessagebox">
    <form method="post" action="enviarMensaje.php">
        <textarea  name = "mensaje" required maxlength="180" placeholder="Inserte un mensaje"></textarea>
        <input type="submit" value="Enviar" class="roundborder">
    </form>   
    </div>

    <?php

?>