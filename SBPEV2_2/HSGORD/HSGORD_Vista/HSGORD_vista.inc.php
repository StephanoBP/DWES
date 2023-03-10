<?php
class Vista_HSGORD{
    public function __construct(){}
public function registro_form_HSGORD($array){
        echo("<html>
        <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>");
        echo("<title>Registro Proveedores</title>
                </head>
                <body>
                <h1>FORMULARIO DE REGISTRO</h1>");
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>");
        foreach ($array as $row) {
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
    public function msgNotificacion_HSGORD($prov){
        echo("<html>
        <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>");
        echo("<title>Proveedor REGISTRADO</title>
                </head>
                <body>
                    <h1>El proveedor: ". $prov[0]['nom_emp']." con cif: " .$prov[0]['cif']. " ya está registrado</h1>
                </body>
            </html>");
    }
    public function tabla_HSGORD($t){
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
    public function front_cuerpo_HSGORD($array){
        echo (
            "<div id='cuerpo' style='width:70%; float:right;'>
            <fieldset>
            <legend>LISTADO: </legend>"
        );
        $this->tabla_HSGORD($array);
        echo (
            "</fieldset>
                </div>");
    }
    public function front_menu_filtros_HSGORD($array,$cifs){
        echo(
            "<div style='overflow:hidden; width:100%; height:80%;'>
            <div id='tables' style='float:left; width:30%; '>
            <div>
			<fieldset>
				<legend>Filtros: </legend>");
        $this->mostrar_filtros_HSGORD($array,$cifs);
        echo ("	
                </fieldset>
                </div>
            </div>"
        );
    }
    public function mostrar_filtros_HSGORD($array,$cifs){
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>\n");
        foreach ($array as $row) {
            echo "<label for='$row[Field]'>".$row['Field']."</label>";
            if($row['Field']=="cif"){
                echo "<select name='$row[Field]' id='$row[Field]'>";
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
    public function front_cuerpo_filtrado_HSGORD($filtros){
        echo (
            "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>LISTADO: </legend>"
        );
        echo $this->tabla_HSGORD($filtros);
        echo (
            "</fieldset>
                </div>");
    }
}