<?php
//vamos a pintar una tabla html de $filas=4 x $columnas=5;
//usaremos "for"
$filas=8;
$columnas=8;
echo "<table border='1' align='center'>";
for($f=0; $f<$filas; $f++){
    $color=($f%2==0) ?  "white" : "silver";
    echo "<tr style='background-color:$color'>";
    for($c=0; $c<$columnas; $c++){
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
    }
    echo "</tr>";
}
echo "</table>";