<!DOCTYPE html>
<?php
    require_once("../HSGORD_Modelo/HSGORD_modelo.inc.php");
    require_once("../HSGORD_Vista/HSGORD_vista.inc.php");
    session_start();
    if(!isset($_SESSION['lang'])){
        $_SESSION['lang']=array_keys(LANGS)[0];
    }
    $v=new Vista_HSGORD($_SESSION['lang']);
    $m=new Modelo_HSGORD();
?>
<?php
if(isset($_POST['cambiarIdioma'])){
    $_SESSION['lang']=$_POST['lang'];
    $v->setLang_HSGORD($_POST['lang']);
}
    $v->form_login_HSGORD();
?>
