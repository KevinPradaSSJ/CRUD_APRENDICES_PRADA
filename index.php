<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> CRUD Aprendices</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Views/index.php"><i class="fas fa-users"></i> Gestionar Aprendices</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center"><i class="fas fa-user-graduate"></i> Bienvenido al Sistema de Gestión de Aprendices</h1>
        <p class="text-center">Este sistema permite realizar operaciones CRUD sobre los datos de aprendices.</p>
        <div class="text-center mt-4">
            <a href="Views/index.php" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-right"></i> Ir a la Gestión de Aprendices
            </a>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <span><i class="fas fa-code"></i> CRUD Aprendices © <?php echo date('Y'); ?> - Desarrollado por <strong>KevinPradaSSJ</strong></span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>