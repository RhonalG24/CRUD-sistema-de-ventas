<?php
include_once("conexion.php");
include_once("Modelos/Producto.php");

if(isset($_POST)){
    $nombre= $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    Producto::crear($nombre,$precio,$stock);

    $_SESSION['message'] = "Producto creado correctamente.";
    $_SESSION['message_type'] = "success";

    header('Location: index.php');
}