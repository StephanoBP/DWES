<!DOCTYPE html>
<?php
    session_start();
	if(!isset($_SESSION['user'])){
		header("location: login_app.php");
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
        foreach($_SESSION['carrito'] as $k=>$va){
            if($va==0)unset($_SESSION['carrito'][$k]);
        }
    }else{
    }
?>
<?php
	$v->cabecera();
    
    if (!empty($_SESSION['carrito'])){
        $prods = $m->getProds("productos",$_SESSION['carrito']);
        $pvp = $m->getPvp("productos",$_SESSION['carrito']);
        if(isset($_POST['comprar'])){
            $m->factura("facturas");
            $v->front_cuerpo_carrito("factura","");
        }else $v->front_cuerpo_carrito($prods,$pvp);
    }else{
        $v->front_cuerpo_carrito("","");
    }
?>