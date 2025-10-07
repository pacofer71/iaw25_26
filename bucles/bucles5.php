<?php
//bucle while y do while
//imprimir los $num primeros numeros pares;
$num=40;
$contador=0;
while($num>0){
    echo "$contador, ";
    $contador+=2;
    $num--;
}
//usar while para mostrar los impares de 1 a 100
echo "<br>";
$num=1;
while($num<=100){
    echo "$num, ";
    $num+=2;
}
echo "<hr>";
$num=1;
while(true){
    echo "$num, ";
    $num+=2;
    if($num>=100) break;
}
// Mostrar los numeros decrecientes del 100 al 1 usando un while
echo "<hr>";
$num=100;
while($num>0){
    echo $num-- .", ";
    /*
    echo "$num, ";
    $num--;
    */
}
//------------------- DO WHILE()
//mostrar los 50 primeros multiplos de 7=> 0, 7, 14, ........
echo "<hr>";
$multiplo=0;
$veces=0;
do{
    echo "$multiplo, ";
    $multiplo+=7;
    $veces++;
}while($veces<50);
// Mostrar los numeros decrecientes del 100 al 1 usando un do while
echo "<hr>";
$num=100;
do{
    echo $num--.", ";
}while($num>0);






