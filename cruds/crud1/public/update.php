<?php
session_start();
$id = filter_input(INPUT_GET, 'idPost', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location:productos.php");
    exit;
}
include __DIR__ . "/../utils/validaciones.php";
require __DIR__ . "/../bd/conexion.php";
// Vamos a traernos elproducto que queremos editar
$q = "select * from productos where id=?";
$stmt = mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
//recupero lo que me devuelve la consulta
mysqli_stmt_bind_result($stmt, $idConsulta, $nombreConsulta, $descConsulta, $precioConsulta, $stockConsulta);
// esta consulta devuelve una fila o ninguna
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
if (!$idConsulta) {
    //estmos intentando editar un producto QUE no existe
    header("Location:productos.php");
    exit;
}


if (isset($_POST['nombre'])) {
    //1.- Guardamos llos valores ya saneados
    $nombre = sanearCadenas($_POST['nombre']);
    $descripcion = sanearCadenas($_POST['descripcion']);
    $precio = sanearCadenas($_POST['precio']);
    $precio = (float) $precio;
    $stock = sanearCadenas($_POST['stock']);
    $stock = (int) $stock;
    //2.- Hacemos las validaciones
    $errores = false;
    if (!longitudCampovalida("nombre", $nombre, 4, 100)) {
        $errores = true;
    } else {
        if (existeNombreUpdate($conexion, $nombre, $id)) $errores = true;
    }
    if (!longitudCampovalida("descripcion", $descripcion, 10, 500)) {
        $errores = true;
    }
    if (!valorNumericoValido("precio", $precio, 1, 9999.99)) {
        $errores = true;
    }
    if (!valorNumericoValido("stock", $stock, 0, 5000)) {
        $errores = true;
    }
    //si hay errores los muestro y si no guardo los datos
    if ($errores) {
        header("Location:update.php?idPost=$id");
        exit;
    }
    // si he llegado aquí todo correcto, gradamos el producto
    $q = "update productos set nombre=?, descripcion=?, precio=?, stock=? where id=?";
    //creamos una 'conexion mazada para trbajar con parametros'
    $stmt = mysqli_stmt_init($conexion);
    //Preparamos la consulta
    mysqli_stmt_prepare($stmt, $q);
    //decimos cada parametro ? a quien se corresponde y el tipo de dato s string, i entero, d decimal, b booleano
    mysqli_stmt_bind_param($stmt, 'ssdii', $nombre, $descripcion, $precio, $stock, $id);
    //Ejecutamos la consulta ya sin riesgo de inyeccion sql
    mysqli_stmt_execute($stmt);
    //Cerramos la llave supertocha
    mysqli_stmt_close($stmt);
    //cerramos la conexion normal
    mysqli_close($conexion);

    $_SESSION['mensaje'] = "Producto Editado";
    header("Location:productos.php");
    exit;
}
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

<body class="p-8">
    <div class="bg-white shadow-lg rounded-lg p-8 w-1/3 mx-auto">
        <form action="update.php?idPost=<?= $id ?>" method="POST">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
                <i class="fa-solid fa-box"></i> Editar Producto
            </h2>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">
                    <i class="fa-solid fa-tag mr-1"></i> Nombre
                </label>
                <input type="text" id="nombre" name="nombre"
                    value="<?= $nombreConsulta; ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php pintarError('error_nombre') ?>
            </div>

            <!-- Campo Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">
                    <i class="fa-solid fa-align-left mr-1"></i> Descripción
                </label>
                <textarea id="descripcion" name="descripcion" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $descConsulta ?></textarea>
                <?php pintarError('error_descripcion') ?>
            </div>

            <!-- Campo Precio -->
            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-semibold mb-2">
                    <i class="fa-solid fa-dollar-sign mr-1"></i> Precio
                </label>
                <input type="number" id="precio" name="precio" step="0.01"
                    value="<?= $precioConsulta; ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php pintarError('error_precio') ?>
            </div>

            <!-- Campo Stock -->
            <div class="mb-6">
                <label for="stock" class="block text-gray-700 font-semibold mb-2">
                    <i class="fa-solid fa-boxes-stacked mr-1"></i> Stock
                </label>
                <input type="number" id="stock" name="stock" step="1" value="<?= $stockConsulta; ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php pintarError('error_stock') ?>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="productos.php"
                    class="flex items-center gap-2 bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                    <i class="fa-solid fa-xmark"></i> Cancelar
                </a>

                <button type="submit"
                    class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    <i class="fa-solid fa-paper-plane"></i> Editar
                </button>
            </div>
        </form>
    </div>
</body>

</html>