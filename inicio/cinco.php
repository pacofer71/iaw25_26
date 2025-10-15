<?php
//el usuario tendra acceso si 
//su nombre de usuario es 'admin' o su correo es 'admin@email.es'
$user='user';
$email='admin@email.es';
if($user=='admin' || $email=='admin@email.es'){
    echo "Acceso Concedido.";
}else{
    echo "Error, acceso denegado";
}

//el usuario tendra bono descuento
//si es mayor de 25
// y tiene una invitacion
echo "<br>";
$edad=34;
$invitacion=false;
if($edad>25 && $invitacion){
    echo "El usuario SI tiene bono descuento";
}else{
     echo "El usuario NO tiene bono descuento";
}

//el usuario aprobara si la nota es mayor o igual que 5 
//y la asistencia mayor o igual al 80%
echo "<br>";
$nota=3;
$asistencia=40;
if($nota>=5 && $asistencia>=80){
    echo "El usuario SI aprueba";
}else{
    echo "El usuario NO aprueba";
}

//una persona puede solicitar una beca si tiene menos de 25 años
//y es estudiante o siendo estudiante es desempleado
$estudiante=true;
$desempleado=true;
$edad=45;
echo "<br>";
if(($estudiante && $edad<25) || ($estudiante && $desempleado)){
    echo "El estudiante SI puede solicitar una Beca";
}else{
     echo "El estudiante NO puede solicitar una Beca";
}
echo "<hr>";
if(($estudiante) && ($edad<25 || $desempleado)){
    echo "El estudiante SI puede solicitar una Beca";
}else{
     echo "El estudiante NO puede solicitar una Beca";
}

//Una persona puede contrar un seguro medico si
//tiene entre 18 y 60 años y su salud es buena, o
//tiene menos de 18 pero depende de un asegurado
//en cualquier caso tenen que haberlo solicitado
echo "<hr>";
$edad=10;
$solicitud=false;
$salud=true; //
$dependeAsegurado=true;
if($solicitud && (($edad>=18 && $edad<=60 && $salud) || ($edad<18 && $dependeAsegurado))){
    echo "Puede contratar su Seguro";
}else{
    echo "Error, NO puede contatar su seguro";
}