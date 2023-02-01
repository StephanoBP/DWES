<!DOCTYPE html>
<?php
    require_once("../modelo/conn.inc.php");
    require_once("../vista/vista.inc.php");
    require_once("../modelo/modelo.inc.php");
    require_once("../modelo/const.inc.php");
    session_start();
    if(isset($_SESSION['user'])){
        $_SESSION=array();
        session_destroy();
    }

    if(!isset($_SESSION['lang'])){
        //$_SESSION['lang']=array_key_first(LANGS);
        $_SESSION['lang']=array_keys(LANGS)[0];
    }
    $v=new Vista($_SESSION['lang']);
?>
<?php
    if(isset($_POST['cambiarIdioma'])){
        $_SESSION['lang']=$_POST['lang'];
        $v->setLang($_POST['lang']);
        //header("Location: ".$_SERVER['PHP_SELF']);
    }
    if(!empty($_POST['user'])){
        try{
            $con=new Conn();
            $bd=$con->getConn();
            if(empty($_POST['user'])||(empty($_POST['pass']))){
                echo("ERROR en la obtencion de los datos del formulario");
            }else{
                $nombre=$_POST['user'];
                $password=md5($_POST['pass']);
                $stmt=$bd->prepare("SELECT COUNT(*) FROM usuarios WHERE usr='".$nombre."' AND pass='".$password."'");
                $stmt->execute();
                $ee=$stmt->fetchAll();
                $m=new Modelo();
                if($ee[0][0]=="1"){
                    $_SESSION['user']=$_POST['user'];
                    $_SESSION['rol']=$m->getRol($_SESSION['user']);
                    header("Location: front_app.php");
                }else{
                    echo("<h2>Nombre o contraseña incorrectos</h2>");
                    //lang no data
                }
            }   
            $con->close();
        }catch(PDOException $e){
            print("Error ".$e->getMessage()."<br/>");
            exit;
        }
    }else{
        if(empty($_SESSION['lang'])){
            //$_SESSION['lang']=array_key_first(LANGS);
            $_SESSION['lang']=array_keys(LANGS)[0];
        }
    }
?> 
<?php
    //$v->form_login();
    $v=new Vista($_SESSION['lang']);
    $v->form_login_profe();
?>