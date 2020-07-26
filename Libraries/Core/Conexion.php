<?php

class Conexion
{
    private $conect;

    public function __construct()
    {
        $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";".DB_CHARSET;

        try {
            $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);
            //Este codigo nos ayuda a detectar donde estan los errores
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion exitosa";
        } catch (Exception $e) {
            $this->conect = "Error de conexion";
            echo "Error: ".$e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conect;
    }
}
