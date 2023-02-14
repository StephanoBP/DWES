<!DOCTYPE html>
<?php
    session_start();
	if(!isset($_SESSION['user'])){
		header("location: login.php");
	}
    require_once("../vista/vista.inc.php");
    require_once("../modelo/productoDAO.inc.php");
    require_once("../modelo/modelo.inc.php");
	$v=new Vista($_SESSION['lang']);
    $m=new Modelo();
    $pdao=new ProductoDAO();
	if(isset($_POST['lang'])){
		$_SESSION['lang']=$_POST['lang'];
		$v->setLang($_POST['lang']);
	}//boton de cambiar el idioma en el panel
    if(isset($_POST['cods'])){
        $_SESSION['carrito']=$_POST['cods'];
    }
?>
<?php
	$v->cabecera();
    $prods = $m->getProds("productos",$_SESSION['carrito']);
	$v->front_cuerpo_carrito($prods);
?>