<?php
function pintarTabla(){

}
function saludar(){
    echo "<br>### BUENOS DIAS ###<br>";
    echo "El tiempo está soleado<br>";
    echo "Adios";
}
function saludarConNombre($nombre){
    echo "<br>### BUENOS DIAS $nombre ###<br>";
    echo "El tiempo está soleado<br>";
    echo "Adios $nombre";
}
function suma($num1, $num2){
    return $num1+$num2;
}
function calculadora($signo, $numero1, $numero2){
    // +, -, *, /
    if($signo=="/" && $numero2==0){
        return "Error NO se puede dividir por '0' !!!";
    }
    return match($signo){
        "+"=>$numero1+$numero2,
        "-"=>$numero1-$numero2,
        "*"=>$numero1*$numero2,
        "/"=>$numero1/$numero2,
        default=>"Error operación Inválida!!!"
    };
}
$a=2;
$b=0;
echo calculadora("/", $a, $b);
echo "<hr>";








saludar();
echo "<hr>";
saludar();
echo "<br>Cosas entretenidas....";
saludar();
saludarConNombre("Paco");
saludarConNombre("Ana Maria");
$miNombre="Adolfo";
saludarConNombre($miNombre);
echo "<hr>";
$a=112;
$b=34.5;
$resultado=suma($a,$b);
echo "<br> $a + $b = $resultado";











/*
$filas=4;
$columas=14;
echo "<table align='center' border='2'>";
for($f=0; $f<$filas; $f++){
    echo "<tr>";
    for($c=0; $c<$columas; $c++){
        echo "<td>A</td>";
    }
    echo "</tr>";
}

echo "</table>";
echo "<br>";
echo "<table align='center' border='2'>";
for($f=0; $f<$filas; $f++){
    echo "<tr>";
    for($c=0; $c<$columas; $c++){
        echo "<td>B</td>";
    }
    echo "</tr>";
}
echo "</table>";
*/