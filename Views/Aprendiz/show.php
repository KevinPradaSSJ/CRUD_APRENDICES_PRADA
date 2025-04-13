<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Aprendiz</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detalles del Aprendiz</h1>
        <?php
        require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Config/conexion.php';
        use Database;

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);

            try {
                $db = new Database();
                $conn = $db->getConnection();

                // Consultar los detalles del aprendiz
                $stmt = $conn->prepare("SELECT * FROM aprendices WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $aprendiz = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($aprendiz) {
                    echo "<ul class='list-group'>";
                    echo "<li class='list-group-item'><strong>ID:</strong> " . $aprendiz['id'] . "</li>";
                    echo "<li class='list-group-item'><strong>Primer Nombre:</strong> " . $aprendiz['primer_nombre'] . "</li>";
                    echo "<li class='list-group-item'><strong>Segundo Nombre:</strong> " . $aprendiz['segundo_nombre'] . "</li>";
                    echo "<li class='list-group-item'><strong>Primer Apellido:</strong> " . $aprendiz['primer_apellido'] . "</li>";
                    echo "<li class='list-group-item'><strong>Segundo Apellido:</strong> " . $aprendiz['segundo_apellido'] . "</li>";
                    echo "<li class='list-group-item'><strong>Número de Documento:</strong> " . $aprendiz['numero_doc'] . "</li>";
                    echo "<li class='list-group-item'><strong>Tipo de Documento:</strong> " . $aprendiz['id_tipo_doc'] . "</li>";
                    echo "<li class='list-group-item'><strong>Género:</strong> " . $aprendiz['id_genero'] . "</li>";
                    echo "<li class='list-group-item'><strong>Grupo Sanguíneo:</strong> " . $aprendiz['id_grupo_sanguineo'] . "</li>";
                    echo "<li class='list-group-item'><strong>Programa de Formación:</strong> " . $aprendiz['id_programa_formacion'] . "</li>";
                    echo "</ul>";
                } else {
                    echo "<p class='text-danger'>No se encontraron detalles para este aprendiz.</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='text-danger'>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p class='text-danger'>No se proporcionó un ID válido.</p>";
        }
        ?>
        <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
</body>
</html>