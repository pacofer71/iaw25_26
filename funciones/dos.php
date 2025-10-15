<?php
$num=10;
echo esPrimo($num) ? "<br>$num es primo" : "<br>$num NO es primo";
//las funciones las podemos llamar en cualquier parte del documento independientemente
//de donde las tenga hechas
function esPrimo(int $numero): bool{
    //devolverá true si el numero es primo
    //false en otro caso
    for($i=2; $i<$numero; $i++){
        if($numero%$i==0) return false;
    }
    return true;
}

//quiero un programa que me muestre todos los primos del 1 al 1000
//primero sin usar la funcion anterior
//después usando la funcion esPrimo()
echo "<hr>";
//1.- Sin la función
for($candidato=1; $candidato<=1000; $candidato++){
    //Vamos a comporbar si candidato es primo, si es así lo muestro
    $esPrimo=true;
    for($i=2; $i<$candidato; $i++){
        if($candidato%$i==0){
            $esPrimo=false;
        }
    }
    if($esPrimo) echo "$candidato, ";
}
//2.- Ahora con la función esPrimo()
echo "<hr>";
for($candidato=1; $candidato<=1000; $candidato++){
    if(esPrimo($candidato)) echo "$candidato, ";
}
//------------------------------------------------------------------------------------------------------------------
echo "<hr>";
//no podemos usar $variable antes
echo "$variable";
$variable=230;



















