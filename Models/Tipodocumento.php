<?php
require_once 'Config/Database.php';

class TipoDocumento
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function obtenerTiposDocumento()
    {
        try {
            $query = "SELECT id, nombre FROM tipo_documento";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Devuelve los resultados sin detener la ejecución
            return $resultados;
        } catch (PDOException $e) {
            error_log("Error al obtener tipos de documento: " . $e->getMessage(), 3, "logs/errors.log");
            return [];
        }
    }
}
