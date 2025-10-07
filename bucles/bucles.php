<?php
//Los bucles nos permiten hacer cosas repetitivas
// for(), while(), do while(), foreach(),
//Vamos a mostrar los numeros del 1 al 20;
for ($i = 0; $i <= 20; $i += 5) {
    echo "$i<br>";
}
echo "<hr>";
//mostrar todos los multiplos de 3 del 0 al 30
for ($i = 0; $i <= 30; $i += 3) {
    echo "$i, ";
}
echo "<hr>";
//mostrar todos los multiplos de 13 del 15 al 1300
for ($i = 15; $i <= 1300; $i++) {
    if ($i % 13 == 0) { // if(!($i%13))
        echo "$i, ";
    }
}
echo "<hr>";
for ($i = 26; $i <= 1300; $i += 13) {
    echo "$i, ";
}
// Calcular la suma de los 100 primeros numeros
echo "<hr>";
$suma = 0;
for ($i = 1; $i <= 5; $i++) {
    $suma += $i;  // suma=suma+i
}
echo "La suma de los 100 primeros numeros es: <b>$suma</b><br>";
//producto de los 10 primeros numeros 1x2x3x4x5x...x10=
echo "<hr>";
$producto = 1;
for ($i = 1; $i <= 10; $i++) {
    $producto *= $i;  // producto=producto*i
}
echo "El producto de los 10 primeros numeros es: <b>$producto</b><br>";
echo "<hr>";
// Dado el numero guardado en la variable $num, 
// quiero saber la cantidad de divisores que tiene
// y que me los muestre
//por ejemplo si num=12, 1,2,3,4,6,12 un total de 6 divisores
$num=22;
$cont=0;
for($i=1; $i<=$num; $i++){
    if($num%$i==0){
        echo "$i, ";
        $cont++;
    }
}
echo "<br>$num tiene un total $cont divisores";