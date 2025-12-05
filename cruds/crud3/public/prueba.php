<?php
require __DIR__."/../bbdd/conexion.php";
$q="select nombre, email, telefono, estado_cuenta from usuarios order by nombre";
//$stmt=mysqli_stmt_init($conexion);
$usuarios=mysqli_query($conexion, $q);
echo "<pre>";
foreach($usuarios as $item){
var_dump($item);
echo "<br>";
}
echo "</pre>";
echo "<hr>";
$valor=1;
$q2="select nombre, email from usuarios where id > ?";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt, $q2);
mysqli_stmt_bind_param($stmt, 'i', $valor);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nombre, $email);
while(mysqli_stmt_fetch($stmt)){
    echo $nombre .", ". $email ."<br>";
}

