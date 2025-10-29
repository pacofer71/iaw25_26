<?php
    include 'datos.php';
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

<body class="p-8 bg-blue-200">
    <div class="p-4 rounded-xl shadow-xl w-1/2 mx-auto bg-gray-100">
        <form method="POST" action="action2.php">
            <!-- Campo de Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-user mr-2 text-gray-500"></i>Nombre
                </label>
                <input required type="text" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <!-- Campo de Password -->
            <div class="mt-1">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-key mr-2 text-gray-500"></i>Password
                </label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Campo de Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                </label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Campo de Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-align-left mr-2 text-gray-500"></i>Descripción
                </label>
                <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Campo de Provincia -->
            <div>
                <label for="provincia" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-map-marker-alt mr-2 text-gray-500"></i>Provincia
                </label>
                <select id="provincia" name="provincia" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php
                    sort($provincias);
                    foreach ($provincias as $item):
                    ?>
                        <option><?= $item ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Botones -->
            <div class="mt-2 flex flex-row-reverse">
                <button type='submit' class="px-4 py-2 rounded-xl bg-green-400 hover:bg-green-600 text-white font-bold">
                    <i class="fa-solid fa-floppy-disk mr-1"></i>Guardar
                </button>
                <button type='reset' class="px-4 py-2 rounded-xl bg-red-400 hover:bg-red-600 text-white font-bold mr-2">
                    <i class="fa-solid fa-paintbrush mr-1"></i>Limpiar
                </button>
            </div>
        </form>
    </div>



</body>


</html>