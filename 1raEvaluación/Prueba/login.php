<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PruebaScript1</title>
        <style>
            body{
                background-color: silver;
            }

            h1{
                text-decoration: underline green;
                color: rebeccapurple;
            }   
        </style>
    </head>
    <body>
        <h1>Bienvenido!!</h1>

        <?php
            //para ver rápidamente los datos del formulario
            var_dump($_REQUEST);

            foreach($_REQUEST as $k=>$v)
            echo "<br/>clave: ".$k." valor: ".$v."<br/>";
            $user=$_REQUEST['user_name'];
            echo "<br/>Usuario: ".$user."<br/>";
        ?>
    </body>
</html>