<?php
include_once("../Modelos/Cliente.php");

if(isset($_GET)){
    $id = $_GET['id'];
    $clientes = Cliente::getClientes();
    $registro;

    foreach($clientes as $cliente){
        if($cliente['id_cliente'] == $id){
            $registro['id'] = $cliente['id_cliente'];
            $registro['nombre'] = $cliente['nombre'];
            $registro['dni'] = $cliente['dni'];
        }
    }

    
    // print_r($registro);


}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    
    Cliente::editar($nombre, $dni, $id);
    
    $_SESSION['message'] = "Cliente editado correctamente.";
    $_SESSION['message_type'] = "success";
    
    header('Location: ../index.php');

}


?>

<?php
require_once("Plantillas/templateHeader.php");
?>
<div class="container">
    <h1 class="my-3">Editar Cliente</h1>
    
    <form action="formEditCliente.php?id=<?php echo $_GET['id']?>" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="nombre" value="<?=$registro['nombre']?>" placeholder="Edita el nombre" autofocus required>
        </div>
        <div class="mb-3">    
            <input type="number" class="form-control" name="dni" value="<?=$registro['dni']?>" placeholder="Edita el DNI" required></div>
        
            <button type="submit" name="update" class="btn btn-success" onclick="confirm('¿Está seguro de que desea editar el cliente?')">Editar</button>
        <a href="viewClientes.php" class="btn btn-warning">Volver</a>
    
    
    </form>

</div>
<?php
require_once("Plantillas/templateFooter.php");
?>