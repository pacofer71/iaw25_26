<?php
session_start();
$_SESSION['usuario']="manolito";
$_SESSION['email']="manolito@email.es";
        echo <<<TXT
    <a href="ejemplo2.php">Ir a Ejemplo 2</a>
TXT;