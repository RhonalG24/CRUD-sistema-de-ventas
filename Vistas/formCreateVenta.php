<?php
require_once("Plantillas/templateHeader.php");
require_once("../Modelos/Producto.php");
require_once("../Modelos/Cliente.php");
$productos = Producto::getProductos();
$clientes = Cliente::getClientes();
$precio = 0;
// print_r($productos);
?>

<div class="container">
    <h1 class="my-3">Crear Venta</h1>


<form action="../createVenta.php" method="POST">
    <!-- <div class="mb-3">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
    </div> -->

    <div class="mb-3">   

        <select class="form-control" name="producto_id" id="select-producto" autofocus>
            <option value="#">Seleccione Producto</option>   
            <?php foreach ($productos as $producto) : ?>
                <option value="<?=$producto['id_producto']?> " onselect="<?php $precio = $producto['precio'] ?>"><?=$producto['nombre']?></option>
                <?php endforeach; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="stock">Seleccione cantidad</label>
        <input type="number" min="1" name="stock_vendido">
    </div>

    <div class="mb-3">    

        <select class="form-control" name="cliente_id" id="select-cliente">
            <option value="#">Seleccione Cliente</option>    
            <?php foreach($clientes as $cliente) : ?>
                
                <option value="<?=$cliente['id_cliente']?>"><?=$cliente['nombre'] ?></option>
            <?php endforeach;?>
    
        </select>
    </div>

    <!-- <div class="mb-3">    
    <label class="form-control" name="importeTotal" placeholder="importeTotal">5000</label>    
    <input type="hidden" name="importe_total" value="5000">
    </div> -->

    <button type="submit" class="btn btn-success" onclick="confirm('¿Desea crear el producto?')">Crear</button>
    <a href="viewVentas.php" class="btn btn-warning">Volver</a>
</form>
</div>


<?php
require_once("Plantillas/templateFooter.php");
?>