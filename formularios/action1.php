<?php
//1.- Recojo los datos
$nombre=$_GET['nombre']; //$_GET['nombre_que_aparece_en_name']
$password=$_GET['password'];
$descripcion=$_GET['descripcion'];
$email=$_GET['email'];
$provincia=$_GET['provincia'];
/*
 <?php echo $cad ?> => <?=$cad ?>
*/
//2.- Decido que hacer con ellos, es este caso los muestro
echo "El nombre mandado por el form es: $nombre <br>";
echo "El password mandado por el form es: $password <br>";
echo "La descripción mandada por el form es: $descripcion <br>";
echo "El email mandado por el form es: $email <br>";
echo "La provincia mandada por el form es: $provincia <br>";