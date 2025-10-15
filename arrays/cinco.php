<?php
// Funciones interesantes para los arrays
//1.- count()
//2.- array_push() y array_pop()
$frutas=[
    'peras', 'manzanas', 'naranjas', 'sandias'
];
array_push($frutas, 'melocoton');
print_r($frutas);
$frutas[]="Kiwi";
echo "<br>";
print_r($frutas);
array_pop($frutas);
echo "<br>Depes del array pop<br>";
print_r($frutas);
//3.- array_unshift() y array_shift()
echo "<hr>";
var_dump($frutas);
array_unshift($frutas, 'Fruta Rara');  //añade al principio
echo "<br>";
var_dump($frutas);
array_shift($frutas);
echo "<br>_______</br>";
var_dump($frutas);
//4.- sort(), rsort(), ksort(), krsort(), asort(), arsort()
$datos=[
    'almeria'=>'juan',
    'zaragoza'=>'alberto',
    'caceres'=>'pedro',
    'granada'=>'zacarias',
    'valencia'=>'marcos'
];
echo "<hr><hr>";
echo "______ ARRAY ORIGINAL______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
sort($datos);
echo "<br>______ ARRAY DESPUES DE SORT()______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
//--------------------------rsort()
$datos=[
    'almeria'=>'juan',
    'zaragoza'=>'alberto',
    'caceres'=>'pedro',
    'granada'=>'zacarias',
    'valencia'=>'marcos'
];
echo "<hr><hr>";
echo "______ ARRAY ORIGINAL______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
rsort($datos);
echo "<br>______ ARRAY DESPUES DE RSORT()______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
//--------------------------ksort()
$datos=[
    'almeria'=>'juan',
    'zaragoza'=>'alberto',
    'caceres'=>'pedro',
    'granada'=>'zacarias',
    'valencia'=>'marcos'
];
echo "<hr><hr>";
echo "______ ARRAY ORIGINAL______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
ksort($datos);
echo "<br>______ ARRAY DESPUES DE KSORT()______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
//--------------------------krsort()
$datos=[
    'almeria'=>'juan',
    'zaragoza'=>'alberto',
    'caceres'=>'pedro',
    'granada'=>'zacarias',
    'valencia'=>'marcos'
];
echo "<hr><hr>";
echo "______ ARRAY ORIGINAL______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
krsort($datos);
echo "<br>______ ARRAY DESPUES DE KRSORT()______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
//--------------------------asort()
$datos=[
    'almeria'=>'juan',
    'zaragoza'=>'alberto',
    'caceres'=>'pedro',
    'granada'=>'zacarias',
    'valencia'=>'marcos'
];
echo "<hr><hr>";
echo "______ ARRAY ORIGINAL______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
asort($datos);
echo "<br>______ ARRAY DESPUES DE ASORT()______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
//--------------------------arsort()
$datos=[
    'almeria'=>'juan',
    'zaragoza'=>'alberto',
    'caceres'=>'pedro',
    'granada'=>'zacarias',
    'valencia'=>'marcos'
];
echo "<hr><hr>";
echo "______ ARRAY ORIGINAL______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
arsort($datos);
echo "<br>______ ARRAY DESPUES DE ARSORT()______________<br>";
echo "<pre>";
print_r($datos);
echo "</pre>";
//5.- in_array(); -----------------------------------
$nombres=['pepe', 'lucas', 'pedro'];
$nuevo='lucas';
if(in_array($nuevo, $nombres)){
    echo "<br>$nuevo pertenece al array de nombres";
}else{
    echo "<br>$nuevo NO pertenece al array de nombres";
}
echo "<br>";
echo in_array($nuevo, $nombres) ? "<br>$nuevo pertenece al array de nombres" :
    "<br>$nuevo NO pertenece al array de nombres";












