<?php 
require_once 'conexion.php';



class Aprendiz 
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function recibirDatos()
    {
        $sql = "SELECT a.id, a.primer_nombre, a.segundo_nombre,
                a.primer_apellido, a.segundo_apellido, a.numero_doc,
                td.nombre AS tipo_documento,
                g.genero, 
                gs.grupo AS grupo_sanguineo,
                pf.nombre_programa AS programa_formacion, 
                ap.fecha_inicio,
                ap.fecha_fin,
                ap.descripción
                FROM aprendices a
                INNER JOIN tipo_documento td ON a.id_tipo_doc = td.id
                INNER JOIN generos g ON a.id_genero = g.id
                INNER JOIN grupo_sanguineo gs ON a.id_grupo_sanguineo = gs.id
                LEFT JOIN aprendices_programa ap ON a.id = ap.id_aprendiz
                LEFT JOIN programa_de_formacion pf ON ap.id_programa_formacion = pf.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recibirID($id)
    {
        $sql = "SELECT a.id, a.primer_nombre, a.segundo_nombre,
                a.primer_apellido, a.segundo_apellido, a.numero_doc,
                td.nombre AS tipo_documento,
                g.genero, 
                gs.grupo AS grupo_sanguineo,
                pf.nombre_programa AS programa_formacion, 
                ap.fecha_inicio,
                ap.descripción
                FROM aprendices a
                INNER JOIN tipo_documento td ON a.id_tipo_doc = td.id
                INNER JOIN generos g ON a.id_genero = g.id
                INNER JOIN grupo_sanguineo gs ON a.id_grupo_sanguineo = gs.id
                LEFT JOIN aprendices_programa ap ON a.id = ap.id_aprendiz
                LEFT JOIN programa_de_formacion pf ON ap.id_programa_formacion = pf.id
                WHERE a.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function Crear($data)
    {
        try {
            $this->conn->beginTransaction();

            $sqlAprendiz = "INSERT INTO aprendices
                            (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_doc, numero_doc, id_genero, id_grupo_sanguineo)
                            VALUES 
                            (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_tipo_doc, :numero_doc, :id_genero, :id_grupo_sanguineo)";
            $stmtAprendiz = $this->conn->prepare($sqlAprendiz);
            $stmtAprendiz->execute([
                ':primer_nombre' => $data['primer_nombre'],
                ':segundo_nombre' => $data['segundo_nombre'],
                ':primer_apellido' => $data['primer_apellido'],
                ':segundo_apellido' => $data['segundo_apellido'],
                ':id_tipo_doc' => $data['id_tipo_doc'],
                ':numero_doc' => $data['numero_doc'],
                ':id_genero' => $data['id_genero'],
                ':id_grupo_sanguineo' => $data['id_grupo_sanguineo']
            ]);    
            $aprendizid = $this->conn->lastInsertId();

            if (!empty($data['id_programa_formacion'])) {
                $sqlprograma = "INSERT INTO aprendices_programa
                                (id_aprendiz, id_programa_formacion, fecha_inicio, descripcion)
                                VALUES
                                (:id_aprendiz, :id_programa_formacion, :fecha_inicio, :descripcion)";
                $stmtprograma = $this->conn->prepare($sqlprograma);
                $stmtprograma->execute([
                    ':id_aprendiz' => $aprendizid,
                    ':id_programa_formacion' => $data['id_programa_formacion'],
                    ':fecha_inicio' => date('Y-m-d'),
                    ':descripcion' => $data['descripcion'] ?? 'Asociado al programa'
                ]);
            }
            $this->conn->commit();
            return $aprendizid;
        } catch (\Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }        
}

    public function Actualizar($id, $data)
    {
        $sql = "UPDATE aprendices SET primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre, primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido,
                id_tipo_doc=:id_tipo_doc, numero_doc=:numero_doc, id_genero=:id_genero, id_grupo_sanguineo=:id_grupo_sanguieno WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);  
    }

    public function Eliminar($id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlprograma = "DELETE FROM aprendices_programa WHERE id_aprendiz = :id_aprendiz";
            $stmtprograma = $this->conn->prepare($sqlprograma);
            $stmtprograma->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
            $stmtprograma->execute();

            $sqlaprendiz = "DELETE FROM aprendices WHERE id = :id";
            $stmtaprendiz = $this->conn->prepare($sqlaprendiz);
            $stmtaprendiz->bindParam(":id", $id, PDO::PARAM_INT);
            $stmtaprendiz->execute();

            $this->conn->commit();
            return true;
        } catch (\Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
        
    }
}
?>