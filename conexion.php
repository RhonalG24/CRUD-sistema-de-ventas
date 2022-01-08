<?php

Class Conexion{
    private $user = "root";
    private $pass = "";
    private $dbname = "ventas2162";
    // private $user = "id17902308_root";
    // private $pass = "kxp8Ncp-NwQ28dps";
    // private $dbname = "id17902308_ventas2162";
    private $conexion; //acá se guarda la instancia de conexion

    public function __construct()
    {
        try{

            //instancia de la conexion
            $this->conexion = new PDO("mysql:host=localhost;dbname=".$this->dbname, $this->user, $this->pass);
            //Agregamos a buestra conexion los posibles errores
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo("Conexión exitosa");
        }catch(PDOException $e){
            echo("Ha ocurrido un error en la conexión ".$e);
        }
    }

    /**
     * Get the value of conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }
}

$conect = new Conexion();

session_start();