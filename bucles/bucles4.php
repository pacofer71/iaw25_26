<?php
//Deseo un programa que me sume todos los numeros desde 1 a $num=100;
$num = 15;
$suma = 0;
for ($i = 1; $i <= $num; $i++) {
    $suma += $i; //$suma=$suma+i;
}
echo "<br>La suma de los $num primeros números es: $suma";
//Lo mismo ahora para el producto
$num = 10;
$prod = 1;
for ($i = 1; $i <= $num; $i++) {
    $prod *= $i; //$prod=$prod*$i;
}
echo "<br>El pruducto de lo $num números es: $prod";
//ejercicio 12  primeros terminos d fibonacci

// Definimos los dos primeros números de Fibonacci-------
echo "<hr>";
$termino1 = 0;
$termino2 = 1;

// Mostramos los dos primeros
echo "F(1)=$termino1<br>";
echo "F(2)=$termino2<br>";

// Imprimimos los siguientes 10 números (en total serán 12)
for ($i = 3; $i <= 12; $i++) {
    $terminoNuevo = $termino1 + $termino2;
    echo "F($i)=$terminoNuevo<br>";

    // Actualizamos los valores
    $termino1 = $termino2;
    $termino2 = $terminoNuevo;
}
//-----------------

//Impares del 30 al 1
echo "<hr>";
for ($i = 30; $i >= 1; $i--) {
    if ($i % 2 != 0) {
        echo "$i, ";
    }
}
echo "<hr>";
for ($i = 29; $i >= 1; $i -= 2) {
    echo "$i, ";
}
// Suma de los cuadrados de los primeros 8 numeros
echo "<hr>";
$suma = 0;
for ($i = 1; $i <= 8; $i++) {
    $num = $i * $i;
    $suma += $num;
}
echo "<br>La suma de lo 8 primeros numeros al cuadrado es: $suma";
echo "<hr>";
//secuencia numerica 1,4,7,10,13,...,15, así hasta 15
//$cont = 1;
for ($cont=1, $i = 1; $cont <= 15; $i += 3, $cont++) {
    echo "$i, ";
}
