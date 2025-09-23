<?php
// No lo cerrare pues esta pagina solo tendra codigo php no una estructura html
// Variables
$nombre="Manolo";
$pass="secret0";
$nombreCompletoBueno="Juan Perez"; //camel case
$nombreCompletoFalso="Juan Nadie"; //camel case
$numero=234;
$pvp=45.78;
$esValido=true;
$loginValido=true;
$dato=null;
/*
 int, float|double, string, bool, array, object, null 
*/
echo "La variable \$pvp de valor $pvp es de tipo: ". gettype($pvp)."<br />\n";
echo 'La variable $pvp de valor '. $pvp .' es de tipo: '. gettype($pvp)."<br />\n";
// quiero esta salida Tu nombre es "Julian"
echo "Tu nombre es \"Julian\" <br>\n";
echo 'Tu nombre es "Julian" <br>'."\n"; // /n no funciona con comillas simples!!!!!
//Ahora quiero Tu nombre es 'Julian';
echo "Tu nombre es 'Julian' <br>\n";
echo 'Tu nombre es \'Julian\' <br>';
// /n es salto de linea xo NO en todos los so, para no tener problemas usare PHP_EOL
echo "<br>".PHP_EOL;
echo "Tu nombre es juan <br>".PHP_EOL;
echo "Tus apellidos Perez Gil<br>".PHP_EOL;
echo "Adios";
echo "<hr>";
//-----------------------------------------------------------------
echo 'La variable $nombreCompletoBueno de valor: '.$nombreCompletoBueno.' es de tipo: '.gettype($nombreCompletoBueno);
echo "<br>";
var_dump($esValido);
echo "<br>";
var_dump($nombreCompletoBueno);
//--------------------------- var_dump
$var1=34;
$var2=56.89;
$var3=false;
$var4="Variable superchula";
$var5=null;
echo "<br>";
var_dump($var1);
echo "<br>";
var_dump($var2);
echo "<br>";
var_dump($var3);
echo "<br>";
var_dump($var4);
echo "<br>";
var_dump($var5);
echo "<br>";
var_dump($var6);

















