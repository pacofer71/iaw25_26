<?php
session_start();
//comprobamos si estamos mandando por post un id
//del pridcto a borrar
$id=filter_input(INPUT_POST, 'idProducto', FILTER_VALIDATE_INT); // si esto se cumple id=el id del producto si no false;
if(!$id){
    header("Location:productos.php");
    exit;
}
// pasamos a eliminar el producto
require __DIR__."/../bd/conexion.php";
$q="delete from productos where id=?";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conexion);
$_SESSION['mensaje']="Producto Eliminado";
header("Location:productos.php");

