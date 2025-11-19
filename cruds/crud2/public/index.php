<?php
require __DIR__ . "/../basedatos/conexion.php";
$q = "select posts.*, email from posts, usuarios where 
    usuarios.id=posts.user_id AND estado='Publicado' order by id desc";
$posts = mysqli_query($conexion, $q);
mysqli_close($conexion);
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
    <!-- cdn Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inicio</title>
</head>

<body class="p-8 bg-blue-100">
    <div class="flex flex-row-reverse mb-2">
        <a href="login.php" class="p-2 rounded-lg bg-green-400 hover:bg-green-600 text-white font-bold">
            <i class="fa-solid fa-arrow-right-to-bracket mr-1"></i>LOGIN
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card de ejemplo -->
        <?php foreach ($posts as $item): ?>
            <div class="bg-white shadow-md rounded-lg p-5 flex flex-col gap-4">

                <!-- Título -->
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <i class="fas fa-heading text-blue-600"></i>
                    <?= $item['titulo'] ?>
                </h2>

                <!-- Descripción -->
                <p class="text-gray-700 flex items-center gap-2">
                    <i class="fas fa-align-left text-green-600"></i>
                    <?= $item['contenido'] ?>
                </p>

                <!-- Email del creador -->
                <p class="text-gray-600 flex items-center gap-2 italic">
                    <i class="fas fa-envelope text-red-500"></i>
                    <?= $item['email'] ?>
                </p>

                <!-- ID del post -->
                <p class="text-gray-500 text-sm flex items-center gap-2">
                    <i class="fas fa-hashtag text-gray-400"></i>
                    ID: <?= $item['id'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>