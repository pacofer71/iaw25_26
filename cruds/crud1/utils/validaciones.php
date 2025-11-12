<?php 
function sanearCadenas(string $cadena): string{
    return htmlspecialchars(trim($cadena));
}
function longitudCampovalida(string $nomCampo, string $valorCampo, int $min, int $max): bool{
    if(strlen($valorCampo)<$min || strlen($valorCampo)>$max){
        $_SESSION["error_$nomCampo"]="Error, este valor debe tener entre $min y $max caracteres";
        return false;
    }
    return true;
}
function valorNumericoValido($nomCampo, int|float $valorCampo, int|float $min, int|float $max){
    if($valorCampo<$min || $valorCampo>$max){
        $_SESSION["error_$nomCampo"]="Error, este valor debe estar entre $min y $max";
        return false;
    }
    return true;
}
function existeNombre($conexion, $nombre): bool{
    $q="select id from productos where nombre=?";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);
    //Para ver lo que esto me devuelve
    mysqli_stmt_store_result($stmt);
    $filasDevueltas=mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    if($filasDevueltas){
        $_SESSION['error_nombre']="Error, el nombre '$nombre' YA existe!!!";
        return true;
    }
    return false;
}
function pintarError(string $nombreError){
    if(isset($_SESSION[$nombreError])){
        echo "<p class='text-red-500 italic text-sm mt-1'>{$_SESSION[$nombreError]}</p>";
        //echo "<p class='text-red-500 italic text-sm mt-1'>".$_SESSION[$nombreError]."</p>";
        unset($_SESSION[$nombreError]);
    }
}