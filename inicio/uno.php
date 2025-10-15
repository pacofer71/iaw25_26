<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h2>Primera Página</h2>
    </center>
    <hr />
    <?php
    echo "Hola Mundo<br />";
    echo 'Adios Mundo<br />Hola vez<br>';
    echo "<i>Una Linea más</i>"; //uso cursiva dentro del echo
    echo "<hr />";
    //Comentario de una unica linea
    echo "<br />";
    /*
            Comentario
            de varias 
            lineas
        */

    ?>
    <hr>
    <hr>
    <?php echo "<br> esto es un bloque nuevo."; ?>
    <!-- esto es lo mismo que arriba xo abreviado -->
    <?= "<br> Bloque abreviado pq solo tiene un echo"; ?>
    <?php
        //Variables
        $numero1=20;
        $numero2=8;
        $resultado=$numero1+$numero2;
        echo "<br>";
        echo "El resultado de sumar $numero1 y $numero2 es: $resultado";
        echo "<br>";
        echo 'El resultado de sumar $numero1 y $numero2 es: $resultado';
    
    ?>

</html>