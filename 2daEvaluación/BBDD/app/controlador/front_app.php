<!DOCTYPE html>
<?php
    session_start();
	if(!isset($_SESSION['user'])){
		header("location: login.php");
	}
    require_once("./vista/vista.inc.php");
    require_once("./modelo/productoDAO.inc.php");
	$v=new Vista($_SESSION['lang']);
	if(isset($_POST['lang'])){
		$_SESSION['lang']=$_POST['lang'];
		$v->setLang($_POST['lang']);
	}//boton de cambiar el idioma en el panel
?>
<?php
	$v->cabecera();
	$v->front_menu();
	$v->front_cuerpo();
	$v->cierre_cabecera();
?>