<?php
require_once("HSGORD_const.inc.php");
class Vista_HSGORD{
    protected $lang;

    public function __construct($lang = "es"){
        $this->lang=$lang;
    }
    public function setLang_HSGORD($l){
        $this->lang = $l;
    }
    private function idiomas_HSGORD(){
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
        echo ("<input type='submit' name='cambiarIdioma' id='cambiarIdioma' value='".LANGS[$this->lang]['cambiarIdioma']."'");
        echo ("\n</br>\n");
        echo ("</form>");
    }
    public function form_login_HSGORD(){
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
        $this->idiomas_HSGORD();

        echo ("    
                </body>
                </html>");
    }
}