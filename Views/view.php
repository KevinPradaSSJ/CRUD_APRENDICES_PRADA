<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ver Aprendiz</h1>

        <?php
        require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Controllers/Aprendizcontrolador.php';

        $id_aprendiz = $_GET['id'] ?? null;
        $datos = null;

        if ($id_aprendiz) {
            $controlador = new AprendizControlador();
            $datos = $controlador->ver($id_aprendiz);
        }
        ?>

        <?php if ($datos): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Tipo Documento</th>
                            <th>Género</th>
                            <th>Grupo Sanguíneo</th>
                            <th>Programa de Formación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($datos['id']) ?></td>
                            <td><?= htmlspecialchars($datos['primer_nombre'] . ' ' . $datos['segundo_nombre']) ?></td>
                            <td><?= htmlspecialchars($datos['primer_apellido'] . ' ' . $datos['segundo_apellido']) ?></td>
                            <td><?= htmlspecialchars($datos['numero_doc']) ?></td>
                            <td><?= htmlspecialchars($datos['tipo_documento']) ?></td>
                            <td><?= htmlspecialchars($datos['genero']) ?></td>
                            <td><?= htmlspecialchars($datos['grupo_sanguineo']) ?></td>
                            <td><?= htmlspecialchars($datos['programa_formacion']) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">No se encontró el aprendiz con ID <?= htmlspecialchars($id_aprendiz) ?>.</div>
        <?php endif; ?>

        <a href="index.php" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>
