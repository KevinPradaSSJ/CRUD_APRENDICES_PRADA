<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Aprendices</title>
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- FontAwesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Aprendices</h1>
        <a class="nav-link" href="../Views/create.php"><i class="fas fa-plus"></i>Crear aprendiz</a>
        <br><br>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Controllers/Aprendizcontrolador.php';
                    $aprendiz = new AprendizControlador();
                    $aprendices = $aprendiz->index();
                    ?>
                    <?php foreach ($aprendices as $index=>$aprendiz): ?>
                        <tr>
                            <td><?= $index+1 ?></td>
                            <td><?= htmlspecialchars($aprendiz['primer_nombre'] . ' ' . $aprendiz['segundo_nombre']) ?></td>
                            <td><?= htmlspecialchars($aprendiz['primer_apellido'] . ' ' . $aprendiz['segundo_apellido']) ?></td>
                            <td><?= htmlspecialchars($aprendiz['numero_doc']) ?></td>
                            <td><?= htmlspecialchars($aprendiz['tipo_documento']) ?></td>
                            <td><?= htmlspecialchars($aprendiz['genero']) ?></td>
                            <td><?= htmlspecialchars($aprendiz['grupo_sanguineo']) ?></td>
                            <td><?= $aprendiz['programa_formacion'] ?></td>
                            <td>
                                <a href="./edit.php?id=<?= $aprendiz['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </td>
                            <td>
                                <form action="../Controllers/Aprendizcontrolador.php" class="btn btn-danger btn-sm" method="POST">
                                    <input type="hidden" name="id" value="<?= $aprendiz['id'] ?>">
                                    <button type="submit" name="eliminar">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="./view.php?id=<?= $aprendiz['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-View"></i> Ver
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>