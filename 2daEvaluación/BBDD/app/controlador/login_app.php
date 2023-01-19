<!DOCTYPE html>
<?php
session_start();
require_once("../modelo/modelo.inc.php");
require_once("../vista/vista.inc.php");
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pruebaPDO</title>
    </head>
    <body>
        <?php
        /*
        $v = new Vista();
        $m = new Modelo();
        if(isset($_SESSION['user'])){
            $_SESSION = array();
            session_destroy();   
        }
        if(isset($_POST['submit'])){
            $error = $m->validar($_POST);
            echo $error;
            //redirigir
            //header('Location: validar.php'); //PETICIÓN GET
        }
        */
            if (!empty($_POST) ){
                $v=new Vista($_POST['lang']);
            var_dump($_POST);
                try{
                    $con=new Conn();
                    $bd=$con->getConn();

                    if(empty($_POST['user'])||(empty($_POST['pass']))){
                        echo("ERROR en la obtencion de los datos del formulario");
                    session_destroy();
                    }else{
                        $nombre=$_POST['user'];
                        $password=md5($_POST['pass']);
                        $stmt=$bd->prepare("SELECT COUNT(*) FROM usuarios WHERE usr ='".$nombre."' AND pass='".$password."'");
                        $stmt->execute();
                        $ee=$stmt->fetchAll();
                        if($ee[0][0]=="1"){
                            
                            $_SESSION['user']=$_POST['user'];
                            $_SESSION['pass']=$_POST['pass'];
                            $_SESSION['lang']=$_POST['lang'];
                            header("Location: front_app.php");
                        }else{
                            echo("<h2>Nombre o contraseña incorrectos</h2>");
                        }
                    }
                    $con->close();
                }catch(PDOException $e){
                    print("Error ".$e->getMessage()."<br/>");
                    exit;
                }
            }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="user">Nombre</label>
        <input type="text" name="user" id="user" value="ana"><br>
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass" value="ana"><br>
        <input type="submit" name="enviar" id="enviar"><br>
        <select name="lang">
            <option value='es'>Español</option>
            <option value='en'>Inglés</option>
            <option value='fr'>Francés</option>
            <option value='pr'>Portugués</option>
        </select>
        </form>
    </body>
</html>