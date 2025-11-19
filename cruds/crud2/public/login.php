<?php
    session_start();
    require __DIR__."/../utils/validaciones.php";
    if(isset($_POST['email'])){
        $email=limpiarCadenas($_POST['email']);
        $password=limpiarCadenas($_POST['password']);
        $errores=false;
        if(!esEmailValido($email)){
            header("Location:login.php");
            exit;
        }
        require __DIR__."/../basedatos/conexion.php";
        if(!esUsuarioValido($email, $password, $conexion)){
            header("Location:login.php");
            exit;
        }
        // Si estoy aqui el login ha sido exitoso
        $_SESSION['email']=$email;
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

<body class="p-8 bg-blue-100">
    <form class="max-w-sm mx-auto bg-white shadow-md rounded-lg p-6 space-y-6" method="POST" action="login.php">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Login</h2>

        <!-- Campo Email -->
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-blue-500">
                <i class="fa-solid fa-envelope text-gray-400 mr-2"></i>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="you@example.com"
                    required
                    class="w-full outline-none text-gray-700 placeholder-gray-400" />
            </div>
            <?php pintarError('err_email'); ?>
        </div>

        <!-- Campo Password -->
        <div>
            <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-blue-500">
                <i class="fa-solid fa-lock text-gray-400 mr-2"></i>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    class="w-full outline-none text-gray-700 placeholder-gray-400" />
            </div>
            <?php pintarError('err_login'); ?>
        </div>
        <!-- Botones -->
        <div class="flex justify-between items-center">
            <button
                type="reset"
                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100 transition">
                Reset
            </button>

            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="fa-solid fa-right-to-bracket mr-2"></i> Login
            </button>
        </div>
    </form>

</body>

</html>