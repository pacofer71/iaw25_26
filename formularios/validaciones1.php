<?php
include 'datos.php';
function limpiarCadena(string $cadena): string
{
    return htmlspecialchars(trim($cadena));
}
function esLongitudCampoValido(string $valor, int $min, int $max): bool
{
    if (strlen($valor) < $min || strlen($valor) > $max) {
        return false;
    }
    return true;
}
function isEmailValido(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}
function isProvinciaValida(string $prov): bool
{
    global $provincias;
    if (in_array($prov, $provincias)) {
        return true;
    }
    return false;
}