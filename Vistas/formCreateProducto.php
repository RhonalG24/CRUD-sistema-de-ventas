<?php
require_once("Plantillas/templateHeader.php");

?>
<div class="container">
    <h1 class="my-3">Crear Producto</h1>

    <form action="../createProducto.php" method="POST">
    
    <div class="mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus required>
        
            </div>
            <!-- <div class="mb-3">    
                <input type="text" class="form-control" name="proveedor" placeholder="Proveedor"></div> -->
        
            <div class="mb-3">    
            <input type="number" class="form-control" name="precio" placeholder="Precio" required></div>
        
            <div class="mb-3">    
            <input type="number" class="form-control" name="stock" placeholder="Stock" required></div>
        <button type="submit" class="btn btn-success" onclick="confirm('¿Desea crear el producto?')">Crear</button>
        <a href="viewProductos.php" class="btn btn-warning">Volver</a>
    
    </form>

</div>
<?php
require_once("Plantillas/templateFooter.php");
?>