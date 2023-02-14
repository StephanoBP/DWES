<?php
    require_once("../modelo/const.inc.php");
    require_once("../modelo/modelo.inc.php");
    define("BR","<br/>\n");
class Vista
{
    public $lang;
    public function __construct($lang = 'en'){
        $this->lang = $lang;
    }
    public function setLang($l)
    {
        $this->lang = $l;
    }

    public function tablaCR($t)
    {
        $s = "<table border=1>" . BR;
        if(isset($t[0])){
            //var_dump($t);
            $s .= "<tr>";
            foreach ($t[0] as $k => $f) {
                $s .= "<th>$k</th>";
            }
            $s .= "</tr>";
            foreach ($t as $k => $f) {
                $s .= "<tr>";
                foreach ($f as $v) {
                    $s .= "<td>$v</td>\n";
                    if($v==$t[$k]["existencias"]){
                        $s.="<td><form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
                        $s .= "<select name='cods[".$t[$k]['cod']."]'>";
                        $s.= $this->opcionesTabla($v,$t[$k]['cod']);
                        $s.="</select><input type='submit' name='añadir' id='añadir' value='".LANGS[$this->lang]['añadir']."'/></form</td>";
                    }
                }
                $s .= "</tr>\n";

            }
        }else{
            echo "<h1>No se ha encontrado nada con los filtros específicos</h1>" . BR;
            $pdao = new ProductoDAO();
            $this->tablaCR($pdao->getAll());
        }
        $s . "</table>\n";
        echo $s;
    }
    public function opcionesTabla($exist,$n){
        $res="";
        if($exist>5){
            for($i=0;$i<=5;$i++){
                if(isset($_SESSION['carrito'])){
                    if($i==$_SESSION['carrito'][$n])$res.= "<option value='$i' selected>$i</option>";
                    else $res.= "<option value='$i'>$i</option>";
                }else{
                    if($i==5)$res.= "<option value='$i' selected>$i</option>";
                    else $res.= "<option value='$i'>$i</option>";
                }
            }
        }else{
            for($i=0;$i<=$exist;$i++){
                if(isset($_SESSION['carrito'])){
                    if($i==$_SESSION['carrito'][$n])$res.= "<option value='$i' selected>$i</option>";
                    else $res.= "<option value='$i'>$i</option>";
                }else{
                    if($i==$exist)$res.= "<option value='$i' selected>$i</option>";
                    else $res.= "<option value='$i'>$i</option>";
                }
            }
        }
        return $res;
    }
    public function tabla($t)
    {
        foreach ($t as $k => $e) {
            var_dump($e);
            echo ("<br/>");
        }
    }
    public function toTabla($t)
    {
        //var_dump($t);
        echo ("<table border=1>" . BR);
        //$s.="<tr><th>Cod.</th><tr><th>Nombre</th><tr><th>Clave</th><tr><th>Rol</th></tr>";
        echo ("<tr>");
        foreach ($t[0] as $k => $f) {
            echo ("<th>$k</th>");
        }
        echo ("</tr>");
        foreach ($t as $k => $f) {
            echo ("<tr>");
            foreach ($f as $v) {
                echo ("<td>$v</td>\n");
            }
            echo ("</tr>\n");
        }
        echo ("</table>\n");
    }
    private function bienvenida($user)
    {
        echo ("<h3>" . LANGS[$this->lang]['welcome'] . ", " . $user . "</h3>");
    }
    private function idiomas()
    {
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>");
        echo ("<select name='lang' id='lang'>\n");

        foreach (LANGS as $idioma => $tabla) {
            if ($idioma == $_SESSION['lang']) {
                echo ("<option value=$idioma selected>" . $tabla['lang'] . "</option>\n");
            } else {
                echo ("<option value=$idioma>" . $tabla['lang'] . "</option>\n");
            }
        }

        echo ("</select>");
        echo ("<input type='submit' name='cambiarIdioma' id='cambiarIdioma' value='CAMBIAR IDIOMA'>");
        echo ("\n</br>\n");
        echo ("</form>");
    }
    public function cabecera()
    {
        echo (
            "<html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>" . TTL . "</title>
                </head>
                <body>");
        echo ("<div style='width:100%; height:20%; text-align:center; margin:1%;'>");
        echo ("<h1>" . TTL . "</h1>");
        $this->bienvenida($_SESSION['user']);
        $this->idiomas();

        echo ("</div>");

        echo ("<div style='width:100%; height:20%; text-align:center; margin:1%;'>");
        $this->menu_nav();
        echo ("</div>");
    }
    public function cierre_cabecera()
    {
        echo ("
                </div>			
                </body>
            </html>");
    }
    public function form_login()
    {
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>");
        $this->idiomas();
        echo ("<label for='user'>" . LANGS[$_SESSION['lang']]['user'] . "</label>\n");
        echo ("<input type='text' name='user' id='user' value=''><br>\n");
        echo ("<label for='pass'>" . LANGS[$_SESSION['lang']]['pass'] . "</label>\n");
        echo ("<input type='pass' name='pass' id='pass' value=''><br>\n");
        echo ("<input type='submit' name='enviar' id='enviar' value='" . LANGS[$_SESSION['lang']]['send'] . "'>");
        echo ("</form>");

    }
    public function form_login_profe()
    {
        echo ("<html>
                <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>" . LANGS[$this->lang]['tituloLogin'] . "</title>
                </head>
                <body>
                <h1>" . LANGS[$this->lang]['tituloLogin'] . "</h1>");
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>");
        echo ("<label for='user'>" . LANGS[$_SESSION['lang']]['user'] . "</label>\n");
        echo ("<input type='text' name='user' id='user' value=''><br>\n");
        echo ("<label for='pass'>" . LANGS[$_SESSION['lang']]['pass'] . "</label>\n");
        echo ("<input type='pass' name='pass' id='pass' value=''><br>\n");
        echo ("<input type='submit' name='enviar' id='enviar' value='" . LANGS[$_SESSION['lang']]['send'] . "'>");
        echo ("</form>");
        echo ("<br>");
        $this->idiomas();

        echo ("    
                </body>
                </html>");
    }
    public function menu_nav()
    {
        foreach (OPS as $k => $v) {
            echo ("<a href='" . $v . "' style='margin: 0% 3%;'>");
            echo (LANGS[$this->lang][$k] . "</a>");
        }

    }
    public function front_menu($res){
        $this->front_menu_productos();
        $this->front_menu_filtros($res);
    }
    public function front_cuerpo_filtrado(){
        echo (
            "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>LISTADO: </legend>"
        );
        $pdao = new productoDAO();
        $filtros = $this->crear_array_Filtros();
        $this->tablaCR($pdao->getFiltered(explode(",",$filtros)));
        echo (
            "</fieldset>
                </div>");
    }
    public function front_cuerpo_insertado(){
        echo (
            "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>LISTADO: </legend>"
        );
        $pdao = new productoDAO();
        $filtros = $this->crear_array_Filtros();
        $pdao->getInsert(explode(",",$filtros));
        $this->tablaCR($pdao->getAll());
        echo (
            "</fieldset>
                </div>");
    }
    public function front_cuerpo_carrito($prods){
        echo (
            "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>LISTADO: </legend>"
        );
        $this->tablaCR($prods);
        echo (
            "</fieldset>
                </div>");
    }
    public function front_cuerpo(){
        echo (
            "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>LISTADO: </legend>"
        );
        $pdao = new productoDAO();
        $this->tablaCR($pdao->getAll());
        echo (
            "</fieldset>
                </div>");
    }
    public function crear_array_filtros(){
        $filtros = "";
        for($i=0;$i<count(NOM);$i++){
            if((count(NOM)-1)!=$i&&isset($_POST[NOM[$i]]))$filtros .= $_POST[NOM[$i]] . ",";
            else if(isset($_POST[NOM[$i]])) $filtros .= $_POST[NOM[$i]];
        }
        return $filtros;
    }
    public function front_menu_productos(){
        echo (
            "<div style='overflow:hidden; width:100%; height:80%;'>
                <div id='tables' style='float:left; width:30%; '>
                    <div>                
                        <fieldset>
                        <legend>Menu</legend>"
        );
        echo ("<h2>Productos</h2>");
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>\n");
        // for ($i = 0; $i < count(ACTIONS);$i++) {
        //     echo ("<input type='submit' name='".ACTIONS[$i]."' id='alta' value='".LANGS[$this->lang][ACTIONS[$i]]."'><br>\n");
        // }
        for($i = 0; $i < count(CRUD[$_SESSION["rol"]]);$i++){
            echo ("<input type='submit' name='".CRUD[$_SESSION["rol"]][$i]."' id='alta' value='".LANGS[$this->lang][CRUD[$_SESSION["rol"]][$i]]."'><br>\n");
        }
        echo ("</form>\n");
        echo ("</fieldset>
			</div>");
    }
    
    public function front_menu_filtros($res){
        echo (
            "<div>
			<fieldset>
				<legend>Filtros: </legend>");
        if(isset($res))$this->mostrar_filtros($res);
        echo ("	
                </fieldset>
                </div>
            </div>"
        );
    }
    public function mostrar_boton(){
        for($i = 0; $i < count(CRUD[$_SESSION["rol"]]);$i++){ 
            if (isset($_POST[CRUD[$_SESSION["rol"]][$i]])) {
                echo "<h1>Se ha pulsado ". LANGS[$this->lang][CRUD[$_SESSION["rol"]][$i]]."</h1>";
                return CRUD[$_SESSION["rol"]][$i];
            }
        }
    }
    public function mostrar_filtros($CRUD){
        echo ("<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>\n");
        $m = new Modelo();
        $pdao = new ProductoDAO();
        $results=$m->consultar("productos");
        if ($CRUD == "nuevo")unset($results[0]);
        foreach ($results as $row) {
            if ($row['Field'] != "imagen") {
                echo "<label for='$row[Field]'>" . LANGS[$this->lang][$row['Field']]."</label>";
                if($row['Field']=="prov"){
                    echo "<select name='$row[Field]' id='$row[Field]'>";
                    $proovedores=$pdao->getProovedores("productos");
                    for($i=0;$i<count($proovedores);$i++){
                        echo "<option value='".$proovedores[$i][$row['Field']]."'>".$proovedores[$i][$row['Field']]."</option>";
                    }
                    echo "</select><br/>";
                }else if (strpos($row['Type'], "varchar") !== false) {
                    echo "<input type='text' name='$row[Field]' id='$row[Field]'/><br/>";
                }else echo "<input type='number' name='$row[Field]' id='$row[Field]'/><br/>";
            }
        }
        echo("<input type='submit' name='".BOTN[$CRUD] ."'id='".BOTN[$CRUD]."' value='".LANGS[$this->lang][BOTN[$CRUD]]."'/>");
        echo ("</form>\n");
    }
}
?>