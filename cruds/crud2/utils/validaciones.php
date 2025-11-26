<?php
function limpiarCadenas(string $cadena): string
{
    return htmlspecialchars(trim($cadena));
}

function esLongitudCampoValido(string $nomCampo, string $valorCampo, int $min, int $max): bool{
    if(strlen($valorCampo)<$min || strlen($valorCampo)>$max){
        $_SESSION["err_$nomCampo"]="*** Error, el campo $nomCampo debe tener entre $min y $max caracteres";
        return false;
    }
    return true;
}
function esEstadoValido(string $estado): bool{
    $validos=['Publicado', 'Borrador'];
    if(!in_array($estado, $validos)){
        $_SESSION['err_estado']="*** Error, estado No válido o no seleccionado.";
        return false;
    }
    return true;
}

function esEmailValido(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['err_email'] = '*** Error, se esperaba un email.';
        return false;
    }
    return true;
}
function esUsuarioValido(string $email, string $password, mysqli $conexion): bool
{
    //las password estan haseadas con la funcion
    //password_hash("texto", PASSWORD_DEFAULT) tengo que comprobar con password_verify
    $q = "select password from usuarios where email=?";
    $stmt = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $passwordHaseada);
    mysqli_stmt_fetch($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    if (!$passwordHaseada) {
        $_SESSION['err_login'] = "*** Error email o password incorrectos!!!";
        return false;
    }
    if (!password_verify($password, $passwordHaseada)) {
        $_SESSION['err_login'] = "*** Error email o password incorrectos!!!";
        return false;
    }
    return true;
}

function pintarError($nomError)
{
    if (isset($_SESSION[$nomError])) {
        echo "<p class='mt-1 text-sm text-red-500 italic'>{$_SESSION[$nomError]}</p>";
        unset($_SESSION[$nomError]);
    }
}

function recuperarIdusuario(mysqli $conexion, string $email):int{
    $q="select id from usuarios where email='$email'";
    $datos=mysqli_query($conexion, $q);
    $user_id=100;
    foreach($datos as $dato){
        $user_id=$dato['id'];
    }
    return $user_id;
}
function postPerteneceUsuario(mysqli $conexion, int $id_usu, int $id_post):bool{
    $q="select id from posts where user_id='$id_usu' AND id=?";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'i', $id_post);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if(!$id){
        return false;
    }
    return true;
}











