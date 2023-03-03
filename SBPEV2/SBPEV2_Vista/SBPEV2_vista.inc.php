<?php
class Vista_SBPEV2{
    public function __construct(){}
    public function form_registro_SBPEV2($a){
        echo $this->cabecera_SBPEV2();
        echo("<title>Formulario Usuarios</title>
                </head>
                <body>
                <h1>FORMULARIO DE REGISTRO</h1>");
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>");
        foreach ($a as $row) {
            echo "<label for='$row[Field]'>$row[Field]</label>";
            echo "<input type='text' name='$row[Field]' id='$row[Field]'/><br/>"; 
        }
        echo ("<input type='submit' name='enviar' id='enviar' value='ENVIAR'>");
        echo ("</form>");
        echo ("<br>");
        echo ("    
                </body>
                </html>");
    }
    public function mensajeNotificación_SBPEV2($res){
        echo $this->cabecera_SBPEV2();
        echo("<title>USUARIO REGISTRADO</title>
                </head>
                <body>
                    <h1>El usuario $res ya está registrado</h1>
                </body>
                </html>
                ");
    }
    public function cabecera_SBPEV2(){
        $s= "<html>
        <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        return $s;
    }
    public function form_login_SBPEV2($msg){
        echo $this->cabecera_SBPEV2();
        echo("<title>USUARIO REGISTRADO</title>
            </head>
            <body>
                <h1>$msg</h1>
                <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
                <label for='user'> Csuario </label>\n
                <input type='text' name='usr' id='usr' value=''><br>\n
                <label for='pass'> Contraseña</label>\n
                <input type='pass' name='pass' id='pass' value=''><br>\n
                <input type='submit' name='envlog' id='envlog' value='ENVIAR'>
                </form>
            </body>
            </html>
        ");

    }
}
