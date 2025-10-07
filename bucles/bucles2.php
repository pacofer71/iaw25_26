<?php
//1.- for(entrada; salida; iteracion)
for ($i = 1; $i <= 10; $i++) {
    echo "$i, ";
}
//-----
echo "<br>";
for ($i = 0; $i <= 20; $i += 2) { //$i=$i+2
    echo "$i, ";
}
//-----
echo "<br>";
for ($i = 0; $i <= 20; $i += 7) { //$i=$i+2
    echo "$i, ";
}
//-------------------------
//queremos que nos mustre los multiplos de 7 entre 10 y 100 y me diga cuantos hay
echo "<hr>";
$cont = 0;
for ($i = 10; $i <= 100; $i++) {
    if ($i % 7 == 0) {
        echo "$i, ";
        $cont++;
    }
}
echo "<br> hay un total de $cont multiplos de 7";
//quiero saber todos los divisores del numero 1000 y contar cuantos hay
echo "<hr>";
$num = 1670;
$cont = 0;
for ($i = 1; $i <= $num; $i++) {
    if ($num % $i == 0) {
        echo "$i, ";
        $cont++;
    }
}
echo "<br>Hay un total de $cont divisores del numero $num";


// Programa que me diga si un numero guardado en una variable
//es o no primo
$numero = 2;
$esPrimo = true;
for ($i = 2; $i < $numero; $i++) {
    if ($numero % $i == 0) {
        $esPrimo = false;
        break;
    }
}
echo ($esPrimo) ? "<br>El número: $numero SI ES Primo."
    : "<br>El numero: $numero NO es primo";
//---------------------------------------------------------
//dado un numero $max quiero mostrar todos los primos entre 1
//y ese numero y además contarlos
//Ejemplo si el numero es 11: 1,2,3,5,7,11 hay 6 primos entre 1 y 11
echo "<hr>";
$max = 11;
$contPrimos = 0;
for ($candidato = 1; $candidato <= $max; $candidato++) {
    $esPrimo = true;
    for ($i = 2; $i < $candidato; $i++) {
        if ($candidato % $i == 0) {
            $esPrimo = false;
            break;
        }
    }
    if ($esPrimo) {
        echo "$candidato, ";
        $contPrimos++;
    }
}
echo "<br>Hay un total $contPrimos primos entre 1 y $max";
//----------------------------------------------------------

