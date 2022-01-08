<?php
require_once("conexion.php");
require_once("Vistas/Plantillas/templateHeader.php");
?>

<div class="container">

<div class="row justify-content-center full-heigth">

    <div class="col-3"></div>
    
    <div class="col-6 align-self-center justify-content-center">
        
        <a href="Vistas/viewProductos.php" type="button" class="boton btn btn-primary mb-2" >Productos</a>
        <a href="Vistas/viewClientes.php" type="button" class="boton btn btn-secondary mb-2">Clientes</a>
        <a href="Vistas/viewVentas.php" type="button" class="boton btn btn-success mb-2">Ventas</a>
        <?php if(isset($_SESSION['message'])) : ?>
            
            <div class="boton alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php session_unset(); endif ?>
            
        </div>
        
        <div class="col-3"></div>
    </div>
</div>
<?php
require_once("Vistas/Plantillas/templateFooter.php");
?>