<?php
//INVENTADO
include_once("conexion.php");
include_once("Modelos/Venta.php");
include_once("Modelos/Cliente.php");
include_once("Modelos/Producto.php");
// print_r($_POST);
$productos = Producto::getProductos();
$precioProducto = 0;
$stock_actual = 0;

if(isset($_POST)){
    $producto_id = $_POST['producto_id'];
    foreach($productos as $producto){
        if($producto_id == $producto['id_producto'])
        {
            $precioProducto = $producto['precio'];
            $stock_actual = $producto['stock'];
        }
    }
    
    $cliente_id = $_POST['cliente_id'];

    
    $stock_vendido = $_POST['stock_vendido'];

    $importeTotal = $precioProducto * $stock_vendido;

    $stockActualizado = $stock_actual - $stock_vendido;
    //Hacer lógica para descontar el stock del producto
    if($stockActualizado > 0){        
        Venta::crear($producto_id, $cliente_id, $importeTotal, $stock_vendido);
        Producto::actualizarStock($stockActualizado, $producto_id);
        
        $_SESSION['message'] = "Venta creada correctamente.";
        $_SESSION['message_type'] = "success";
    }else{
        $_SESSION['message'] = "Error. Stock insuficiente.";
        $_SESSION['message_type'] = "danger";
    }

    header('Location: index.php');
}

?>