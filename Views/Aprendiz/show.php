<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Aprendiz</title>
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- FontAwesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detalles del Aprendiz</h1>
        <?php if (isset($aprendiz) && $aprendiz): ?>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Información del Aprendiz</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> <?= htmlspecialchars($aprendiz['id']) ?></li>
                        <li class="list-group-item"><strong>Primer Nombre:</strong> <?= htmlspecialchars($aprendiz['primer_nombre']) ?></li>
                        <li class="list-group-item"><strong>Segundo Nombre:</strong> <?= htmlspecialchars($aprendiz['segundo_nombre']) ?: 'N/A' ?></li>
                        <li class="list-group-item"><strong>Primer Apellido:</strong> <?= htmlspecialchars($aprendiz['primer_apellido']) ?></li>
                        <li class="list-group-item"><strong>Segundo Apellido:</strong> <?= htmlspecialchars($aprendiz['segundo_apellido']) ?: 'N/A' ?></li>
                        <li class="list-group-item"><strong>Número de Documento:</strong> <?= htmlspecialchars($aprendiz['numero_doc']) ?></li>
                        <li class="list-group-item"><strong>Tipo de Documento:</strong> <?= htmlspecialchars($aprendiz['id_tipo_doc']) ?></li>
                        <li class="list-group-item"><strong>Género:</strong> <?= htmlspecialchars($aprendiz['id_genero']) ?></li>
                        <li class="list-group-item"><strong>Grupo Sanguíneo:</strong> <?= htmlspecialchars($aprendiz['id_grupo_sanguineo']) ?></li>
                        <li class="list-group-item"><strong>Programa de Formación:</strong> <?= htmlspecialchars($aprendiz['id_programa_formacion']) ?></li>
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-4" role="alert">
                <i class="fas fa-exclamation-circle"></i> No se encontraron detalles para este aprendiz o no se proporcionó un ID válido.
            </div>
        <?php endif; ?>
        <a href="index.php" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left"></i> Volver a la lista</a>
    </div>
    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>