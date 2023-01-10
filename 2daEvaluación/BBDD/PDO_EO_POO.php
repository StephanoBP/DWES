<!DOCTYPE html>
<?php
include_once("empresa.inc.php");
include_once("vista.inc.php");



?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo PDO</title>
    </head>
    <body>
        <h3>Ejemplo PDO</h3>
        <?php
        $v = new Vista();
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
            $v->tabla($ee);
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