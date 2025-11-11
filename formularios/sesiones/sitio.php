<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:login.php");
    die();
}
echo "Estas Logeado como: ".$_SESSION['user']."<br>";
echo "<a href='cerrarSesion.php'>Cerrar Sesion</a>";