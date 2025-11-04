<?php
require "./utilidades/datos.php";
require "./utilidades/validaciones.php"; //$aficionesTodas

if (isset($_POST['nombre'])) {
    //Si estoy aqui es porque le hab dado al submit, procesamos el form
    //1.- Recogemos y limpiamos lo que nos llega del form
    $nombre=limpiarCadenas($_POST['nombre']);
    $email=limpiarCadenas($_POST['email']);
    $aficiones=(isset($_POST['aficiones'])) ? $_POST['aficiones'] : [];
    //$aficiones = $_POST['aficiones'] ?? [];
    if(count($aficiones)){
        foreach($aficiones as $indice=>$aficion){
            $aficiones[$indice]=limpiarCadenas($aficion);
        }
    }
    $administrador = $_POST['administrador'] ?? "Error";
    $administrador=limpiarCadenas($administrador);
    $provincia=limpiarCadenas($_POST['provincia']);

    //2.- Hacemos las validaciones requeridas.
    $errores=[];
    if(!esLongitudCadenaValida($nombre, 3, 30)){
        $errores[]="Error, el campo nombre debe tener entre 3 y 30 caracteres";
    }
    if(!esEmailValido($email)){
        $errores[]="Error, se eseraba un email válido.";
    }
    if(!sonAficionesValidas($aficiones)){
        $errores[]="Aficiónes inválidas o no seleccion ninguna";
    }
    if(!esAdminstradorValido($administrador)){
        $errores[]="Error, opcion Admin inválida o no seleccionó ninguna";
    }
    if(!esProvinciaValida($provincia)){
        $errores[]="Provincia inválida o no seleccion ninguna";
    }

    //3.- si hay errores los mostramos
    if(count($errores)){
        echo "<ol>";
        foreach($errores as $error){
            echo "<li>$error</li>";
        }
        echo "</ol>";
        die(); //exit();
    }

    //4.- Si no los hay decido que hacer, es este caso muestro los datos
    echo "LOS DATOS ESTAN CORRECTOS Y SON:<br>";
    echo "<b>Nombre:</b> $nombre<br>";
    echo "<b>eMAIL:</b> $email<br>";
    echo "<b>Opcion Administrador:</b> $administrador<br>";
    echo "<b>Provincia:</b> $provincia<br>";
    echo "<b>Aficiones:</b>";
    echo "<ul>";
    foreach($aficiones as $item){
        echo "<li>$item</li>";
    }
    echo "</ul>";
    die();


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

<body class="p-8 bg-blue-200">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <form method="POST" action="formulario.php">
            <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">
                <i class="fas fa-user-edit text-blue-500"></i> Formulario de Registro
            </h2>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-600 font-medium mb-2">
                    <i class="fas fa-user text-blue-500 mr-2"></i> Nombre
                </label>
                <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Campo Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium mb-2">
                    <i class="fas fa-envelope text-blue-500 mr-2"></i> Email
                </label>
                <input type="email" id="email" name="email" placeholder="tuemail@ejemplo.com"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Aficiones -->
            <div class="mb-4">
                <span class="block text-gray-600 font-medium mb-2">
                    <i class="fas fa-heart text-blue-500 mr-2"></i> Aficiones
                </span>
                <div class="space-y-1">
                    <?php
                        foreach($aficionesTodas as $afi){
                            echo <<< TXT
                                <label class="inline-flex items-center">
                                <input type="checkbox" name="aficiones[]" value="$afi" class="mr-2"> $afi
                                </label><br>
                            TXT;
                        }
                        ?>
                    
                </div>
            </div>

            <!-- Administrador -->
            <div class="mb-4">
                <span class="block text-gray-600 font-medium mb-2">
                    <i class="fas fa-user-shield text-blue-500 mr-2"></i> Administrador
                </span>
                <div class="flex items-center space-x-4">
                <?php 
                    foreach($admin as $item){    
                        echo <<< TXT
                        <label class="inline-flex items-center">
                        <input type="radio" name="administrador" value="$item" class="mr-2"> $item
                        </label>
                    TXT;
                    }
                    ?>
                    
                </div>
            </div>

            <!-- Provincia -->
            <div class="mb-4">
                <label for="provincia" class="block text-gray-600 font-medium mb-2">
                    <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i> Provincia
                </label>
                <select id="provincia" name="provincia"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>__ Elige una Provincia __</option>
                    <?php
                    foreach ($provincias as $prov) {
                        echo "<option>$prov</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-between pt-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center gap-2">
                    <i class="fas fa-paper-plane"></i> Enviar
                </button>
                <button type="reset"
                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-md flex items-center gap-2">
                    <i class="fas fa-undo"></i> Reset
                </button>
            </div>
        </form>
    </div>

</body>

</html>