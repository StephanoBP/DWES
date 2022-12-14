<?php
define("BR","<br/>\n");
$cosas = array('',"",0,"0",array(),"\0",false, true,null,NULL);
foreach ($cosas as $k => $v){
    echo var_dump($v)."El elemento $k:\n<ol>";
    if(empty($v)) echo "<li>Está vacio</li>";
    else echo "<li>Tiene valor</li>";

    if (isset($v)) echo "<li>Está definido y no es null</li>";
    else echo "<li>No está definido o tiene valor null</li>";

    if (is_null($v)) echo "<li>Es null</li>";
    else echo "<li>No es null y tiene valor: $v</li>";
    echo "</ol>".BR;
}
/*
    ''          empty: true         isset: true
    0           empty: true         isset: true
    array()     empty: true         isset: true
    "\0"        empty: false        isset: true
    false       empty: true         isset: true         PHP lo interpreta como si fuese 0
    null        empty: true         isset: false
*/
?>