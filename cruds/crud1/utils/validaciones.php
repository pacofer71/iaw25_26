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