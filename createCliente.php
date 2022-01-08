<?php

include_once("conexion.php");
include_once("Modelos/Cliente.php");

if(isset($_POST)){
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];

    CLiente::crear($nombre, $dni);

    $_SESSION['message'] = "Cliente creado correctamente.";
    $_SESSION['message_type'] = "success";

    header("Location: index.php");
}

?>