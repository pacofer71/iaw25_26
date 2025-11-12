<?php
session_start();
require __DIR__ . "/../bd/conexion.php";
$q = "select * from productos order by id desc";
$productos = mysqli_query($conexion, $q);
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
    <!-- CDN Sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body class="p-8">
    <div class="relative overflow-x-auto">
        <div class="flex flex-row-reverse">
            <a href="nuevo.php" class=" mb-2 p-2 text-white font-bold bg-green-500 hover:bg-green-700 rounded-xl">
                <i class="fas fa-add mr-1"></i>Nuevo
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio (€)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $item):
                ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $item['nombre'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $item['descripcion'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $item['precio'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $item['stock'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                                <button type="submit">
                                    <i class="fas fa-trash text-red-500"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php
    if(isset($_SESSION['mensaje'])){
        //mostramos la alerte de sweetalert2
        echo <<<TXT
        <script>
          Swal.fire({
            icon: "success",
            title: "{$_SESSION['mensaje']}",
            showConfirmButton: false,
            timer: 1500
            });
        </script>
        TXT;
        unset($_SESSION['mensaje']);
    }
?>
</body>

</html>