<?php
session_start();
if(!isset($_SESSION['user'])){
    //si no existen las variables de sesión
    print("No puedes entrar en la página<br/>");

}else{
    print("<h1> BIENVENIDO, ".$_SESSION['user']."</h1>");
}
echo"<a href='ses_6_login.php'>VOLVER</a><br/>";
echo"<a href='hola.php'>SEGUNDA PÁGINA</a><br/>";
echo"<a href='cerrarSesión.php'>CERRAR SESIÓN</a><br/>";
?>