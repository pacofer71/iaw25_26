<?php
    session_start();
    function salir(){
        header("Location:index.php");
        exit;
    }
    $id=filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if(!$id){
        salir();
    }
    require __DIR__."/../bbdd/conexion.php";
    $q="select nombre, email, telefono, genero, estado_cuenta from usuarios where id=?";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    //guardamos sabemos que esto devuelve una fila con los datos del usuario
    // o ninguna si no encuentra ningun usuario con ese id
    mysqli_stmt_bind_result($stmt, $nombreR, $emailR, $telefonoR, $generoR, $estadoR);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if(!$nombreR){
        $_SESSION['mensaje']='NO EXISTE EL USUARIO A EDITAR';
        salir();
    }
    $estadoActivo=($estadoR=='activo') ? 'checked' : '';
    $estadoInactivo=($estadoR=='inactivo') ? 'checked' : '';
    
    $masculinoCk=($generoR=='masculino') ? 'checked' : '';
    $femeninoCk=($generoR=='femenino') ? 'checked' : '';
    $otroCk=($generoR=='otro') ? 'checked' : '';

    require __DIR__."/../utils/validaciones.php";
    if(isset($_POST['nombre'])){
        
        //1.- recogemos y limpiamos
        $nombre=limpiarTexto($_POST['nombre']);
        $email=limpiarTexto($_POST['email']);
        $telefono=limpiarTexto($_POST['telefono']);
        $genero = $_POST['genero'] ?? "error";
        $estado= $_POST['estado'] ?? "error";
        $genero=limpiarTexto($genero);
        $estado=limpiarTexto($estado);
        //2. hacemos las validaciones
        $errores=false;
        if(!emailValido($email)){
            $errores=true;
        }else{
            if(!emailUnico($conexion, $email)) $errores=true;
        }
        if(!longitudCampoValida('nombre', $nombre, 5, 60)){
            $errores=true;
        }
        if(!estadoValido($estado)){
            $errores=true;
        }
        if(!telefonoValido($telefono)){
            $errores=true;
        }
        if(!generoValido($genero)){
            $errores=true;
        }
        //una vez hechas las validaciones si hay errores
        //los mostramos cargando otra vez la página y si no guardaremos el usuario
        if($errores){
            header("Location:nuevo.php");
            exit;
        }
        // Si he llegado aquí todo correcto guardamos el usuario
        $q="insert into usuarios(nombre, email, telefono, genero, estado_cuenta) values(?, ?, ?, ?, ?)";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt, $q);
        mysqli_stmt_bind_param($stmt, 'sssss', $nombre, $email, $telefono, $genero, $estado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
        $_SESSION['mensaje']="Usuario creado correctamente";
        header("Location:index.php");
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
    <title>nuevo</title>
</head>

<body class="bg-green-100 p-8">
    <h3 class="txt-xl text-center font-bold mb-1">Crear Usuario</h3>
    <div class="w-1/2 p-2 rounded-xl shadow-xl mx-auto bg-pink-50">
        <form action="nuevo.php" method="post" class="space-y-5">

            <!-- Nombre de usuario -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    <i class="fas fa-user mr-2"></i>Nombre
                </label>
                <input
                    type="text"
                    name="nombre"
                    value="<?= $nombreR ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                    <?php pintarError('err_nombre'); ?>
                </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    <i class="fas fa-envelope mr-2"></i>Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="<?= $emailR ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                    <?php pintarError('err_email'); ?>
            </div>

            <!-- Teléfono -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    <i class="fas fa-phone mr-2"></i>Teléfono
                </label>
                <input
                    type="text"
                    name="telefono"
                    value="<?= $telefonoR ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                    <?php pintarError('err_telefono'); ?>
            </div>

            <!-- Género -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    <i class="fas fa-venus-mars mr-2"></i>Género
                </label>

                <div class="flex items-center gap-6 mt-2">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="genero" value="masculino" class="h-4 w-4" <?= $masculinoCk ?>>
                        <span>Masculino</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="genero" value="femenino" class="h-4 w-4" <?= $femeninoCk ?>>
                        <span>Femenino</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="genero" value="otro" class="h-4 w-4" <?= $otroCk ?>>
                        <span>Otro</span>
                    </label>
                </div>
                <?php pintarError('err_genero'); ?>
            </div>

            <!-- Estado -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    <i class="fas fa-toggle-on mr-2"></i>Estado
                </label>

                <div class="flex items-center gap-6 mt-2">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="estado" value="activo" class="h-4 w-4" <?= $estadoActivo ?> >
                        <span>Activo</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="estado" value="inactivo" class="h-4 w-4" <?= $estadoInactivo ?>>
                        <span>Inactivo</span>
                    </label>
                </div>
                <?php pintarError('err_estado'); ?>
            </div>

            <!-- Botones -->
            <div class="flex justify-between pt-4">
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-paper-plane mr-2"></i>Enviar
                </button>

                <a
                    href="index.php"
                    class="px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </a>
            </div>

        </form>
    </div>
</body>

</html>