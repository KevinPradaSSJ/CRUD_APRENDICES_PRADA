<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Aprendices</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Aprendices</h1>
        <a href="create.php" class="btn btn-primary mb-3">Añadir Aprendiz</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Tipo Documento</th>
                    <th>Género</th>
                    <th>Grupo Sanguíneo</th>
                    <th>Programa de Formación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aprendices as $aprendiz): ?>
                    <tr>
                        <td><?= $aprendiz['id'] ?></td>
                        <td><?= $aprendiz['primer_nombre'] . ' ' . $aprendiz['segundo_nombre'] ?></td>
                        <td><?= $aprendiz['primer_apellido'] . ' ' . $aprendiz['segundo_apellido'] ?></td>
                        <td><?= $aprendiz['numero_doc'] ?></td>
                        <td><?= $aprendiz['tipo_documento'] ?></td>
                        <td><?= $aprendiz['genero'] ?></td>
                        <td><?= $aprendiz['grupo_sanguineo'] ?></td>
                        <td><?= $aprendiz['programa_formacion'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $aprendiz['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete.php?id=<?= $aprendiz['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este aprendiz?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>