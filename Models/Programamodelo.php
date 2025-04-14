<?php
require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Config/conexion.php';

class Programa 
{
    private PDO $conn;

    public function __construct()  
    {
        $this->conn = (new Database())->getConnection();
    }

    public function agregarPrograma($data)
    {
        try
        {          
            $sqlprograma = "INSERT INTO aprendices_programa
                            (id_aprendiz, id_programa_formacion, fecha_inicio)
                            VALUES
                            (:id_aprendiz, :id_programa_formacion, :fecha_inicio)";
            $stmtprograma = $this->conn->prepare($sqlprograma);
            $stmtprograma->execute([
                ':id_aprendiz' => $data['id_aprendiz'],
                ':id_programa_formacion' => $data['id_programa_formacion'],
                ':fecha_inicio' => $data['fecha_inicio'],
            ]);
        } catch (\Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    public function actualizarPrograma($data)
    {
        try
        {
            $this->conn->beginTransaction();
            $sqlprograma = "UPDATE aprendices_programa SET id_programa_formacion=:id_programa_formacion, fecha_inicio=:fecha_inicio WHERE id_aprendiz=:id_aprendiz";
            $stmtprograma = $this->conn->prepare($sqlprograma);
            $stmtprograma -> execute([
                ':id_aprendiz' => $data['id_aprendiz'],
                ':id_programa_formacion' => $data['id_programa_formacion'],
                ':fecha_inicio' => $data['fecha_inicio']
                ]);
            $this->conn->commit();
        }   catch (\Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }
}

// try {
//     $programa=new Programa();
//     $data = [
//         'id_aprendiz'=> 1,
//         'id_programa_formacion' => 3,
//         'fecha_inicio'=> '2025-12-24',
//     ];
//     $programa->actualizarPrograma($data);
//     echo "Usuario actualizado";
// } catch (\Exception $e) {
//     echo $e->getMessage();
// }