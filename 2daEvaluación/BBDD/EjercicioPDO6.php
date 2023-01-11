<!DOCTYPE html>
<?php
require_once("modelo.inc.php");
require_once("vista.inc.php");
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>pruebaPDO</title>
    </head>
    <body>
        <h3> Ejemplo PDO sencillo</h3>
        <?php
        $v = new Vista();
        $m = new Modelo();
        if(isset($_SESSION['user'])){
            $_SESSION = array();
            session_destroy();
        }
        if(isset($_POST['enviar'])){
            $error = $m->validar($_POST);
        }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            Nombre:<input type="text" name="user"><br>
            Apellido:<input type="password" name="pass"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>