<?php
require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Config/conexion.php';
use Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = new Database();
        $conn = $db->getConnection();

        // Preparar la consulta SQL para insertar un nuevo aprendiz
        $sql = "INSERT INTO aprendices (
            primer_nombre, 
            segundo_nombre, 
            primer_apellido, 
            segundo_apellido, 
            numero_doc, 
            id_tipo_doc, 
            id_genero, 
            id_grupo_sanguineo, 
            id_programa_formacion
        ) VALUES (
            :primer_nombre, 
            :segundo_nombre, 
            :primer_apellido, 
            :segundo_apellido, 
            :numero_doc, 
            :id_tipo_doc, 
            :id_genero, 
            :id_grupo_sanguineo, 
            :id_programa_formacion
        )";
        
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros con los datos del formulario
        $stmt->bindParam(':primer_nombre', $_POST['primer_nombre']);
        $stmt->bindParam(':segundo_nombre', $_POST['segundo_nombre']);
        $stmt->bindParam(':primer_apellido', $_POST['primer_apellido']);
        $stmt->bindParam(':segundo_apellido', $_POST['segundo_apellido']);
        $stmt->bindParam(':numero_doc', $_POST['numero_doc']);
        $stmt->bindParam(':id_tipo_doc', $_POST['id_tipo_doc'], PDO::PARAM_INT);
        $stmt->bindParam(':id_genero', $_POST['id_genero'], PDO::PARAM_INT);
        $stmt->bindParam(':id_grupo_sanguineo', $_POST['id_grupo_sanguineo'], PDO::PARAM_INT);
        $stmt->bindParam(':id_programa_formacion', $_POST['id_programa_formacion'], PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>
                alert('El aprendiz ha sido registrado correctamente.');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Error al registrar el aprendiz.');
                window.location.href = 'create.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
            alert('Error en la base de datos: " . $e->getMessage() . "');
            window.location.href = 'create.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Método no permitido.');
        window.location.href = 'index.php';
    </script>";
}
?>