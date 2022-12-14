<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Página para probar cookies</h1>
        <hr color="red">
        <h2>Ejercicio 1</h2>
        <?php
        if(isset($_COOKIE['lang'])){
            print("Érase una vez</br>\n");
        }else{
            print("There was upon a time...<br/>\n");
            setcookie('lang','es');
        }
        ?>
        <hr color="red">
        <h2>Ejercicio 2</h2>
        <?php
            function generateRandomString($length = 10) {
                return
                substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV
                WXYZ"), 0, $length);
            }
            if(isset($_COOKIE['id'])){
                print("Ya estaba registrado $_COOKIE[id]</br>\n");
            }else{
                print("Nuevo en el lugar<br/>\n");
                setcookie('id',generateRandomString(),time()+3600);
            }
        ?>
        <hr color="red">
        <h2>Ejercicio 3</h2>
        <?php
            $prueba=count($_COOKIE);
            if($prueba!=0){
                print("Ya hay cookies establecidas</br>\n");
                var_dump($_COOKIE);
            }else{
                print("No hay cookies establecidas<br/>\n");
            }
        ?>
        <hr color="red">
        <h2>Ejercicio 4</h2>
        <?php
            print("Al cerrar el navegador y volver a ejercutar el script se reinician las cookies y 
                por eso la primera vez no habrían cookies.
                En otro navegador no existen estas cookies y por eso seria la primera vez</br>\n");
        ?>
        <!--
            Codificar un script PHP que presente el número de veces que un usuario accede a una
            página. La primera vez, además de mostrar el valor 1, mostrará el mensaje “Nuevo en
            el lugar”. La segunda y sucesivas veces, mostrará el valor “n” del número de visitas y
            el momento que el usuario entró por última vez. Realizarlo primero mediante cookies y
            después mediante sesiones.
        -->
        <hr color="red">
        <h2>Ejercicio 5</h2>
        <?php
            setcookie("visit",date("d/m/y h:i:s"));
            if(isset($_COOKIE['session'])&&!isset($_POST['reiniciar'])){
                print("$_COOKIE[session]");
                print("$_COOKIE[visit]");
                setcookie("session",$_COOKIE['session']+1);
            }else{
                print("Nuevo en el lugar</br>\n");
                print("$_COOKIE[visit]");
                setcookie("session",1);
            }
        ?>
        <br>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <button name="SumarContador" value="SUMARCONTADOR">SUMAR CONTADOR</button>
            <button name="reiniciar" value="REINICIAR">REINICIAR</button>
    </form>
    </body>
</html>
