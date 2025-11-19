<?php
try{
    $conexion=mysqli_connect("127.0.0.1", "ucrud2", "secret0", "crud2", 3306);
}catch(Exception $ex){
    die("Error en la conexion, el mensaje es: ".$ex->getMessage());
}