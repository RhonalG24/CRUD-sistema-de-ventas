<?php
include_once("conexion.php");
include_once("Modelos/Venta.php");

if(isset($_GET)){
    $id = $_GET['id'];

    Venta::eliminar($id);

    $_SESSION['message'] = "Venta eliminada correctamente.";
    $_SESSION['message_type'] = "success";

    header('Location: index.php');
}

?>