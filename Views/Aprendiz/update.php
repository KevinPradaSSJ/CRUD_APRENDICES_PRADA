<?php
require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Config/conexion.php';
use Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que todos los campos requeridos estén presentes
    if (empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['fecha_nacimiento'])) {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Todos los campos son obligatorios.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
        exit;
    }

    // Validar que el ID sea un número
    $id = intval($_POST['id']);
    if ($id <= 0) {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'ID inválido.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
        exit;
    }

    // Escapar y validar los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento']));

    try {
        // Conexión a la base de datos
        $db = new Database();
        $conn = $db->getConnection();

        // Preparar la consulta SQL para actualizar el aprendiz
        $sql = "UPDATE aprendices 
                SET nombre = :nombre, 
                    fecha_nacimiento = :fecha_nacimiento 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros con los datos del formulario
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>
                Swal.fire({
                    title: 'Éxito',
                    text: 'El registro ha sido actualizado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'Error al actualizar el registro.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        }
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Ocurrió un error al procesar la solicitud. Por favor, inténtelo nuevamente.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
    }
} else {
    echo "<script>
        Swal.fire({
            title: 'Método no permitido',
            text: 'Por favor, utilice el formulario para enviar datos.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
}