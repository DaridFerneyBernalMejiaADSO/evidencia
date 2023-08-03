<?php

class Database
{

    private $connection;

    public function __construct()
    {
        //Opciones para la conexion
        $options = [
            // El atributo controla cómo debe comportarse el PDO en caso de errores.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Indicamos que todos los retornos sean con un arreglo asociativo
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        // Creamos la cadena de conexion tomando los constantes definidas
        $this->connection = "mysql:host=" .constant('HOST'). "; dbname=" .constant('DB'). "; charset=" .constant('CHARSET');
        // Creamos la conexion tipo PDO y pasamos la cadena de conexion, los datos de validación y los opciones de configuracion
        $this->connection = new PDO($this->connection, constant('USER'), constant('PASSWORD'), $options);
        // Le indicamos a la conexion que utilizaremos el juego de caracteres UTF8 para los asentos y caracteres especiales
        $this->connection->exec("SET CHARACTER SET UTF8");      
    }

    /**
     * ==========================
     * Definimos el metodo para retornar la conexion
     *  =========================
     */
    function getConnection()
    {
        return $this->connection;
    }

    /**
     * ===========================
     * Definimos el metodo para cerrar la conexion
     * ==========================
     */
    function closConnection()
    {
        $this->connection = null;
    }
}
