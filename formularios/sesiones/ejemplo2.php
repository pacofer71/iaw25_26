<?php
session_start();
$nombre=$_SESSION['usuario'];
$email=$_SESSION['email'];

echo "<b>Tu nombre es: $nombre y tu correo: $email";