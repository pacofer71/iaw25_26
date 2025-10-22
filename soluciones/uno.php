<?php
//Crear una funcion pintar($numero) que pinta la tabla de multiplicar desde el 1 al 10 de numero
function pintar(int $numero): void{
    echo "<table border='1' align='center'>";
    for($i=1; $i<=10; $i++){
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>X</td>";
        echo "<td>$i</td>";
        echo "<td>=</td>";
        echo "<td>".$numero*$i."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
}
pintar(7);
pintar(9);