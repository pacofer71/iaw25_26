<?php
function limpiarCadenas(string $cadena): string
{
    return htmlspecialchars(trim($cadena));
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
