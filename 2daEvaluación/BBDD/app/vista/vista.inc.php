<?php
define("BR", "<br/>\n");
require_once("../modelo/const.inc.php");
class Vista{
    protected $lang;

    public function __construct($lang = "es"){
        $this->lang=$lang;
    }

    function tabla($t)
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
    function tablaCR($t){
        $s = "<table border=1>" . BR;
        //$s.="<tr><th>Cod.</th><tr><th>Nombre</th><tr><th>Clave</th><tr><th>Rol</th></tr>";
        $s .= "<tr>";
        foreach ($t[0] as $k => $f) {
            $s .= "<th>$k</th>";
        }
        $s .= "</tr>";
        foreach ($t as $k => $f) {
            $s .= "<tr>";
            foreach ($f as $v) {
                $s .= "<td>$v</td>\n";
            }
            $s .= "</tr>\n";

        }
        $s . "</table>\n";
        echo $s;
    }
    function hola($ses){
        $m= BR."<h3>".LANGS[$this->lang]['bienvenida'].",".$ses['user']."</h3>".BR;
        return $m;
    }
    function cabecera(){
        $s = "<div style='width:100%; heigth:20%; text-align:center; margin 1%;'>";
        $s .= "<h1>GESVENTAS</h1>";
        $s .= $this->menu_nav();
        $s .= $this->hola($_SESSION);
        $s .= $this->lenguajes();
        $s .= "</div";
        echo $s;
    }
    public function menu_nav(){
        $s = "";
        //menú de navegación... iterar OPS de const.inc.php
        foreach(OPS as $k=> $v){
            $s .= "<a href='" . $v . "'style='margin:0% 3%;'>";
            //traducido el texto al elemento a
            $s .= LANGS[$this->lang][$k]."</a>\n";
        }
        return $s;
    }
    public function lenguajes(){
        $f="<form action='".$_SERVER['PHP_SELF']."'method='POST'>";
        $f.="<select name='lang'>".BR;
        /*$f.="<option value='es'>ESPAÑOL</option>".BR;
        $f.="<option value='en'>INGLES</option>".BR;
        $f.="<option value='fr'>FRANCES</option>".BR;
        $f.="<option value='pr'>PORTUGUES</option>".BR."</select>";
        */
        foreach(LANGS as $k=>$v){
            $f.="<option value='$k'>".$v['lang']."</option>".BR;
        }
        $f.="</select>";
        $f.="<input name='enviar' type='submit' value'enviar'/></form>".BR;
        return $f;
    }
    public function form_login(){

    }
    public function error(){
        return "Error";
    }
}