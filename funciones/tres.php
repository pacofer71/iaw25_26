<?php
//ambitos de las variables
function incrementaValor(int $a){
    $a++; //esta variable SOLO existe en la funcion
    $manolo="Admin";
    echo "<br>El valor de \$a en la funcion es: $a";
}
function incrementar1(&$a){ //paso por referencia
    $a++;
    echo "<br>El valor de \$a en la funcion del & es: $a";
}
function incrementar2(){
    global $nombreVariable;
    $nombreVariable++;
}
$a=12;
incrementaValor($a); //pasamos el valor de $a, 12 en este caso NO la variable
//decimos que pasamos elparametro por valor, es la forma normal
echo "<br>El valor de \$a después de llamar a la funcion es: $a";
echo "<hr>";
$manolo=12;
incrementar1($manolo);
echo "<br>El valor de \$manolo después de llamar a la funcion & es: $manolo";

$nombreVariable=500;
incrementar2();
echo "<br> El valor de \$nombreVariable=$nombreVariable";

$a=[1,2,3];
sort($a)




