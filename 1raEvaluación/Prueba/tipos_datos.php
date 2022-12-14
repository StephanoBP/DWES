<!DOCTYPE html>
<!-- tipos_datos.php-->
<?php
//comentario
/*
*los comentarios se escriben igual que en java
*
*PHP NO es un lenguaje fuertemente tipado
*Las variables se declaran por su nombre, SIN TIPO
*
*/

$entero;
$entero=3;
echo "$entero <br/> \n";

$entero = "hola <br/> \n";
echo "$entero \n";

//Tipos de Datos

//integer
$i=3;

//coma flotante
$f=7.85;

//string
$s="hola";

//boolean
$b=true;//esta es una palabra reservada del lenguaje
$b=false;

//el método gettype me dice el tipo de una variable en un momento dado
echo gettype($b),"<br/>",gettype($s),"<br/>";

//Algunos datos importantes que podemos conocer de PHP
echo PHP_INT_SIZE."<br/>";
echo PHP_INT_MIN."<br/>";
echo PHP_INT_MAX."<br/>";

//tipo double
$largo=92233720368547758070;
echo "$largo <br/>",gettype($largo)."<br/>";

//asignación

$a=100;
$b=&$a; //por referencia
$c=$a; //por copia

echo "\"\$b\" tiene el valor: $b<br/>"; //100

$b=300;
echo "\"\$a\" tiene el valor: $a<br/>"; //300, al cambiar $b TAMBIÉN cambia $a

$c=400;
echo "\"\$c\" tiene el valor: $c<br/>"; //400


echo "EJEMPLO NO_INIT.PHP";

define("VALOR",100);//constante

//$a=100;
$a=VALOR;
$c=$a+$b; //$b se crea en el momento PERO no se le ha asignado valor

echo "\$b tiene el valor: $b<br/>"; //100
echo "\$b tiene el valor: $b<br/>"; //100
echo gettype($b), "<br/>\n";



define("BR", "<br/>\n" );

echo "Tipos_String.php" .BR;



$a='Hola';

$s1="Digo: $a" .BR;
$s2="Digo: $a" .BR;

echo $s1.$s2;

//Aprendemos algunas variables globales útiles

echo "Ruta desde htdocs: ".$_SERVER['PHP_SELF'].BR;
echo "Nombre del server: ".$_SERVER['SERVER_NAME'].BR;
echo "Software del server: ".$_SERVER['SERVER_SOFTWARE'].BR;
echo "Protocolo: ".$_SERVER['SERVER_PROTOCOL'].BR;
echo "Método de la petición: ".$_SERVER['REQUEST_METHOD'].BR;



foreach($_SERVER as $k=>$v){
    echo "valor de \$_SERVER[$k]: $v" .BR;
}

echo "TIPO_BUCLE_BREAK".BR;
$i=0;
while($i<5){

    echo $i.BR;
    $i++;
    if($i==3)break;
}

echo "Ejemplo de bucles anidados con break".BR;

echo "Primer For:".BR;

for ($i=0;$i<4;$i++){
    for($j=0;$j<4;$j++){
        echo "i: $i; j: $j".BR;
        if($j==2)break;//break 1
    }//for interno
}//for externo

echo "Segundo For:".BR;

for ($i=0;$i<4;$i++){
    for($j=0;$j<4;$j++){
        echo "i: $i; j: $j".BR;
        if($j==2)break 2;//break 2
    }//for interno
}//for externo



echo "147 04:56"









?>