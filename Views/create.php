<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Aprendiz</h1>
        <form action="../Controllers/Aprendizcontrolador.php" method="POST" autocomplete="off">
            <input type="hidden" name="crear" value="1">
            <div class="mb-3">
                <label for="primer_nombre" class="form-label"><i class="fas fa-user"></i> Primer Nombre:</label>
                <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" required autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="segundo_nombre" class="form-label"><i class="fas fa-user"></i> Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="primer_apellido" class="form-label"><i class="fas fa-user"></i> Primer Apellido:</label>
                <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" required autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="segundo_apellido" class="form-label"><i class="fas fa-user"></i> Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="numero_doc" class="form-label"><i class="fas fa-id-card"></i> Número de Documento:</label>
                <input type="text" name="numero_doc" id="numero_doc" class="form-control" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="tipo_documento" class="form-label"><i class="fas fa-file-alt"></i> Tipo de Documento:</label>
                <select name="id_tipo_doc" id="tipo_documento" class="form-select" required>
                    <option value="">Selecciona una opción</option>
                    <option value="1">Cédula</option>
                    <option value="2">Tarjeta de identidad</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label"><i class="fas fa-venus-mars"></i> Género:</label>
                <select name="id_genero" id="genero" class="form-select" required>
                    <option value="">Selecciona una opción</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="grupo_sanguineo" class="form-label"><i class="fas fa-tint"></i> Grupo Sanguíneo:</label>
                <select name="id_grupo_sanguineo" id="grupo_sanguineo" class="form-select" required>
                    <option value="">Selecciona una opción</option>
                    <option value="1">A+</option>
                    <option value="2">A-</option>
                    <option value="3">B+</option>
                    <option value="4">B-</option>
                    <option value="5">AB+</option>
                    <option value="6">AB-</option>
                    <option value="7">O+</option>
                    <option value="8">O-</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="programa_formacion" class="form-label"><i class="fas fa-book"></i> Programa de Formación:</label>
                <select name="id_programa_formacion" id="programa_formacion" class="form-select" required>
                    <option value="">Selecciona una opción</option>
                    <option value="1">ADSO</option>
                    <option value="2">Gestión Empresarial</option>
                    <option value="3">Peluquería</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label"><i class="fas fa-calendar-alt"></i> Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
            </div>
            <button type="submit" name="store" class="btn btn-primary mt-3 w-100">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>