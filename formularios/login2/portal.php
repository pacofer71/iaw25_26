<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login.php");
    die();
}
//Si estoy aqui me he logeado correctamente
$email = $_SESSION['user'];
$perfil = $_SESSION['perfil'];
$color = ($perfil == 1) ? 'bg-red-500' : 'bg-green-400';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN tailwndcss -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- CDN iconos fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body class="p-8 <?= $color ?>">
    <h1 class="text-xl text-center">Usuario: <?= $email ?></h1>
    <?php
    if ($perfil == 1) {
        echo <<< TXT
        <p class="p-2 my-4 bg-gray-200 italic rounded-xl">
        Contenido super secreto solo para admins!!!
        </p>
        TXT;
    } else {
        echo <<< TXT
        <p class="p-2 my-4 bg-blue-200 italic rounded-xl">
        Contenido para cualquier usuario NO secret0
        </p>
        TXT;
    }
    ?>
    <a href="salir.php" class="p-2 rounded-lg mt-4 bg-blue-400 font-bold text-white hover:bg-blue-600">SALIR</a>
</body>

</html>