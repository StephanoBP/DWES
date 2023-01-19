<!DOCTYPE html>
<?php
session_start();
require_once("../vista/vista.inc.php");
require_once("../modelo/modelo.inc.php");
?>
<html>
    <head>
        <title>Bienvenida</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <?php
            if(!isset($_SESSION['user'])){
                header("location: login_app.php");
            } else {
                $v = new Vista($_SESSION['lang']);
                $v->cabecera();
            }
            ?>
        </form>
    </body>
</html>