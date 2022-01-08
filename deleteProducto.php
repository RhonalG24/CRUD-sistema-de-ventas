<?php
include_once("conexion.php");
include_once("Modelos/Producto.php");

if(isset($_GET)){
    $id = $_GET['id'];

    Producto::eliminar($id);

    $_SESSION['message'] = "Producto eliminado correctamente.";
    $_SESSION['message_type'] = "success";

    header('Location: index.php');
}

?>