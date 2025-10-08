<?php
$andalucia=[
    "Almeria", 
    "Cadiz", 
    "Cordoba", 
    "Granada", 
    "Huelva", 
    "Jaen", 
    "Malaga", 
    "Sevilla"
];
$galicia=["La Coruña", "Lugo", "Orense", "Pontevedra"];
$extremadura=["Caceres", "Badajoz"];
$madrid=["Madrid"];

$comunidades=[
    'Andalucia'=>$andalucia,
    'Galicia'=>$galicia,
    'Extremadura'=>$extremadura,
    'Madrid'=>$madrid
];
var_dump($comunidades['Extremadura']);
echo "<br>";
echo $comunidades['Andalucia'][1];
echo "<hr>";


echo "<ol>"; // Lista principal
foreach($comunidades as $nombreComunidad => $provincias){
    echo "<li>$nombreComunidad</li>";
    echo "<ul>"; // Abrimos la lista para las provincias de cada comunidad
    foreach($provincias as $nomProv){
        echo "<li>$nomProv</li>";
    }
    echo "</ul>";
}
echo "</ol>";
echo "<hr>";
foreach($comunidades as $nombreComunidad => $provincias){
    echo "<table align='center' border='2'>";
    echo "<tr align='center' style='background-color:aqua'>";
        echo "<td colspan='".count($provincias)."'>".$nombreComunidad."</td>";
    echo "</tr>";
    echo "<tr>";
        foreach($provincias as $nomProv){
            echo "<td>$nomProv</td>";
        }
    echo "</tr>";
    echo "</table>";
    echo "<br>";
}
















