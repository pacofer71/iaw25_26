<?php
session_start();
// comprobamos que estemos logeados ...
if (!isset($_SESSION['email'])) {
    header("Location:admin.php");
    exit;
}
$email = $_SESSION['email'];
// comprobamos que me llega el id del post a eliminat
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location:admin.php");
    exit;
}

// compruebo que elpost le pertenece al usuario logeado para poder borrarlo
require __DIR__ . "/../basedatos/conexion.php";
require __DIR__ . "/../utils/validaciones.php";
$user_id = recuperarIdusuario($conexion, $email);
if (!postPerteneceUsuario($conexion, $user_id, $id)) {
    //el usuario esta intentando borrar un post QUE no es suyo!!!!
    //no sabe donde se mete
    //header('Content-Type: application/json');
    //http_response_code(403); //codigo http para no autorizado
    //echo json_encode([
    //    'error'=>"Prohibido",
    //    'message'=>'No esta autorizado para borrar este POST!!!',
    //]);
    $_SESSION['mensaje'] = "NO está autorizado para borrar este POST";
    mysqli_close($conexion);
    header("Location:admin.php");
    exit;
}
// si estoy aqui el post le pertenece al usuario, vamos a borrarlo
$q = "delete from posts where id=?";
$stmt = mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conexion);
$_SESSION['mensaje'] = "Se ha borrado el POST";
header("Location:admin.php");
exit;
