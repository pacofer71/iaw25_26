<?php
//switch y match
$dia = "3";
switch ($dia) {
    case 1:
        echo "El dia elegido es Lunes";
        break;
    case 2:
        echo "El dia elegido es Martes";
        break;
    case 3:
        echo "El dia elegido es Miércoles";
        break;
    case 4:
        echo "El dia elegido es Jueves";
        break;
    case 5:
        echo "El dia elegido es Viernes";
        break;
    case 6:
        echo "El dia elegido es Sábado";
        break;
    case 7:
        echo "El dia elegido es Domingo";
        break;
    default:
        echo "Dia erróneo!!!!";
};

echo "<hr>";
$userName = "user";
switch ($userName) {
    case "admin":
        echo "Permiso Garantizado";
        break;
    case "user":
        echo "Tienes pocos permisos";
        break;
    case "guest":
        echo "NO tienes permisos";
        break;
    default:
        echo "Usuario Erróneo!!!!";
}
//El switch Nos permite agrupar casos
echo "<hr>";
$dia = 37;
switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Es un dia laborable";
        break;
    case 6:
    case 7:
        echo "Es fin de semana";
        break;
    default:
        echo "Dia erroeneo!!!!!";
}
//---------------match muy parecido a switch pero mas nuevo y potente
// comprueba no solo el valor si no tambien el tipo
echo "<hr>";
$dia = 6;
echo match ($dia) {
    1 => "Lunes",
    2 => "Martes",
    3 => "Miércoles",
    4 => "Jueves",
    5 => "Viernes",
    6 => "Sábado",
    7 => "Domingo",
    default => "Dia erróneo!!!!"
};
//Nos permite agrupar valores como switch
echo "<hr>";
echo match ($dia) {
    1, 2, 3, 4, 5 => "Dia Laborable",
    6, 7 => "Fin de semana",
    default => "Dia erróneo!!!!"
};
