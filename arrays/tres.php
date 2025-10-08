<?php
$usuario=[
    "nombre"=>"Juan",
    "Apellidos"=>"Perez",
    "perfil"=>"Admin",
    "sueldo"=>1234.67,
    "activo"=>false
]; // $usuario es un array de 5 elementos
var_dump($usuario);
echo "<hr>";
foreach($usuario as $campo=>$valor){
    echo "usuario[$campo]=$valor<br>";
}
echo "<br>";
echo "El nombre es: ".$usuario["nombre"];
echo "<br>";
echo "El sueldo es: ".$usuario["sueldo"];
//-------------------------------------------------------------------------------------
$usuario["ciudad"]="Almeria";
echo "<hr>";
foreach($usuario as $campo=>$valor){
    echo "usuario[$campo]=$valor<br>";
}
//$usuario[]="¿Que pasara?";
echo "<hr>";
foreach($usuario as $campo=>$valor){
    echo "usuario[$campo]=$valor<br>";
}

$usuario["activo"]=true;
echo "<hr>";
foreach($usuario as $campo=>$valor){
    echo "usuario[$campo]=$valor<br>";
}








