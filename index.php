<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Aprendices</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">CRUD Aprendices</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="views/Aprendiz/index.php">Gestionar Aprendices</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido al Sistema de Gestión de Aprendices</h1>
        <p class="text-center">Este sistema permite realizar operaciones CRUD sobre los datos de aprendices.</p>
        <div class="text-center mt-4">
            <a href="views/Aprendiz/index.php" class="btn btn-primary btn-lg">Ir a la Gestión de Aprendices</a>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <span>CRUD Aprendices © <?php echo date('Y'); ?> - Desarrollado por KevinPradaSSJ</span>
        </div>
    </footer>
</body>
</html>