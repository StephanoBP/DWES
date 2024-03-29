<?php

    require_once("./modelo/const.inc.php");
    define("BR","<br/>\n");
    class Vista{
        public $lang;
        public function __construct($lang='en'){
            $this->lang=$lang;
            //$_SESSION['lang']=$lang;
        }
        public function setLang($l){
            $this->lang=$l;
        }

        public function tablaCR($t){
            $s="<table border=1>".BR;
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
        public function tabla($t){
            foreach($t as $k=>$e) {
                var_dump($e);
                echo("<br/>");
            }
        }
        public function toTabla($t){
            //var_dump($t);
            echo("<table border=1>".BR);
            //$s.="<tr><th>Cod.</th><tr><th>Nombre</th><tr><th>Clave</th><tr><th>Rol</th></tr>";
            echo("<tr>");
            foreach($t[0] as$k=>$f){
                echo("<th>$k</th>");
            }
            echo("</tr>");
            foreach($t as $k=>$f) {
                echo("<tr>");
                foreach($f as $v) {
                    echo("<td>$v</td>\n");
                }
                echo("</tr>\n");
        
            }
            echo("</table>\n");
        
        }
        private function bienvenida($user){
            echo("<h3>".LANGS[$this->lang]['welcome'].", ". $user."</h3>");
        }
        private function idiomas(){
            echo("<form action='".$_SERVER['PHP_SELF']."' method='POST'>");
            echo("<select name='lang' id='lang'>\n");
            
            foreach (LANGS as $idioma => $tabla) {
                if($idioma==$_SESSION['lang']){
                    echo("<option value=$idioma selected>".$tabla['lang']."</option>\n");
                }else{
                    echo("<option value=$idioma>".$tabla['lang']."</option>\n");
                }
            }
           
            echo("</select>");
            echo("<input type='submit' name='cambiarIdioma' id='cambiarIdioma' value='CAMBIAR IDIOMA'>");
            echo("\n</br>\n");
            echo("</form>");
        }
        public function cabecera(){
            echo(
                "<html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>".TTL."</title>
                </head>
                <body>");
			echo("<div style='width:100%; height:20%; text-align:center; margin:1%;'>");
			echo("<h1>".TTL."</h1>");
			$this->bienvenida($_SESSION['user']);
			$this->idiomas();

			echo("</div>");
			
			echo("<div style='width:100%; height:20%; text-align:center; margin:1%;'>");
            $this->menu_nav();
			echo("</div>");        
        }
        public function cierre_cabecera(){
            echo("
                </div>			
                </body>
            </html>");        
        }
        public function form_login(){
            echo("<form action='".$_SERVER['PHP_SELF']."' method='POST'>");
            $this->idiomas();
            echo("<label for='user'>".LANGS[$_SESSION['lang']]['user']."</label>\n");
            echo("<input type='text' name='user' id='user' value='javi'><br>\n");
            echo("<label for='pass'>".LANGS[$_SESSION['lang']]['pass']."</label>\n");
            echo("<input type='pass' name='pass' id='pass' value='javi'><br>\n");
            echo("<input type='submit' name='enviar' id='enviar' value='".LANGS[$_SESSION['lang']]['send']."'>");
            echo("</form>");
            
        }
        public function form_login_profe(){
            echo("<html>
                <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>".LANGS[$this->lang]['tituloLogin']."</title>
                </head>
                <body>
                <h1>".LANGS[$this->lang]['tituloLogin']."</h1>");

            echo("<form action='".$_SERVER['PHP_SELF']."' method='POST'>");
            echo("<label for='user'>".LANGS[$_SESSION['lang']]['user']."</label>\n");
            echo("<input type='text' name='user' id='user' value='javi'><br>\n");
            echo("<label for='pass'>".LANGS[$_SESSION['lang']]['pass']."</label>\n");
            echo("<input type='pass' name='pass' id='pass' value='javi'><br>\n");
            echo("<input type='submit' name='enviar' id='enviar' value='".LANGS[$_SESSION['lang']]['send']."'>");
            echo("</form>");
            echo("<br>");
            $this->idiomas();

            echo("    
                </body>
                </html>");
        }
        public function menu_nav(){
            foreach (OPS as $k => $v) {
                echo("<a href='".$v."' style='margin: 0% 3%;'>");
                echo(LANGS[$this->lang][$k]."</a>");
            }
            
        }
        public function front_menu(){
            $this->front_menu_productos();
            $this->front_menu_filtros();
        }
        public function front_cuerpo(){
            echo(
                "<div id='cuerpo' style='width:70%; float:left;'>
			<fieldset>
			<legend>Sección: </legend>
			<h3 style='color:red'>SECCIÓN</h3>"
            );
            $pdao=new productoDAO();
            $this->tablaCR($pdao->getAll());
            echo(
                "</fieldset>
                </div>");
        }
        public function front_menu_productos(){
            echo(
                "<div style='overflow:hidden; width:100%; height:80%;'>
                <div id='tables' style='float:left; width:30%; '>
                    <div>                
                        <fieldset>
                        <legend>Menu</legend>"
            );
            echo("<h2>Productos</h2>");
            echo("<form action='".$_SERVER['PHP_SELF']."' method='POST'>\n");
            foreach (ACTIONS as $key => $value) {
                echo("<input type='submit' name='$key' onclick='javascript'alert('Se ha pulsado $value')' id='alta' value='$value'><br>\n");
            }
            echo("</form>\n");
            echo("</fieldset>
			</div>");
        }
        public function front_menu_filtros(){
            echo(
                "<div>
			<fieldset>
				<legend>Filtros: </legend>");
			echo("ESTA ES UNA SECCIÓN");
			echo("	
                </fieldset>
                </div>
            </div>"
            );
        }
    }
