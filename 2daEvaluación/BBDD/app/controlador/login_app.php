<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['user'])){
        $_SESSION=array();
        session_destroy();
    }
    require_once("../modelo/conn.inc.php");
    require_once("../vista/vista.inc.php");
    require_once('../modelo/const.inc.php');
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
                if($ee[0][0]=="1"){
                    $_SESSION['user']=$_POST['user'];
                    $_SESSION['pass']=$_POST['pass'];
                    header("Location: panel_app.php");
                }else{
                    echo("<h2>Nombre o contraseña incorrectos</h2>");
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