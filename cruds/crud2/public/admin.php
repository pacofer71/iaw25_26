<?php
session_start();
//Protegemos esta pagina para que solo si nos hemos logueado podamos estar
if (!isset($_SESSION['email'])) {
    header("Location:index.php");
    exit;
}
$email = $_SESSION['email'];
$q = "select posts.* from posts, usuarios where posts.user_id=usuarios.id AND email='$email'";
require __DIR__ . "/../basedatos/conexion.php";
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
    <title>Document</title>
</head>

<body class="bg-blue-100">
    <nav class="p-2 bg-purple-400 w-full">
        <div class="flex flex-row-reverse w-full">
            <a href="index.php" class="p-2 bg-blue-500 hover:bg-blue-700 rounded-lg font-bold text-white ml-2">
                INICIO
            </a>
            <a href="close.php" class="p-2 bg-red-500 hover:bg-red-700 rounded-lg font-bold text-white">
                SALIR
            </a>
            <input type="text" readonly class="border-1 border-black p-1 rounded mr-2 text-white italic" value="<?= $email ?>" />
        </div>
    </nav>


    <div class="w-3/4 mx-auto p-4">
        <div class="mb-2 flex flex-row-reverse">
            <a href="nuevo.php" class="p-2 bg-blue-500 hover:bg-blue-700 rounded-lg font-bold text-white">
                <i class="fas fa-add mr-1"></i>NUEVO
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-lg text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contenido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $item):
                    $color=($item['estado']=='Publicado') ? 'bg-green-500' : 'bg-red-500' 
                ?>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        <?= $item['titulo'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $item['contenido'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <p class="p-2 rounded-xl text-white font-bold text-center <?= $color ?>"><?= $item['estado'] ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <form action="borrar.php" method="POST">
                            <input type='hidden' name='id' value="<?= $item['id'] ?>" />
                            <a href="update.php?id=<?= $item['id'] ?>">
                                <i class="fas fa-edit hover:text-lg mr-1"></i>
                            </a>
                            <button type="submit" onclick="return confirm('¿Desea Borrar este Post definitivamente?');">
                                <i class="fas fa-trash hover:text-xl"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
               
            </tbody>
        </table>
    </div>
<?php
    //mensajes de swwetalert2
    if(isset($_SESSION['mensaje'])){
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