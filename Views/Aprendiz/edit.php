<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Aprendiz</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Aprendiz</h1>
        <?php
        // Cargar datos desde la base de datos
        $tipos_documento = $conn->query("SELECT * FROM tipo_documento")->fetchAll(PDO::FETCH_ASSOC);
        $generos = $conn->query("SELECT * FROM generos")->fetchAll(PDO::FETCH_ASSOC);
        $grupos_sanguineos = $conn->query("SELECT * FROM grupo_sanguineo")->fetchAll(PDO::FETCH_ASSOC);
        $programas_formacion = $conn->query("SELECT * FROM programas_formacion")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $aprendiz['id'] ?>">
            <div class="form-group">
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" value="<?= $aprendiz['primer_nombre'] ?>" required>
            </div>
            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" value="<?= $aprendiz['segundo_nombre'] ?>">
            </div>
            <div class="form-group">
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" value="<?= $aprendiz['primer_apellido'] ?>" required>
            </div>
            <div class="form-group">
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" value="<?= $aprendiz['segundo_apellido'] ?>">
            </div>
            <div class="form-group">
                <label for="numero_doc">Número de Documento:</label>
                <input type="text" name="numero_doc" id="numero_doc" class="form-control" value="<?= $aprendiz['numero_doc'] ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select name="id_tipo_doc" id="tipo_documento" class="form-control" required>
                    <?php foreach ($tipos_documento as $tipo): ?>
                        <option value="<?= $tipo['id'] ?>" <?= $aprendiz['id_tipo_doc'] == $tipo['id'] ? 'selected' : '' ?>>
                            <?= $tipo['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select name="id_genero" id="genero" class="form-control" required>
                    <?php foreach ($generos as $genero): ?>
                        <option value="<?= $genero['id'] ?>" <?= $aprendiz['id_genero'] == $genero['id'] ? 'selected' : '' ?>>
                            <?= $genero['genero'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
                <select name="id_grupo_sanguineo" id="grupo_sanguineo" class="form-control" required>
                    <?php foreach ($grupos_sanguineos as $grupo): ?>
                        <option value="<?= $grupo['id'] ?>" <?= $aprendiz['id_grupo_sanguineo'] == $grupo['id'] ? 'selected' : '' ?>>
                            <?= $grupo['grupo'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="programa_formacion">Programa de Formación:</label>
                <select name="id_programa_formacion" id="programa_formacion" class="form-control" required>
                    <?php foreach ($programas_formacion as $programa): ?>
                        <option value="<?= $programa['id'] ?>" <?= $aprendiz['id_programa_formacion'] == $programa['id'] ? 'selected' : '' ?>>
                            <?= $programa['nombre_programa'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
        </form>
    </div>
</body>
</html>