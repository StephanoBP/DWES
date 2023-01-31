<!DOCTYPE html>
<?php
    include_once("crush.php");
    session_start();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <style>
            body{
                justify-content: center;
                align-items: center;
                display: grid;
                background-image:url("flores.jpg");
                background-color: #cccccc;
                background-repeat: no-repeat;
            }
        </style> 
    </head>
    <body>
        <h1>Searching Crush</h1>
        <?php
            calcularVida();
            function calcularVida(){
                $diaRandom = mt_rand(2022,2030);;
                $fechaActual=date("Y");

                $resultado = $diaRandom-$fechaActual;
                if(isset($_COOKIE['session'])){
                    setcookie("session",$_COOKIE['session']+1);
                }else{
                    setcookie("session",1);
                }

                if($resultado==0){
                    echo "<h1>NUNCA</h1>";
                }else{
                    echo"<h1>".($resultado." años")."</h1>"; 
                }
                try {
                    $cadenaDSN = "mysql:host=localhost;dbname=baseservidor;charset=utf8";
                    //$con = new PDO($cadenaDSN,"root","root");
                    $con = new PDO($cadenaDSN,USER,PWD);
                    $cont = $_COOKIE['session'];
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $con->prepare('INSERT INTO crush (Intento, Año) VALUES (:var1,:var2)');
                    $stmt ->bindParam("var1",$cont);
                    $stmt ->bindParam("var2",$resultado);
                    $stmt->execute();
                }catch(PDOException $e){
                    print("ERROR: ".$e->getMessage()."<br/>");
                }
            }
        ?>
        <br>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <?php echo BOTON .CRUSH."</button>" ?>
    </form>
    </body>
</html>