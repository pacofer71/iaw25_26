<?php
//Valores por defecto
function saludo($nombre="Icógnito"){
    echo "<br>Hola:<b> $nombre </b>";
}
function saludo2($nombre="User", $pass="default"){
     echo "<br>Hola:<b> $nombre </b>, tu password es: $pass";
}
saludo();
saludo("Juan");
saludo("Ines Maria");
echo "<hr>";
saludo2("Vicente", "1234");
saludo2("valor 1");
saludo2();
