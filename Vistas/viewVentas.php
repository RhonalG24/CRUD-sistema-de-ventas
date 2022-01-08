<?php
require_once("Plantillas/templateHeader.php");
require_once("../Modelos/Venta.php");

$ventas = Venta::getVentas();
// echo("<pre>");
// print_r($clientes);
// echo("<pre>");

?>

<div class="container">
    <h1 class="my-3">Ventas</h1>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Producto</th>
      <th scope="col">Stock</th>
      <th scope="col">Importe</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1; foreach($ventas as $venta) : ?>
      <?php $idVenta = $venta['id_venta']; 
      $producto = Venta::getProducto($idVenta); 
      $cliente = Venta::getCliente($idVenta);?>

    <tr>
      <th scope="row"><?=$i?></th>
      <td><?= $cliente['nombre'] ?></td>
      <td><?= $producto['nombre'] ?></td>
      <td><?= $venta['stock_vendido']?></td>
      <td><?= $venta['importe_total']?></td>
      <td><?= $venta['fecha']?></td>
      <!-- <td><a href="#" class="btn btn-primary">Edit</a></td> -->
      <td><a href="../deleteVenta.php?id=<?php echo $venta['id_venta']?>" class="btn btn-danger" onclick="confirm('¿Desea eliminar la venta?')"><i class="bi bi-trash"></i> </a></td>

    </tr>
    <!-- Venta::getCliente($idVenta)['nombre'] . ", id = " . Venta::getCliente(($idVenta)['id_cliente']); -->
    <?php $i++; endforeach; ?>
  </tbody>
</table>

<a href="formCreateVenta.php" class="btn btn-success">Crear Venta</a>
<a href="../index.php" class="btn btn-warning">Volver</a>
</div>

<?php
require_once("Plantillas/templateFooter.php");
?>