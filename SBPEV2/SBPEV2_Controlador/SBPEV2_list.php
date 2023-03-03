<!--
    Se mostrará una página list,php con:
un listado con los datos de todos los proveedores en la parte derecha (5 puntos)
un formulario para filtrar proveedores en la parte izquierda. El campo cif se mostrará como una lista de opciones con todos los cifs disponibles, y los demás campos como entradas de texto. (10 puntos)
Al pulsar el botón del formulario de filtrado, se visualizarán los clientes que cumplan los criterios especificados (10 puntos)
En los campos de texto, se buscarán cadenas que contengan el texto introducido
En los campos numéricos, se buscarán números con coincidencia exacta
Todos el código entregado, etc., debe estar escrito en php y además
los formularios, listados o cualquier vista deben estar generados dinámicamente
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
?>