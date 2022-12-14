<?php
// Ejemplos con Arrays: operaciones CRUD Create - Retrieve (ir a por un elemento del array) - Update - Delete

//CREATE
$a=array("foo","bar","hola","mundo");
var_dump($a);
print("\n<br>");
//cambiar la palabra hola por adiós
$a[2]="adiós";//UPDATE

//RETRIEVE
var_dump($a);
print("\n<br>");
echo "$a[2] <br>";

$a[25]="kk";//CREATE
echo "$a[25] <br>";//RETRIEVE

//DELETE
var_dump($a);
print("\n<br>");
unset($a[25]);
var_dump($a);
print("\n<br>");
