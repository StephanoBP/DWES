<!DOCTYPE html>
<!-- arrays_1.php-->
<?php
// EJEMPLOS CON ARRAYS
$a=array(
    1=> "hola",
    5=>"adios",
    "que"=>"tal");
$b=array(
    1=> "hola",
    5=>"adios",
    "que"=>5.8,
    "si"=>True,
    5.2=>"Talue",
    True=>"klk");
//Ver un array completo de forma sencilla
var_dump($a);
echo "<br/>",gettype($a),"<br/>";
var_dump($b);
print($a);

/* conclusiones
* si ponemos indices de tipo float los trunca al int correspondiente 
* si ponemos como índice True o False los sustituye por 1 o 0
* si hay índices repetidos (aunque sean resultado de truncamiento, etc.)
* lo que hace es quedarse con el último valor que se haya puesto para esa clave.
*/
?>