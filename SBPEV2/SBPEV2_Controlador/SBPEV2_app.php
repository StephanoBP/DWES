<!--sufijo de funciones SBP
Se desea crear una página de registro de usuarios para la tabla de la base de datos gesventa.
Se pide escribir una aplicación con una sola página de control, app.php, siguiendo el patrón MVC para desarrollo de páginas dinámicas.
La aplicación debe funcionar con la siguiente lógica:
Al abrirse por primera vez, aparecerá un formulario generado dinámicamente, con todos los campos de la tabla usuarios,
que permita registrar un nuevo usuario aunque la tabla se modifique en el futuro. (5 puntos)
Al pulsar el botón del formulario de registro, ocurrirá lo siguiente:
Si existe un usuario registrado con ese nombre, mostrará un mensaje de notificación que incluya el nombre registrado. (5 puntos)
Si el usuario no está registrado, lo insertará directamente en la tabla con todos sus datos (5 puntos), con las siguientes condiciones
Una vez registrado el usuario, aparecerá un mensaje de usuario registrado (1 punto), y un formulario de login. (3 puntos)
Al pulsar el botón del formulario de login, se validarán el usuario y la contraseña. (5 puntos) Si el usuario es válido:
app.php
los archivos adicionales que se hayan incluido para generación de vistas, acceso a la base de datos, etc.
-->
<!DOCTYPE html>
<?php
    require_once("../SBPEV2_Modelo/SBPEV2_modelo.inc.php");
    require_once("../SBPEV2_Vista/SBPEV2_vista.inc.php");
    session_start();
    $v=new Vista_SBPEV2();
    $m=new Modelo_SBPEV2();
?>
<?php
if(isset($_POST['envlog'])){
    $msg=$m->validar($_POST['envlog']);
    if(empty($msg)){
        header("Location: SBPEV2_list.php");
    }else{
        $v->form_login_SBPEV2($msg);
    }
}
if(isset($_POST['enviar'])){
    $res=$m->comprobarNombre_SBPEV2("usuarios",$_POST['usr']);
    if(empty($res)){
        $msg=$m->insertarUsuario_SBPEV2("usuarios",$_POST);
        $v->form_login_SBPEV2($msg);
    }else{
        $v->mensajeNotificación_SBPEV2($res[0]['usr']);
    }
}else{
    $a=$m->getUsuarios_SBPEV2("usuarios");
    $v->form_registro_SBPEV2($a);
}
?>