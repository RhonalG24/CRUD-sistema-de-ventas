<?php

use CLiente as GlobalCLiente;
include_once("../conexion.php");
// include_once($_SERVER['DOCUMENT_ROOT']."/conexion.php");


Class Cliente{

    public static function crear($nombre,$dni){
        try{
            $conexionBD = new Conexion();
            $query = ("INSERT INTO cliente(nombre,dni) VALUES (?,?) ");
            //Preparamos la consulta
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($nombre,$dni));
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
        }
    }

    public static function getClientes(){
     try{   
        $conexionBD = new Conexion();
        // ->prepare(query: "SELECT * FROM cliente")
        $sql = $conexionBD->getConexion()->prepare("SELECT * FROM cliente");
        $sql->execute();
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
            return null;
        }

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCliente($id){
        try{   
           $conexionBD = new Conexion();
           $query = "SELECT * FROM cliente WHERE id_cliente = ?";
           $sql = $conexionBD->getConexion()->prepare($query);
           $sql->execute($id);
           return $sql->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
               echo("Ha ocurrido un error ".$e);
               return null;
           }
   
       }

    public static function editar($nombre,$dni,$id){
        try{
            $conexionBD = new Conexion();
            $query = "UPDATE cliente SET nombre=?,dni=? WHERE id_cliente=?";
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($nombre,$dni,$id));
            }catch(Exception $e){
             echo("Ha ocurrido un error ".$e);
            }
        }


    public static function eliminar($id){
    try{
        $conexionBD = new Conexion();
        $query = "DELETE FROM cliente WHERE id_cliente = ?";
        $sql = $conexionBD->getConexion()->prepare($query);
        $sql->execute(array($id));
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
        }
    }

    //metodo para obtener todas las ventas de un cliente
    public static function getVentas($id){
        try{
            $conexionBD = new Conexion();
            $sql = $conexionBD->getConexion()->prepare("SELECT * FROM venta WHERE cliente_id=?");
            $sql->execute(array($id));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
            return null;
        }
    }


}

//Cliente::crear("Bruno", 56566566);

// $result = Cliente::getCliente(458526546);
// print_r($result);
// $array = Cliente::getClientes();
// print_r($array);