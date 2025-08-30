<!DOCTYPE html>
<html>
<head>
    <title>Crear Curso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <?= $this->include('Formulario/navbar') ?>

    <div class="container">
        <h4><?= $titulo ?></h4>
        <form method="post" action="<?= base_url('cursos/store') ?>">
            <div class="input-field">
                <input type="text" id="nombre" name="nombre" required>
                <label for="nombre">Nombre del curso</label>
            </div>
            <div class="input-field">
                <input type="text" id="profesor" name="profesor" required>
                <label for="profesor">Profesor</label>
            </div>
            <p>
                <label>
                    <input type="checkbox" id="inactivo" name="inactivo" value="1"/>
                    <span>Inactivo</span>
                </label>
            </p>
            <button class="btn waves-effect" type="submit">Guardar</button>
            <a class="btn-flat" href="<?= base_url('cursos') ?>">⬅️ Volver</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() { M.updateTextFields(); });
    </script>
</body>
</html>
