<?php
//Operaciones Lógicas sencillas
//AND (&&), OR(||), NOT (!), ==, ===, != if, if elseif ....
// %
$num = 26;
if ($num % 2 == 0) {
    echo "la variable \$num=$num es PAR";
} else {
    echo "la variable \$num=$num es IMPAR";
}
//Hacer un programa que me diga si $num es multiplo de 7
echo "<br>";
if ($num % 7 == 0) {
    echo "El numero \$num=$num es Multiplo de 7";
} else {
    echo "El numero \$num=$num es NO Multiplo de 7";
}
//Hacer un programa que me diga si $num es multiplo de 13
echo "<br>";
if ($num % 13 != 0) {
    echo "El numero \$num=$num es NO Multiplo de 13";
} else {
    echo "El numero \$num=$num es  Multiplo de 13";
}
//---------------------------------------------------------------------
$tareaHecha=true;
$hora=19;
echo "<hr>";
//Juan podra salir de su casa SI tiene la tarea hecha y la hora es posterior a las 18.
//queremos un programa que me diga en funcion del valor de $tareaHecha y $hora
//si Juan podrá o no salir
if($tareaHecha==true && $hora>=18){
    echo "Juan SI puede Salir.";
}else{
    echo "Juan NO puede salir.";
}
//---------------------------------------------------------------------
$tareaHecha=false;
$hora=21;
echo "<hr>";
//Juan podra salir de su casa SI tiene la tarea hecha y la hora
// es posterior a las 18 y no superior a las 22.
//queremos un programa que me diga en funcion del valor de $tareaHecha y $hora
//si Juan podrá o no salir
if($tareaHecha==true && $hora>=18 && $hora<=22){
    echo "Juan SI puede Salir.";
}else{
    echo "Juan NO puede salir.";
}
//-----------------------------------------------------------------------------------------------
//Pepe recibirá una paga si tiene 35 o más años trabajados
// o su edad es superior o igual a 70
$tiempoTrabajado=22;
$edad=80;
echo "<hr>";
if($tiempoTrabajado>=35 || $edad>=70){
    echo "Pepe SI cobrará su pensión";
}else{
    echo "Pepe NO cobrará su pensión";
}
//una persona recibira el carnet joven si lo ha solicitado y se edad está
//entre 18 y 30 años, ambos incluidos
//o bien si la variable $enchufado=true
echo "<hr>";
$enchufado=true;
$edad=201;
$solicitado=false;
if(($solicitado==true && $edad>=18 && $edad<=30) || $enchufado==true){
    echo "El usuario SI recibe el carnet Joven";
}else{
    echo "El usuario NO recibe el carnet Joven";
}
// Cuando la variable es bool no haria falta poner
//==true o ==false, veamoslo
//haremos un programa que me diga
//si el usuario es o no campeon en funcion
//de la variable $campeon
echo "<hr>";
$campeon=true;
if($campeon){
    echo "El usuario SI es campeon";
}else{
    echo "El usuario NO es campeon";
}
//--------------------------------------------------------------------------------------------
echo "<hr>";
$num=124;
if($num%2){
    echo "El numero: $num NO es par";
}else{
    echo "El numero: $num SI es par";
}

// operador negacion not '!'
//convierte el true en false y viceversa
echo "<br>";
$valor=false;

if($valor){
    echo "El valor es true";
}else{
    echo "El valor es false";
}
echo '<br>';
if(!$valor){
    echo "El valor es FALSO";
}else{
    echo "El valor es true";
}





