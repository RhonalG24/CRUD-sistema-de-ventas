<?php
require_once("Plantillas/templateHeader.php");
require_once("../Modelos/Producto.php");
$productos = Producto::getProductos();
// echo("<pre>");
//print_r($productos);
// echo("<pre>");
?>

<div class="container">
    <h1 class="my-3">Productos</h1>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <!-- <th scope="col">Proveedor</th> -->
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>
    
    <?php $i = 1; foreach($productos as $producto) : ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $producto['nombre'] ?></td>
      <td><?= $producto['precio'] ?></td>
      <td><?= $producto['stock'] ?></td>
      <td><a href="formEditProducto.php?id=<?php echo $producto['id_producto']?>" class="btn btn-primary"><i class="bi bi-pencil-square "></i></a></td>
      <td><a href="../deleteProducto.php?id=<?php echo $producto['id_producto']?>" class="btn btn-danger" onclick="confirm('¿Desea eliminar el producto?')"><i class="bi bi-trash"></i></a></td>
      
    </tr>

    <?php $i++; endforeach; ?>
  </tbody>
</table>

<a href="formCreateProducto.php" class="btn btn-success">Crear Producto</a>
<a href="../index.php" class="btn btn-warning">Volver</a>

</div>

<?php
require_once("Plantillas/templateFooter.php");
?>