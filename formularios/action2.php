<?php
// require e include, require_once, include_once 
require "validaciones1.php";

//1.- Recojo los datos y filtro
$nombre = limpiarCadena($_POST['nombre']); //$_POST['nombre_que_aparece_en_name']
$password = limpiarCadena($_POST['password']);
$descripcion = limpiarCadena($_POST['descripcion']);
$email = limpiarCadena($_POST['email']);
$provincia = limpiarCadena($_POST['provincia']);
//2.- Hacemos las validaciones pertinente
// campo nombre entre 5 y 50 caracteres
//descripcion entre 15 y 250
//provincia que sea una de las del array
//email que sea un email valido
//password entre 6 y 20 caracteres
$errores = [];

if (!esLongitudCampoValido($nombre, 5, 20)) {
    $errores[] = "*** Error el campo nombre debe tener entre 5 y 20 caracteres";
}
if (!esLongitudCampoValido($descripcion, 15, 250)) {
    $errores[] = "*** Error el campo descripcion debe tener entre 15 y 250 caracteres";
}
if (!esLongitudCampoValido($password, 6, 20)) {
    $errores[] = "*** Error el campo password debe tener entre 6 y 20 caracteres";
}
if (!isEmailValido($email)) {
    $errores[] = "*** Error debes introducir un email válido";
}
if (!isProvinciaValida($provincia)) {
    $errores[] = "*** Error la provincia NO es válida";
}
if (count($errores)) {
    //sabemos que ha habido al menos un error, los mostramos
    echo "Ha habido un total de <b>" . count($errores) . "</b> errores<br>";
    echo "<ol>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ol>";
} else {

    //3.- una vez limpiados y validados decido que hacer con ellos, es este caso los muestro
    echo "El nombre mandado por el form es: $nombre <br>";
    echo "El password mandado por el form es: $password <br>";
    echo "La descripción mandada por el form es: $descripcion <br>";
    echo "El email mandado por el form es: $email <br>";
    echo "La provincia mandada por el form es: $provincia <br>";
}
/*
 <?php echo $cad ?> => <?=$cad ?>
*/
