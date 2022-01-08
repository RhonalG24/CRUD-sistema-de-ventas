<?php
include_once("conexion.php");
include_once("Modelos/Cliente.php");

if(isset($_GET)){
    $id = $_GET['id'];

    // print_r($_GET);
    Cliente::eliminar($id);

    $_SESSION['message'] = "Cliente eliminado correctamente.";
    $_SESSION['message_type'] = "success";

    header('Location: index.php');
}

?>