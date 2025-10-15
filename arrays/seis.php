<?php
$andalucia=[
    "Granada", 
    "Cadiz", 
    "Sevilla", 
    "Almeria", 
    "Huelva", 
    "Jaen", 
    "Malaga", 
    "Cordoba"
];
$galicia=["Pontevedra", "La Coruña", "Lugo", "Orense"];
$extremadura=["Caceres", "Badajoz"];
$madrid=["Madrid", "Alredores"];
$comunidades=[
    'Madrid'=>$madrid, 
    'Extremadura'=>$extremadura, 
    'Andalucia'=>$andalucia, 
    'Galicia'=>$galicia];
// Ordenaremos comunidades y provincias para mostrarlo todo en una lista
//1.- Ordenamos los nombres de la comunidades que son las claves del array $comunidades
ksort($comunidades);
//2.- Empiezo mostrando todo
echo "<ol>"; //Lista principal
foreach($comunidades as $comunidad=>$provincias){
    echo "<li>$comunidad</li>";
    sort($provincias); //ordeno el array de las provincias
    echo "<ul>"; // Abro la lista para cada provinvia
    foreach($provincias as $nomProv){
        echo "<li>$nomProv</li>";
    }
    echo "</ul>";
}
echo "</ol>"; 










