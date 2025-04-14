<?php
require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Config/conexion.php';
require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Models/Programamodelo.php';



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
                ap.descripcion
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
            print_r($data);
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
            $programa = new Programa();
            $data = [
                'id_aprendiz' => $aprendizid,
                'id_programa_formacion' => $data['id_programa_formacion'],
                'fecha_inicio' => $data['fecha_inicio'],
            ];
            $programa->agregarPrograma($data);  
            $this->conn->commit();
        } catch (Exception $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            echo "Error al crear usuario: " . $e->getMessage();
        }
    }

    public function Actualizar($data)
    {
        // var_dump($data);
        try {
            $sqlAprendiz = "UPDATE aprendices SET primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre, primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido,
                        id_tipo_doc=:id_tipo_doc, numero_doc=:numero_doc, id_genero=:id_genero, id_grupo_sanguineo=:id_grupo_sanguineo WHERE id = :id";
            $stmtAprendiz = $this->conn->prepare($sqlAprendiz);
            $stmtAprendiz->execute([
                ':id' => $data['id_aprendiz'],
                ':primer_nombre' => $data['primer_nombre'],
                ':segundo_nombre' => $data['segundo_nombre'],
                ':primer_apellido' => $data['primer_apellido'],
                ':segundo_apellido' => $data['segundo_apellido'],
                ':id_tipo_doc' => $data['id_tipo_doc'],
                ':numero_doc' => $data['numero_doc'],
                ':id_genero' => $data['id_genero'],
                ':id_grupo_sanguineo' => $data['id_grupo_sanguineo']
            ]);
            $stmtAprendiz->execute();
        } catch (Exception $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
        }
    }

    public function eliminar($id_aprendiz)
    {
        try {
            $sqlAprendiz = "DELETE FROM aprendices WHERE id = :id";
            $stmtAprendiz = $this->conn->prepare($sqlAprendiz);
            $stmtAprendiz->bindParam(':id', $id_aprendiz, PDO::PARAM_INT);
            $stmtAprendiz->execute();
        } catch (Exception $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            echo "Error al eliminar aprendiz: " . $e->getMessage();
        }
    }
    
    public function ver($id_aprendiz) 
    {
        try {
            $sqlAprendiz = "SELECT 
                    a.id, 
                    a.primer_nombre, 
                    a.segundo_nombre,
                    a.primer_apellido, 
                    a.segundo_apellido, 
                    a.numero_doc,
                    td.nombre AS tipo_documento,
                    g.genero, 
                    gs.grupo AS grupo_sanguineo,
                    pf.nombre_programa AS programa_formacion, 
                    ap.fecha_inicio,
                    ap.descripcion
                FROM aprendices a
                INNER JOIN tipo_documento td ON a.id_tipo_doc = td.id
                INNER JOIN generos g ON a.id_genero = g.id
                INNER JOIN grupo_sanguineo gs ON a.id_grupo_sanguineo = gs.id
                INNER JOIN aprendices_programa ap ON a.id = ap.id_aprendiz
                INNER JOIN programa_de_formacion pf ON ap.id_programa_formacion = pf.id
                WHERE a.id = :id";
            $stmtAprendiz = $this->conn->prepare($sqlAprendiz);
            $stmtAprendiz->bindParam(':id', $id_aprendiz, PDO::PARAM_INT);
            $stmtAprendiz->execute();
            return $stmtAprendiz->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            echo "Error al mostrar aprendiz: " . $e->getMessage();
        }
    }
}

// $aprendizObj = new Aprendiz();
// $Aprendiz = $aprendizObj->ver(1); // ahora sí funciona

// if ($Aprendiz && is_array($Aprendiz)) {
//     echo $Aprendiz['primer_nombre'];
// } else {
//     echo "No se encontró el aprendiz.";
// }
