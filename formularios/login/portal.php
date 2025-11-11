<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:login.php");
    die();
}
echo "<b>Bienvenido Usuario:</b> ".$_SESSION['user'];
echo "<br><center><a href='salir.php'>LOGOUT</a></center>";