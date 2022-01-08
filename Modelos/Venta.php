<?php
include_once("../conexion.php");
// include_once($_SERVER['DOCUMENT_ROOT']."/conexion.php");


Class Venta{
    public static function crear($producto_id,$cliente_id,$importe,$stock){
        try{
            $conexionBD = new Conexion();
            $query = ("INSERT INTO venta(producto_id,cliente_id,importe_total,stock_vendido,fecha) VALUES (?,?,?,?,NOW());");
            //Preparamos la consulta
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($producto_id,$cliente_id,$importe,$stock));
        }catch(Exception $e){
            echo("Ha ocurrido un error ".$e);
        }
    }

    public static function getVentas(){
        try{   
           $conexionBD = new Conexion();
        //    ->prepare(query: "SELECT * FROM venta")
           $sql = $conexionBD->getConexion()->prepare("SELECT * FROM venta");
           $sql->execute();
           }catch(Exception $e){
               echo("Ha ocurrido un error ".$e);
               return null;
           }
        //    ->fetchAll(mode:PDO::FETCH_ASSOC)
           return $sql->fetchAll(PDO::FETCH_ASSOC);
       }
    
       public static function eliminar($id){
        try{
            $conexionBD = new Conexion();
            $query = "DELETE FROM venta WHERE id_venta = ?";
            $sql = $conexionBD->getConexion()->prepare($query);
            $sql->execute(array($id));
            }catch(Exception $e){
                echo("Ha ocurrido un error ".$e);
            }
        }

        //retorna la info del producto asociado a la venta
        public static function getProducto($id){
            try{   
               $conexionBD = new Conexion();
               $query = "SELECT * FROM venta WHERE id_venta=?";

               $sql = $conexionBD->getConexion()->prepare(query: $query);
               $sql->execute(array($id));
               //obtenemos la venta
               $venta = $sql->fetch(PDO::FETCH_ASSOC);
            //    echo("<pre>");
            //     print_r($venta);
            //     echo("<pre>");
                $sql2 = $sql = $conexionBD->getConexion()->prepare("SELECT * FROM producto WHERE id_producto =?");
                $sql2->execute(array($venta['producto_id']));
                return $sql2->fetch(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                   echo("Ha ocurrido un error ".$e);
                   return null;
               }
       
           }

           public static function getCliente($id){
            try{   
               $conexionBD = new Conexion();
               $query = "SELECT * FROM venta WHERE id_venta=?";

               $sql = $conexionBD->getConexion()->prepare(query: $query);
               $sql->execute(array($id));
               //obtenemos la venta
               $venta = $sql->fetch(PDO::FETCH_ASSOC);
              
                $sql2 = $sql = $conexionBD->getConexion()->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
                $sql2->execute(array($venta['cliente_id']));
                return $sql2->fetch(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                   echo("Ha ocurrido un error ".$e);
                   return null;
               }
       
           }
}

// Venta::crear(1,21654123,5000,15);
// echo("<pre>");
// print_r(Venta::getProducto(4));
// echo("<pre>");
// Venta::eliminar(3);
// Venta::getProducto(4);
// Venta::crear(3,56566566,5000,2);