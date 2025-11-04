<?php
require "datos.php"; 
function limpiarCadenas(string $cadena): string{
    return htmlspecialchars(trim($cadena));
}

function esLongitudCadenaValida(string $cadena, int $min, int $max): bool{
    if(strlen($cadena)<$min || strlen($cadena)>$max){
        return false;
    }
    return true;
}
function esEmailValido(string $email): bool{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}
function sonAficionesValidas(array $aficionesMandadasPorFormulario): bool{
    if(count($aficionesMandadasPorFormulario)==0) return false;
    //if(!count($aficionesMandadasPorFormulario)) return false;
    global $aficionesTodas;
    foreach($aficionesMandadasPorFormulario as $afi){
        if(!in_array($afi, $aficionesTodas)){
            return false;
        }
    }
    return true;
}
function esAdminstradorValido(string $valor): bool{
    global $admin;
    if(in_array($valor, $admin)){
        return true;
    } 
    return false;
}
function esProvinciaValida(string $valor): bool{
    global $provincias;
    if(in_array($valor, $provincias)){
        return true;
    } 
    return false;

}





















