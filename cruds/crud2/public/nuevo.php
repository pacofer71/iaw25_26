<?php
session_start();
//Protegemos esta pagina para que solo si nos hemos logueado podamos estar
if (!isset($_SESSION['email'])) {
    header("Location:index.php");
    exit;
}
$email = $_SESSION['email'];
require __DIR__ . "/../utils/validaciones.php";
if (isset($_POST['titulo'])) {
    $titulo = limpiarCadenas($_POST['titulo']);
    $contenido = limpiarCadenas($_POST['contenido']);
    // NO SE PRODRIA HACER ASI DIRECTAMENTE!!!!!!!!
    //$estado=limpiarCadenas($_POST['estado']);
    $estado = isset($_POST['estado']) ? limpiarCadenas($_POST['estado']) : "-1";
    //validamos
    $errores = false;
    if (!esLongitudCampoValido('titulo', $titulo, 3, 60)) {
        $errores = true;
    }
    if (!esLongitudCampoValido('contenido', $contenido, 10, 500)) {
        $errores = true;
    }
    if (!esEstadoValido($estado)) {
        $errores = true;
    }
    if ($errores) {
        header("Location:nuevo.php");
        exit;
    }
    // Si estoy aqui guardo el post pues esta todo correcto
    //recuperamos el user_id solo tengo el email
    require __DIR__."/../basedatos/conexion.php";
    $user_id=recuperarIdusuario($conexion, $email);
    $q="insert into posts(titulo, contenido, estado, user_id) values(?, ?, ?, ?)";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'sssi', $titulo, $contenido, $estado, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    $_SESSION['mensaje']="Se ha creado el post";
    header("Location:admin.php");
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
    <!-- cdn Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body class="p-8 bg-blue-200">
    <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">

        <form action="nuevo.php" method="POST">
            <!-- Título -->
            <label class="block mb-2 font-semibold">
                <i class="fa-solid fa-heading mr-1"></i> Título del post
            </label>
            <input
                type="text"
                name="titulo"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                placeholder="Ingresa el título">
            <?php
            pintarError('err_titulo');
            ?>

            <!-- Contenido -->
            <label class="block mt-4 mb-2 font-semibold">
                <i class="fa-solid fa-file-lines mr-1"></i> Contenido
            </label>
            <textarea
                name="contenido"
                rows="5"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                placeholder="Escribe el contenido del post"></textarea>
            <?php
            pintarError('err_contenido');
            ?>

            <!-- Estado -->
            <label class="block mt-4 mb-2 font-semibold">
                <i class="fa-solid fa-toggle-on mr-1"></i> Estado
            </label>
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2">
                    <input type="radio" name="estado" value="Publicado">
                    <span>Publicado</span>
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio" name="estado" value="Borrador">
                    <span>Borrador</span>
                </label>
            </div>
            <?php
            pintarError('err_estado');
            ?>

            <!-- Botones -->
            <div class="flex justify-between mt-6">
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fa-solid fa-paper-plane mr-1"></i> Enviar
                </button>

                <a
                    href="admin.php"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    <i class="fa-solid fa-xmark mr-1"></i> Cancelar
                </a>
            </div>

        </form>

    </div>

</body>

</html>