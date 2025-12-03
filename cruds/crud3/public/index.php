<?php
require __DIR__ . "/../bbdd/conexion.php";
$q = "select * from usuarios order by id desc";
$usuarios = mysqli_query($conexion, $q);
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
    <title>Document</title>
</head>

<body class="bg-green-100 p-8">
    <h3 class="txt-xl text-center font-bold mb-4">Listado de Usuarios</h3>
    <div class="flex flex-row-reverse mb-2 max-w-6xl mx-auto">
        <a href="nuevo.php" class="text-white font-bold p-2 bg-blue-400 hover:bg-blue-600 rounded-lg">
            <i class="fas fa-add mr-1"></i>NUEVO
        </a>
    </div>
    <div class="w-full max-w-6xl bg-white shadow-xl rounded-lg overflow-hidden mx-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4 font-semibold">Nombre</th>
                    <th class="py-3 px-4 font-semibold">Email</th>
                    <th class="py-3 px-4 font-semibold">Teléfono</th>
                    <th class="py-3 px-4 font-semibold">Género</th>
                    <th class="py-3 px-4 font-semibold">Estado</th>
                    <th class="py-3 px-4 font-semibold">Fecha Registro</th>
                    <th class="py-3 px-4 font-semibold text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $item):
                    $colorEstado = $item['estado_cuenta'] == 'activo' ? 'bg-green-500' : 'bg-red-500';
                ?>
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-3 px-4"><?= $item['nombre'] ?></td>
                        <td class="py-3 px-4"><?= $item['email'] ?></td>
                        <td class="py-3 px-4"><?= $item['telefono'] ?></td>
                        <td class="py-3 px-4"><?= $item['genero'] ?></td>
                        <td class="py-3 px-4">
                            <p class="p-2 text-center rounded-xl text-white font-bold <?= $colorEstado ?>">
                                <?= $item['estado_cuenta'] ?>
                            </p>
                        </td>
                        <td class="py-3 px-4"><?= $item['fecha_registro'] ?></td>
                        <td class="py-3 px-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800 mx-1">Editar</button>
                            <button class="text-red-600 hover:text-red-800 mx-1">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</body>

</html>