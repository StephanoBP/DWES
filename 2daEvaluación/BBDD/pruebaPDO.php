<!DOCTYPE html>
<?php
    include_once("empresa.inc.php");
    define("BR", "<br/>\n");
    function tabla($t){
        $s = "<table border=1>" . BR;
        $s .= "<tr>";
        foreach ($t[0] as $k => $v) $s.="<th>$v</th>";
        $s.="</tr>";
        foreach($t as $k=>$f){
            $s.="<tr>";
            foreach($f as $v) $s.="<td>$v</td>";
            $s.="</tr>";
        }
        
        $s.="</table>";
        echo $s;
    }

?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>pruebaPDO</title>
    </head>
    <body>
        <h3> Ejemplo PDO sencillo</h3>
        <?php
        try {
            $cadenaDSN = "mysql:host=localhost;dbname=empresa;charset=utf8";
            //$con = new PDO($cadenaDSN,"root","root");
            $con = new PDO($cadenaDSN,USER,PWD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$stmt = $con->query('SELECT * FROM empleados');
        //$stmt->execute();
        //var_dump($stmt);
        //print("Conexión realizada");
        
        //query NO PREPARADA
        $stmt=$con->query("UPDATE usuario SET rol=? WHERE Codigo<>?");
        //$stmt -> bindValue(1,1); //admin
        //$stmt -> bindValue(2,3); //admin
        //$stmt->execute();
        $stmt->execute(array(0,1));

        $stmt=$con->query("SELECT Nombre, rol FROM usuarios");
        $stmt->execute();

        $stmt-> setFetchMode(PDO::FETCH_ASSOC);

        //$ee = $stmt -> fetchALL(); //fetch
        //var_dump($ee);

        //cerrar la conexion: liberar el enlace
        $conn=null;

        //bucle que recorre el ARRAY que contiene el resultado
        //y muestra cada elemento del array por separado

        /*
        foreach($ee as $e){
            echo "<br><br>Clave: $k<br>"
            var_dump($e);
        }
        */

        //tabla($ee);

        while($i=$stmt-> fetch()){
            var_dump($i);
            echo "<br/>";
        }

    } catch (PDOException $e) {
        print "ERROR:" .$e -> getMessage()."<br/>";
        exit;
    }
        ?>
    </body>
</html>