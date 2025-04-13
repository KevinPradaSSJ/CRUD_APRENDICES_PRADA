<?php
require_once 'Config/Database.php';

use Database;


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    try {
   
        $database = new Database();
        $conn = $database->getConnection();

        
        $sql = "DELETE FROM aprendices WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Vincular el parámetro ID
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>
                alert('El aprendiz ha sido eliminado correctamente.');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Error al intentar eliminar el aprendiz.');
                window.location.href = 'index.php';
            </script>";
        }
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "<script>
            alert('Error en la base de datos: " . $e->getMessage() . "');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    // Redirigir si no se proporciona un ID
    echo "<script>
        alert('ID no proporcionado.');
        window.location.href = 'index.php';
    </script>";
}