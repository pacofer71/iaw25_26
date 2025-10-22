<?php 
//funciones recursivas
function calcularFactorial(int $num): int{
    if($num==0) return 1;
    return $num*calcularFactorial($num-1);
}
echo "4! = ". calcularFactorial(4);
echo "<br>";
echo "5! = ". calcularFactorial(5);
//
function fibonacci(int $num): int{
    if($num==1) return 0;
    if($num==2) return 1;
    return fibonacci($num-1)+fibonacci($num-2);
}
echo "<hr>";
echo "El termino 10 de fibonacci es: ".fibonacci(10);