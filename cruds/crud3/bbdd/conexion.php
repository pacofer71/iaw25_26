<?php
try{
    $conexion=mysqli_connect("127.0.0.1", "user3", "secret0", "crud3", 3306);
}catch(Exception $ex){
    die("Error al conectar, el mensaje es: ".$ex->getMessage());
}