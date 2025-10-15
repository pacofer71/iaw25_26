<?php
// Conversion de tipos
//1.- Conversion automatica (implicita)
$num1=45;
var_dump($num1);
$num1="Manolo";
echo "<br>";
var_dump($num1);
//2.- conversion explicita (Manual)
echo "<hr>";
$numero=345;
$valorNum= (string) $numero;
var_dump($valorNum);
$valor='300';
echo "<br> El valor de \$valor es: $valor y el tipo es: ".gettype($valor);
$precio=34.56;
$precioS=(string) $precio;
echo "<br>";
var_dump($precioS);
$precioLimpio=(int) $precio;
echo "<br>";
var_dump($precioLimpio);
//2.1 string y numeros a bool
$a=-3;
$b=0;
$c=23.56;
$d=0.0;
$e="Manolo";
$f="";

$aB= (bool) $a;
echo "<br>";
var_dump($aB);
$bB= (bool) $b;
echo "<br>";
var_dump($bB);

$cB= (bool) $c; //c=23.56
echo "<br>";
var_dump($cB);
$dB= (bool) $d;//d=0.0
echo "<br>";
var_dump($dB);

$eB= (bool) $e; //e="manolo"
echo "<br>";
var_dump($eB);  //sera true
$fB= (bool) $f;//f=""
echo "<br>";
var_dump($fB); //sera falso

//2.2 string a numeros
echo "<hr>";
$cad="123.56 sdffsd Msdfsdfsdfnolo sdfsdf";
$cadT=(float) $cad;
$cadT2=(int) $cad;
echo "El valor de \$cadT es $cadT y su tipo es: ".gettype($cadT);
echo "<br>";
echo "El valor de \$cadT2 es $cadT2 y su tipo es: ".gettype($cadT2);
echo "<br>";
echo "<br>------------------------------CAdena chunga------------------<br>";
$cad="dksdjfh ksdj skdj fhksdsdjkf s 123.56";
$cadT=(float) $cad;
$cadT2=(int) $cad;
echo "El valor de \$cadT es $cadT y su tipo es: ".gettype($cadT);
echo "<br>";
echo "El valor de \$cadT2 es $cadT2 y su tipo es: ".gettype($cadT2);
echo "<br>";

///
//$precio=500;
$frase='El precio es $precio euros';
$precio=500;
//mostramos la frase literal y luego con el valor reemplazado
echo $frase;
echo "<br>El precio es $precio euros";
