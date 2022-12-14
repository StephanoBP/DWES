<?php
//$número=$_POST[num]
define("BR", "<br/>\n" );

$número=82346;
$número2=$número;
$iteracion=0;
$inversa="";


do{
    $número2 = $número2/10;
    $iteracion++;
}while($número2>10);
  $número2 = $número2 + 7/10**($iteracion+1);
for($i=0;$i<=$iteracion;$i++){
    echo "Cifra ". $i+1 . ": '" .$número2%10 ."'" .BR;
    $número2=($número2-$número2%10)*10;
}//for
    echo "<h3 style='color:purple'>Y ahora de forma inversa:</h3>" .BR .$inversa;
for($i=1;$i<=$iteracion+1;$i++){
    echo "Cifra " . $iteracion-$i+2 . ": '".($número%(10**$i)-$número%(10**($i-1)))/(10**($i-1))."'".BR;
}//for

$_POST['num']=(integer)($_POST['num']);

if($_POST['num']==0){ 
    echo "No has marcado un número intentalo de nuevo." .BR .BR .BR;
}else{
    echo "<h1 style='color:red'>Este es el número que has marcado:</h1>" .BR;
    echo $_POST['num'] .BR .BR;
    $número=$_POST['num'];
    $número2=$número;
    $iteracion=0;
    $inversa="";


do{
    $número2 = $número2/10;
    $iteracion++;
}while($número2>10);
  $número2 = $número2 + 7/10**($iteracion+1);
for($i=0;$i<=$iteracion;$i++){
    echo "Cifra ". $i+1 . ": '" .$número2%10 ."'" .BR;
    $número2=($número2-$número2%10)*10;
}//for
    echo "<h3 style='color:purple'>Y ahora de forma inversa:</h3>" .BR .$inversa;
for($i=1;$i<=$iteracion+1;$i++){
    echo "Cifra " . $iteracion-$i+2 . ": '".($número%(10**$i)-$número%(10**($i-1)))/(10**($i-1))."'".BR;
}//for

}


?>