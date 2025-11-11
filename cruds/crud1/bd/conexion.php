<?php
// Archivos para establecer uuna conexion a una bbdd
// en este caso host=127.0.0.1
//user=user1
//base de datos=crud1
//pass=secret0
try{
    $conexion=mysqli_connect("127.0.0.1", "user1", "secret0", "crud1", 3306);
}catch(Exception $ex){
    die("Error al conectar a la base de datos, el mensaje es: ".$ex->getMessage());
}