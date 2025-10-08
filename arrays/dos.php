<?php
$nombres=["Ana", "Juan"];
var_dump($nombres);
echo "<br>";
$nombres[1]="Lola";
var_dump($nombres);
$nombres[]="Vicente";
echo "<br>";
var_dump($nombres);
$nombres[]="Ines";
echo "<br>";
var_dump($nombres);
echo "<hr>";
for($i=0; $i<count($nombres);$i++){
    echo "nombres[$i]=".$nombres[$i]."<br>";
}
//--------------------------------------
$nombres[23]="Federico";
echo "<br>";
var_dump($nombres);
$nombres[]="Ultimo por ahora";
echo "<br>";
var_dump($nombres);
$nombres[13]="Que Pasara?";
echo "<br>";
var_dump($nombres);
echo "<hr>";
foreach($nombres as $valor){
    echo "$valor<br>";
}
echo "<hr>";
foreach($nombres as $indice=>$valor){
    echo "nombres[$indice]=$valor<br>";
}