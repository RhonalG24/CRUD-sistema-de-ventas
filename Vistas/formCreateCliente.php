<?php
require_once("Plantillas/templateHeader.php");
?>
<div class="container">
    <h1 class="my-3">Crear Cliente</h1>
    
    <form action="../createCliente.php" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus required>
        </div>
        <div class="mb-3">    
            <input type="number" class="form-control" name="dni" placeholder="DNI" required></div>
        
            <button type="submit" class="btn btn-success" onclick="confirm('¿Desea crear el cliente?')">Crear</button>
        <a href="viewClientes.php" class="btn btn-warning">Volver</a>
    
    
    </form>

</div>
<?php
require_once("Plantillas/templateFooter.php");
?>