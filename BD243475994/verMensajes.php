<!DOCTYPE html>
<html>
    <body>
        <?php
            include "mensajes.php";
            $receptor=$_GET['receptor'];
        ?>
        <div class = "chatmessagesbox">
            <div class = "chattitle">
                <center>
                    <h1>Chat con <?php echo $receptor ?></h1>
                    <hr>
                </center>
            </div>
        </div>
        <div class="insertmessagebox">
            <form method="post" action="enviarMensaje.php">
                <textarea  name = "mensaje" required maxlength="180" placeholder="Inserte un mensaje"></textarea>
                <input type="image" src="send.png" alt="Submit">
            </form>   
        </div>

    </body>      

</html>
