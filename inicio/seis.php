<?php
//operador ternario
$edad = 15;
if ($edad >= 18) {
    echo "Eres Mayor de edad";
} else {
    echo "Eres menor de edad";
}
echo "<br>";
echo ($edad >= 18) ? "Eres mayor de edad" : "Eres menor de edad";
//------------
//un alumno sera becario si es mayor de edad y aprueba todo
echo "<hr>";
$edad = 15;
$apruebaTodo = true;

if ($edad >= 18 && $apruebaTodo) {
    $becario = true;
} else {
    $becario = false;
}


$becario1 = ($edad >= 18 && $apruebaTodo);

var_dump($becario);
echo "<br>";
var_dump($becario1);

//-----------
echo "<hr>";
$cumpleAnios = true;
if ($cumpleAnios) {
    $regalo = "SI";
} else {
    $regalo = "NO";
}
echo "$regalo tienes regalo de cumpleaños";
//Lo mismo con el operador ternario ?:
echo "<hr>";
$regalo = ($cumpleAnios) ? "SI" : "NO";
echo "$regalo tienes regalo de cumpleaños";

// if else if else
echo "<hr>";
$num1 = 10934;
$num2 = 9134;
//  " 34 < 45 ", "34=34"
//esto funcionaria pero NO es una forma correcta y eficiente de hacerlo
if ($num1 < $num2) {
    echo "$num1 < $num2";
}
if ($num1 == $num2) {
    echo "$num1 = $num2";
}
if ($num1 > $num2) {
    echo "$num2 < $num1";
}
//esto seria la forma de hacerlo
echo "<br><br>";
if ($num1 < $num2) {
    echo "$num1 < $num2";
} else if ($num2 < $num1) {
    echo "$num2 < $num1";
} else {
    echo "$num2 = $num1";
}
//--------- programa que me determine
// si una persona es niño (<13), adolescente(>=13 <18)
// adulto >=18 <65
// tercera edad >=65
echo "<hr>";
$edad=5;
if($edad<13){
    echo "Eres un niño";
}else if($edad < 18){
    echo "Eres un adolescente";
}else if($edad<65){
    echo "Eres un adulto";
}else{
    echo "Estás en la tercera edad";
}
//DADA UNA NOTA DE 0 A 100 AMBOS INCLUSIVES 
//EL PROGRAMA MOSTRARA QUE EL ALUMNO ES:
//EXCELENTE NOTA >=90
//APROBADO DE >=70 <90
//NECESITA MEJORAR >=50 <70
//SUSPENSO <50
$nota=67;



