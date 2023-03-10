<!DOCTYPE html>
<?php
    require_once("../HSGORD_Modelo/HSGORD_modelo.inc.php");
    require_once("../HSGORD_Vista/HSGORD_vista.inc.php");
    session_start();
    $v=new Vista_HSGORD();
    $m=new Modelo_HSGORD();
?>
<?php
if(isset($_POST['filtros'])){
    $result=$m->getFiltered_HSGORD("proveedores",$_POST);
    $v->front_cuerpo_filtrado_HSGORD($result);
}else if(isset($_POST['enviar'])){
    $result=$m->comprobarProveedor_HSGORD("proveedores",$_POST['cif'],$_POST['nom_emp']);
    if(empty($result)){
        $msg=$m->insertarProveedor_HSGORD("proveedores",$_POST);
        $result=$m->getProveedores_HSGORD("proveedores");
        $array=$m->getTable_HSGORD("proveedores");
        $cifs=$m->getCifs_HSGORD("proveedores");
        $v->front_menu_filtros_HSGORD($array,$cifs);
        $v->front_cuerpo_HSGORD($result);
        
    }else{
        $v->msgNotificacion_HSGORD($result);
    }
}else{
    $array=$m->getTable_HSGORD("proveedores");
    $v->registro_form_HSGORD($array);
}



?>