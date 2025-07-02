<?php
    class Conexion {
        // Variables
        private $host = 'localhost';
        private $dbname = 'practica';
        private $puerto = '33065';
        private $usuario = 'root';
        private $clave = '';
        private $conexion;
 
        // Constructor
        public function __construct() {
            try {
            $this->conexion = new PDO(
                "mysql:host={$this->host};port={$this->puerto};dbname={$this->dbname};charset=utf8",
                $this->usuario,
                $this->clave
                );
 
                // Opciones recomendadas
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
 
        // Método para obtener la conexión
        public function getConexion() {
            return $this->conexion;
        }
    }
?>