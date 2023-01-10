<!DOCTYPE html>
<?php
include_once("empresa.inc.php");
function tabla($t){
    foreach($t as $k=>$e) {
        var_dump($e);
        echo("<br/>");
    }
}
define("BR","<br/>\n");
function toTabla($t){
    //var_dump($t);
    echo("<table border=1>".BR);
    //$s.="<tr><th>Cod.</th><tr><th>Nombre</th><tr><th>Clave</th><tr><th>Rol</th></tr>";
    echo("<tr>");
    foreach($t[0] as$k=>$f){
        echo("<th>$k</th>");
    }
    echo("</tr>");
    foreach($t as $k=>$f) {
        echo("<tr>");
        foreach($f as $v) {
            echo("<td>$v</td>\n");
        }
        echo("</tr>\n");

    }
    echo("</table>\n");

}
function tablaCR($t){
    $s="<table border=1>".BR;
    //$s.="<tr><th>Cod.</th><tr><th>Nombre</th><tr><th>Clave</th><tr><th>Rol</th></tr>";
    $s.="<tr>";
    foreach($t[0] as$k=>$f){
        $s.="<th>$k</th>";
    }
    $s.="</tr>";
    foreach($t as $k=>$f) {
        $s.="<tr>";
        foreach($f as $v) {
            $s.="<td>$v</td>\n";
        }
        $s.="</tr>\n";

    }
    $s."</table>\n";
    echo $s;
}


?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo PDO</title>
</head>
<body>
    <h3>Ejemplo PDO</h3>
    <?php

    try{
        $cadenaDSN="mysql:host=".HOST.";dbname=".BD.";charset=".CHRST;
        $con = new PDO(CONN,USER,PWD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //$stmt=$con->query("SELECT * FROM empleados");
        
        $stmt=$con->query("SELECT * FROM empleados");

        //var_dump($ee);

        //$stmt=$con->query("UPDATE usuarios SET rol=1 WHERE Codigo=3 OR 1=1");
        
        //$stmt=$con->prepare("UPDATE usuarios SET rol=? WHERE Codigo=?");
        //$stmt=$con->prepare("UPDATE usuarios SET rol=:rol WHERE Codigo=:cod");
        //$stmt->bindValue(nº interrogacion, valor);
       /* $stmt->bindValue(1, 1);//admin
        $stmt->bindValue(2, 3);//admin*/

        /*
        $stmt->bindValue(':rol', 1);//admin
        $stmt->bindValue(':cod', 3);//admin*/
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ee=$stmt->fetchAll();
        $con=null;
        /*
        $stmt=$con->query("SELECT Nombre,rol FROM usuarios");*/
/*
        //<> distinto
        $stmt=$con->prepare("UPDATE usuarios SET rol=? WHERE Codigo<>?");
        //array()
        $stmt->execute(array(0,1));*/

        

        //tabla($ee);
        toTabla($ee);
        //tablaCR($ee);
    
        /*
        while($i=$stmt->fetch()){
            var_dump($i);
            echo("<br>");

        }*/
    }catch(PDOException $e){
        print("Error ".$e->getMessage()."<br/>");
    }
        
    ?>
</body>
</html>