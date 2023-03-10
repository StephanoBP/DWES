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
                <label for='user'> Usuario </label>\n
                <input type='text' name='usr' id='usr' value=''><br>\n
                <label for='pass'> Contraseña</label>\n
                <input type='pass' name='pass' id='pass' value=''><br>\n
                <input type='submit' name='envlog' id='envlog' value='ENVIAR'>
                </form>
            </body>
            </html>
        ");

    }
    public function tabla_SBPEV2($t){
        $s="<table border=1><br>";
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
    public function front_cuerpo_SBPEV2($a){
        echo (
            "<div id='cuerpo' style='width:70%; float:right;'>
            <fieldset>
            <legend>LISTADO: </legend>"
        );
        $this->tabla_SBPEV2($a);
        echo (
            "</fieldset>
                </div>");
    }
    public function front_menu_filtros_SBPEV2($a,$cifs){
        echo(
            "<div style='overflow:hidden; width:100%; height:80%;'>
            <div id='tables' style='float:left; width:30%; '>
            <div>
			<fieldset>
				<legend>Filtros: </legend>");
        $this->mostrar_filtros_SBPEV2($a,$cifs);
        echo ("	
                </fieldset>
                </div>
            </div>"
        );
    }
    public function mostrar_filtros_SBPEV2($a,$cifs){
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>\n");
        foreach ($a as $row) {
            echo "<label for='$row[Field]'>".$row['Field']."</label>";
            if($row['Field']=="cif"){
                echo "<select name='$row[Field]' id='$row[Field]'>";
                echo "<option value=''></option>";
                for($i=0;$i<count($cifs);$i++){
                    echo "<option value='".$cifs[$i][$row['Field']]."'>".$cifs[$i][$row['Field']]."</option>";
                }
                echo "</select><br/>";
            }else if (strpos($row['Type'], "varchar") !== false) {
                echo "<input type='text' name='$row[Field]' id='$row[Field]'/><br/>";
            }else echo "<input type='number' name='$row[Field]' id='$row[Field]'/><br/>";
        }
        echo("<input type='submit' name='filtros'id='filtros' value='FILTRAR'/>");
        echo ("</form>\n");
    }
    public function front_cuerpo_filtrado_SBPEV2($filtros){
        echo (
            "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>LISTADO: </legend>"
        );
        echo $this->tabla_SBPEV2($filtros);
        echo (
            "</fieldset>
                </div>");
    }
}
