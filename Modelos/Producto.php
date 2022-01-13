<?php

use Producto as GlobalProducto;

include_once("../conexion.php");
// include_once($_SERVER['DOCUMENT_ROOT']."/conexion.php");


Class Producto{
    
    public static function crear($nombre,$precio,$stock){
        try{
            $conexionBD = new Conexion();
            $query = ("INSERT INTO producto(nombre,precio,stock) VALUES (?,?,?) ");
            //Preparamos la consulta
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($nombre,$precio,$stock));
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
        }
    }

    public static function getProductos(){
     try{   
        $conexionBD = new Conexion();
        $sql = $conexionBD->getConexion()->prepare("SELECT * FROM producto");
        $sql->execute();
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
            return null;
        }
        // ->fetchAll(mode:PDO::FETCH_ASSOC)
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProducto($id){
        try{
            $conexionBD = new Conexion();
            $query = "SELECT * FROM producto WHERE id_producto = ?";
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
            return null;
        }
    }

    public static function editar($id, $nombre,$precio,$stock){
    try{
        $conexionBD = new Conexion();
        $query = "UPDATE producto SET nombre=?,precio=?,stock=? WHERE id_producto=?";
        $sql = $conexionBD->getConexion()->prepare($query);
        $sql->execute(array($nombre,$precio,$stock,$id));
        }catch(Exception $e){
         echo("Ha ocurrido un error ".$e);
        }
    }

    public static function actualizarStock($stock, $id){
        try{

            $conexionBD = new Conexion();
            $query = "UPDATE producto SET stock=? WHERE id_producto=?";
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($stock, $id));
        } catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
        }
    }

    public static function eliminar($id){
    try{
        $conexionBD = new Conexion();
        $query = "DELETE FROM producto WHERE id_producto = ?";
        $sql = $conexionBD->getConexion()->prepare($query);
        $sql->execute(array($id));
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
        }
    }


}
//Producto::crear(nombre:"Boligrafo", precio:"100", stock:50);

// echo("<pre>");
//Producto::eliminar(id:2);
//echo(Producto::getProductos());
// echo("<pre>");
//Producto::crear(nombre:"Teclado", precio:"1100", stock:20);

//Producto::crear("monitor", 55000, 25);
//Producto::editar(2, "Monitor", 35000, 50);