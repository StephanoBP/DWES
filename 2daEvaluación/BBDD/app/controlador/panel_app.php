<!DOCTYPE html>
<?php
session_start();
require_once("vista.inc.php");
require_once("modelo.inc.php");
?>
<html>
    <head>
        <title>Bienvenida</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <?php
            $v = new Vista($_SESSION['lang']);
            $v->hola($_SESSION);
            ?>
            <input type="button" name="alta" value="alta">
            <input type="button" name="baja" value="baja">
            <input type="button" name="modificación" value="modificación">
            <input type="button" name="consulta de productos" value="consulta de productos">
        </form>
    </body>
</html>