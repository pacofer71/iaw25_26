<?php
$usuarios = ['Pepe', 'Juan', 'Andres', 'Ana'];

function existeUsuario(string $nombre): bool
{
    global $usuarios;
    return in_array($nombre, $usuarios);
}

$nombre = "Ana";
echo existeUsuario($nombre) ? "$nombre existe<br>" : "$nombre NO existe<br>";
// hacer la funcion pintarTabla(string $contenidoCelda, int $filas, int $columnas)
//que me pinte una tabla html de filas X columnas y el contenido de cada celda sea
// $contenidoCelda
function pintarTabla(string $contenidoCelda, int $filas, int $columnas): void
{
    if ($filas <= 0 || $columnas <= 0) {
        echo "<br>Error, se esperaba valores mayores que cero para filas y/o columnas!!!";
        return;
    }
    echo "<table align='center' border='2' cellpadding='2'>\n";
    for ($f = 0; $f < $filas; $f++) {
        echo "<tr align='center'>\n";
        for ($c = 0; $c < $columnas; $c++) {
            echo "<td>$contenidoCelda</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n<br>";
}
pintarTabla("Tabla 1", 2, 4);
pintarTabla("Tabla 2", 5, 8);
pintarTabla("Tabla 3", 0, 0);
