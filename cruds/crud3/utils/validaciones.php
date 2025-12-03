<?php
function limpiarTexto(string $texto): string{
    return htmlspecialchars(trim($texto));
}
function emailValido(string $email): bool{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['err_email']="*** Error, email inválido";
        return false;
    }
    return true;
}
function emailUnico(mysqli $con, string $email):bool{
    $q="select id from usuarios where email=?";
    $stmt=mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $filasDevueltas=mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    if($filasDevueltas){
        $_SESSION['err_email']="Error '$email' ya está registrado.";
        return false;
    }
    return true;
}
function longitudCampoValida(string $nomCampo, string $valorCampo, int $min, int $max): bool{
    if(strlen($valorCampo)<$min || strlen($valorCampo)>$max){
        $_SESSION["err_$nomCampo"]="Error, se esperaba una longitud de entre $min y $max";
        return false;
    }
    return true;
}
function generoValido(string $genero): bool{
    $generos=['masculino', 'femenino', 'otro'];
    if(!in_array($genero, $generos)){
        $_SESSION['err_genero']="Error, género inválido o no seleccionado";
        return false;
    }
    return true;
}
function estadoValido(string $estado): bool{
    $estados=['activo', 'inactivo'];
    if(!in_array($estado, $estados)){
        $_SESSION['err_estado']="Error, estado inválido o no seleccionado";
        return false;
    }
    return true;
}
function telefonoValido(string $telefono): bool{
    // Formatos permitidos:
    // 1) 3 dígitos + guion + 4 dígitos  (xxx-xxxx)
    // 2) 9 dígitos seguidos (xxxxxxxxx)

    $patron1 = '/^[0-9]{3}-[0-9]{4}$/';   // xxx-xxxx
    $patron2 = '/^[0-9]{9}$/';           // xxxxxxxxx

    if (preg_match($patron1, $telefono) || preg_match($patron2, $telefono)) {
        return true;
    }
    $_SESSION['err_telefono']="Error, teléfono inválido";
    return false;
}

function pintarError(string $nomError){
    if(isset($_SESSION[$nomError])){
        echo "<p class='mt-1 italic text-red-500 text-lg'>{$_SESSION[$nomError]}</p>";
        unset($_SESSION[$nomError]);
    }
}