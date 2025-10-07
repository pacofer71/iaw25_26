<?php
//vamos a pintar una tabla html de $filas=4 x $columnas=5;
//usaremos "for"
$filas = 8;
$columnas = 8;
echo "<table border='1' align='center'>";
for ($f = 0; $f < $filas; $f++) {
    $color = ($f % 2 == 0) ?  "white" : "silver";
    echo "<tr style='background-color:$color'>";
    for ($c = 0; $c < $columnas; $c++) {
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<hr>";
// CAmbiaremos ahora los colores por columnas
echo "<table border='1' align='center'>";
for ($f = 0; $f < $filas; $f++) {
    echo "<tr>";
    for ($c = 0; $c < $columnas; $c++) {
        $color = ($c % 2 == 0) ? "pink" : "blue";
        echo "<td style='background-color:$color'>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
    }
    echo "</tr>";
}
echo "</table>";
//---------------- TABLERO DE AJEDREZ ------------
echo "<hr>";
// CAmbiaremos ahora los colores por columnas
echo "<table border='1' align='center' cellpadding='4'>";
for ($f = 0; $f < $filas; $f++) {
    echo "<tr>";
    for ($c = 0; $c < $columnas; $c++) {
        $color = (($f + $c) % 2 == 0) ? "white" : "black";
        echo "<td style='background-color:$color'>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
    }
    echo "</tr>";
}
echo "</table>";

//----------------------- TABLA MULTIPLICAR --------------------------------------
echo "<hr>";
$numero = 7;
echo "\n<table align='center' border='2'>";
echo "\n<tr align='center'><td colspan='5'>Tabla de Multiplicar del $numero</td></tr>";
for ($i = 1; $i <= 10; $i++) {
    echo "\n<tr align='center'>";
    echo "\n<td>$numero</td>";
    echo "\n<td>X</td>";
    echo "\n<td>$i</td>";
    echo "\n<td>=</td>";
    echo "\n<td>" . $numero * $i . "</td>";
    echo "\n</tr>";
}
echo "\n</table>";
