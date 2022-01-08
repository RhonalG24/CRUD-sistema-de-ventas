<?php
require_once("Plantillas/templateHeader.php");
require_once("../Modelos/Cliente.php");
$clientes = Cliente::getClientes();

// echo("<pre>");
// print_r($clientes);
// echo("<pre>");

?>
<div class="container">
    <h1 class="my-3">Clientes</h1>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">DNI</th>

    </tr>
  </thead>
  <tbody>

    <?php $i = 1; foreach($clientes as $cliente) : ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $cliente['nombre'] ?></td>
      <td><?= $cliente['dni'] ?></td>
      <td><a href="formEditCliente.php?id=<?php echo $cliente['id_cliente']?>" class="btn btn-primary"><i class="bi bi-pencil-square "></i></a></td>
      <td><a href="../deleteCliente.php?id=<?php echo $cliente['id_cliente']?>" class="btn btn-danger" onclick="confirm('¿Desea eliminar el cliente?')"><i class="bi bi-trash"></i></a></td>

    </tr>
    <?php $i++; endforeach ?>
  </tbody>
</table>

<a href="formCreateCliente.php" class="btn btn-success">Crear Cliente</a>
<a href="../index.php" class="btn btn-warning">Volver</a>
</div>

<?php
require_once("Plantillas/templateFooter.php");
?>