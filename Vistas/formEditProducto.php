<?php
include_once("../Modelos/Producto.php");

if(isset($_GET)){
    $id = $_GET['id'];
    $producto = Producto::getProducto($id);

    // print_r($producto);

    //obtener un producto por id usando getProductos (trayendo todos los clientes de la tabla)
    // $productos = Producto::getProductos();
    // $registro;

    // foreach($productos as $producto){
    //     if($producto['id_producto'] == $id){
    //         $registro['id'] = $producto['id_producto'];
    //         $registro['nombre'] = $producto['nombre'];
    //         $registro['precio'] = $producto['precio'];
    //         $registro['stock'] = $producto['stock'];
    //     }
    // }


    // print_r($registro);
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    
    Producto::editar($id, $nombre, $precio, $stock);
    
    $_SESSION['message'] = "Producto editado correctamente.";
    $_SESSION['message_type'] = "success";
    
    header('Location: ../index.php');

}


?>

<?php
require_once("Plantillas/templateHeader.php");
?>
<div class="container">
    <h1 class="my-3">Editar Producto</h1>
    
    <form action="formEditProducto.php?id=<?php echo $_GET['id']?>" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="nombre" value="<?=$producto['nombre']?>" placeholder="Edita el nombre" autofocus required>
        </div>
        <div class="mb-3">    
            <input type="number" class="form-control" name="precio" value="<?=$producto['precio']?>" placeholder="Edita el precio" required>
        </div>
        <div class="mb-3">    
            <input type="number" class="form-control" name="stock" value="<?=$producto['stock']?>" placeholder="Edita el stock" required>
        </div>   

        <button type="submit" name="update" class="btn btn-success" onclick="confirm('¿Está seguro de que desea editar el producto?')">Editar</button>
        <a href="viewProductos.php" class="btn btn-warning">Volver</a>
    
    </form>

</div>
<?php
require_once("Plantillas/templateFooter.php");
?>