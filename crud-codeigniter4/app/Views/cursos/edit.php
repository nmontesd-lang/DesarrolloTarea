<!DOCTYPE html>
<html>
<head>
    <title>Editar Curso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <?= $this->include('Formulario/navbar') ?>

    <div class="container">
        <h4>Editar Curso</h4>
        <form method="post" action="<?= site_url('cursos/update/' . $curso['curso']) ?>">
            <div class="input-field">
                <input type="text" id="nombre" name="nombre" value="<?= $curso['nombre'] ?>" required>
                <label class="active" for="nombre">Nombre del curso</label>
            </div>
            <div class="input-field">
                <input type="text" id="profesor" name="profesor" value="<?= $curso['profesor'] ?>" required>
                <label class="active" for="profesor">Profesor</label>
            </div>
            <p>
                <label>
                    <input type="checkbox" name="inactivo" value="1" <?= $curso['inactivo'] ? 'checked' : '' ?>>
                    <span>Inactivo</span>
                </label>
            </p>
            <button class="btn waves-effect" type="submit">Actualizar</button>
            <a class="btn-flat" href="<?= base_url('cursos') ?>">⬅️ Volver</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() { M.updateTextFields(); });
    </script>
</body>
</html>
