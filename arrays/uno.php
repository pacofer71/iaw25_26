<?php
$numeros = [1, 2, 3, 4, 5, 6, 7, 8];
echo print_r($numeros);
echo "<hr>";
echo $numeros[0]; //me dira el primer elemento del array
echo "<br>";
echo $numeros[7];
$cads=["Manolo", "Juan", "Ana", "Pedro", "Pepe", "Inés"];
echo "<hr>";
echo $cads[2];
echo "<hr>";
//count() devuelve la cantidad de elementos de un array
//count($cads)=4
echo "<hr>";
for($i=0; $i<count($cads); $i++){
    echo $cads[$i]."<br>";
}
echo "<hr>";
$indice=0;
while($indice<count($cads)){
    echo $cads[$indice]."<br>";
    $indice++;
}

