<!DOCTYPE html>
<?php
    include_once("empresa.inc.php");
define("BR", "<br/>\n");
function tabla($t){
    $s = "<table border=1>" . BR;
    $s .= "<tr>";
    foreach ($t[0] as $k => $v);
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
            $stmt = $con->query('SELECT * FROM empleados');
            $stmt->execute();
            var_dump($stmt);
            print("Conexión realizada");
        }catch(PDOException $e){
            print("ERROR: ".$e->getMessage()."<br/>");
        }
        ?>
    </body>
</html>